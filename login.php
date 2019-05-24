<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pd']);
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE HTML>
<head>
   <link rel="stylesheet" type="text/css" href="mystyle.css">
	<title>Login</title>
</head>
<body >
	<form method = "post"> 
         User ID: <br><input type = "text" name="username" />
         <br>
         <br>
         Password: <br><input type = "password" name ="pd" />
         <br>
         <br>
         <button type="Submit" formaction = "">Submit</button>
         <button formaction = "Home.html">Back</button>
      </form>
</body>