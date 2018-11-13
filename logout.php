<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
<html>
    </html>