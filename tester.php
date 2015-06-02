<?php

require_once 'DAL/dbInfo.php';
include 'Models/User.php';
$sql = "SELECT * FROM user";
//$varijabla = array('bla bla bla','buuuu');
//$usersArray = DB::$db->toArray($sql);
//print_r($usersArray);
//$test = new User($usersArray);
//$test = DB::$db->clean($varijabla);
$testUser = new User("toni","sifra","fname","lname","email","rodj",10,"aktivan");
//$testUser = User::fullUser(5,"toni","sifra","fname","lname","email","rodj","aktivan");
print_r($testUser);
echo nl2br("\n");
?>
