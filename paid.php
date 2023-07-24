<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

$fee = $_SESSION['fee_id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $mysql = "UPDATE fees set monthly_fees = 0 where fees_info_id = $fee";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set mess_fees = 0 where fees_info_id = $fee ";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set other_activity = 0 where fees_info_id = $fee";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set addmission_fee = 0 where fees_info_id = $fee";
    $conn->exec($mysql);

    $mysql = "UPDATE fees set security_fee = 0 where fees_info_id = $fee ";
    $conn->exec($mysql);

    header('location:FEES.php');

?>