<?php
    include_once("connect.php");
    $hiddenKey = "66pm1_31";
    $categories_result = $conn->query("SELECT * FROM 0209266_categories_31");
    $suppliers_result = $conn->query("SELECT * FROM 0209266_supplier_31");
    $sizes_result = $conn->query("SELECT * FROM 0209266_size_31");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Search</title>
</head>
<body>
    <h1 align=center>Search Product</h1>
    <form method="POST" action="product_result.php">
        <table align=center width=400 cellspacing = 10px >
            <tr>
                <td>Product Name:</td>
                <td><input style="width:180px" type=text name=txtProductName></td>
            </tr>
            <tr>
                <td>Categories Name:</td>
                <td>
                    <select name=slCategory>
                        <?php while ($category = $categories_result->fetch_assoc()): ?>
                            <option value="<?php echo $category['cid']; ?>"><?php echo $category['cname']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Supplier Name:</td>
                <td>
                    <select name=slSupplier>
                        <?php while ($supplier = $suppliers_result->fetch_assoc()): ?>
                            <option value="<?php echo $supplier['sid']; ?>"><?php echo $supplier['sname']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Size Name:</td>
                <td>
                    <select name=slSize>
                        <?php while ($size = $sizes_result->fetch_assoc()): ?>
                            <option value="<?php echo $size['sizeid']; ?>"><?php echo $size['sizename']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="hidden" name="hiddenKey" value="<?php echo $hiddenKey; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tìm kiếm"></td>
            </tr>
        </table>
    </form>
</body>
</html>
