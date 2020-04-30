<?php
         $conn = new mysqli("localhost","root","","employeedb");
         if(mysqli_connect_error()){
             die("Database connection failed: " . mysqli_connect_error());
         }
         $sql = "SELECT count(*) from login where name='abc@admin.com'";
         $result = $conn->query($sql) or die($conn->error);
         $row = $result->fetch_array();
         echo $row[0];
?>