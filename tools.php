<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();

?>


<!DOCTYPE html>

<html>
        <head>
            <title>Tools</title>
            <link rel="stylesheet" href="CSS/styles.css">
        </head>
        <body class="tools">
        <div id="menu2">
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Welcome, ".htmlspecialchars($_SESSION["username"]).":  ";
                ?><a class="dwnld" href="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld" href="reset-password.php">Change Password</a><?php
                }
                else{ ?><a class="dwnld" href="login.php">Login</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld" href="register.php">Sign Up</a><?php }; ?>
            </div>
                <div class="dropdown menu">
                        <a href=# class="droptrigger">MENU<br></a>
                        <div class="dropdown-content">
                          <a href="index.php">HOME</a>
                          <a href="about.php">ABOUT </a>
                          <a href="music.php">MUSIC</a>
                          <a href="tools.php">TOOLS</a>
                          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="XZURP67MWWKM4">
                            <input type="image" src="Images/Tip-Button.png">
                            <img alt="tip" src="http://www.consultingcomposer.com/wp-content/uploads/2016/09/Tip-Button.png" width="1" height="1">
                            </form>
                        </div>
                      </div>  
            <div class="mid"><h1 class="biggish center">Tools and Resources</h1></div>
            <!--comment-->
            <br>
            <br>
            <br><br><br><br>
            <div class="side2d">
                <h2>USEFUL LINKS</h2><br>
       
                Customizable staff paper:<br>
                <a href="https://www.blanksheetmusic.net/">https://www.blanksheetmusic.net/</a><br>
                <br>Free background images to go with scores:<br>
                <a href = "http://www.myfreetextures.com">http://www.myfreetextures.com</a><br>
                    </div>
            <div class="side2e">
                <h2>TOOLS</h2>
                <br><a href="">MIDI Mode Change</a><br><br>
                <a href="">MIDI Key Change/Transposition</a><br><br>
            </div>
            <br><br><br><br><br>
            <div>
                    <br><br><br><br><br>
            <img class="center jump" src="Images/Music-computer-150x150.png" alt="Music coming out of computer">
        
                </div>
                    
        </body>
</html>