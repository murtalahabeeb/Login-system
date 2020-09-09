<?php
session_start();
include_once("dbconect2.php");
	$id=$_GET["id"];
	$query="DELETE FROM users where userid ='$id'";
	$submit=mysqli_query($conn,$query);
	if($submit){
		$_SESSION["mgs"]="delete successfull";
		header("Location:viewusers.php?delete=success");
		exit();
	}
	else{
		$_SESSION["mgs"]="delete successfull";
		header("Location:viewuser.php?delete=failed");
		exit();
	}

?>