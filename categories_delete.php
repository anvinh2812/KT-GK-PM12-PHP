<?php
	session_start();
	require_once("connect.php"); //kết nối CSDL
	$cid = $_GET["cid"];
	$sql = "delete from 0209266_categories_31 where cid=$cid";
	$conn->query($sql) or die($conn->error);
	if ($conn->error==""){
		$_SESSION["categories_error"]="Delete successful!";
	} else {
		$_SESSION["categories_error"]="Delete fail!";
	}
	header("Location:categories_view.php");
?>