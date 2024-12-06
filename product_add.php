<?php 
	session_start();
	if (!isset($_SESSION["product_add_error"])){
		$_SESSION["product_add_error"]="";
	}
	
	require_once("connect.php"); // Assuming this file contains your database connection information
	$categories_result = $conn->query("SELECT * FROM 0209266_categories_31");
	$suppliers_result = $conn->query("SELECT * FROM 0209266_supplier_31"); // Thêm truy vấn lấy danh sách nhà cung cấp
	$sizes_result = $conn->query("SELECT * FROM 0209266_size_31"); // Thêm truy vấn lấy danh sách kích thước
	$conn->close();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Product Add</title>
	</head>
	<body>
		<h1 align=center>Add new product</h1>
		<center><font color=red><?php echo $_SESSION["product_add_error"];?></font></center>
		<form method=POST action="product_add_action.php">
			<table border=0 align=center width=400>
				<tr>
					<td>Product Name:</td>
					<td><input style="width:180px" type=text name=txtPname></td>
				</tr>
				<tr>
					<td>Product Description:</td>
					<td><textarea cols=20 style="width:180px" rows=6 name=taPdesc></textarea></td>
				</tr>
				<tr>
					<td>Product Image:</td>
					<td><input type=text  style="width:180px" name=txtPimage></td>
				</tr>
				<tr>
					<td>Product Order:</td>
					<td><input type=text style="width:180px" name=txtPorder></td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<select style="width:180px" name="selCategory">
							<?php while ($category = $categories_result->fetch_assoc()): ?>
								<option value="<?php echo $category['cid']; ?>"><?php echo $category['cname']; ?></option>
							<?php endwhile; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Supplier:</td>
					<td>
						<select style="width:180px" name="selSupplier">
							<?php while ($supplier = $suppliers_result->fetch_assoc()): ?>
								<option value="<?php echo $supplier['sid']; ?>"><?php echo $supplier['sname']; ?></option>
							<?php endwhile; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Size:</td>
					<td>
						<select style="width:180px" name="selSize">
							<?php while ($size = $sizes_result->fetch_assoc()): ?>
								<option value="<?php echo $size['sizeid']; ?>"><?php echo $size['sizename']; ?></option>
							<?php endwhile; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Product Status:</td>
					<td>
						<input type=radio checked name=rdPstatus value=1>Active
						<input type=radio name=rdPstatus value=0>Inactive
					</td>
				</tr>
				<tr>
					<td>Product Insert Date:</td>
					<td><input style="width:180px" type="date" name="txtPinsertdate"></td>
				</tr>
				<tr>
					<td>Product Update Date:</td>
					<td><input style="width:180px" type="date" name="txtPupdatedate"></td>
				</tr>
				<tr>
					<td>Product Price:</td>
					<td><input style="width:180px" type="text" name="txtPprice"></td>
				</tr>
				<tr>
					<td>Product Quantity:</td>
					<td><input style="width:180px" type="text" name="txtPquantity"></td>
				</tr>
				<tr>
					<td align=right><input type=submit value="Add new"></td>
					<td><input type=reset value="Reset"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php 
	$_SESSION["product_add_error"]="";
?>
