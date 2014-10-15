<?php

// usctip.com/cpanel deployment credentials
//$user = "risberg_php02";
//$password = "~hrRwp{mPeNP";
//$host = "uscitp.com";
//$db_name = "risberg_php02";

// localhost testing credentials
$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php02";

$db_connection = mysqli_connect($host, $user, $password, $db_name);
?>