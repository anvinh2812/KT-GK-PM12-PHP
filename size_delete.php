<?php
    session_start();
    require_once("connect.php");

    $sizeid = $_GET["sizeid"];

    $sql = "DELETE FROM 0209266_size_31 WHERE sizeid=$sizeid";
    $conn->query($sql);

    $conn->close();

    $_SESSION["size_error"] = "Xóa thành công!";
    header("Location: size_view.php");
    exit();
?>
