<!-- A Caruso, 3 May 2021 -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>
    Golf Score Tracker
  </title>
  <meta charset="utf-8" />
  <meta name="Author" content="Alex Caruso" />
  <meta name="generator" content="PHP" />
  <style>
    a { text-decoration: none; }
    a:hover { text-decoration: underline; }
    body { background-color:#a0d2eb; text-align:center; }
    table { text-align:center;}
    div { font-size:150%; text-align:center }
    p { text-align:center }
    h1 { font-size:250%; text-align:center }
  </style>
</head>

<body>
<h1>Create a profile!</h1>
<br>
<?php

  $hostname = '127.0.0.1';
  $username = 'caruso18';
  $password = '1Sharpobject!';
  $database = 'caruso18';
 
  try {
   $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
  }
  catch(PDOException $e) { 
   die ('PDO error: cannot connect: ' . $e->getMessage() );
  }
?>
<center>
<form type="form" id="register" method="POST" action="register.php">
  <table >
    <tr>
      <td>
	<div>
	    Please select a username:
	    <input value="username" type="text" name="entered_username" id="entered_username">
	</div>
      </td>
    </tr>
    <tr>
      <td>
	<div>
	  Please select a password:
	  <input value="password" type="text" name="entered_password" id="entered_password">
	</div>
      </td>
    </tr>
  </table>
  <br><br><br>
  <div style="text-align:center">
    <input type="submit" name="submit" value="Submit">
    <button>
      <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/login.php">Return to Login</a>
    </button>
  </div>
  <br>
</form>
</center>
<?php
if (isset($_POST[submit])){
 if ($_POST[entered_username] != "username") {
   try {
    $user_query = "SELECT * FROM Users";
    $stmt = $dbh->prepare($user_query);
    $stmt->execute();
    $userdata = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt = null;
   } catch(PDOException $e) {
     die ('PDO error fetching data": ' . $e->getMessage() );
   }//end catch
   $uniqueness = 0;
   //if username exists, increment uniqueness variable by 1
   foreach ( $userdata as $user ) {
     if ($user->username == $_POST[entered_username]) {
       $uniqueness += 1;
     }//end if
   }//end foreach

   //check if the username is unique
   //if 0, it is unique. if 1, not unique
   if ( $uniqueness == 0 ) {
     // Attempt insert query execution
     try{
       $profile_insert = "INSERT INTO Users (username, password, games_played) VALUES ('$_POST[entered_username]','$_POST[entered_password]', 0)";  
       $dbh->exec($profile_insert);
       echo "Profile has been created!";
     } catch(PDOException $e){
     die("ERROR: Not able to execute $sql. " . $e->getMessage());
     }//end catch


   } else {
     echo "Username is already in use!";
   }
 } else{
   echo "Please choose a username!";
 }
}//end if

?>
<br>
<br>
    
<footer style="border-top: 1px solid blue">
  <a href="http://elvis.rowan.edu/~caruso18/"
    title="Link to my home page">
    A. Caruso
  </a>

  <span style="float: right;">
    <a href="http://validator.w3.org/check/referer">HTML5</a> 
    <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
      CSS3
    </a>
  </span>
</footer>

</body>
</html>

