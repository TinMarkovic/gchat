<?php

require_once 'DAL/dbInfo.php';
include 'Models/user.php';
$sql = "SELECT * FROM user";
//$varijabla = array('bla bla bla','buuuu');
//$usersArray = DB::$db->toArray($sql);
//print_r($usersArray);
//$test = new User($usersArray);
//$test = DB::$db->clean($varijabla);
$testUser = new User(5,"toni","sifra","fname","lname","email","rodj","Active");
//$testUser = User::fullUser(5,"toni","sifra","fname","lname","email","rodj","aktivan");
print_r($testUser);
echo nl2br("\n");
?>
