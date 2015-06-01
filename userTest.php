<?php
require_once 'usercontroller.php';
require_once 'user.php';
require_once 'db.php';
require_once 'dbInfo.php';

$user = $_POST;

print_r($user);

$UC = new userController();

$result = $UC->login($user);

print_r($result);
