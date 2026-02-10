<?php
/**
 * Fix Database Constraints
 * 
 * This script removes the incorrect foreign key constraint from the buyer table.
 * Run this if you're getting foreign key constraint errors.
 * 
 * SECURITY: Delete this file after fixing the database!
 */

require 'db.php';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Fix Database Constraints</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Fix Database Constraints</h1>
    <p class='info'>Removing incorrect foreign key constraint from buyer table...</p>
    <hr>";

// Check if constraint exists and drop it
$sql = "SELECT CONSTRAINT_NAME 
        FROM information_schema.TABLE_CONSTRAINTS 
        WHERE TABLE_SCHEMA = DATABASE() 
        AND TABLE_NAME = 'buyer' 
        AND CONSTRAINT_NAME = 'buyer_ibfk_1'";

$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    // Constraint exists, drop it
    $drop_sql = "ALTER TABLE `buyer` DROP FOREIGN KEY `buyer_ibfk_1`";
    
    if (mysqli_query($conn, $drop_sql)) {
        echo "<p class='success'>✓ Successfully removed foreign key constraint 'buyer_ibfk_1'</p>";
    } else {
        echo "<p class='error'>✗ Error removing constraint: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p class='info'>ℹ Foreign key constraint 'buyer_ibfk_1' does not exist (already removed or never created)</p>";
}

echo "<hr>";
echo "<h2>Fix Complete!</h2>";
echo "<p class='info'><strong>⚠️ IMPORTANT:</strong> Delete this file (fix_database.php) after fixing the database for security!</p>";
echo "<p><a href='/index.php'>Go to Homepage</a></p>";
echo "</body></html>";

mysqli_close($conn);
?>

