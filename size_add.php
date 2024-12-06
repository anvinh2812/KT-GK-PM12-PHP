<?php
    session_start();
	if (!isset($_SESSION["size_error"])){
		$_SESSION["size_error"]="";
	}
	require_once("connect.php");
	$result=$conn->query("SELECT * FROM 0209266_size_31"); // Đảm bảo 'size' là tên chính xác của bảng
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Size Add</title>
</head>
<body>
    <h1 align="center">Add Size</h1>
    <center>
        <font color="red">
            <?php echo $_SESSION["size_add_error"]; ?>
        </font>
    </center>
    <form action="size_add_action.php" method="POST">
        <table border="0" cellspacing="5" cellpadding="5" align="center">
            <tr>
                <td>Size Name:</td>
                <td><input type="text" name="txtSizename"></td>
            </tr>
            <tr>
                <td>Size Status:</td>
                <td>
                    <input type="radio" name="rdSizestatus" value="1" checked>Hoạt động
                    <input type="radio" name="rdSizestatus" value="0">Ngừng hoạt động
                </td>
            </tr>
            <tr>
                <td align="right">
                    <input type="submit" value="Gửi đi">
                </td>
                <td><input type="reset" value="Hủy bỏ"></td>
            </tr>
        </table>
    </form>
</body>
</html>
