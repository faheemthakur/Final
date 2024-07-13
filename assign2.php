<?php

include_once 'connection.php';
$image= $_FILES['image']['name'];
$target = "files/".basename($_FILES['image']['name']);
$img_size = $_FILES['image']['size'];
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
$username=$_POST['username'];
$description= $_POST['description'];

$fileExt=explode('.',$image);
$fileActualExt=strtolower(end($fileExt));
$allowed=array('mp4','mov','AVI','WMV','AVCHD');
if ($img_size > 10000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: NoteSharing.php?error=$em");
		}
    else
    {
if(in_array($fileActualExt,$allowed)){
	$type="video";
}else{
	$type="photo";
}
$sql = "INSERT INTO content_sharing (username,description,type,address) VALUES ('$username' ,'$description','$type','$image')" ;
mysqli_query($conn , $sql);

	}

header("Location: index2.php?signup=success");

?> 