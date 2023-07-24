<?php
session_start();
?>
<html>
    <head>
        <title> Student Info</title>
        <link rel="stylesheet" href="student.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body >
            <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav>
            <div class="logo"> Student </div>
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
            <h1 class="head">STUDENT  <span>INFORMATION</span></h1>
            </div>    
        
            <div class="table">
                <table border="1"  height="10%" width="80%" class="inner" >
                <thead>
                        <tr>
                             <th>Student ID</th>
                             <th>room no</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Year</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Fathers name</th>
                            <th>Mothers name</th>
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
            $sql = "SELECT * FROM student_info NATURAL JOIN parent where student_id = '$id' ";
            $result = $connection -> query($sql);

            if(!$result)
            {
                die("Invalid query: " . $connection -> errno);
            }

            while($row = $result -> fetch_assoc())
            {
                echo "<tr>

                <td>" . $row["student_id"] . "</td>
                <td>" . $row["room_id"] . "</td>
                <td>" . $row["First_name"] . "</td>
                <td>" . $row["Last_name"] . "</td>
                <td>" . $row["Phone"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["sex"] . "</td>
                <td>" .  $row["year"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["s_email"] . "</td>
                <td>" . $row["father_name"] . "</td>
                <td>" . $row["mother_name"] . "</td>
            </tr>";
            }
            
            ?>
        </tbody>
        </table>
    </body>
    
</html>