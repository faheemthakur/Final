<?php

include_once 'connection.php';



$username=$_POST['username'];
$description= $_POST['description'];
$type="text";


$sql = "INSERT INTO content_sharing (username,description,type) VALUES ('$username' ,'$description','$type')" ;
mysqli_query($conn , $sql);



header("Location: index2.php?signup=success");
?> 