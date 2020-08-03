<?php

$servername = '192.168.1.204';
$username = 'app_user';
$password = 'erika';
$db = 'app';

$con = mysqli_connect($servername, $username, $password, $db);

if (!$con) {
     die ("Connection failed ".mysqli_connect_error());
 }
 else {//echo "good connection";
}


?>