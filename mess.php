<?php
session_start();
?>
<html>
    <head>
        <title> Mess</title>
        <link rel="stylesheet" href="mess.css">
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
            <h1 class="head">STUDENT  <span>MESS INFORMATION</span></h1>
            </div>    
        
            <div class="table">
                <table border="1"  height="50%" width="60%" class="inner" >
                <thead>
                        <tr>
                            <th>Day</th>
                            <th>mess timming </th>
                            <th>dish#1</th>
                            <th>dish#2</th>
                            <th>dish#2</th>
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
            $sql = " SELECT * FROM mess NATURAL JOIN dishes ORDER BY order_id";
            $result = $connection -> query($sql);
            $total = 0;
            if(!$result)
            {
                die("Invalid query: " . $connection -> errno);
            }

            while($row = $result -> fetch_assoc())
            {
                echo "<tr>

                <td>" . $row["day"] . "</td>
                <td>" . $row["mess_timmings"] ."</td>
                <td>" . $row["dish_1"] . "</td>
                <td>" . $row["dish_2"] . "</td>
                <td>" . $row["dish_3"] . "</td>
            </tr>";
            }
            
            ?>
        </tbody>
        </table>
    </body>
    
</html>