MedianetFCM\Message\PayloadDataBuilder
===============

Class PayloadDataBuilder

Official google documentation :


* Class name: PayloadDataBuilder
* Namespace: MedianetFCM\Message







Methods
-------


### addData

    \MedianetFCM\Message\PayloadDataBuilder MedianetFCM\Message\PayloadDataBuilder::addData(array $data)

add data to existing data



* Visibility: **public**


#### Arguments
* $data **array**



### setData

    \MedianetFCM\Message\PayloadDataBuilder MedianetFCM\Message\PayloadDataBuilder::setData(array $data)

erase data with new data



* Visibility: **public**


#### Arguments
* $data **array**



### removeAllData

    mixed MedianetFCM\Message\PayloadDataBuilder::removeAllData()

Remove all data



* Visibility: **public**




### getData

    array MedianetFCM\Message\PayloadDataBuilder::getData()

return data



* Visibility: **public**




### build

    \MedianetFCM\Message\PayloadData MedianetFCM\Message\PayloadDataBuilder::build()

generate a PayloadData



* Visibility: **public**



