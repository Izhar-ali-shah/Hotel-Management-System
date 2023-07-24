<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $mysql = "UPDATE fees set monthly_fees = (monthly_fees + 4000)";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set mess_fees = (mess_fees + 2000)";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set other_activity = (other_activity + 250)";
    $conn->exec($mysql);

    header("location:admin4.php");
?>