<?php 
   
   session_start();
     	if(isset($_SESSION['uid']))
     	{
     		header('location:admin/admindash.php');
        }

   $con=mysqli_connect("localhost","root","");
   $connection=mysqli_select_db($con,"sms");

   if(isset($_POST["submit"]))
   {
   	 $user=$_POST['user'];
     $pass=$_POST['pass'];
     $query=mysqli_query($con,"select * from admin where username='$user' && password='$pass'");
     $rowcount=mysqli_num_rows($query);
     if($rowcount<1){
       ?>
     	<script>
     		alert('Username or Password not matched!');
     		window.open('login.php','_self');
     	</script>
     	<?php
     }
     else{
     	$data=mysqli_fetch_assoc($query);
     	$id=$data['id'];
     	session_start();
     	$_SESSION['uid']=$id;
     	header('location:admin/admindash.php');
     }

  }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
    <h1 align="center">Admin Login</h1>
    <form action="Login.php" method="post">
    	<table align="center">
    		<tr>
    			<td>Username</td><td><input type="text" name="user" required></td>
    		</tr>
    		<tr>
    			<td>Password</td><td><input type="text" name="pass" required></td>
    		</tr>
    		<tr>
    			<td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
    		</tr>
    	</table>
    	
    </form>
</body>
</html>

















