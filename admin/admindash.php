<?php
   session_start();
     	if(isset($_SESSION['uid']))
     	{
     		echo "";
     	}
     	else
     	{
     		header('location: ../login.php');
     	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body style="background-image: url(a2.jpg);background-size: cover;background-position: center;height: 80vh;">
    <div style="text-align: center;color: white; margin-bottom: 40px;border: 1px solid black; background-color: black;">
    	<h1 align="center">Welcome to Admin Dashboard</h1>

    	<a href="logout.php" style="float: right;"><h3 style="border: 1px solid white;background-color: yellow;margin-right: 50px;margin-top: 50px;">Logout</h3></a>

    </div>
    <div class="dashboard">
    	<table border="1" align="center" style="margin-top: 200px; background-color: blue;">
    		<tr>
    			<td height="40px" width="40px"><h2>1.</h2></td><td height="40px"><a href="addstudent.php" style="text-decoration: none;"><h2 style="color: white;">Insert New Student Data</h2></a></td>
    	    </tr>
    	    <tr>
    			<td height="40px" width="40px"><h2>2.</h2></td><td height="40px"><a href="updatestudent.php" style="text-decoration: none;"><h2 style="color: white;">Update Student Detail</h2></a></td>
    		</tr>
    		<tr>	
    			<td width="40px"><h2>3.</h2></td><td><a href="deletestudent.php" style="text-decoration: none;"><h2 style="color: white">Delete Student Detail</h2></a></td>
    		</tr>
    	</table>
    </div>
</body>
</html


















