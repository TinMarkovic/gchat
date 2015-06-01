<?php

$params = $_REQUEST;

$action = $params['action'];
$controller = $params['controller'];

//check if the controller exists. if it doesn't - stop
if( file_exists("Controllers/{$controller}.php") ) {
	include_once "Controllers/{$controller}.php";
} else {
    $result['success'] = false;
	die("Controller doesn't exit.");
}

$controller = new $controller($params);

//check if method from controller exists, if it doesn't - stop
if( method_exists($controller, $action) === false ) {
    $result['success'] = false;
	die("Action doesn't exit.");
}

$result["data"] = $controller->$action();
$result["success"] = true;

print_r($result);

?>
