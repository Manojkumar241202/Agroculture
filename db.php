<?php

    // Use environment variables for Wasmer.io deployment, fallback to local values
    $serverName = getenv('DB_HOST') ? getenv('DB_HOST') : "sql12.freesqldatabase.com";
    $userName = getenv('DB_USERNAME') ? getenv('DB_USERNAME') : "sql12776325";
    $password = getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : "UAi6ThSKQZ";
    $dbName = getenv('DB_NAME') ? getenv('DB_NAME') : "sql12776325";
    $dbPort = getenv('DB_PORT') ? getenv('DB_PORT') : 3306;

    // Log database connection parameters (without password)
    error_log("DB Connection Attempt - Host: " . $serverName . ", Port: " . $dbPort . ", Database: " . $dbName . ", Username: " . $userName);
    error_log("DB Environment Variables - DB_HOST: " . (getenv('DB_HOST') ? 'SET' : 'NOT SET') . ", DB_USERNAME: " . (getenv('DB_USERNAME') ? 'SET' : 'NOT SET') . ", DB_NAME: " . (getenv('DB_NAME') ? 'SET' : 'NOT SET') . ", DB_PORT: " . (getenv('DB_PORT') ? 'SET' : 'NOT SET'));

    $conn = mysqli_connect($serverName, $userName, $password, $dbName, $dbPort);
    if (!$conn)
    {
        $error_msg = "Connection failed: " . mysqli_connect_error();
        error_log("DB Connection ERROR: " . $error_msg);
        error_log("DB Connection Details - Host: " . $serverName . ", Port: " . $dbPort . ", Database: " . $dbName);
        die($error_msg);
    }
    else
    {
        error_log("DB Connection SUCCESS - Connected to database: " . $dbName . " on " . $serverName . ":" . $dbPort);
        error_log("DB Connection Info - Server Info: " . mysqli_get_server_info($conn));
    }

?>
