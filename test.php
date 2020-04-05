<?php
    $servername="localhost";
    $username="root";
    $password="";

    $conn = new mysqli($servername,$username,$password,"smarty");

    $sql="INSERT INTO login VALUES (2,'dinky')";
    $conn->query($sql);
?>