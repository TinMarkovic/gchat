<?php
//require_once "/api.php";
require_once "DAL/db.php";
/*
$sql = "SELECT * FROM user WHERE id = 1";
$result = DB::$db->query($sql);

$obj = $result->fetch_object();
*/
echo ("
<form action='' method='post'>
	<table>
	<tr><td>Login Name:</td><td><input type='text' name='username' value='$obj->username'></td></tr>
	<tr><td>Password: </td><td><input type='password' name='password' value='*********'></td></tr>
	<tr><td>First Name: </td><td><input type='text' name='firstName' value='$obj->firstName'></td></tr>
	<tr><td>Last Name: </td><td><input type='text' name='lastName' value='$obj->lastName'></td></tr>
	<tr><td>E-mail: </td><td><input type='email' name='email' value='$obj->email'></td></tr>
	<tr><td>E-mail: </td><td><input type='text' name='birthday' value='$obj->birthday'></td></tr>
	<tr><td>Login Name:</td><td><input type='hidden' name='controller' value='UserController'></td></tr>
	<tr><td>Login Name:</td><td><input type='hidden' name='action' value='edit'></td></tr>
	<tr><td><input type='submit'></td></tr>
	</table>
	</form>");
?>
