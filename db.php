<?php

    // Use environment variables for Wasmer.io deployment, fallback to local values
    $serverName = getenv('DB_HOST') ? getenv('DB_HOST') : "sql12.freesqldatabase.com";
    $userName = getenv('DB_USERNAME') ? getenv('DB_USERNAME') : "sql12776325";
    $password = getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : "UAi6ThSKQZ";
    $dbName = getenv('DB_NAME') ? getenv('DB_NAME') : "sql12776325";
    $dbPort = getenv('DB_PORT') ? getenv('DB_PORT') : 3306;

    $conn = mysqli_connect($serverName, $userName, $password, $dbName, $dbPort);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
