<?php
session_start();
include("mysql.php");
if(isset($_POST["submit"]))
{
	$tablename = $_SESSION["tablename"];
	$id = $_POST["id"];
	$sql = "DELETE FROM $tablename WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		echo "Success";
	}else{
		echo mysqli_error($conn);
	}
}

header('Location: post.php');
?>