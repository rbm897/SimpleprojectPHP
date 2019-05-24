<?php
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $myusername = $_POST['username'];
      $mypassword = $_POST['cpwd'];
	  $id = mt_rand(10,1000);
	  $sql = "INSERT INTO admin(id,username,passcode) VALUES ($id,'$myusername','$mypassword')";
	  mysqli_query($db,$sql);
    }
?>
<!DOCTYPE HTML>
<head>
   <link rel="stylesheet" type="text/css" href="mystyle.css">
	<title>Regisration</title>
   <script type="text/javascript">
		  
		  
      function validateForm() 
      {
          var a = document.forms["rform"]["username"].value;
          var f = document.forms["rform"]["pwd"].value;
          var g = document.forms["rform"]["cpwd"].value;
          if(f!=g)
          {
            alert("Both the passwords must be same");
            return false;
          }
		  if(a.length==0 ||  f.length==0)
			{
				alert("Field can't be leaved blank!!!");
				return false;
			}
      }
   </script>
</head>
<body>
	<form name="rform" onsubmit="return validateForm()" method = "post">
         User name: <br><input type = "text" name="username"/>
         <br>
         <br>
         Password: <br><input type="Password" name="pwd" />
         <br>
         <br>
         Confirm Password: <br><input type="Password" name="cpwd" />
         <br>
         <br>
         <button type="Submit" formaction="registration.php"  >Submit</button>
         <input type="button" value="Back" onclick="window.location.href = 'Home.html' " />
      </form>

</body>