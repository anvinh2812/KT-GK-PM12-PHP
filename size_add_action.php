<?php
    require_once("connect.php");

    $sizename = $_POST["txtSizename"];
    $sizestatus = $_POST["rdSizestatus"];

    $check_sql = "SELECT * FROM 0209266_size_31 WHERE sizename LIKE '$sizename'";
    $check_result = $conn->query($check_sql);

    if ($check_result && $check_result->num_rows > 0) {
        session_start();
        $_SESSION["size_add_error"] = "Kích thước $sizename đã tồn tại!";
        header("Location: size_add.php");
    } else {
        $insert_sql = "INSERT INTO 0209266_size_31 (sizename, sizestatus) VALUES ('$sizename', $sizestatus)";
        $insert_result = $conn->query($insert_sql);

        if ($insert_result === TRUE) {
            session_start();
            $_SESSION["size_error"] = "Thêm mới thành công!";
            header("Location: size_view.php");
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }

    $conn->close();
?>
