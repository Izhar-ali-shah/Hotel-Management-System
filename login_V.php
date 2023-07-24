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
        $Uname = "SELECT user_name from users_student where '$user' = user_name ";
        $name = check_user_pass($conn,$Uname);
        $password =  "SELECT user_password from users_student where $pass = user_password AND '$user'= user_name";
        $pname = check_user_pass($conn,$password);
        }catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        $check = true;
        $check2 = true;
        if ($name == "")
        {
        header('location:invalid_user.php');
        $check = false;
        }
        else 
            {
                if ($pname == "" && $check == true)
                    {
                        header('location:INVALID_PASSWORD.php');
                        $check2 = false;
                    }
                else if ($check == true && $check2 == true) 
                {
                $Uname = "SELECT student_id from users_student where '$user' = user_name ";
                $name = check_user_pass($conn,$Uname);
                $_SESSION['use'] = $name;
                header('location:studentindex.php');

                }
            }   

        ?>


