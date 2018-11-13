<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();

?>
<!DOCTYPE html>

<html>
        <head>
            <title>Consulting Composer</title>
            <link rel="stylesheet" href="CSS/styles.css">
        </head>
        <body class="home">
            <div id="menu2">
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Welcome, ".htmlspecialchars($_SESSION["username"]).":  ";
                ?><a class="dwnld" href="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld" href="reset-password.php">Change Password</a><?php
                }
                else{ ?><a class="dwnld" href="login.php">Login</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld" href="register.php">Sign Up</a><?php }; ?>
            </div>
            <br><br><br><br>
            <div class="mid"><h1 class="big center">Consulting Composer</h1></div>
            <!--comment-->
            <br>
            <br>
            <br><br><br><br>
            <h2>
            <div class="center pglst"><a href="music.php">Music</a><br><br>
            <a href="tools.php">Tools for Writing and Teaching Music</a><br><br>
            <a href="about.php">About</a><br><br>
            <br></div></h2><div class="side">
            </div>
            <br><br>
            <img class="center" src="Images/logo.png" alt="Cat with glasses, computer, and music">
            
        </body>
    
</html>
