<?php

include_once 'connection.php';



$user_name= $_POST['user_name'];
$name=$_POST['p_name'];
$image= $_FILES['myfile']['name'];
$target = "profile_pics/".$_FILES['myfile']['name'];
	if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}


$sql = "UPDATE registration SET name = '$name', profile_photo= '$image' WHERE username = '$user_name'"; 
mysqli_query($conn , $sql);



header("Location: ProfilePage.php?user_name=$user_name");

?> 