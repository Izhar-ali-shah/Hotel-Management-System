<?php
session_start();
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";


    $v1 = $_SESSION['emp_id'];
    $v6 = $_SESSION['job_title'];
if (isset($_POST["submit1"]))
{
try {
    $date = date('y-m-d');
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($v6 == "sweeper") {
        # code...
        $sql = "INSERT INTO salary (emp_id,	basic_salary,	increment_yearly_salary,	bonus_salary)
            VALUES ($v1,4000,0 ,12)";}
                
    else if ($v6 =="cook")
        # code...
    {
    $sql = "INSERT INTO salary (emp_id,	basic_salary,	increment_yearly_salary,	bonus_salary)
            VALUES ($v1,6000,0 ,12)";}
     else
     {
        $sql = "INSERT INTO salary (emp_id,	basic_salary,	increment_yearly_salary,	bonus_salary)
        VALUES ($v1,8000,0 ,12)";
     }       
            
    $conn->exec($sql);
    header("location:login2.html");
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