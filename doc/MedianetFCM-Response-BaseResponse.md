MedianetFCM\Response\BaseResponse
===============

Class BaseResponse




* Class name: BaseResponse
* Namespace: MedianetFCM\Response
* This is an **abstract** class



Constants
----------


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


#### Arguments
* $response **GuzzleHttp\Psr7\Response**



### isJsonResponse

    mixed MedianetFCM\Response\BaseResponse::isJsonResponse(\GuzzleHttp\Psr7\Response $response)

Check if the response given by fcm is parsable



* Visibility: **private**


#### Arguments
* $response **GuzzleHttp\Psr7\Response**



### parseResponse

    mixed MedianetFCM\Response\BaseResponse::parseResponse(array $responseInJson)

parse the response



* Visibility: **protected**
* This method is **abstract**.


#### Arguments
* $responseInJson **array**



### logResponse

    mixed MedianetFCM\Response\BaseResponse::logResponse()

Log the response



* Visibility: **protected**
* This method is **abstract**.



