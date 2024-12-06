<?php
    session_start();
    require_once("connect.php");

    $sizeid = $_POST["sizeid"];
    $sizename = $_POST["txtSizename"];
    $sizestatus = $_POST["rdSizestatus"];

    $sql = "UPDATE 0209266_size_31 SET sizename='$sizename', sizestatus=$sizestatus WHERE sizeid = $sizeid";
    $conn->query($sql);

    $conn->close();

    $_SESSION["size_error"] = "Cập nhật thành công!";
    header("Location: size_view.php");
    exit();
?>
