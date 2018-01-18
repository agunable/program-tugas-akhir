<?php

$host = 'artificial.mysql.database.azure.com'; 

$user = '*****'; 

$pass = '******';

$dbname = 'db_tugasakhir';

error_reporting(E_ALL ^ E_DEPRECATED);
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);


?>