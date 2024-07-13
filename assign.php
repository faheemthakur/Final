<?php

include_once 'connection.php';

$msg="";

	$image= $_FILES['image']['name'];
$target = "images/".basename($_FILES['image']['name']);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
	$img_size = $_FILES['image']['size'];
	if ($img_size > 1048576) {
			$em = "Sorry, your file is too large.";
		    header("Location: NoteSharing.php?error=$em");
		}
    else
    {
$username=$_POST['username'];
$title= $_POST['title'];
$description= $_POST['description'];
$subject= $_POST['subject'];
$mod= $_POST['mod'];





$sql = "INSERT INTO notes_table (username,user_title,description,subject,  user_image) VALUES ('$username' ,'$title' ,'$description' ,'$subject' , '$image')" ;
mysqli_query($conn , $sql);



header("Location: NoteSharing2.php?mod=$mod");
}
?> 