MedianetFCM\Message\PayloadNotificationBuilder
===============

Class PayloadNotificationBuilder

Official google documentation :


* Class name: PayloadNotificationBuilder
* Namespace: MedianetFCM\Message







Methods
-------


### __construct

    mixed MedianetFCM\Message\PayloadNotificationBuilder::__construct(String $title)

Title must be present on android notification and ios (watch) notification



* Visibility: **public**


#### Arguments
* $title **String**



### setTitle

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setTitle(String $title)

Indicates notification title. This field is not visible on iOS phones and tablets.

but it is required for android

* Visibility: **public**


#### Arguments
* $title **String**



### setBody

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setBody(String $body)

Indicates notification body text.



* Visibility: **public**


#### Arguments
* $body **String**



### setIcon

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setIcon(String $icon)

Supported Android
Indicates notification icon. example : Sets value to myicon for drawable resource myicon.



* Visibility: **public**


#### Arguments
* $icon **String**



### setSound

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setSound(String $sound)

Indicates a sound to play when the device receives a notification.

Supports default or the filename of a sound resource bundled in the app.

* Visibility: **public**


#### Arguments
* $sound **String**



### setBadge

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setBadge(String $badge)

Supported Ios

Indicates the badge on the client app home icon.

* Visibility: **public**


#### Arguments
* $badge **String**



### setTag

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setTag(String $tag)

Supported Android

Indicates whether each notification results in a new entry in the notification drawer on Android.
If not set, each request creates a new notification.
If set, and a notification with the same tag is already being shown, the new notification replaces the existing one in the notification drawer.

* Visibility: **public**


#### Arguments
* $tag **String**



### setColor

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setColor(String $color)

Supported Android

Indicates color of the icon, expressed in #rrggbb format

* Visibility: **public**


#### Arguments
* $color **String**



### setClickAction

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setClickAction(String $action)

Indicates the action associated with a user click on the notification



* Visibility: **public**


#### Arguments
* $action **String**



### setTitleLocationKey

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setTitleLocationKey(String $titleKey)

Indicates the key to the title string for localization.



* Visibility: **public**


#### Arguments
* $titleKey **String**



### setTitleLocationArgs

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setTitleLocationArgs(mixed $titleArgs)

Indicates the string value to replace format specifiers in the title string for localization.



* Visibility: **public**


#### Arguments
* $titleArgs **mixed**



### setBodyLocationKey

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setBodyLocationKey(String $bodyKey)

Indicates the key to the body string for localization.



* Visibility: **public**


#### Arguments
* $bodyKey **String**



### setBodyLocationArgs

    \MedianetFCM\Message\PayloadNotificationBuilder MedianetFCM\Message\PayloadNotificationBuilder::setBodyLocationArgs(mixed $bodyArgs)

Indicates the string value to replace format specifiers in the body string for localization.



* Visibility: **public**


#### Arguments
* $bodyArgs **mixed**



### getTitle

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getTitle()

Get title



* Visibility: **public**




### getBody

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getBody()

Get body



* Visibility: **public**




### getIcon

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getIcon()

Get Icon



* Visibility: **public**




### getSound

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getSound()

Get Sound



* Visibility: **public**




### getBadge

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getBadge()

Get Badge



* Visibility: **public**




### getTag

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getTag()

Get Tag



* Visibility: **public**




### getColor

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getColor()

Get Color



* Visibility: **public**




### getClickAction

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getClickAction()

Get ClickAction



* Visibility: **public**




### getBodyLocationKey

    null|String MedianetFCM\Message\PayloadNotificationBuilder::getBodyLocationKey()

Get BodyLocationKey



* Visibility: **public**




### getBodyLocationArgs

    null|String|array MedianetFCM\Message\PayloadNotificationBuilder::getBodyLocationArgs()

Get BodyLocationArgs



* Visibility: **public**




### getTitleLocationKey

    string MedianetFCM\Message\PayloadNotificationBuilder::getTitleLocationKey()

Get TitleLocationKey



* Visibility: **public**




### getTitleLocationArgs

    null|String|array MedianetFCM\Message\PayloadNotificationBuilder::getTitleLocationArgs()

GetTitleLocationArgs



* Visibility: **public**




### build

    \MedianetFCM\Message\PayloadNotification MedianetFCM\Message\PayloadNotificationBuilder::build()

Build an PayloadNotification



* Visibility: **public**



