<?php

namespace MedianetFCM\Services;

use MedianetFCM\Message\PayloadNotificationBuilder;
use MedianetFCM\Models\NotificationTranslation;
use MedianetFCM\Message\PayloadDataBuilder;
use MedianetFCM\Message\OptionsBuilder;
use MedianetFCM\Models\UserNotification;
use MedianetFCM\Models\Notification;
use Illuminate\Support\Facades\Log;
use MedianetFCM\Models\LoginModel;
use MedianetFCM\Facades\FCM;

class PushNotificationService
{
    public function send($users, $notificationData)
    {
        $users = $users ? $users->pluck('id', 'id')->toArray() : [];

        $logins = LoginModel::whereIn('user_id', $users)->get();

        if ($logins->isNotEmpty()) {
            foreach ($logins as $login) {
                $notification = Notification::create([
                    'notification_type' => 'simple',
                    'os' => $login->os,
                ]);

                $data = [
                    'title' => $notificationData['title'],
                    'description' => $notificationData['description'],
                    'notification_id' => $notification->id,
                    'locale' => locale(),
                ];

                NotificationTranslation::create($data);

                $notificationTab = [
                    'title' => $notificationData['title'],
                    'body' => $notificationData['description'],
                    'image' => '',
                    'type' => $notification->type,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'notification_id' => $notification->id,
                ];

                $notificationData = [
                    'title' => $notificationData['title'],
                    'body' => $notificationData['description'],
                    'data' => $notificationTab,
                    'sound' => 'default',
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            //Send bulk notification
            $groupedLogins = $logins->groupBy('os');

            if (isset($groupedLogins[config('fcm.os_types.android')])) {
                $this->notifyAndroid($notification, $notificationData, $groupedLogins[config('fcm.os_types.android')]);
            }

            if (isset($groupedLogins[config('fcm.os_types.huawei')])) {
                $this->notifyHuawei($notification, $notificationData, $groupedLogins[config('fcm.os_types.huawei')]);
            }
            if (isset($groupedLogins[config('fcm.os_types.ios')])) {
                $this->notifyIos($notification, $notificationData, $groupedLogins[config('fcm.os_types.ios')]);
            }
        }
    }

    public function notifyIos($notification, $notificationData, $users)
    {
        if ($users->isNotEmpty()) {
            $userImeis = $users->pluck('imei')->toArray();

            $firebase = (object) $this->notificationFirebase($userImeis, $notificationData, config('fcm.os_types.ios'));

            if (!empty($firebase->tokensWithError())) {
                foreach ($firebase->tokensWithError() as $key => $error) {
                    Log::alert('FIREBASE NOTIFICATION FAILED (KEY:' . $key . ' - ERROR:' . $error . ')');
                }
            } else {
                $this->historyNotification($notification->id, $users);
            }
        }
    }

    public function notifyAndroid($notification, $notificationData, $users)
    {
        if ($users->isNotEmpty()) {
            $userImeis = $users->pluck('imei')->toArray();

            $firebase = (object) $this->notificationFirebase($userImeis, $notificationData, config('fcm.os_types.android'));

            if (!empty($firebase->tokensWithError())) {
                foreach ($firebase->tokensWithError() as $key => $error) {
                    Log::alert('FIREBASE NOTIFICATION FAILED (KEY:' . $key . ' - ERROR:' . $error . ')');
                }
            } else {
                $this->historyNotification($notification->id, $users);
            }
        }
    }

    public function notificationFirebase($usersIMEI, $data, $os)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($data['title']);
        $notificationBuilder->setBody($data['body'])
            ->setSound($data['sound']);
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        if ($os == config('fcm.os_types.ios')) {
            $response = FCM::sendTo($usersIMEI, $option, $notification, $data);
        } else {
            $response = FCM::sendTo($usersIMEI, $option, null, $data);
        }

        return $response;
    }

    public function notifyHuawei($notification, $notificationData, $users)
    {
        if (!empty($user)) {
            $userImeis = $user->pluck('imei')->toArray();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, config('fcm.huawei.url_auth'));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $app_id = config('fcm.huawei.app_id');
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=' . config('fcm.huawei.grant_type') . '&client_id=' . $app_id . '&client_secret=' . config('fcm.huawei.app_secret'));
            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);
            if (isset($result['access_token'])) {
                $access_token = $result['access_token'];

                $urlSend = config('fcm.huawei.notify_url') . $app_id . config('fcm.huawei.notify_action');

                $structureData = [];
                $structureData['validate_only'] = false;
                $structureData['message']['data'] = json_encode($notificationData);
                $structureData['message']['token'] = $userImeis;

                $header = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $urlSend);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_POSTFIELDS, (json_encode($structureData)));
                $response = curl_exec($ch);
                curl_close($ch);

                $this->historyNotification($notification->id, $users);

                return $response;
            }
        }
    }

    public function historyNotification($notifId, $users)
    {
        foreach ($users as $user) {
            $data = [
                'user_id' => $user->user_id,
                'notification_id' => $notifId,
            ];

            $userNotification = UserNotification::where($data)->first();

            if ($userNotification) {
                $data['updated_at'] = now();

                $userNotification->update($data);
            } else {
                UserNotification::create($data);
            }
        }
    }
}
