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

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = dataFilter($_GET['email']);
        $hash = dataFilter($_GET['hash']);

        // Check both farmer and buyer tables
        $sql = "SELECT * FROM farmer WHERE femail='$email' AND fhash='$hash' AND factive='0'";
        $result = mysqli_query($conn, $sql);
        
        if (!$result || $result->num_rows == 0) {
            // Check buyer table
            $sql = "SELECT * FROM buyer WHERE bemail='$email' AND bhash='$hash' AND bactive='0'";
            $result = mysqli_query($conn, $sql);
            $table = 'buyer';
            $activeField = 'bactive';
            $emailField = 'bemail';
        } else {
            $table = 'farmer';
            $activeField = 'factive';
            $emailField = 'femail';
        }

        if (!$result || $result->num_rows == 0)
        {
            $_SESSION['message'] = "Account has already been activated or the URL is invalid!";
            header("location: /Login/error.php");
        }
        else
        {
            $_SESSION['message'] = "Your account has been activated!";
            $sql = "UPDATE $table SET $activeField='1' WHERE $emailField='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                error_log("Verify error: " . mysqli_error($conn));
            }
            $_SESSION['Active'] = 1;

            header("location: /Login/success.php");
        }
    }
     else
    {
        $_SESSION['message'] = "Invalid credentials provided for account verification!";
        header("location: /Login/error.php");
    }

?>
