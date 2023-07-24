
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
$v1 = $v2 = $v3 = $v4 = $v5 = $v6  = $v8  =   "";
$v1 = $_GET["emp_id"];
$v2 = $_GET["emp_first_name"];
$v3 = $_GET["emp_last_name"];
$v4 = $_GET["cell_no"];
$v5 = $_GET["address_of_e"];
$v6 = $_GET["job_title"];

$v8 = $_GET["doj"];

$v11 = $_GET["USER"];
$_SESSION['emp_id'] = $v1;
$_SESSION['job_title'] = $v6;

 

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO employee (emp_id,emp_first_name,emp_Last_name,cell_no,address_of_e,job_title,doj_date)
  VALUES ($v1,'$v2','$v3',$v4,'$v5','$v6','$v8')";
  $conn->exec($sql);

 
  
  $v3 = $_GET["PASS"];
  $sql = "INSERT INTO users_emp (user_name, user_password ,emp_id )
  VALUES ('$v11','$v3',$v1)";
  $conn->exec($sql);
 

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
if($check == true && $check_2 == true )
header("location:employee_completed.php");






?>

