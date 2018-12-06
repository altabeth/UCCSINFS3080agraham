<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();

require "config.php";

?>


<!DOCTYPE html>

<html>

<head>
    <title>Music</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body class="music">
<div id="menu2">
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Welcome, ".htmlspecialchars($_SESSION["username"]).":  ";
                ?><a class="dwnld top" href="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld top" href="reset-password.php">Change Password</a><?php
                }
                else{ ?><a class="dwnld top" href="login.php">Login</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld top" href="register.php">Sign Up</a><?php }; ?>
            </div>
                <div class="dropdown menu">
                        <a href=# class="droptrigger">MENU<br></a>
                        <div class="dropdown-content">
                          <a href="index.html">HOME</a>
                          <a href="about.html">ABOUT </a>
                          <a href="music.html">MUSIC</a>
                          <a href="tools.html">TOOLS</a>
                          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="XZURP67MWWKM4">
                            <input type="image" src="Images/Tip-Button.png">
                            <img alt="tip" src="http://www.consultingcomposer.com/wp-content/uploads/2016/09/Tip-Button.png" width="1" height="1">
                            </form>
                        </div>
                      </div> 
    <div class="mid">
        <div class="scoretop"><h1 class="biggish center" id="scorebuttons"><a class="dwnld" href="upload.php">&nbspUpload Score&nbsp</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld" href="#Scores">&nbspSee Uploaded Scores&nbsp</a></h1></div><br><br>
        <h1 class="biggish center">Music</h1>
    </div>
    <br>
    <br>
    <br><br><br><br>
<br>
    <div class="side2c">
            <b><br><br><br>Islay Pipes</b> - Alta Graham<br>Instrumentation: Concert Band<br>
    <br><audio controls>
            <source src="Images/IslayPipes.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> <br><a class="dwnld" href="Images/Islay Pipes score and parts(1).pdf" download>Download Score</a>
    <a class="dwnld" href="Images/IslayPipes.mp3" download>Download .mp3</a>
    <br><br><br>    
    <b>Five By Five</b> - Alta Graham<br>Instrumentation: SAATB Saxophones<br>
        <br><audio controls>
            <source src="Images/Celtic Dance Suite.m4a" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio><br><a class="dwnld" href="Images/Five-by-Five-score-and-parts.pdf" download>Download&nbspScore</a>
        <a class="dwnld" href="Images/Celtic Dance Suite.m4a" download>Download .mp3</a>
        <br><br><br>
        <b>Theme on a Painted Violin</b> - Alta Graham<br>Instrumentation: Flute and Piano<br>
        <br><audio controls>
            <source src="Images/Gagliano Violin Solo.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> <br><a class="dwnld" href="Images/Theme-on-a-Painted-Violin.pdf" download>Download Score</a>
        <a class="dwnld" href="Images/images/Gagliano Violin Solo.mp3" download>Download .mp3</a>
        <b><br><br><br>Modal Suite for IV</b> - Alta Graham<br>Instrumentation: Oboe and Piano<br>
        <br><audio controls>
            <source src="Images/Modal Suite for Oboe and Piano.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> <br><a class="dwnld" href="Images/Modal Suite for Baritone Saxophone and Piano(1).pdf" download>Download Score</a>
    <a class="dwnld" href="Images/Modal Suite for Oboe and Piano.mp3" download>Download .mp3</a>
    <b><br><br><br>Modal Suite III</b> - Alta Graham<br>Instrumentation: Baritone Saxophone and Piano<br>
    <br><audio controls>
            <source src="Images/Modal-Suite-for-Baritone-Saxophone-and-Piano.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio> <br><a class="dwnld" href="Images/Modal-Suite-IV-score-and-parts(2).pdf" download>Download Score</a>
    <a class="dwnld" href="Images/Modal-Suite-for-Baritone-Saxophone-and-Piano.mp3" download>Download .mp3</a>

    </div>
    <div class="side2b score">
        <h2 class="score">SCORE OF THE WEEK:</h2><iframe id="musicframe2" style="width:80%;height:800px" src="ajay/index.html"  seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" ></iframe>
    </div>
</div>
<h1>&nbsp&nbsp&nbsp&nbsp____________________________<br><a name="Scores"></a>&nbsp&nbsp&nbsp&nbspUploaded Scores<h5>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspScores and audio shared by users</h5></h1>
<?php

$sql = "SELECT id, user_id, title, inst, score, audio FROM uploads ORDER BY title";   


if ($result=mysqli_query($link, $sql))
  {
  // Fetch one and one row
  echo("<div class='ups'>");
  while ($row=mysqli_fetch_row($result))
    {
    $tempid = $row[1];
    $sql2 = "SELECT id, username FROM users WHERE id = $tempid"; 
    $result2=mysqli_query($link, $sql2);
    $row2=mysqli_fetch_row($result2);
    $name = $row2[1];
    $aud = $row[5];
    $score = $row[4];
    if($score || $aud){
        echo "<div class='uploads'>";
        echo("<b>$row[2]</b>");
        if ($name){
            echo(" - contributed by $name\n");
            }
        if ($row[3]){
            echo("<br>Instrumentation: $row[3]\n<br>");
            }
        if($aud){
            echo("<audio controls>
            <source src='uploads/$aud' type='audio/mpeg'>
            Your browser does not support the audio element.
            </audio>");
            }
        if($score){
            echo("<br><a class='dwnld' href='uploads/$score' download>Download Score</a>&nbsp&nbsp");
            }
        if($aud){
            echo("<a class='dwnld' href='uploads/$aud' download>Download .mp3</a>");
            }
        echo("</div>");

        }
    }
    echo("</div>");
}

?> 
</body>

</html>