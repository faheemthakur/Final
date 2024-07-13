<?php

include_once 'connection.php';

$content_id= $_POST['content_id'];
$db = mysqli_connect("localhost", "root", "", "learnsync");
    $results = mysqli_query($db, "SELECT * FROM content_sharing where id= $content_id");
$rows = mysqli_fetch_array($results);

$likes_old=$rows['likes'];
$likes=$likes_old+1;


$sql = "UPDATE content_sharing SET likes =$likes  WHERE id = $content_id;" ;
mysqli_query($conn , $sql);



header("Location: CommentPg11.php?id=$content_id&mod_is=0");

?> 