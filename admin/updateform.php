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

   $sid=$_GET['sid']; //by get method we call our sid data from updatestudent page.
   $sql="select * from student where id='$sid'";
   $run=mysqli_query($con,$sql);
   $data=mysqli_fetch_assoc($run);
   

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
    <form method="post" action="updatedata.php" enctype="multipart/form-data">
        <table align="center" border="1">
            <tr>
                <th>Rollno.</th>
                <td><input type="text" name="rollno" value="<?php echo $data['rollno'] ?>"  required></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td><input type="text" name="name" value="<?php echo $data['name'] ?>" required></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city" value="<?php echo $data['city'] ?>" required></td>
            </tr>
            <tr>
                <th>Parent contact no.</th>
                <td><input type="text" name="pcont" value="<?php echo $data['pcont'] ?>"></td>
            </tr>
            <tr>
                <th>Standard</th>
                <td><input type="number" name="std" value="<?php echo $data['Standard'] ?>" required></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
                <input type="submit" name="submit" value=update></td>
            </tr>
        </table>
        
    </form>
</body>
</html> 