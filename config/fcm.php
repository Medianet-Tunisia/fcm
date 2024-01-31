<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => env('FCM_LOG', false),
    'image_upload_url' => env('FCM_IMAGE_UPLOAD_URL', null),
    'os_types' => [
        'android' => 'android',
        'ios' => 'ios',
        'huawei' => 'huawei',
    ],
    'notification_types' => [
        'simple' => 'simple',
        'version' => 'version',
    ],
    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'Your FCM server key'),
        'sender_id' => env('FCM_SENDER_ID', 'Your sender id'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
    'huawei' => [
        'app_id' => env('HUAWEI_APP_ID'),
        'app_secret' => env('HUAWEI_APP_SECRET'),
        'url_auth' => 'https://login.vmall.com/oauth2/token',
        'grant_type' => 'client_credentials',
        'notify_url' => 'https://push-api.cloud.huawei.com/v1/',
        'notify_action' => 'messages:send',
    ],
    'notifiable' => [
        'model' => App\Models\User::class,
        'table' => env('FCM_USER_TABLE', 'users'),
        'id' => env('FCM_USER_ID', 'id'),
    ]
];
