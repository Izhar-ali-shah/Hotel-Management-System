<?php

session_start();

function check_std_id($conn, $sql)
  {
  
      $q = $conn->prepare($sql);
      $q->execute();
      return $q->fetchColumn();
  
  }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";
$std_id = $_GET["std_id"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$Phone = $_GET["Phone"];
$address = $_GET["address"];
$gender = $_GET["gender"];
$year = $_GET["year"];
$dob = $_GET["dob"];
$email = $_GET["email"];
$room = $_GET["room"];
$fathername = $_GET["fathername"];
$fjob = $_GET["fjob"];
$mothername = $_GET["mothername"];
$mjob = $_GET["mjob"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $sql = "SELECT student_id  FROM student_info WHERE student_id = $std_id ";
    $std_id = check_std_id($conn ,$sql);
    if ($std_id == "")
        {   
            header("location:invalid_std_id.php");
        }
    else
    {
    if ($fname != "")
    {
    $sql = "UPDATE student_info set First_name = '$fname' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($lname != "")
    {
    $sql = "UPDATE student_info set Last_name = '$lname' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($Phone != "")
    {
    $sql = "UPDATE student_info set Phone = $Phone WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($address != "")
    {
    $sql = "UPDATE student_info set address = '$address' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($gender != "")
    {
    $sql = "UPDATE student_info set sex = '$gender' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($year != "")
    {
    $sql = "UPDATE student_info set year = $year WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($dob != "")
    {
    $sql = "UPDATE student_info set dob = '$dob' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($email != "")
    {
    $sql = "UPDATE student_info set s_email = '$email' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($room != "")
    {
    $sql = "UPDATE student_info set room_id  = $room WHERE student_id = $std_id ";
    $conn->exec($sql);
    }
    if ($fathername != "")
    {
    $sql = "UPDATE parent set father_name = '$fathername' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }

    if ($fjob != "")
    {
    $sql = "UPDATE parent set father_job_title = '$fjob' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }

    if ($mothername != "")
    {
    $sql = "UPDATE parent set mother_name = '$mothername' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }

    if ($mothername != "")
    {
    $sql = "UPDATE parent set mother_job_title = '$mjob' WHERE student_id = $std_id ";
    $conn->exec($sql);
    }

    header("location:admin.php");
    }
?>