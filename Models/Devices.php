<?php
/**
 * Created by PhpStorm.
 * User: mohan
 * Date: 12/24/17
 * Time: 11:14 PM
 */

namespace FleetManagement\Models;


class Devices {

    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    function getDevices(){
        $stmt = $this->connection->prepare("
            Select
				d.id,d.device_name,
				max(t.created_on) as latest,
				if(date_add(max(t.created_on), INTERVAL 1440 MINUTE ) < current_timestamp(),  'OFFLINE','OK') as status
			From
				devices d, telemetrics t
			where
				d.id = t.device_id
			group by
				t.device_id
		");

        $stmt->execute();
        return $stmt->fetchAll();
    }
}