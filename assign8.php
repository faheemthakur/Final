<?php

include_once 'connection.php';


$user_name=$_GET['user_name'];
$id=$_GET['id'];



$sqll = "DELETE FROM comments WHERE comment_id='$id'"; 
mysqli_query($conn , $sqll);

$sql = "DELETE FROM content_sharing WHERE id='$id'"; 
mysqli_query($conn , $sql);



header("Location: ProfilePage.php?user_name=$user_name");

?> 