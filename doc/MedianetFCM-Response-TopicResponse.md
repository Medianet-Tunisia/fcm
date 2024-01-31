MedianetFCM\Response\TopicResponse
===============

Class TopicResponse




* Class name: TopicResponse
* Namespace: MedianetFCM\Response
* Parent class: [MedianetFCM\Response\BaseResponse](MedianetFCM-Response-BaseResponse.md)
* This class implements: [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)


Constants
----------


### LIMIT_RATE_TOPICS_EXCEEDED

    const LIMIT_RATE_TOPICS_EXCEEDED = "TopicsMessageRateExceeded"





### SUCCESS

    const SUCCESS = 'success'





### FAILURE

    const FAILURE = 'failure'





### ERROR

    const ERROR = "error"





### MESSAGE_ID

    const MESSAGE_ID = "message_id"







Methods
-------


### __construct

    mixed MedianetFCM\Response\BaseResponse::__construct(\GuzzleHttp\Psr7\Response $response)

BaseResponse constructor.



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\BaseResponse](MedianetFCM-Response-BaseResponse.md)


#### Arguments
* $response **GuzzleHttp\Psr7\Response**



### parseResponse

    mixed MedianetFCM\Response\BaseResponse::parseResponse(array $responseInJson)

parse the response



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [MedianetFCM\Response\BaseResponse](MedianetFCM-Response-BaseResponse.md)


#### Arguments
* $responseInJson **array**



### logResponse

    mixed MedianetFCM\Response\BaseResponse::logResponse()

Log the response



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [MedianetFCM\Response\BaseResponse](MedianetFCM-Response-BaseResponse.md)




### isSuccess

    boolean MedianetFCM\Response\TopicResponseContract::isSuccess()

true if topic sent with success



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\TopicResponseContract](MedianetFCM-Response-TopicResponseContract.md)




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




### isJsonResponse

    mixed MedianetFCM\Response\BaseResponse::isJsonResponse(\GuzzleHttp\Psr7\Response $response)

Check if the response given by fcm is parsable



* Visibility: **private**
* This method is defined by [MedianetFCM\Response\BaseResponse](MedianetFCM-Response-BaseResponse.md)


#### Arguments
* $response **GuzzleHttp\Psr7\Response**


