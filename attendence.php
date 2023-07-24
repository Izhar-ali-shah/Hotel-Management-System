    <?php
session_start();
?>
<html>
    <head>
        <title> Attendence</title>
        <link rel="stylesheet" href="attendence.css">
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
            <h1 class="head">STUDENT <span> ATTENDENCE</span></h1>
            </div>    
        
            <div class="table">
                <table border="1"  height="10%" width="70%" class="inner" >
                <thead>
                        <tr>
                             <th>ID</th>
                            <th>DATE OF JOIN</th>
                            <th>PRESENT DAYS</th>
                            <th>ABSENT DAYS</th>
                            <th>TOTAL LEAVES</th>
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
            $sql = "SELECT * FROM student_attendence where student_id = '$id' ";
            $result = $connection -> query($sql);

            if(!$result)
            {
                die("Invalid query: " . $connection -> errno);
            }

            while($row = $result -> fetch_assoc())
            {
                echo "<tr>

                <td>" . $row["student_id"] . "</td>
                <td>" . $row["DATE"] . "</td>
                <td>" . $row["is_present"] . "</td>
                <td>" . $row["is_absent"] . "</td>
                <td>" . $row["is_leave"] . "</td>
            </tr>";
            }
            
            ?>
        </tbody>
        </table>
    </body>
    
</html>