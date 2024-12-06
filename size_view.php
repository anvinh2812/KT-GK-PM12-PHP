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
    <title>Size View</title>
    <style>
        table th, table td {
        text-align: center;
    }
    </style>
</head>
<body>
    <h1 align="center">View Size</h1>
    <center>
        <font color="red">
            <?php echo $_SESSION["size_error"]; ?>
        </font>
        <br>
        <a href="size_add.php">Add Size</a>
    </center>
    <table border="1" cellspacing="5" cellpadding="5" align="center">
        <tr>
            <th>Size ID</th>
            <th>Size Name</th>
            <th>Size Status</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
        <?php
            if(isset($size_error)){
                echo $size_error;
            } else {
                while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["sizeid"]; ?></td>
            <td><?php echo $row["sizename"]; ?></td>
            <td>
                <?php 
                    if ($row["sizestatus"] == 1) {
                        echo "Acitive";
                    } else {
                        echo "Inactive";
                    } 
                ?>
            </td>
            <td>
                <a href="size_edit.php?sizeid=<?php echo $row["sizeid"]; ?>">
                    <img src="images/b_edit.png" border="0">
                </a>
            </td>
            <td>
                <a href="size_delete.php?sizeid=<?php echo $row["sizeid"]; ?>">
                    <img src="images/b_drop.png" border="0">
                </a>
            </td>
        </tr>
        <?php 
                }
            }
        ?>
    </table>
    <center>
        <a href="size_add.php">Add Size</a>
    </center>
</body>
</html>
