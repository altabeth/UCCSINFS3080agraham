<?php
/* Database credentials.  */
define('DB_SERVER', 'practicalcatwebcom.ipagemysql.com');
define('DB_USERNAME', 'site');
define('DB_PASSWORD', 'testpass');
define('DB_NAME', 'ccbasic');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Ack! Could not connect. " . mysqli_connect_error());
}
?>
