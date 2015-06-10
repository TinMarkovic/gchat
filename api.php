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
/*
//permissions
$tokenExists = isset($params["token"]);

if ($tokenExists) {
	$user = UserFactory::getByToken($params["token"]);
	if ($user === false) $tokenExists = false;
}

$nekiArray = array("login", "register");
$userPermissions // popuniti userPerm
$actionPermissions // definirati actPerm


if ((in_array($action, $nekiArray))  && $tokenExists) {
	$result["data"] = "You are already logged in. <br>";
	$result["success"] = false;
	print_r($result);
	exit();
}
*/
//---

$result["data"] = $controller->$action();
$result["success"] = true;

print_r($result);

?>
