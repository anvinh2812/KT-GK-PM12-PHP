<?php
    session_start();
	if (!isset($_SESSION["supplier_error"])){
		$_SESSION["supplier_error"]="";
	}
	require_once("connect.php");
	$result=$conn->query("SELECT * FROM 0209266_supplier_31"); // Đảm bảo 'supplier' là tên chính xác của bảng
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Supplier view</title>
        <style>
        table th, table td {
        text-align: center;
    }
    </style>
    </head>
    <body>
    <h1 align=center>Supplier List</h1>
		<center><font color=red><?php echo $_SESSION["supplier_error"];?></font>
		<br>
			<a href="supplier_add.php">Add new supplier</a>
		</center>
        <table border="1" cellspacing="5" cellpadding="5" align="center"> 
            <tr>
                <th>Supplier id</th>
                <th>Supplier name</th>
                <th>Supplier address</th>
                <th>Supplier phone</th>
                <th>Supplier tax</th>
                <th>Supplier status</th>
                <th>Edit</th>
				<th>Del</th>
            </tr>
			<?php
                while ($row=$result->fetch_assoc()) {
            ?>
			<tr>
                <td><?php echo $row["sid"]; ?></td>
                <td><?php echo $row["sname"];?></td>
                <td><?php echo $row["saddress"];?></td>
                <td><?php echo $row["sphone"];?></td>
                <td><?php echo $row["stax"];?></td>
                <td><?php if ($row["sstatus"]==1) echo "Active";
							else echo "Inactive";?></td>
                <td>
					<a href="supplier_edit.php?sid=<?php echo $row["sid"];?>">
						<img src="images/b_edit.png" border=0>
					</a>
				</td>
				<td>
					<a onclick="return confirm('Are you sure to delete <?php echo $row["sname"];?>?');" href="supplier_delete.php?sid=<?php echo $row["sid"];?>">
						<img src="images/b_drop.png" border=0>
					</a>
				</td>
            </tr>
            <?php 
				}
				$conn->close();
			?>
        </table>
    </body>
</html>