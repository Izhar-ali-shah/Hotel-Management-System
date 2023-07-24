
<?php

session_start();

function make_update($conn , $sql , $parameters)
  {
    $q = $conn->prepare($sql);
    $q->execute($parameters);
  }

function getSingleValue($conn, $sql, $parameters)
{
    $q = $conn->prepare($sql);
    $q->execute($parameters);
    return $q->fetchColumn();
}

function check_user_pass($conn, $sql)
  {
  
      $q = $conn->prepare($sql);
      $q->execute();
      return $q->fetchColumn();
  
  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";
$check = true;
$check_2 = true;
$v1 = $v2 = $v3 = $v4 = $v5 = $v6 = $v7 = $v8  = $v9 = $v10 =  "";
$v1 = $_GET["stdid"];
$v2 = $_GET["first"];
$v3 = $_GET["last"];
$v4 = $_GET["Pno"];
$v5 = $_GET["address"];
$v6 = $_GET["sex"];
$v7 = $_GET["year"];
$v8 = $_GET["dob"];
$v9 = $_GET["s_email"];
$v10 = $_GET["room_id"];
$v11 = $_GET["USER"];
$_SESSION['stdid'] = $v1;

  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $name = getSingleValue($conn, "SELECT room_vacancy FROM rooms WHERE room_id=?", [$v10]);
  $std = getSingleValue($conn, "SELECT current_students FROM rooms WHERE room_id=?", [$v10]);
  }catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

  $Uname = "SELECT user_name from users_student where '$v11' = user_name ";
  $Uname = check_user_pass($conn , $Uname);

  if ($Uname != "")
    {
      header('location:dup.html');
      $check_2 = false;
    }
  if ($name == 0 && $check_2 == true)
    {
      header('location:check_room.html');
      $check = false;
    }
    else 
      {
        $name = $name -1;
        $std = $std + 1;
        make_update( $conn,"UPDATE rooms SET room_vacancy= $name WHERE room_id=?" , [$v10]);
        make_update( $conn,"UPDATE rooms SET current_students	= $std WHERE room_id=?" , [$v10]);
        $check = true;
      }

  try {
  $sql = "INSERT INTO student_info (student_id,First_name,Last_name,Phone,address,sex,year,dob,s_email,room_id)
  VALUES ($v1,'$v2','$v3',$v4,'$v5','$v6','$v7' ,'$v8', '$v9' , $v10)";
  $conn->exec($sql);

  $v2 = $_GET["fname"];
  $v3 = $_GET["fjob"];
  $v4 = $_GET["mname"];
  $v5 = $_GET["mjob"];

  $sql = "INSERT INTO parent (student_id,father_name,mother_name,father_job_title,mother_job_title)
  VALUES ($v1,'$v2','$v3','$v4','$v5')";
  $conn->exec($sql);
  
  $v3 = $_GET["PASS"];
  $sql = "INSERT INTO users_student (user_name, user_password ,student_id )
  VALUES ('$v11','$v3',$v1)";
  $conn->exec($sql);
 

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

if($check == true && $check_2 == true )
header("location:completed.php");




?>

