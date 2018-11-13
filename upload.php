<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
    <link rel="stylesheet" href="CSS/styles.css">
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
    <div class="center pglst">
        <br><br><br><br>
 <form action="<?php print $PHP_SELF?>" enctype="multipart/form-data" method="post">
<h1>Name of Piece:</h1><br /> <input type="text" name="name" value="" /><br />
<br><h1>PDF Score:</h1><br /> <input type="file" name="score" value="" /><br />
  <br><br><input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit Score" />
</form></div>
<div class="center pglst">
<?php
 define ("filesplace","./uploads");

 if (is_uploaded_file($_FILES['score']['tmp_name'])) {

 if ($_FILES['score']['type'] != "application/pdf") {
 echo "<p>Scores must be uploaded in PDF format.</p>";
 } else {
 $name = $_POST['name'];
 $result = move_uploaded_file($_FILES['score']['tmp_name'], filesplace."/$name.pdf");
 if ($result == 1) echo "<p><br><br>Uploaded - Thank You!</p>";
 else echo "<p><br><br>Sorry, Error while uploading . </p>";

} #endIF
 } #endIF
?>
</div>