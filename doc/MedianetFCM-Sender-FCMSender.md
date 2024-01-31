MedianetFCM\Sender\FCMSender
===============

Class FCMSender




* Class name: FCMSender
* Namespace: MedianetFCM\Sender
* Parent class: [MedianetFCM\Sender\BaseSender](MedianetFCM-Sender-BaseSender.md)



Constants
----------


### MAX_TOKEN_PER_REQUEST

    const MAX_TOKEN_PER_REQUEST = 1000





Properties
----------


### $client

    protected \Illuminate\Foundation\Application $client

Guzzle Client



* Visibility: **protected**


### $config

    protected array $config

configuration



* Visibility: **protected**


### $url

    protected mixed $url

url



* Visibility: **protected**


Methods
-------


### sendTo

    \MedianetFCM\Response\DownstreamResponse|null MedianetFCM\Sender\FCMSender::sendTo(String|array $to, \MedianetFCM\Message\Options|null $options, \MedianetFCM\Message\PayloadNotification|null $notification, \MedianetFCM\Message\PayloadData|null $data)

send a downstream message to

- a unique device with is registration Token
- or to multiples devices with an array of registrationIds

* Visibility: **public**


#### Arguments
* $to **String|array**
* $options **[MedianetFCM\Message\Options](MedianetFCM-Message-Options.md)|null**
* $notification **[MedianetFCM\Message\PayloadNotification](MedianetFCM-Message-PayloadNotification.md)|null**
* $data **[MedianetFCM\Message\PayloadData](MedianetFCM-Message-PayloadData.md)|null**



### sendToGroup

    \MedianetFCM\Response\GroupResponse MedianetFCM\Sender\FCMSender::sendToGroup($notificationKey, \MedianetFCM\Message\Options|null $options, \MedianetFCM\Message\PayloadNotification|null $notification, \MedianetFCM\Message\PayloadData|null $data)

Send a message to a group of devices identified with them notification key



* Visibility: **public**


#### Arguments
* $notificationKey **mixed**
* $options **[MedianetFCM\Message\Options](MedianetFCM-Message-Options.md)|null**
* $notification **[MedianetFCM\Message\PayloadNotification](MedianetFCM-Message-PayloadNotification.md)|null**
* $data **[MedianetFCM\Message\PayloadData](MedianetFCM-Message-PayloadData.md)|null**



### sendToTopic

    \MedianetFCM\Response\TopicResponse MedianetFCM\Sender\FCMSender::sendToTopic(\MedianetFCM\Message\Topics $topics, \MedianetFCM\Message\Options|null $options, \MedianetFCM\Message\PayloadNotification|null $notification, \MedianetFCM\Message\PayloadData|null $data)

Send message devices registered at a or more topics



* Visibility: **public**


#### Arguments
* $topics **[MedianetFCM\Message\Topics](MedianetFCM-Message-Topics.md)**
* $options **[MedianetFCM\Message\Options](MedianetFCM-Message-Options.md)|null**
* $notification **[MedianetFCM\Message\PayloadNotification](MedianetFCM-Message-PayloadNotification.md)|null**
* $data **[MedianetFCM\Message\PayloadData](MedianetFCM-Message-PayloadData.md)|null**



### getUrl

    string MedianetFCM\Sender\BaseSender::getUrl()

get the url



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [MedianetFCM\Sender\BaseSender](MedianetFCM-Sender-BaseSender.md)




### __construct

    mixed MedianetFCM\Sender\BaseSender::__construct()

BaseSender constructor.



* Visibility: **public**
* This method is defined by [MedianetFCM\Sender\BaseSender](MedianetFCM-Sender-BaseSender.md)



