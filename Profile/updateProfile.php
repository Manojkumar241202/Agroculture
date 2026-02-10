<?php
    session_start();
    require '../db.php';

// Define dataFilter function first
function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = dataFilter($_POST['name']);
        $mobile = dataFilter($_POST['mobile']);
        $user = dataFilter($_POST['uname']);
        $email = dataFilter($_POST['email']);
        $addr = dataFilter($_POST['addr']);

        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['Username'] = $user;
        $_SESSION['Mobile'] = $mobile;
        $_SESSION['Addr'] = $addr;
    }
    $id = $_SESSION['id'];
    $category = $_SESSION['Category'];

    // Update farmer or buyer table based on category
    if ($category == 1) {
        $sql = "UPDATE farmer SET fname='$name', fusername='$user', fmobile='$mobile', femail='$email', faddress='$addr' WHERE fid='$id';";
    } else {
        $sql = "UPDATE buyer SET bname='$name', busername='$user', bmobile='$mobile', bemail='$email', baddress='$addr' WHERE bid='$id';";
    }

    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION['message'] = "Profile Updated successfully !!!";
        header("Location: /profileView.php");
    }
    else
    {
        $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
        header("Location: /Login/error.php");
    }

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
