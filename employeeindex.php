<?php
session_start();
?>
<html>
    <head>
        <title> Employee</title>
        <link rel="stylesheet" href="employee.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body >
            <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav>
            <div class="logo"> Employee </div>
            <div class="nav-items">
                <li><a class="active" href="employeeindex.php"><i class="fa fa-fw fa-user "></i> Employee</a></li>
                <li> <a href="e_salary.php"><i class="fa fa-money"></i> salary</a></li>
                
            </div>
        
        </nav>
        

        <br>
        
            <div class="heading">
            <h1 class="head">EMPLOYEE  <span>INFORMATION</span></h1>
            </div>    
        
            <div class="table">
                <table border="1"  height="10%" width="100%" class="inner" >
                <thead>
                        <tr>
                             <th>Emp_ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>cell_no</th>
                            <th>Address</th>
                            <th>active</th>
                            <th>jobtitle</th>
                            <th>Date of join</th>
                            <th>date of end</th>
                            
                        </tr>
                    </thead>
            </div>
        <tbody>
            <?php

            $servername ="localhost";
            $username = "root";
            $password = "";
            $database = "hostel";
            
            // creating connection to database
            $connection = new mysqli($servername,$username,$password,$database);

            // checking connection

            if($connection -> connect_error)
            {
                die("Connection failed:" . $connection -> connect_error);
            }

            $id = $_SESSION['use'];    
            // realing all rows from database
            $sql = "SELECT * FROM employee where emp_id = '$id' ";
            $result = $connection -> query($sql);

            if(!$result)
            {
                die("Invalid query: " . $connection -> errno);
            }

            while($row = $result -> fetch_assoc())
            {
                echo "<tr>

                <td>" . $row["emp_id"] . "</td>
                <td>" . $row["emp_first_name"] . "</td>
                <td>" . $row["emp_last_name"] . "</td>
                <td>" . $row["cell_no"] . "</td>
                <td>" . $row["address_of_e"] . "</td>
                <td>" . $row["is_active"] . "</td>
                <td>" .  $row["job_title"] . "</td>
                <td>" . $row["doj_date"] . "</td>
                <td>" . $row["doe_date"] . "</td>
               
            </tr>";
            }
            
            ?>
        </tbody>
        </table>
    </body>
    
</html>