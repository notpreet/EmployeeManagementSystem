<?php
           
                    $conn = new mysqli("localhost","root","","employeedb");
                    if(mysqli_connect_error()){
                        die("Database connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT employee.dept_id,department.current_employeed,department.dept_offset,department.max_empl from employee,department where emp_id='co1' and employee.dept_id=department.dept_id";
                    $result = $conn->query($sql) or die($conn->error);
                    $row = $result->fetch_assoc();
                    $user= "test@user.com";
                    $pass=$user;
                    if($row!=false){
                        if((int)$row['current_employeed']>=(int)$row['max_empl'])
                        {
                            echo "<script>alert('Your Department is full')</script>";
                        }
                        else
                        {
                            $eid1=(int)($row['current_employeed']+1);
                            $eid=$row['dept_offset'].(string)$eid1;
                            $sql1="insert into login values ('".$eid."','".$user."','".$pass."','0','".date("Y/m/d")."')";
                            $result1=$conn->query($sql1) or die($conn->error);
                            echo $sql1;
                        }
                    }
            
        ?>