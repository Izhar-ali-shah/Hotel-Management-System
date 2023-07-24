<?php
session_start();
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";


    $v1 = $_SESSION['stdid'];
if (isset($_POST["submit1"]))
{
try {
    $date = date('y-m-d');
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO fees (fees_info_id,monthly_fees,discount_rate,tax,mess_fees,late_fees,addmission_fee,other_activity,security_fee,student_id)
            VALUES ($v1,4000,0 , 10 , 2000 , 0 , 2000 , 250 , 2000 ,$v1)";
    $conn->exec($sql);
    $sql = "INSERT INTO student_attendence (student_id ,DATE, is_present ,is_absent,is_leave)
            VALUES ($v1,'$date',0,0,0)";
    $conn->exec($sql);
    header("location:login.html");
    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
}



?>



<!DOCTYPE html>
<html>

<body>

<form name = "form1" action="" method="post"> 
<h1>
    YOUR FORM WAS REGISTERED!!! <br>
    Please press the continue button to generate the fees <br>
</h1>
<input type="submit" name="submit1" value="Generate">
</form>

</body>


</html>