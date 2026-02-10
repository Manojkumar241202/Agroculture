<?php

    // Use environment variables for Wasmer.io deployment, fallback to local values
    $serverName = getenv('DB_HOST') ;
    $userName = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    $dbName = getenv('DB_NAME');
    $dbPort = getenv('DB_PORT');

    $conn = mysqli_connect($serverName, $userName, $password, $dbName, $dbPort);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
