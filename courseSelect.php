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
    
    body { background-color:#a0d2eb;  }
    table { text-align:center;}
    div { font-size:150%; text-align:center }
    p { text-align:center }
    h1 { font-size:250%; text-align:center }
  </style>
</head>

<?php
 #start the session
 session_start();
 ?>
<body>
  <button class="btn" style="float:right; margin-left:10px">
    <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/login.php"> Log Out</a>
  </button>
<center>
<h1>COURSE SELECTION</h1>

<form method="POST" action="courseSelect.php">
  <table>
    <tr>
      <td>
	<div>
	  Select a course:
	  <select name="formCourse">
	    <option value="">Select...</option>
	    <option value="Valleybrook">Valleybrook</option>
	    <option value="Tavistock">Tavistock</option>
	    <input type="submit" name="formSubmit" value="Go">
	    <?php
	     $_SESSION['id'] = $_SESSION['user_id'];
	     if(isset($_POST['formSubmit'])){
	       if($_POST['formCourse'] != ""){
	         $_SESSION['courseSelection'] = $_POST['formCourse'];
	         header("Location: http://elvis.rowan.edu/~caruso18/webprog/Project/input.php");
	       } else{
	     ?>
	    <br><br>
	    <?php
	       echo "Please select a course!";
	       }
	     }
	   ?>
	</select>
	</div>
     </td>
    </tr>
    <tr>
      <td>
	<br><br>
	<button class="btn">
	  <a href="http://elvis.rowan.edu/~caruso18/webprog/Project/stats.php" >View Stats</a>
	</button>
      </td>
    </tr>
  </table>
</form>
</center>
<br>
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
