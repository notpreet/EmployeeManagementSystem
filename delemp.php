<?php
    include 'dbcon.php';
    $id=$_GET['q'];
    $que = "delete from employee where emp_id='".$id."'";
    $result=$conn->query($que);
    $que2="select dept_id from employee where emp_id='".$id."'";
    $result1=$conn->query($que2);
    $row=$result1->fetch_assoc();
    $dep=(int)$row['dept_id'];
    $que3="select * from department where dept_id=".$dep;
    $result=$conn->query($que3);
    $row1=$result->fetch_assoc();
    $no=(int)$row1['current_employeed']-1;
    $que2="update department set current_employeed=".$no."where dept_id=".$dept;
    $result2=$conn->query($que2);

?>