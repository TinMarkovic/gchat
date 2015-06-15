<?php
require_once "Helpers/Auth.php";
require_once "Factory/UserFactory.php";
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/User.php";
require_once "Models/UserRole.php";
require_once "Factory/UserRoleFactory.php";
require_once "Models/Token.php";
require_once "Factory/UserFactory.php";
require_once "Controllers/RoleController.php";
require_once "Helpers/validate.php";

$params = $_REQUEST;

$action = strtolower($params['action']);
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

//-------- PERMISSIONS
$tokenExists = isset($params["token"]);

if ($tokenExists) {
	$user = UserFactory::getByToken($params["token"]);
	if ($user === false) $tokenExists = false;
}

$strangerPermissions = array("login", "register");
$userPermissions = Auth::getPermissionList($user->_id);
$actionPermissions = Auth::getRequiredPermissions($action);


if (in_array($action, $strangerPermissions)) {
	if ($tokenExists){
		$result["data"] = "You are already logged in. <br>";
		$result["success"] = false;
		print_r($result);
		exit();
	} else {
		$result["data"] = $controller->$action();
		$result["success"] = true;
		print_r($result);
		exit();
	}
}

$error = "";

foreach ($actionPermissions as $actionPerm) {
	if (!(in_array($actionPerm, $userPermissions))){
		$error = $error . "Insufficient permissions: $actionPerm missing. <br>";
	}	
}

if ($error != ""){
	$result["data"] = $error;
	$result["success"] = false;
	print_r($result);
	exit();
}

$result["data"] = $controller->$action();
$result["success"] = true;

print_r($result);
exit();

?>
