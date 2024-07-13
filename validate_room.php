<?php
session_start();
require "php/config.php"; // Include your database configuration file here

// Establish a database connection using mysqli
$conn = mysqli_connect("localhost", "root", "", "learnsync");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have a database connection established in config.php
// You need to replace 'your_table_name' with the actual name of your table
$roomName = $_POST['room'];

// Perform a database query to check if the room exists
$stmt = mysqli_prepare($conn, "SELECT * FROM streams WHERE Room_name = ?");
mysqli_stmt_bind_param($stmt, "s", $roomName);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Check if any rows were returned
if (mysqli_stmt_num_rows($stmt) > 0) {
    echo 'valid'; // Room exists
} else {
    echo 'invalid'; // Room does not exist
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>