<?php
$con = mysqli_connect("localhost","root","","learnsync");
if($con->connect_error)
{
    die("Failed to connect : ".$con->connect_error);
}
$Room_name=$_GET['Room_name'];
$query = "DELETE FROM streams WHERE Room_name='$Room_name'";
$data=mysqli_query($con,$query);
if($data)
{
    echo"Deleted Successfully";
}
else
{
    echo"Deleted Failed to be deleted";
}
?>