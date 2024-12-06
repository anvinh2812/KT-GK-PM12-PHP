<?php
    session_start();
    require_once("connect.php");
    $sizeid = $_GET["sizeid"];
   
    $sql = "SELECT * FROM 0209266_size_31 WHERE sizeid=" . $sizeid;
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $_SESSION["size_error"] = "Dữ liệu không tồn tại!";
        header("Location: size_view.php");
        exit();
    } else {
        $row = $result->fetch_assoc();
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Size Edit</title>
</head>
<body>
    <h1 align="center">Edit Size</h1>
    <center>
        <font color="red">
            <?php echo $_SESSION["size_edit_error"]; ?>
        </font>
    </center>
    <form action="size_edit_action.php" method="POST">
        <table border="0" cellspacing="5" cellpadding="5" align="center">
            <tr>
                <td>Size Name:</td>
                <td><input type="text" name="txtSizename" value="<?php echo $row["sizename"]; ?>"></td>
            </tr>
            <tr>
                <td>Size Status:</td>
                <td>
                    <input type="radio" name="rdSizestatus" value="1" <?php if ($row["sizestatus"] == 1) echo "checked"; ?>>Hoạt động
                    <input type="radio" name="rdSizestatus" value="0" <?php if ($row["sizestatus"] == 0) echo "checked"; ?>>Ngừng hoạt động
                </td>
            </tr>
            <tr>
                <td align="right">
                    <input type="submit" value="Cập nhật">
                    <input type="hidden" value="<?php echo $row["sizeid"]; ?>" name="sizeid">
                </td>
                <td><input type="reset" value="Hủy bỏ"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    $conn->close();
    $_SESSION["size_edit_error"] = "";
?>
