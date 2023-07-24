<?php

function check_std_id($conn, $sql)
  {
  
      $q = $conn->prepare($sql);
      $q->execute();
      return $q->fetchColumn();
  
  }

$check = false;
$order_id = $_GET["order_id"];
$Tmess = $_GET["Tmess"];
$dish_id = $_GET["dish_id"];
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
    $sql = "SELECT order_id  FROM mess WHERE order_id = $order_id";
    $order_id = check_std_id($conn ,$sql);
    if ($dish_id > 9 || $dish_id < 1 )
        {
            header("location:INVALID_dishid.php");
            $check = true;
        }
    if ($order_id == "" && $check == false)
        {   
            header("location:INVALID_ORDERID.php");
        }
    else if ($check == false)
        {
            if ($Tmess != "")
            {
            $sql = "UPDATE mess set mess_timmings = '$Tmess' WHERE order_id = $order_id ";
            $conn->exec($sql);
            }

            if ($dish_id != "")
            {
            $sql = "UPDATE mess set dish_id = $dish_id WHERE order_id = $order_id ";
            $conn->exec($sql);
            }

            header("location:admin3.php");
        }

?>