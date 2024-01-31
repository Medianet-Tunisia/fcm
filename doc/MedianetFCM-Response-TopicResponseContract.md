MedianetFCM\Response\TopicResponseContract
===============

Interface TopicResponseContract




* Interface name: TopicResponseContract
* Namespace: MedianetFCM\Response
* This is an **interface**






Methods
-------


### isSuccess

    boolean MedianetFCM\Response\TopicResponseContract::isSuccess()

true if topic sent with success



* Visibility: **public**




### error

    string MedianetFCM\Response\TopicResponseContract::error()

return error message
you should test if it's necessary to resent it



* Visibility: **public**




### shouldRetry

    boolean MedianetFCM\Response\TopicResponseContract::shouldRetry()

return true if it's necessary resent it using exponential backoff



* Visibility: **public**



