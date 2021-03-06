<!-- A Caruso, 3 May 2021 -->

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
    h1 { font-size:250%; text-align:center }
  </style>
</head>

<p>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/login.php"> Log Out</a>
  </button>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/courseSelect.php">Course Selection</a>
  </button>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/input.php"> Return to scorecard</a>
  </button>
</p>
<br>
  <h1>Statistics</h1>

<?php
  #Start the session
  session_start();
  #Retrieve the user ID from the login page
  #$user = $_SESSION['username'];
  $user_id = $_SESSION['user_id'];
  #$num_games = $_SESSION['games'];
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
    if ($user->user_id == $user_id) {
      $user_name = $user->username;
      $num_games = $user->games_played;
    }//end if
  }//end foreach

  ?>
  <div>
    <?php
     if ( $num_games == 1 ) {
     ?>
    <p>
      Hello, <?php echo $user_name;?>. You have played a total of <?php echo $num_games;?> game!
    </p>
    <?php
     }#end if
     else {
     ?>
    <p>
      Hello, <?php echo $user_name;?>. You have played a total of <?php echo $num_games;?> games!
    </p>
    <?php
     }#end else
     ?>
  </div>

<br>
<fieldset>
    <legend>Valleybrook Country Club</legend>
    <table>
      <tbody>
	  <tr>
	     <td>
		<b> Hole </b>
	     </td>
	     <td style="width:5%">
		<center> 1 </center>
	     </td>
	     <td style="width:5%">
		<center> 2 </center>
	     </td>
	     <td style="width:5%">
		<center> 3 </center>
	     </td>
	     <td style="width:5%">
		<center> 4 </center>
	     </td>
	     <td style="width:5%">
		<center> 5 </center>
	     </td>
	     <td style="width:5%">
		<center> 6 </center>
	     </td>
	     <td style="width:5%">
		<center> 7 </center>
	     </td>
	     <td style="width:5%">
		<center> 8 </center>
	     </td>
	     <td style="width:5%">
	        <center> 9 </center>
	     </td>
	     <td style="width:5%">
		<center> 10 </center>
	     </td>
	     <td style="width:5%">
		<center> 11 </center>
	     </td>
	     <td style="width:5%">
		<center> 12 </center>
	     </td>
	     <td style="width:5%">
		<center> 13 </center>
	     </td>
	     <td style="width:5%">
		<center> 14 </center>
	     </td>
	     <td style="width:5%">
		<center> 15 </center>
	     </td>
	     <td style="width:5%">
		<center> 16 </center>
	     </td>
	     <td style="width:5%">
		<center> 17 </center>
	     </td>
	     <td style="width:5%">
		<center> 18 </center>
	     </td>
	     <td style="width:5%">
		<center> Total </center>
	     </td>
	     <td style="width:5%">
	       <center> Off Par </center>
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
	     <td>
	       <center> - </center>
	     </td>
	  </tr>
          <tr>
            <?php
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
	      try {
	       $score_query = "SELECT * FROM Valleybrook";
	       $stmt = $dbh->prepare($score_query);
	       $stmt->execute();
	       $scoredata = $stmt->fetchAll(PDO::FETCH_OBJ);
	       $stmt = null;
	      }//end try
	      catch(PDOException $e) {
	       die ('PDO error fetching data": ' . $e->getMessage() );
	      }//end catch
	     ?>
	     <td>
		<b> Average </b>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole1 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole1 += $score->hole1;
		      $counter++;
		    }
		  }
		  $ValleybrookHole1 = $ValleybrookHole1/$counter;
		  echo number_format((float)$ValleybrookHole1, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole2 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole2 += $score->hole2;
		      $counter++;
		    }
		  }
		  $ValleybrookHole2 = $ValleybrookHole2/$counter;
		  echo number_format((float)$ValleybrookHole2, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole3 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole3 += $score->hole3;
		      $counter++;
		    }
		  }
		  $ValleybrookHole3 = $ValleybrookHole3/$counter;
		  echo number_format((float)$ValleybrookHole3, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole4 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole4 += $score->hole4;
		      $counter++;
		    }
		  }
		  $ValleybrookHole4 = $ValleybrookHole4/$counter;
		  echo number_format((float)$ValleybrookHole4, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole5 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole5 += $score->hole5;
		      $counter++;
		    }
		  }
		  $ValleybrookHole5 = $ValleybrookHole5/$counter;
		  echo number_format((float)$ValleybrookHole5, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole6 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole6 += $score->hole1;
		      $counter++;
		    }
		  }
		  $ValleybrookHole6 = $ValleybrookHole6/$counter;
		  echo number_format((float)$ValleybrookHole6, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole7 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole7 += $score->hole7;
		      $counter++;
		    }
		  }
		  $ValleybrookHole7 = $ValleybrookHole7/$counter;
		  echo number_format((float)$ValleybrookHole7, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole8 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole8 += $score->hole8;
		      $counter++;
		    }
		  }
		  $ValleybrookHole8 = $ValleybrookHole8/$counter;
		  echo number_format((float)$ValleybrookHole8, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole9 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole9 += $score->hole9;
		      $counter++;
		    }
		  }
		  $ValleybrookHole9 = $ValleybrookHole9/$counter;
		  echo number_format((float)$ValleybrookHole9, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole10 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole10 += $score->hole10;
		      $counter++;
		    }
		  }
		  $ValleybrookHole10 = $ValleybrookHole10/$counter;
		  echo number_format((float)$ValleybrookHole10, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole11 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole11 += $score->hole11;
		      $counter++;
		    }
		  }
		  $ValleybrookHole11 = $ValleybrookHole11/$counter;
		  echo number_format((float)$ValleybrookHole11, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole12 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole12 += $score->hole12;
		      $counter++;
		    }
		  }
		  $ValleybrookHole12 = $ValleybrookHole12/$counter;
		  echo number_format((float)$ValleybrookHole12, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole13 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole13 += $score->hole13;
		      $counter++;
		    }
		  }
		  $ValleybrookHole13 = $ValleybrookHole13/$counter;
		  echo number_format((float)$ValleybrookHole13, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole14 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole14 += $score->hole14;
		      $counter++;
		    }
		  }
		  $ValleybrookHole14 = $ValleybrookHole14/$counter;
		  echo number_format((float)$ValleybrookHole14, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole15 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole15 += $score->hole15;
		      $counter++;
		    }
		  }
		  $ValleybrookHole15 = $ValleybrookHole15/$counter;
		  echo number_format((float)$ValleybrookHole15, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole16 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole16 += $score->hole16;
		      $counter++;
		    }
		  }
		  $ValleybrookHole16 = $ValleybrookHole16/$counter;
		  echo number_format((float)$ValleybrookHole16, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole17 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole17 += $score->hole17;
		      $counter++;
		    }
		  }
		  $ValleybrookHole17 = $ValleybrookHole17/$counter;
		  echo number_format((float)$ValleybrookHole17, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole18 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHole18 += $score->hole18;
		      $counter++;
		    }
		  }
		  $ValleybrookHole18 = $ValleybrookHole18/$counter;
		  echo number_format((float)$ValleybrookHole18, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHoleTotal = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $ValleybrookHoleTotal += $score->Total;
		      $counter++;
		    }
		  }
		  $ValleybrookHoleTotal = $ValleybrookHoleTotal/$counter;
		  echo number_format((float)$ValleybrookHoleTotal, 2, '.', '');
		?>
		</center>
	    </td>
	    <td>
	      <center>
		<?php
		 if($ValleybrookHoleTotal > 17 || $ValleybrookHoleTotal < 200){
		    echo ($ValleybrookHoleTotal - 72);
		  } else {
		    echo "-";
		  }
		 ?>
	      </center>
	    </td>
	  </tr>
	  <tr>
	    <td>
	      <b> Best </b>
	    </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole1Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole1Best > $score->hole1 ) {
		        $ValleybrookHole1Best = $score->hole1;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole1Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole1Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole2Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole2Best > $score->hole2 ) {
		        $ValleybrookHole2Best = $score->hole2;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole2Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole2Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole3Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole3Best > $score->hole3 ) {
		        $ValleybrookHole3Best = $score->hole3;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole3Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole3Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole4Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole4Best > $score->hole4 ) {
		        $ValleybrookHole4Best = $score->hole4;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole4Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole4Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole5Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole5Best > $score->hole5 ) {
		        $ValleybrookHole5Best = $score->hole5;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole5Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole5Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole6Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole6Best > $score->hole6 ) {
		        $ValleybrookHole6Best = $score->hole6;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole6Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole6Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole7Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole7Best > $score->hole7 ) {
		        $ValleybrookHole7Best = $score->hole7;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole7Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole7Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole8Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole8Best > $score->hole8 ) {
		        $ValleybrookHole8Best = $score->hole8;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole8Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole8Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole9Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole9Best > $score->hole9 ) {
		        $ValleybrookHole9Best = $score->hole9;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole9Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole9Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole10Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole10Best > $score->hole10 ) {
		        $ValleybrookHole10Best = $score->hole10;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole10Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole10Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole11Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole11Best > $score->hole11 ) {
		        $ValleybrookHole11Best = $score->hole11;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole11Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole11Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole12Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole12Best > $score->hole12 ) {
		        $ValleybrookHole12Best = $score->hole12;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole12Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole12Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole13Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole13Best > $score->hole13 ) {
		        $ValleybrookHole13Best = $score->hole13;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole13Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole13Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole14Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole14Best > $score->hole14 ) {
		        $ValleybrookHole14Best = $score->hole14;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole14Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole14Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $ValleybrookHole15Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole15Best > $score->hole15 ) {
		        $ValleybrookHole15Best = $score->hole15;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole15Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole15Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole16Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole16Best > $score->hole16 ) {
		        $ValleybrookHole16Best = $score->hole16;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole16Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole16Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole17Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole17Best > $score->hole17 ) {
		        $ValleybrookHole17Best = $score->hole17;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole17Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole17Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookHole18Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookHole18Best > $score->hole18 ) {
		        $ValleybrookHole18Best = $score->hole18;
		      }
		      $counter++;
		    }
		  }
		  if ($ValleybrookHole18Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$ValleybrookHole18Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $ValleybrookBest = 999;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $ValleybrookBest > $score->Total ) {
		        $ValleybrookBest = $score->Total;
		      }
		    }
		  }
		  if ( $ValleybrookBest != 999 ){
		    echo number_format((float)$ValleybrookBest, 2, '.', '');
		  } else {
		    echo "nan";
		  }
		?>
		</center>
	    </td>
	    <td>
	      <center>
		<?php
		 if($ValleybrookBest != 999){
		  echo ($ValleybrookBest - 72);
		 } else {
		   echo "-";
		 }
		 ?>
	      </center>
	    </td>
	  </tr>
	</tbody>
      </table>
    </fieldset>
    <br>
    <fieldset>
      <legend>Tavistock Country Club</legend>
      <table>
        <tbody>
	  <tr>
	     <td>
		<b> Hole </b>
	     </td>
	     <td style="width:5%">
		<center> 1 </center>
	     </td>
	     <td style="width:5%">
		<center> 2 </center>
	     </td>
	     <td style="width:5%">
		<center> 3 </center>
	     </td>
	     <td style="width:5%">
		<center> 4 </center>
	     </td>
	     <td style="width:5%">
		<center> 5 </center>
	     </td>
	     <td style="width:5%">
		<center> 6 </center>
	     </td>
	     <td style="width:5%">
		<center> 7 </center>
	     </td>
	     <td style="width:5%">
		<center> 8 </center>
	     </td>
	     <td style="width:5%">
	        <center> 9 </center>
	     </td>
	     <td style="width:5%">
		<center> 10 </center>
	     </td>
	     <td style="width:5%">
		<center> 11 </center>
	     </td>
	     <td style="width:5%">
		<center> 12 </center>
	     </td>
	     <td style="width:5%">
		<center> 13 </center>
	     </td>
	     <td style="width:5%">
		<center> 14 </center>
	     </td>
	     <td style="width:5%">
		<center> 15 </center>
	     </td>
	     <td style="width:5%">
		<center> 16 </center>
	     </td>
	     <td style="width:5%">
		<center> 17 </center>
	     </td>
	     <td style="width:5%">
		<center> 18 </center>
	     </td>
	     <td style="width:5%">
		<center> Total </center>
	     </td>
	     <td style="width:5%">
	       <center> Off Par </center>
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
	     <td>
	       <center> - </center>
	     </td>
	  </tr>
	  <tr>
	     <?php
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
	      try {
	       $score_query = "SELECT * FROM Tavistock";
	       $stmt = $dbh->prepare($score_query);
	       $stmt->execute();
	       $scoredata = $stmt->fetchAll(PDO::FETCH_OBJ);
	       $stmt = null;
	      }//end try
	      catch(PDOException $e) {
	       die ('PDO error fetching data": ' . $e->getMessage() );
	      }//end catch
	     ?>
	     <td>
		<b> Average </b>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole1 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole1 += $score->hole1;
		      $counter++;
		    }
		  }
		  $TavistockHole1 = $TavistockHole1/$counter;
		  echo number_format((float)$TavistockHole1, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole2 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole2 += $score->hole2;
		      $counter++;
		    }
		  }
		  $TavistockHole2 = $TavistockHole2/$counter;
		  echo number_format((float)$TavistockHole2, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole3 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole3 += $score->hole3;
		      $counter++;
		    }
		  }
		  $TavistockHole3 = $TavistockHole3/$counter;
		  echo number_format((float)$TavistockHole3, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole4 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole4 += $score->hole4;
		      $counter++;
		    }
		  }
		  $TavistockHole4 = $TavistockHole4/$counter;
		  echo number_format((float)$TavistockHole4, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole5 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole5 += $score->hole5;
		      $counter++;
		    }
		  }
		  $TavistockHole5 = $TavistockHole5/$counter;
		  echo number_format((float)$TavistockHole5, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole6 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole6 += $score->hole1;
		      $counter++;
		    }
		  }
		  $TavistockHole6 = $TavistockHole6/$counter;
		  echo number_format((float)$TavistockHole6, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole7 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole7 += $score->hole7;
		      $counter++;
		    }
		  }
		  $TavistockHole7 = $TavistockHole7/$counter;
		  echo number_format((float)$TavistockHole7, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole8 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole8 += $score->hole8;
		      $counter++;
		    }
		  }
		  $TavistockHole8 = $TavistockHole8/$counter;
		  echo number_format((float)$TavistockHole8, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole9 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole9 += $score->hole9;
		      $counter++;
		    }
		  }
		  $TavistockHole9 = $TavistockHole9/$counter;
		  echo number_format((float)$TavistockHole9, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole10 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole10 += $score->hole10;
		      $counter++;
		    }
		  }
		  $TavistockHole10 = $TavistockHole10/$counter;
		  echo number_format((float)$TavistockHole10, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole11 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole11 += $score->hole11;
		      $counter++;
		    }
		  }
		  $TavistockHole11 = $TavistockHole11/$counter;
		  echo number_format((float)$TavistockHole11, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole12 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole12 += $score->hole12;
		      $counter++;
		    }
		  }
		  $TavistockHole12 = $TavistockHole12/$counter;
		  echo number_format((float)$TavistockHole12, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole13 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole13 += $score->hole13;
		      $counter++;
		    }
		  }
		  $TavistockHole13 = $TavistockHole13/$counter;
		  echo number_format((float)$TavistockHole13, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole14 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole14 += $score->hole14;
		      $counter++;
		    }
		  }
		  $TavistockHole14 = $TavistockHole14/$counter;
		  echo number_format((float)$TavistockHole14, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole15 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole15 += $score->hole15;
		      $counter++;
		    }
		  }
		  $TavistockHole15 = $TavistockHole15/$counter;
		  echo number_format((float)$TavistockHole15, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole16 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole16 += $score->hole16;
		      $counter++;
		    }
		  }
		  $TavistockHole16 = $TavistockHole16/$counter;
		  echo number_format((float)$TavistockHole16, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole17 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole17 += $score->hole17;
		      $counter++;
		    }
		  }
		  $TavistockHole17 = $TavistockHole17/$counter;
		  echo number_format((float)$TavistockHole17, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole18 = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHole18 += $score->hole18;
		      $counter++;
		    }
		  }
		  $TavistockHole18 = $TavistockHole18/$counter;
		  echo number_format((float)$TavistockHole18, 2, '.', '');
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHoleTotal = 0;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      $TavistockHoleTotal += $score->Total;
		      $counter++;
		    }
		  }
		  $TavistockHoleTotal = $TavistockHoleTotal/$counter;
		  echo number_format((float)$TavistockHoleTotal, 2, '.', '');
		?>
		</center>
	    </td>
	     <td>
	       <center>
		 <?php
		  if($TavistockHoleTotal > 17 || $TavistockHoleTotal < 200){
		    echo ($TavistockHoleTotal - 72);
		  } else {
		    echo "-";
		  }
		  ?>
	       </center>
	     </td>
	  </tr>
	  <tr>
	    <td>
	      <b> Best </b>
	    </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole1Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole1Best > $score->hole1 ) {
		        $TavistockHole1Best = $score->hole1;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole1Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole1Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole2Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole2Best > $score->hole2 ) {
		        $TavistockHole2Best = $score->hole2;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole2Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole2Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole3Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole3Best > $score->hole3 ) {
		        $TavistockHole3Best = $score->hole3;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole3Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole3Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole4Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole4Best > $score->hole4 ) {
		        $TavistockHole4Best = $score->hole4;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole4Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole4Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole5Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole5Best > $score->hole5 ) {
		        $TavistockHole5Best = $score->hole5;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole5Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole5Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole6Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole6Best > $score->hole6 ) {
		        $TavistockHole6Best = $score->hole6;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole6Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole6Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole7Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole7Best > $score->hole7 ) {
		        $TavistockHole7Best = $score->hole7;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole7Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole7Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole8Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole8Best > $score->hole8 ) {
		        $TavistockHole8Best = $score->hole8;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole8Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole8Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole9Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole9Best > $score->hole9 ) {
		        $TavistockHole9Best = $score->hole9;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole9Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole9Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole10Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole10Best > $score->hole10 ) {
		        $TavistockHole10Best = $score->hole10;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole10Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole10Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole11Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole11Best > $score->hole11 ) {
		        $TavistockHole11Best = $score->hole11;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole11Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole11Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole12Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole12Best > $score->hole12 ) {
		        $TavistockHole12Best = $score->hole12;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole12Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole12Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole13Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole13Best > $score->hole13 ) {
		        $TavistockHole13Best = $score->hole13;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole13Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole13Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole14Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole14Best > $score->hole14 ) {
		        $TavistockHole14Best = $score->hole14;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole14Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole14Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		 $TavistockHole15Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole15Best > $score->hole15 ) {
		        $TavistockHole15Best = $score->hole15;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole15Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole15Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole16Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole16Best > $score->hole16 ) {
		        $TavistockHole16Best = $score->hole16;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole16Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole16Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole17Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole17Best > $score->hole17 ) {
		        $TavistockHole17Best = $score->hole17;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole17Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole17Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockHole18Best = 999;
		  $counter = 0;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockHole18Best > $score->hole18 ) {
		        $TavistockHole18Best = $score->hole18;
		      }
		      $counter++;
		    }
		  }
		  if ($TavistockHole18Best == 999){
		    echo "nan";
		  } else {
		    echo number_format((float)$TavistockHole18Best, 2, '.', '');
		  }
		?>
		</center>
	     </td>
	    <td>
	      <center>
		<?php
		  $TavistockBest = 999;
		  foreach ( $scoredata as $score ) {
		    if ( $score->player_id == $user_id ){
		      if ( $TavistockBest > $score->Total ) {
		        $TavistockBest = $score->Total;
		      }
		    }
		  }
		  if ( $TavistockBest != 999 ){
		    echo number_format((float)$TavistockBest, 2, '.', '');
		  } else {
		    echo "nan";
		  }
		?>
		</center>
	    </td>
	    <td>
	      <center>
		<?php
		 if($TavistockBest != 999){
		  echo ($TavistockBest - 72);
		 } else {
		   echo "-";
		 }
		 ?>
	      </center>
	    </td>
	  </tr>
	</tbody>
      </table>
    </fieldset>

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

