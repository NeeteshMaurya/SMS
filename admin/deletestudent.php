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

   if(isset($_REQUEST["delete"])){
        $sql = "DELETE FROM student WHERE id = {$_REQUEST['id']}";
        if (mysqli_query($con,$sql)){
             echo "Record Deleted";
        }
        else{
          echo "Unable to delete Record";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Delete Student Details</title>
</head>
<body bgcolor="aqua">
     <form>
        <h1 align="center" style="color: white;border:1px solid red;background-color: red;  ">Delete Student Details</h1>
         <table align="center" style="margin-top: 200px;border: 1px solid red;background-color: red;color: white;">
             <tr>
                 <th>Standard</th>
                 <td><input type="number" name="std"></td>
                 <th>Student Name</th>
                 <td><input type="text" name="name"></td>
                 <td><input type="submit" name="submit" value="Search"></td>
             </tr>
        <table align="center" width="80%" border="1" style="margin-top: 200px;border: 1px solid red;background-color: red;color: white;">
             <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rollno</th>
                <th>Image</th>
                <th>Standard</th>
                <th>City</th>
                <th>Parent Contact</th>
                <th>Delete</th>
             </tr>
             <?php
             if(isset($_REQUEST['submit']))
             {
                $standard=$_REQUEST['std'];
                $name=$_REQUEST['name'];
                $run=mysqli_query($con,"select * from student where standard='$standard' and name='$name'");
                
                if(mysqli_num_rows($run)<1)
                {
                    echo "No record found";
                }
                else
                {
                  while($data=mysqli_fetch_assoc($run))
                  {
                    ?>
                  <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['rollno']; ?></td>
                    <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
                    <td><?php echo $data['Standard']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['pcont']; ?></td>
                   <?php echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' .$data["id"]. '><input type="submit" name="delete" value="Delete"></form></td>';
                   ?>
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







