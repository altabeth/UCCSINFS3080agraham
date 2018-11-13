<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();

?>


<!DOCTYPE html>

<html>
        <head>
            <title>About</title>
            <link rel="stylesheet" href="CSS/styles.css">
        </head>
        <body class="about">
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
            <!--main page areas-->
            <div class="mid"><h1 class="biggish center">About</h1></div>
            <br>
            <br>
            <br><br><br><br>
            <div class="side2a"><h3>FOR PERFORMERS:</h3>Looking for that perfect piece that 
                uses all the techniques you make look so easy?  Here, you can ask for exactly what 
                you want - a custom-tailored 'suite' if you will.<br><img class="center" 
                src="Images/Strange-band-300x109.png"><br> <audio controls class="center">
                        <source src="Images/Cartoon Music I.mp3" type="audio/mpeg">
                      Your browser does not support the audio element.
                      </audio> 
                      <br><br><br><br><div id="comp"><h3>FOR COMPOSERS:</h3>A consulting composer works for other composers as much as for non-musicians; 
                        dealing with the software, processing, typesetting, electronics, arrangements 
                        and realizations- whatever is getting in the way of you making the music you want to 
                        make.</div></div>
            <div class="side2b">
                <br><br><br><br><br><h3>FOR TEACHERS:</h3>Find yourself dealing with an 
                odd ensemble or peculiar constraints?  Need tools to help demonstrate musical concepts?  
                Here, you can find both.</div>
                
        </body>
    
</html>