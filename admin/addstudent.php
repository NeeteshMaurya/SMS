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
<?php
    $con=mysqli_connect("localhost","root","");
   $connection=mysqli_select_db($con,"sms");

   if(isset($_REQUEST["submit"]))
   {
     $roll=$_REQUEST['rollno'];
     $name=$_REQUEST['name'];
     $city=$_REQUEST['city'];
     $pcont=$_REQUEST['pcont'];
     $standard=$_REQUEST['std'];
     //image insertion
     $imagename=$_FILES['img']['name'];//here only name of image will be store.
     $tempname=$_FILES['img']['tmp_name'];
     move_uploaded_file($tempname,"../dataimg/$imagename");//image will store here.
     
     $query=mysqli_query($con,"INSERT INTO student(rollno,name,city,pcont,standard,image) values('$roll','$name','$city','$pcont','$standard','$imagename')");
     if ($query==true)
     {
       ?>
       <script>
           alert('Data inserted successfully.');
       </script> 
       <?php 
     }
   }
?>   

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body bgcolor="yellow">
    <div style="border: 1px solid red; background-color: red;">
        <a href="admindash.php" style="border: 1px solid blue;text-decoration: none;background-color: blue;">Previous Page</a>
    	<h1 style="text-align: center;">Welcome to Admin Dashboard</h1>
    </div>
    <form method="post" action="addstudent.php" enctype="multipart/form-data">
        <table align="center" border="1">
            <tr>
                <th>Rollno.</th>
                <td><input type="text" name="rollno"  required></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city" required></td>
            </tr>
            <tr>
                <th>Parent contact no.</th>
                <td><input type="text" name="pcont"></td>
            </tr>
            <tr>
                <th>Standard</th>
                <td><input type="number" name="std" required></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value=Submit></td>
            </tr>
        </table>
        
    </form>
</body>
</html> 


