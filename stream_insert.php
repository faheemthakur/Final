<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";

// Extracting POST data
$roomID = $_POST['roomName'];
$f_uname = $_SESSION['f_uname'];

// Establishing a connection to the database
$conn = new mysqli("localhost", "root", "", "learnsync");

// Checking the connection
if ($conn->connect_error) {
    die("Failed to connect : " . $conn->connect_error);
} else {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO streams(`Name`, `Room_name`) VALUES (?, ?)");

    // Check if room name already exists
    $check_stmt = $conn->prepare("SELECT Room_name FROM streams WHERE Room_name = ?");
    $check_stmt->bind_param("s", $roomID);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Error: Room name already exists";
    } else {
        $stmt->bind_param("ss", $f_uname, $roomID);
        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
    $check_stmt->close();
    $conn->close();
}
?>