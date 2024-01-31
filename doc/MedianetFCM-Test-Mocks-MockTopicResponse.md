MedianetFCM\Test\Mocks\MockTopicResponse
===============

Class MockTopicResponse **Only use it for testing**




* Class name: MockTopicResponse
* Namespace: MedianetFCM\Test\Mocks
* This class implements: [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)






Methods
-------


### setSuccess

    mixed MedianetFCM\Test\Mocks\MockTopicResponse::setSuccess($messageId)

if success set a message id



* Visibility: **public**


#### Arguments
* $messageId **mixed**



### isSuccess

    boolean MedianetFCM\Response\TopicResponseContract::isSuccess()

true if topic sent with success



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)




### setError

    mixed MedianetFCM\Test\Mocks\MockTopicResponse::setError($error)

set error



* Visibility: **public**


#### Arguments
* $error **mixed**



### error

    string MedianetFCM\Response\TopicResponseContract::error()

return error message
you should test if it's necessary to resent it



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)




### shouldRetry

    boolean MedianetFCM\Response\TopicResponseContract::shouldRetry()

return true if it's necessary resent it using exponential backoff



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)



