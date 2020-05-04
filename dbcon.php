<?php 

   $con=mysqli_connect("localhost","root","");
   $connection=mysqli_select_db($con,"sms");


   if($con=false){
   	echo "connection unsuccessful";
   }


 ?>