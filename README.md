# Medianet-FCM

[![License](https://poser.pugx.org/brozot/laravel-fcm/license)](https://packagist.org/packages/medianet-dev/fcm)

## Introduction

Medianet-FCM is an easy to use package working with both Laravel for sending push notification with [Firebase Cloud Messaging](https://firebase.google.com/docs/cloud-messaging/) (FCM) and huawei store.


## Installation

To get the latest version of Medianet-FCM on your project, require it from "composer":


	$ composer require medianet-dev/fcm


Or you can add it directly in your composer.json file:

```json
{
    "require": {
        "medianet-dev/fcm": "^1.0"
    }
}
```


### Publish package

Publish the package config file using the following command:
	$ php artisan vendor:publish --provider="MedianetFCM\FCMServiceProvider"

### Package Configuration

In your `.env` file, add the server key and the secret key for the Firebase Cloud Messaging:

```php
# FCM Log
FCM_LOG=true
# URL path for the images
FCM_IMAGE_UPLOAD_URL="http://localhost/fcm/public/uploads"
# Firebase KEYS
FCM_SERVER_KEY="my_secret_server_key"
FCM_SENDER_ID="my_secret_sender_id"
# Huawei KEYS
HUAWEI_APP_ID="my_secret_server_key"
HUAWEI_APP_SECRET="my_secret_sender_id"
# Notifiable model
FCM_MODEL="App\Models\User"
FCM_USER_ID="id"
```

To get these keys, you must create a new application on the [firebase cloud messaging console](https://console.firebase.google.com/).

After the creation of your application on Firebase, you can find keys in `project settings -> cloud messaging`.

For the huawei app keys you need to get them from the Huawei Store

## Basic Usage

To send the notification for 

```php
$notificationService = new PushNotificationService();

$users = config('fcm.notifiable.model')::get();

$notificationService->send($users, [
	'title' => 'title',
	'description' => 'description'
]);
```



## API Documentation

You can find more documentation about the API in the [API reference](./doc/Readme.md).


## Licence

This library is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

Some of this documentation is coming from the official documentation. You can find it completely on the [Firebase Cloud Messaging](https://firebase.google.com/docs/cloud-messaging/) Website.
