<?php
/**
 * Database Setup Script for Wasmer.io
 * 
 * This script automatically creates all required tables in your Wasmer.io database.
 * Run this once after deployment by visiting: https://your-app.wasmer.app/setup_database.php
 * 
 * SECURITY: Delete this file after setup is complete!
 */

require 'db.php';

// Security: Only allow this to run in development or with a secret key
// Uncomment the line below and set a secret key for production
// if (!isset($_GET['key']) || $_GET['key'] !== 'YOUR_SECRET_KEY_HERE') {
//     die('Access denied');
// }

$sql_file = 'agroculture_wasmer.sql';

if (!file_exists($sql_file)) {
    die("Error: SQL file '$sql_file' not found. Please ensure agroculture_wasmer.sql exists in the root directory.");
}

// Read the SQL file
$sql_content = file_get_contents($sql_file);

// Remove comments and split by semicolon
$sql_content = preg_replace('/--.*$/m', '', $sql_content); // Remove single-line comments
$sql_content = preg_replace('/\/\*.*?\*\//s', '', $sql_content); // Remove multi-line comments
$sql_content = preg_replace('/^USE.*$/m', '', $sql_content); // Remove USE database statements

// Split into individual statements
$statements = array_filter(
    array_map('trim', explode(';', $sql_content)),
    function($stmt) {
        return !empty($stmt) && strlen($stmt) > 10;
    }
);

$success_count = 0;
$error_count = 0;
$errors = [];

echo "<!DOCTYPE html>
<html>
<head>
    <title>Database Setup</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Database Setup for Agroculture</h1>
    <p class='info'>Setting up database tables...</p>
    <hr>";

foreach ($statements as $statement) {
    $statement = trim($statement);
    if (empty($statement)) continue;
    
    // Skip SET statements that might cause issues
    if (preg_match('/^SET\s+/i', $statement)) {
        continue;
    }
    
    if (mysqli_query($conn, $statement)) {
        $success_count++;
        echo "<p class='success'>✓ Executed successfully</p>";
    } else {
        $error_count++;
        $error_msg = mysqli_error($conn);
        // Ignore "table already exists" errors
        if (strpos($error_msg, 'already exists') !== false) {
            echo "<p class='info'>ℹ Table already exists (skipped)</p>";
            $error_count--; // Don't count this as an error
        } 
        // Ignore foreign key constraint errors (constraint might already exist or be incorrect)
        elseif (strpos($error_msg, 'foreign key') !== false || strpos($error_msg, 'constraint') !== false) {
            echo "<p class='info'>ℹ Constraint issue (may need to run fix_database.php): " . htmlspecialchars($error_msg) . "</p>";
            $error_count--; // Don't count this as an error for now
        } else {
            $errors[] = $error_msg;
            echo "<p class='error'>✗ Error: " . htmlspecialchars($error_msg) . "</p>";
            echo "<pre>" . htmlspecialchars(substr($statement, 0, 200)) . "...</pre>";
        }
    }
}

echo "<hr>";
echo "<h2>Setup Complete!</h2>";
echo "<p><strong>Successful operations:</strong> $success_count</p>";
echo "<p><strong>Errors:</strong> $error_count</p>";

if ($error_count > 0 && !empty($errors)) {
    echo "<h3>Error Details:</h3>";
    echo "<pre>" . htmlspecialchars(implode("\n", array_unique($errors))) . "</pre>";
}

echo "<p class='info'><strong>⚠️ IMPORTANT:</strong> Delete this file (setup_database.php) after setup is complete for security!</p>";
echo "<p><a href='index.php'>Go to Homepage</a></p>";
echo "</body></html>";

mysqli_close($conn);
?>

