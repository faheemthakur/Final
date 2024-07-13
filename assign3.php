<?php

include_once 'connection.php';



$content_id= $_POST['content_id'];
$comment=$_POST['description'];
$name=$_POST['comment_author'];



$sql = "INSERT INTO comments (comment_id,comment,comment_author) VALUES ('$content_id' ,'$comment','$name')" ;
mysqli_query($conn , $sql);



header("Location: CommentPg1.php?id=$content_id&mod_is=0");

?> 