<?php
    session_start();
    require 'db.php';

    $rating = $_POST['rating'];
    $review = $_POST['comment'];
    $name = $_SESSION['Name'];
    $pid = $_GET['pid'];

    // echo $rating.$review.$pid.$name;
    $sql = "INSERT INTO review(pid,name,rating,comment)
            VALUES('$pid','$name', '$rating', '$review')";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        error_log("Review insert error: " . mysqli_error($conn));
        $_SESSION['message'] = "Error submitting review: " . mysqli_error($conn);
        header("Location: /Login/error.php");
    }
    else {
        header("Location: /review.php?pid=".$pid);
    }

?>
