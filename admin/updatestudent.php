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
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Student Details</title>
</head>
<body bgcolor="yellow">
     <form>
        <h1 align="center" style="color: white;border:1px solid red;background-color: red;  ">Update Student Details</h1>
         <table  align="center" style="margin-top: 200px;border: 1px solid red;background-color: red;color: white;">
             <tr>
                 <th>Standard</th>
                 <td><input type="number" name="std"></td>
                 <th>Student Name</th>
                 <td><input type="text" name="name"></td>
                 <td><input type="submit" name="submit" value="Search"></td>
             </tr>
        <table align="center" width="80%" style="margin-top: 200px;border: 1px solid red;background-color: red;color: white;">
             <tr>
                <th>Name</th>
                <th>Rollno</th>
                <th>Image</th>
                <th>Standard</th>
                <th>City</th>
                <th>Parent Contact</th>
                <th>Edit</th>
             </tr>
             <?php
             if(isset($_REQUEST['submit']))
             {
                $standard=$_REQUEST['std'];
                $name=$_REQUEST['name'];
                $run=mysqli_query($con,"select * from student where standard='$standard' and name='$name'");
                
                if(mysqli_num_rows($run)<1)        //CSETUTS in Hindi PHP PROJECT.
                {
                    echo "No record found";
                }
                else
                {
                  while($data=mysqli_fetch_assoc($run))
                  {
                    ?>
                  <tr>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['rollno']; ?></td>
                    <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
                    <td><?php echo $data['Standard']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['pcont']; ?></td>

                    <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
                    </tr>
                    <?php
                  
                  }
                }
             }
            ?>
         </table>
     </form>
</body>
</html>







