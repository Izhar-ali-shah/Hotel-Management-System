<?php
session_start();
function check_user_pass($conn, $sql)
{

    $q = $conn->prepare($sql);
    $q->execute();
    return $q->fetchColumn();

}

$user = $pass = "";

$user = $_GET['uname'];
$pass = $_GET['psw'];
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $Uname = "SELECT user_name from admin_log where '$user' = user_name ";
        $name = check_user_pass($conn,$Uname);
        $password =  "SELECT pass from admin_log where $pass = pass AND '$user'= user_name";
        $pname = check_user_pass($conn,$password);
        }catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        $check = true;
        $check2 = true;
        if ($name == "")
        {
        header('location:invalid_user_1.php');
        $check = false;
        }
        else 
            {
                if ($pname == "" && $check == true)
                    {
                        header('location:INVALID_PASSWORD_1.php');
                        $check2 = false;
                    }
                else if ($check == true && $check2 == true) 
                {

                header('location:admin.php');

                }
            }   

        ?>


