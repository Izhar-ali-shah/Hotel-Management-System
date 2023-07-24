<?php
session_start();
?>
<html>
    <head>
        <title> Fees</title>
        <link rel="stylesheet" href="fees.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body >
            <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav>
            <div class="logo"> Student</div>
            <div class="nav-items">
                <li><a class="active" href="studentindex.php"><i class="fa fa-fw fa-user "></i> Student</a></li>
                <li> <a href="attendence.php"><i class="fa fa-check"></i> Attendence</a></li>
                <li> <a href="mess.php"><i class="fa fa-cutlery"></i> Mess</a></li>
                <li> <a href="FEES.php"><i class="fa fa-money"></i> Fees</a></li>
                <li> <a href="rooms.php"><i class="fa fa-fw fa-home"></i>Rooms</a></li>
            </div>
        
        </nav>
        

        <br>
        
            <div class="heading">
            <h1 class="head">STUDENT  <span> FEES INFORMATION</span></h1>
            </div>    
        
            <div class="table">
                <table border="1"  height="10%" width="100%" class="inner" >
                <thead>
                        <tr>
                            <th>FEE ID</th>
                            <th>YOUR MOTHLY FEE</th>
                            <th>discount rate</th>
                            <th>tax</th>
                            <th>mess fee</th>
                            <th>late charges</th>
                            <th>addmission fee</th>
                            <th>other activities</th>
                            <th>security fee</th>
                            <th>operation</th>
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
            $sql = "SELECT * FROM fees where student_id = '$id' ";
            $result = $connection -> query($sql);
            $total = 0;
            if(!$result)
            {
                die("Invalid query: " . $connection -> errno);
            }
            
            $sql = "SELECT fees_info_id FROM fees where student_id = '$id' ";
            $fee= $connection -> query($sql);
            $here = $fee-> fetch_assoc();
            $_SESSION['fee_id'] = $here["fees_info_id"];
            while($row = $result -> fetch_assoc())
            {
                echo "<form action='paid.php' method='get'> 
                <tr>

                <td>" . $row["fees_info_id"] . "</td>
                <td>" . $row["monthly_fees"] . "</td>
                <td>" . $row["discount_rate"] . "</td>
                <td>" . $row["tax"] . "</td>
                <td>" . $row["mess_fees"] . "</td>
                <td>" . $row["late_fees"] . "</td>
                <td>" . $row["addmission_fee"] . "</td>
                <td>" .  $row["other_activity"] . "</td>
                <td>" . $row["security_fee"] . "</td>

                <td> <button class='btn btn-primary'>pay</button> </td>
            </tr>
            
                </form>";

            
            }
            
            ?>
        </tbody>
        </table>
    </body>
    
</html>