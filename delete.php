<?php


function check_std_id($conn, $sql)
  {
  
      $q = $conn->prepare($sql);
      $q->execute();
      return $q->fetchColumn();
  
  }

function delete_row ($conn, $sql)
  {
    $q = $conn->prepare($sql);
    $q->execute();
  }
$std_id = $_GET["std_id"];
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

 $sql = "SELECT student_id  FROM student_info WHERE student_id = $std_id ";
 $std_id = check_std_id($conn ,$sql);
    if ($std_id == "")
        {   
            header("location:invalid_std_id.php");
        }

        else 
        
        {

          $mysql = "SELECT room_vacancy FROM rooms NATURAL JOIN student_info WHERE student_id = $std_id";
          $room_no = check_std_id($conn, $mysql);
          $room_no = $room_no + 1;

          $mysql = "SELECT current_students FROM rooms NATURAL JOIN student_info WHERE student_id = $std_id";
          $room_std = check_std_id($conn, $mysql);
          $room_std = $room_std - 1;

          $mysql = "SELECT room_id FROM student_info WHERE student_id = $std_id";
          $room_id = check_std_id($conn, $mysql);


          $mysql = "UPDATE rooms set room_vacancy = $room_no where  room_id = $room_id ";
          delete_row($conn, $mysql);


          $mysql = "UPDATE rooms set current_students = $room_std where  room_id = $room_id ";
          delete_row($conn, $mysql);


          $mysql = "DELETE FROM parent WHERE student_id = $std_id";
          delete_row($conn, $mysql);


          $mysql = "DELETE FROM fees WHERE student_id  = $std_id";
          delete_row($conn, $mysql);


          $mysql = "DELETE FROM users_student WHERE student_id = $std_id";
          delete_row($conn, $mysql);


          $mysql = "DELETE FROM student_attendence WHERE student_id = $std_id";
          delete_row($conn, $mysql);


          $mysql = "DELETE FROM student_info WHERE student_id = $std_id";
          delete_row($conn, $mysql);

          header ("location:admin.php");
        }

        $conn = null;


?>