<?php
	session_start();
	require_once("connect.php");

	$sid = $_GET["sid"];
	$sname = $_POST["txtSname"];
	$saddress = $_POST["txtSaddress"];
	$sphone = $_POST["txtSphone"];
	$stax = $_POST["nStax"];
	$rdstatus = $_POST["rdSstatus"];

	$sql = "SELECT * FROM 0209266_supplier_31 WHERE sname LIKE '$sname' AND sid <> $sid";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION["supplier_edit_error"] = "$sname already exists!";
		header("Location:supplier_edit.php?sid=$sid");
	} else {
		$sql = "UPDATE 0209266_supplier_31 SET
			sname='$sname',
			saddress='$saddress',
			sphone='$sphone',
			stax=$stax,
			sstatus=$rdstatus
			WHERE sid=$sid";
			
		$conn->query($sql) or die($conn->error);

		if ($conn->error == "") {
			$_SESSION["supplier_error"] = "Update Successful!";
			header("Location:supplier_view.php");
		} else {
			$_SESSION["supplier_edit_error"] = "Error updating data!";
			header("Location:supplier_edit.php?sid=$sid");
		}
	}

	$conn->close();
?>
