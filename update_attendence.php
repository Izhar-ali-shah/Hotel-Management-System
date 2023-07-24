<?php



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
$is_present = $_GET["is_present"];
$is_leave = 0;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $sql = "SELECT student_id FROM student_info WHERE student_id = $std_id";
    $std_id = check_std_id($conn ,$sql);

    if ($std_id == "")
    {   
        header("location:invalid_std_id.php");
    }
    else 
        {
            if ($is_present == 'l' || $is_present == 'L')
                {
                    $sql = "SELECT 	is_leave FROM student_attendence WHERE student_id = $std_id";
                    $is_leave = check_std_id($conn ,$sql);
                    $is_leave = $is_leave + 1;
                    $sql = "UPDATE student_attendence set is_leave = $is_leave where student_id = $std_id";
                    $conn->exec($sql);
                }
            else if ($is_present == 'y' || $is_present == 'Y')
                {
                    $sql = "SELECT 	is_present FROM student_attendence WHERE student_id = $std_id";
                    $is_leave = check_std_id($conn ,$sql);
                    $is_leave = $is_leave + 1;
                    $sql = "UPDATE student_attendence set is_present = $is_leave where student_id = $std_id";
                    $conn->exec($sql);
                }
            else if ($is_present == 'N' || $is_present == 'n')
                {
                    $sql = "SELECT 	is_absent FROM student_attendence WHERE student_id = $std_id";
                    $is_leave = check_std_id($conn ,$sql);
                    $is_leave = $is_leave + 1;
                    $sql = "UPDATE student_attendence set is_absent = $is_leave where student_id = $std_id";
                    $conn->exec($sql);
                }
            else
                {
                    header("location:INVALID_CHOICE.html");
                }

                header("location:admin2.php");

        }


?>