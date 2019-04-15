<?php

echo '<html>';

$host = "localhost"; /* Host name */
$user = "id8999302_ecgcloud"; /* User */
$password = "ecgcloud"; /* Password */
$dbname = "id8999302_ecgcloud"; /* Database name */
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
	  $con = mysqli_connect($host, $user, $password,$dbname);
      // username and password sent from form 
	  $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,md5($_POST['password'])); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
		session_start();
        $_SESSION['username'] = $myusername;
		//echo '<script>alert("Session=$username");</script>';
		header("location: showdatagraph.php");
	  }
	  else
		echo '<script>alert("Invalid Credentials");</script>';
   }
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<title>Login Page</title>
	

</head>
<body background="a.jpg">
<body>

<div class="w3-card-4  w3-display-middle w3-sand" style="width:40%" >

<div class="w3-container w3-green"><h2>User Login</h2></div>
<form method="post" action="" class="w3-container ">
	 <label style="font-size:16px">USERNAME</label> <input type="text" class="w3-round-xlarge w3-input" name="username" id="Admin" placeholder="Enter Username">
	 <label style="font-size:16px">PASSWORD</label> <input type="password" class="w3-round-xlarge w3-input" name="password" id="user_password" placeholder="Enter Password">
	
	<br>
	<input class="w3-button w3-green" type="submit">
	<p> </p>
</div>
</form>
</body>
</html>