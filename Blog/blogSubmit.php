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

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to write a blog !!!";
		header("Location: /Login/error.php");
		die();
	}

	// Check if POST request
	if($_SERVER['REQUEST_METHOD'] != "POST")
	{
		header("Location: /blogWrite.php");
		exit();
	}

	$title = dataFilter($_POST['blogTitle']);
	$content = mysqli_real_escape_string($conn, $_POST['blogContent']); // Escape content for SQL
	$userName = dataFilter($_SESSION['Username']);

    $sql = "INSERT INTO blogdata (blogUser, blogTitle, blogContent)
		    VALUES ('$userName', '$title', '$content')";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        error_log("Blog insert error: " . mysqli_error($conn));
        $_SESSION['message'] = "Some Error occurred: " . mysqli_error($conn);
        header("location: /Login/error.php");
    }
	else
	{
		header("Location: /blogView.php");
	}

?>
