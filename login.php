<!-- A Caruso, 2 May 2021 -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>
    Golf Score Tracker
  </title>
  <meta charset="utf-8" />
  <meta name="Author" content="Alex Caruso" />
  <meta name="generator" content="Perl" />
  <style>
    a { text-decoration: none; }
    a:hover { text-decoration: underline; }
    body { background-color:#a0d2eb; text-align:center; }
    div { font-size:150%; text-align:center }
    h1 { font-size:250%; text-align:center }
  </style>
</head>

<h1>Please login!</h1>

<body>
<?php
  session_start();

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

<br>
<center>
<form method="POST" action="login.php">
  <table>
    <tr>
      <td>
	<div> Please enter username:
	  <input value="username" type="text" name="entered_username" id="entered_username">
	</div>
      </td>
    </tr>
    <tr>
      <td>
	<div> Please enter password:
	  <input value="password" type="text" name="entered_password" id="entered_password">
	</div>
      </td>
    </tr>
  </table>
  <br><br><br>
  <input type="submit" name="submit" value="Submit">
   <button>
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/register.php" >Register</a>
  </button>
  <br><br>
</form>
</center>
<?php
 $found_user = 0;
 try {
  $user_query = "SELECT * FROM Users";
  $stmt = $dbh->prepare($user_query);
  $stmt->execute();
  $userdata = $stmt->fetchAll(PDO::FETCH_OBJ);
  $stmt = null;
 }//end try
 catch(PDOException $e) {
  die ('PDO error fetching data": ' . $e->getMessage() );
 }//end catch
if(isset($_POST['submit'])){
 foreach ( $userdata as $user ) {
    if ($user->username == $_POST[entered_username]) {
      $found_user = 1;
      if ($user->password == $_POST[entered_password]) {
        $_SESSION['user_id'] = $user->user_id;
        header("Location: http://elvis.rowan.edu/~caruso18/webprog/Project/courseSelect.php");
        die();
      } else {
        echo "<p>Incorrect password!</p>";
      }//end else
    }//end if
 }//end foreach
 if ($found_user == 0){
   echo "<p>User not found!</p>";
 }//end if
}//end if
 ?>
<br>
    
<footer style="border-top: 1px solid blue; text-align:left">
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

