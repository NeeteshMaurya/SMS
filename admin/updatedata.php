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
     $id=$_REQUEST['sid'];

     $query=mysqli_query($con,"UPDATE `student` SET `rollno` = '$roll', `name` = '$name', `city` = '$city', `pcont` = '$pcont', `Standard` = '$standard' WHERE `student`.`id` = $id");
    if ($query==true)
     {
       ?>
       <script>
           alert('Data Updated successfully.');
           window.open('updateform.php?sid=<?php echo $id;?>','_self');
     </script> 
       <?php 
     }
    }
?>
