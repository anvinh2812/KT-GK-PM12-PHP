<?php
    session_start();
    require_once("connect.php");

    $sname = $_POST["txtSname"];
    $saddress = $_POST["txtSaddress"];
    $sphone = $_POST["txtSphone"];
    $stax = $_POST["nStax"];
    $sstatus = $_POST["rdSstatus"];

    $sql = "select * from 0209266_supplier_31 where sname like '$sname'";
    if ($result->num_rows>0){
		$_SESSION["supplier_add_error"]="$cname adready exist!";
		header("Location:supplier_add.php");
	} else {
			$sql ="insert into 0209266_supplier_31(sname, saddress, sphone, stax, sstatus) values ('$sname','$saddress','$sphone',$stax,$sstatus)";
			$conn->query($sql) or die($conn->error);
			if ($conn->error==""){
				$_SESSION["supplier_error"] = "Update Successful!";
				header("Location:supplier_view.php");
			} else {
				$_SESSION["supplier_add_error"]="Error insert data!";
				header("Location:supplier_add.php");
			}
	}
?>