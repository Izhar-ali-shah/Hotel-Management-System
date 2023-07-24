<?php


function check_std_id($conn, $sql)
  {
  
      $q = $conn->prepare($sql);
      $q->execute();
      return $q->fetchColumn();
  
  }


  function make_update($conn , $sql)
  {
    $q = $conn->prepare($sql);
    $q->execute();
  }
$std_id = $_GET["std_id"];
$current = $_GET["current"];
$change = $_GET["change"];
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
            header("location:invalid_std_id_1.php");
        }
    else
        {
            $sql = "SELECT room_id  FROM rooms WHERE room_id = $change ";
            $room_exist = check_std_id($conn ,$sql);
            if ($room_exist != "")
            {
                $sql = "SELECT room_id from student_info where student_id = $std_id";
                $room_v = check_std_id($conn ,$sql);
                if ($room_v == $current)
                {
                    $sql = "SELECT room_vacancy from rooms where room_id = $room_exist ";
                    $room_v = check_std_id($conn ,$sql);
                    if ($room_v <= 0)
                        {
                            header("location:room_full.php");
                        }
                    else
                        {
                                $sql = "UPDATE student_info set room_id	= $change where student_id = $std_id";
                                make_update($conn , $sql);


                                $sql = "SELECT room_vacancy  FROM rooms WHERE room_id = $change ";
                                $num = check_std_id($conn ,$sql);
                                
                                $num = $num - 1;

                                $sql = "UPDATE rooms set room_vacancy = $num where room_id = $change";
                                make_update($conn , $sql);

                                $sql = "SELECT current_students  FROM rooms WHERE room_id = $change ";
                                $num = check_std_id($conn ,$sql);
                                
                                $num = $num + 1;

                                $sql = "UPDATE rooms set current_students = $num where room_id = $change";
                                make_update($conn , $sql);
                                
                    
                    

                                $sql = "SELECT room_vacancy  FROM rooms WHERE room_id = $current ";
                                $num = check_std_id($conn ,$sql);
                                
                                $num = $num + 1;

                                $sql = "UPDATE rooms set room_vacancy = $num where room_id = $current";
                                make_update($conn , $sql);

                                $sql = "SELECT current_students  FROM rooms WHERE room_id = $current ";
                                $num = check_std_id($conn ,$sql);
                                
                                $num = $num - 1;

                                $sql = "UPDATE rooms set current_students = $num where room_id = $current";
                                make_update($conn , $sql);
                                header("location:admin5.php");
                                }
                         }
                         else{
                            header("location:invalid_room_student.php");
                           }
                 }else{
                             header("location:invalid_room.php");
                            }
            }
                         

?>