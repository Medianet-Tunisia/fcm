MedianetFCM\Test\Mocks\MockGroupResponse
===============

Class MockGroupResponse **Only use it for testing**




* Class name: MockGroupResponse
* Namespace: MedianetFCM\Test\Mocks
* This class implements: [MedianetFCM\Response\GroupResponseContract](MedianetFCM-Response-GroupResponseContract.md)






Methods
-------


### setNumberSuccess

    mixed MedianetFCM\Test\Mocks\MockGroupResponse::setNumberSuccess($numberSuccess)

set number of success



* Visibility: **public**


#### Arguments
* $numberSuccess **mixed**



### numberSuccess

    integer MedianetFCM\Response\GroupResponseContract::numberSuccess()

Get the number of device reached with success



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\GroupResponseContract](MedianetFCM-Response-GroupResponseContract.md)




### setNumberFailure

    mixed MedianetFCM\Test\Mocks\MockGroupResponse::setNumberFailure($numberFailures)

set number of failures



* Visibility: **public**


#### Arguments
* $numberFailures **mixed**



### numberFailure

    integer MedianetFCM\Response\GroupResponseContract::numberFailure()

Get the number of device which thrown an error



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\GroupResponseContract](MedianetFCM-Response-GroupResponseContract.md)




### addTokenFailed

    mixed MedianetFCM\Test\Mocks\MockGroupResponse::addTokenFailed($tokenFailed)

add a token to the failed list



* Visibility: **public**


#### Arguments
* $tokenFailed **mixed**



### tokensFailed

    array MedianetFCM\Response\GroupResponseContract::tokensFailed()

Get all token in group that fcm cannot reach



* Visibility: **public**
* This method is defined by [MedianetFCM\Response\GroupResponseContract](MedianetFCM-Response-GroupResponseContract.md)



