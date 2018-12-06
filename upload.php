<?php
// Initialize the session
session_save_path('/home/users/web/b2717/ipg.practicalcatwebcom/cgi-bin/tmp');
session_start();

require_once "config.php";
 
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
                ?><a class="dwnld top" href="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld top" href="reset-password.php">Change Password</a><?php
                }
                else{ ?><a class="dwnld top" href="login.php">Login</a>&nbsp&nbsp&nbsp&nbsp<a class="dwnld top" href="register.php">Sign Up</a><?php }; ?>
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
<h1>Title of Piece:</h1><br /> <input type="text" name="title" value="" /><br />
<h1>Instrumentation:</h1><br /> <input type="text" name="inst" value="" /><br />
<br><h1>PDF Score:</h1><br /> <input type="file" name="up[]" value="" /><br />
<br><h1>Audio File:</h1><br /> <input type="file" name="up[]" value="" /><br />
<!--<br><h1>Description :</h1>
<textarea name="desc" rows="10" cols="50"></textarea><br />-->
  <br><input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit Piece" />
</form></div>
<div class="center pglst">
<?php

// Set Upload Path
$target_dir = "./uploads/";

$sfile=$afile="";
$go=0;
if( isset($_FILES['up']['name'])) {
  $total_files = count($_FILES['up']['name']);
  for($key = 0; $key < $total_files; $key++) {
    $ext=strtolower(pathinfo($_FILES["up"]["name"][$key], PATHINFO_EXTENSION));
    $maxFileSize = 20 * 1024 * 1024;
    $title=$_POST["title"];
    if($_FILES['up']['size'][$key] > $maxFileSize){
        echo("Sorry - no files over 20MG.");
    }
    elseif(($ext=='pdf' && $key==0)||($ext=='mp3' && $key==1)){
        if($key==0){
            $new_filename = $title . '_score_' . time() . '.' . $ext;
            $sfile=$new_filename;
        }
        elseif($key==1){
            $new_filename = $title . '_audio_' . time() . '.' . $ext;
            $afile=$new_filename;
        }
        // Check if file is selected
        if(isset($_FILES['up']['name'][$key]) && $_FILES['up']['size'][$key] > 0) {
            $original_filename = $_FILES['up']['name'][$key];
            $target = $target_dir . basename($original_filename);
            $tmp  = $_FILES['up']['tmp_name'][$key];
            move_uploaded_file($_FILES['up']['tmp_name'][$key], $target_dir . $new_filename);}
    $go=1;
    }
    elseif($go=1){
        if($ext=='php'||$ext=='py'){
            echo("Seriously?  You think I don't validate inputs?  May the cord of your earbuds snag on every doorknob you pass.");
        }
        elseif($ext=='pdf'){
            echo("Extension: .");
            echo($ext);
            echo(" . . . Sorry- can't upload a .pdf in the .mp3 spot!");
        }
        elseif($ext=='mp3'){
            echo("Extension: .");
            echo($ext);
            echo(" . . . Sorry- can't upload an .mp3 in the .pdf spot!");
        }
        elseif($ext){
            echo("Extension: .");
            echo($ext);
            echo(" . . . Sorry- I'm just set up for .pdf and .mp3 for now!");
        }
        }
   }  
}

       //dbdbdbdbdbdbdbdbdbdbdbdbdbdbdbdbd
    if ($go==1){
   $title = $inst = $desc = "";
   $title_err = $inst_err = $desc_err = "";
   date_default_timezone_set('America/Denver');
   $tm=date("Y-m-d H:i:s");

   // Validate title
   $chnm=(trim($_POST["title"]));
   if(empty($chnm)){
       $title_err = "Please enter a title.";
   } else{
       //possibly pointless
       // Prepare a select statement
       $sql = "SELECT id FROM uploads WHERE title = ?";
       
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_title);
           
           // Set parameters
           $param_title = trim($_POST["title"]);
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               /* store result */
               mysqli_stmt_store_result($stmt);
               
               $title = trim($_POST["title"]);
               
           } else{
               echo "Oops! Something went wrong. Please try again later.";
           }
       }
        
       // Close statement
       mysqli_stmt_close($stmt);
   }
   
   // Validate inst
   $chps=(trim($_POST["inst"]));
   if(empty($chps)){
       $inst_err = "Please enter the instrumentation.";     
   } else{
       $inst = trim($_POST["inst"]);
   }

      // grab desc
       //$desc = trim($_POST["desc"]);


   
   // Check input errors before inserting in database
   if(empty($title_err) && empty($inst_err)){
       // Prepare an insert statement
       $sql = "INSERT INTO uploads (user_id, title, inst, score, audio, created_at) VALUES (?, ?, ?, ?, ?, ?)";
       if($stmt = mysqli_prepare($link, $sql)){

           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "isssss", $user_id, $param_title, $param_inst, $sfile, $afile, $tm);
           
           // Set parameters
           $user_id=$_SESSION["id"];
           $param_title = $title;
           $param_inst = $inst; 
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Redirect
               echo("<br><br>Success!  Upload another, or return to the <a href='music.php'>Music Page</a>?");
               header("location: music.php");
           } else{
               echo "Something went wrong. Please try again later.";
           }
       }
        
       // Close statement
       mysqli_stmt_close($stmt);
   }
   
   // Close connection
   mysqli_close($link);
       //dbdbdbdbdbdbdbdbdbdbdbdbdbdbdbdbd
       }

?>
</div>