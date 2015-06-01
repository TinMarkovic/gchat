<?php
require_once 'validate.php';

$validator = new validate();

$test = $validator->registerForm($_REQUEST);

if ($test === true) echo "Sve 5!";
else echo $test;
