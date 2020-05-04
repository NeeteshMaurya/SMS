
<?php
    $con=mysqli_connect("localhost","root","");
   $connection=mysqli_select_db($con,"sms");

?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body  style="background-image: url(b1.jpg);background-size: cover;background-position: center;height: 80vh;">
    <div style="background-color:navy ;border: 1px solid navy;">
        <h1 align="center" style="color: white;">Student Management System</h1>
  <h3 style="float: right;"><a href="login.php" style="text-decoration: none; color: white;margin-right: 40px;border:1px solid red;background-color:red;">Admin Login</a></h3>
</div>
     <form action="index.php">
         <table align="center" style="margin-top: 200px;border: 1px solid red;background-color: red;color: white;">
             <tr>
                 <th>Standard</th>
                 <td><input type="number" name="std"></td>
                 <th>Student Name</th>
                 <td><input type="text" name="name"></td>
                 <td><input type="submit" name="submit" value="Search"></td>
             </tr>
        <table align="center" width="80%" border="1" style="margin-top: 40px; background-color: red;color: white;height: 200px;">
             <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rollno</th>
                <th>Image</th>
                <th>Standard</th>
                <th>City</th>
                <th>Parent Contact</th>
                
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
                    <td><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
                    <td><?php echo $data['Standard']; ?></td>
                    <td><?php echo $data['city']; ?></td>
                    <td><?php echo $data['pcont']; ?></td>
                   
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







