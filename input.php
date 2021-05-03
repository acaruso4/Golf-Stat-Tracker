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
    body { background-color:#a0d2eb; }
    table { text-align:center;}
    div { font-size:150%; text-align:center }
    input { text-align:center }
    h1 { font-size:200%; text-align:center }
  </style>
</head>


  <?php
   #Start the session
   session_start();
   #Retrieve the user ID from the login page
   $id = $_SESSION['id'];
   $courseSelection = $_SESSION['courseSelection'];

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
  foreach ( $userdata as $user ) {
     if ($user->user_id == $id) {
       $user_name = $user->username;
       $game_count = $user->games_played;
       $_SESSION['username'] = $user_name;
     }//end if
   }//end foreach

?>
<div>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/login.php"> Log Out</a>
  </button>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/courseSelect.php">Course Selection</a>
  </button>
  <h1>Scorecard</h1>
</div>
<p> Hello, <?php echo $user_name; ?>!</p>
<p> <b> NOTE: </b>If any scores are left as 0, that scorecard won&#8217;t be saved </p>


<body>
<?php
 if($courseSelection == "Valleybrook"){
?>
  <form method="POST" action="input.php">
    <fieldset>
      <legend>Valleybrook Country Club</legend>
      <table>
        <tbody>
	  <tr>
	     <td>
		<b> Hole </b>
	     </td>
	     <td>
		<center> 1 </center>
	     </td>
	     <td>
		<center> 2 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 6 </center>
	     </td>
	     <td>
		<center> 7 </center>
	     </td>
	     <td>
		<center> 8 </center>
	     </td>
	     <td>
	        <center> 9 </center>
	     </td>
	     <td>
		<center> 10 </center>
	     </td>
	     <td>
		<center> 11 </center>
	     </td>
	     <td>
		<center> 12 </center>
	     </td>
	     <td>
		<center> 13 </center>
	     </td>
	     <td>
		<center> 14 </center>
	     </td>
	     <td>
		<center> 15 </center>
	     </td>
	     <td>
		<center> 16 </center>
	     </td>
	     <td>
		<center> 17 </center>
	     </td>
	     <td>
		<center> 18 </center>
	     </td>
	     <td>
	       <center> Total </center>
	     </td>
	  </tr>
	  <tr>
	     <td>
		<b> Par </b>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 72 </center>
	     </td>
	  </tr>
	  <tr>
	     <td>
		<b> Score </b>
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole1" id="Vhole1">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole2" id="Vhole2">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole3" id="Vhole3">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole4" id="Vhole4">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole5" id="Vhole5">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole6" id="Vhole6">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole7" id="Vhole7">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole8" id="Vhole8">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole9" id="Vhole9">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole10" id="Vhole10">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole11" id="Vhole11">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole12" id="Vhole12">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole13" id="Vhole13">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole14" id="Vhole14">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole15" id="Vhole15">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole16" id="Vhole16">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole17" id="Vhole17">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Vhole18" id="Vhole18">
	     </td>
	     <td>
		
	     </td>
	  </tr>
	</tbody>
      </table>
    </fieldset>
    <br>
   <?php
    #end Valleybrook if
    } elseif($courseSelection == "Tavistock"){
    
    ?>
    <br>
    <fieldset>
      <legend>Tavistock Country Club</legend>
      <table>
        <tbody>
	  <tr>
	     <td>
		<b> Hole </b>
	     </td>
	     <td>
		<center> 1 </center>
	     </td>
	     <td>
		<center> 2 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 6 </center>
	     </td>
	     <td>
		<center> 7 </center>
	     </td>
	     <td>
		<center> 8 </center>
	     </td>
	     <td>
	        <center> 9 </center>
	     </td>
	     <td>
		<center> 10 </center>
	     </td>
	     <td>
		<center> 11 </center>
	     </td>
	     <td>
		<center> 12 </center>
	     </td>
	     <td>
		<center> 13 </center>
	     </td>
	     <td>
		<center> 14 </center>
	     </td>
	     <td>
		<center> 15 </center>
	     </td>
	     <td>
		<center> 16 </center>
	     </td>
	     <td>
		<center> 17 </center>
	     </td>
	     <td>
		<center> 18 </center>
	     </td>
	     <td>
		<center> Total </center>
	     </td>
	  </tr>
	  <tr>
	     <td>
		<b> Par </b>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 3 </center>
	     </td>
	     <td>
		<center> 5 </center>
	     </td>
	     <td>
		<center> 4 </center>
	     </td>
	     <td>
		<center> 72 </center>
	     </td>
	     </center>
	  </tr>
	  <tr>
	     <td>
		<b> Score </b>
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole1" id="Thole1">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole2" id="Thole2">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole3" id="Thole3">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole4" id="Thole4">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole5" id="Thole5">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole6" id="Thole6">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole7" id="Thole7">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole8" id="Thole8">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole9" id="Thole9">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole10" id="Thole10">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole11" id="Thole11">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole12" id="Thole12">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole13" id="Thole13">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole14" id="Thole14">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole15" id="Thole15">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole16" id="Thole16">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole17" id="Thole17">
	     </td>
	     <td>
		<input style="width:20px" value="0" type="text" name="Thole18" id="Thole18">
	     </td>
	     <td>
		
	     </td>
	  </tr>
       </tbody>
     </table>
   </fieldset>

   <?php
    }#end Tavistock if
    
    ?>
<br>
<center>
    <input type="reset" value="Reset">
    <input type="submit" name="submit" value="Submit">
    <br><br><br>
    <button class="btn">
      <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/stats.php" >View Stats</a>
    </button>
</center>
 </form>

<br>
<br>

<?php
if($_POST['submit'] === 'Submit'){

 if ($courseSelection == "Valleybrook"){
  $hostname = '127.0.0.1';
  $username = 'caruso18';
  $password = '1Sharpobject!';
  $database = 'caruso18';
 
  try {
   $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
   #echo 'Connected to Valleybrook database...';
  }
  catch(PDOException $e) { 
   die ('PDO error: cannot connect: ' . $e->getMessage() );
  }
?>
<br>
<?php

  if ($_POST['Vhole1'] != 0 && $_POST['Vhole2'] != 0 && $_POST['Vhole3'] != 0
   && $_POST['Vhole4'] != 0 && $_POST['Vhole5'] != 0 && $_POST['Vhole6'] != 0 
   && $_POST['Vhole7'] != 0 && $_POST['Vhole8'] != 0 && $_POST['Vhole9'] != 0
   && $_POST['Vhole10'] != 0 && $_POST['Vhole11'] != 0 && $_POST['Vhole12'] != 0 
   && $_POST['Vhole13'] != 0 && $_POST['Vhole14'] != 0 && $_POST['Vhole15'] != 0
   && $_POST['Vhole16'] != 0 && $_POST['Vhole17'] != 0 && $_POST['Vhole18'] != 0){
   
   #Compute round total
   $Total = $_POST[Vhole1] + $_POST[Vhole2] + $_POST[Vhole3] + $_POST[Vhole4] + $_POST[Vhole5] + $_POST[Vhole6] + 
            $_POST[Vhole7] + $_POST[Vhole8] + $_POST[Vhole9] + $_POST[Vhole10] + $_POST[Vhole11] + $_POST[Vhole12] + 
            $_POST[Vhole13] + $_POST[Vhole14] + $_POST[Vhole15] + $_POST[Vhole16] + $_POST[Vhole17] + $_POST[Vhole18];
   // Attempt insert query execution
   try{
     $score_insert = "INSERT INTO Valleybrook (player_id, hole1, hole2, hole3, hole4, hole5, hole6, hole7, hole8, hole9, 
                                               hole10, hole11, hole12, hole13, hole14, hole15, hole16, hole17, hole18, Total) 
                                       VALUES ('$id','$_POST[Vhole1]','$_POST[Vhole2]','$_POST[Vhole3]','$_POST[Vhole4]',
				               '$_POST[Vhole5]','$_POST[Vhole6]','$_POST[Vhole7]','$_POST[Vhole8]',
                                               '$_POST[Vhole9]','$_POST[Vhole10]','$_POST[Vhole11]','$_POST[Vhole12]',
					       '$_POST[Vhole13]','$_POST[Vhole14]','$_POST[Vhole15]','$_POST[Vhole16]',
					       '$_POST[Vhole17]','$_POST[Vhole18]', '$Total')";  
					       
     $dbh->exec($score_insert);
     echo "Valleybrook records successfully updated.";
   } catch(PDOException $e){
     die("ERROR: Not able to execute $sql. " . $e->getMessage());
   }
?>
<br>
<?php
  $game_count++;
  $_SESSION['games'] = $game_count;
  try{
    $update_game_count = "UPDATE Users SET games_played = $game_count WHERE user_id = $id";
    $dbh->exec($update_game_count);
    echo "User profile successfully updated.";
  } catch(PDOException $e){
    die("ERROR: Not able to execute $sql. " . $e->getMessage());
  }
  #don't touch these two curl brackets
  }
}
 ?>
<br>
<?php
 if ($courseSelection == "Tavistock"){
  $hostname = '127.0.0.1';
  $username = 'caruso18';
  $password = '1Sharpobject!';
  $database = 'caruso18';
 
  try {
   $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
   #echo 'Connected to Tavistock database...';
  }
  catch(PDOException $e) { 
   die ('PDO error: cannot connect: ' . $e->getMessage() );
  }
?>
<br>
<?php

  if ($_POST['Thole1'] != 0 && $_POST['Thole2'] != 0 && $_POST['Thole3'] != 0
   && $_POST['Thole4'] != 0 && $_POST['Thole5'] != 0 && $_POST['Thole6'] != 0 
   && $_POST['Thole7'] != 0 && $_POST['Thole8'] != 0 && $_POST['Thole9'] != 0
   && $_POST['Thole10'] != 0 && $_POST['Thole11'] != 0 && $_POST['Thole12'] != 0 
   && $_POST['Thole13'] != 0 && $_POST['Thole14'] != 0 && $_POST['Thole15'] != 0
   && $_POST['Thole16'] != 0 && $_POST['Thole17'] != 0 && $_POST['Thole18'] != 0){
   
   #Compute round total
   $Total = $_POST[Thole1] + $_POST[Thole2] + $_POST[Thole3] + $_POST[Thole4] + $_POST[Thole5] + $_POST[Thole6] + 
            $_POST[Thole7] + $_POST[Thole8] + $_POST[Thole9] + $_POST[Thole10] + $_POST[Thole11] + $_POST[Thole12] + 
            $_POST[Thole13] + $_POST[Thole14] + $_POST[Thole15] + $_POST[Thole16] + $_POST[Thole17] + $_POST[Thole18];
   // Attempt insert query execution
   try{
     $score_insert = "INSERT INTO Tavistock (player_id, hole1, hole2, hole3, hole4, hole5, hole6, hole7, hole8, hole9, 
                                               hole10, hole11, hole12, hole13, hole14, hole15, hole16, hole17, hole18, Total) 
                                       VALUES ('$id','$_POST[Thole1]','$_POST[Thole2]','$_POST[Thole3]','$_POST[Thole4]',
				               '$_POST[Thole5]','$_POST[Thole6]','$_POST[Thole7]','$_POST[Thole8]',
                                               '$_POST[Thole9]','$_POST[Thole10]','$_POST[Thole11]','$_POST[Thole12]',
					       '$_POST[Thole13]','$_POST[Thole14]','$_POST[Thole15]','$_POST[Thole16]',
					       '$_POST[Thole17]','$_POST[Thole18]', '$Total')";    
     $dbh->exec($score_insert);
     echo "Tavistock records successfully updated.";
   } catch(PDOException $e){
     die("ERROR: Not able to execute $sql. " . $e->getMessage());
   }
   $game_count++;
   $_SESSION['games'] = $game_count;
   try{
     $update_game_count = "UPDATE Users SET games_played = $game_count WHERE user_id = $id";
     $dbh->exec($update_game_count);
     echo "User profile successfully updated.";
   } catch(PDOException $e){
     die("ERROR: Not able to execute $sql. " . $e->getMessage());
   }
#don't touch these two curl brackets
  }
} 
   
}#end check to see if submit was clicked
 ?>

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
