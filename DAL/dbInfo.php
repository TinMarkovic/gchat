<?php

//bez dodataka samo info baze
require_once '/etc/gchat/db_config.php';
require_once 'db.php';
new DB($dbCfg['host'], $dbCfg['username'], $dbCfg['password'], $dbCfg['db']);

?>
