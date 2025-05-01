<?php

    $serverName = "sql12.freesqldatabase.com";
    $userName = "sql12776325";
    $password = "UAi6ThSKQZ";
    $dbName = "sql12776325";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
