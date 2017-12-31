<?php
/**
 * Created by PhpStorm.
 * User: mohan
 * Date: 12/24/17
 * Time: 10:34 AM
 */
namespace FleetManagement;
include_once('Models/Devices.php');
include_once('database.php');


$method = $_SERVER['REQUEST_METHOD'];
$arr_request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

$api = $arr_request[0];
if(ucfirst($api) != 'Devices' || strtolower($method) != 'get'){
	http_response_code(404);
}else{
	$connection = new \PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
	$obj = new Models\Devices($connection);
	$return = $obj->getDevices();
	http_response_code(200);
	header("HTTP/1.1 200 OK");
	header('Content-Type: application/json');
	echo json_encode($return);
}
