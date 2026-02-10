<?php
    session_start();

// Define dataFilter function first
function dataFilter($data)
{
	$data = trim($data);
 	$data = stripslashes($data);
	$data = htmlspecialchars($data);
  	return $data;
}

    require '../db.php';

    // Check if POST request
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("location: /index.php");
        exit();
    }

    $user = dataFilter($_POST['uname']);
    $currPass = $_POST['currPass'];
    $newPass = $_POST['newPass'];
    $conNewPass = $_POST['conNewPass'];
    $newHash = dataFilter( md5( rand(0,1000) ) );
    $id = $_SESSION['id'];
    $category = $_SESSION['Category'];

    // Select from farmer or buyer table based on category
    if ($category == 1) {
        $sql = "SELECT * FROM farmer WHERE fusername='$user' AND fid='$id'";
        $passwordField = 'fpassword';
        $hashField = 'fhash';
        $idField = 'fid';
        $table = 'farmer';
    } else {
        $sql = "SELECT * FROM buyer WHERE busername='$user' AND bid='$id'";
        $passwordField = 'bpassword';
        $hashField = 'bhash';
        $idField = 'bid';
        $table = 'buyer';
    }
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);


    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentials!";
            header("location: /Login/error.php");
    }
    else
    {
        $User = $result->fetch_assoc();

        $storedPassword = $User[$passwordField];
        if(password_verify($_POST['currPass'], $storedPassword))
        {
            if($newPass == $conNewPass)
            {
                $conNewPass = dataFilter(password_hash($_POST['conNewPass'], PASSWORD_BCRYPT));
                $sql = "UPDATE $table SET $passwordField='$conNewPass', $hashField='$newHash' WHERE $idField='$id';";

                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    $_SESSION['message'] = "Password changed Successfully!";
                    header("location: /Login/success.php");
                }
                else
                {
                    $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
                    header("location: /Login/error.php");
                }
            }
        }
        else
        {
            $_SESSION['message'] = "Invalid current User Credentials!";
            header("location: ../Login/error.php");
        }
    }


?>
