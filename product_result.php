<?php
include_once("connect.php");

$productName = $_POST["txtProductName"];
$category = $_POST["slCategory"];
$supplier = $_POST["slSupplier"];
$size = $_POST["slSize"];
$hiddenKey = $_POST["hiddenKey"];
$sql = "SELECT * FROM 0209266_product_31 WHERE pname LIKE '%$productName%'";
$result = $conn->query($sql);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Kết quả tìm kiếm sản phẩm</title>
    <style>
        table th, table td {
        text-align: center;
        width: 400px;
    }
    </style>
</head>
<body>
    <h1 align=center>Kết quả tìm kiếm sản phẩm</h1>
    <p align=center style="font-weight: bold;">Hidden Key: <?= $hiddenKey ?></p>

    <table border="1" width="800" align="center">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Image</th>
            <th>Categories Id</th>
            <th>Supplier Id</th>
            <th>Size Id</th>
            <th>Product Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sid = $row["sid"];
                $sizeid = $row["sizeid"];
                $cid = $row["cid"];

                $supplierResult = $conn->query("SELECT sname FROM 0209266_supplier_31 WHERE sid = $sid");
                $supplierInfo = $supplierResult->fetch_assoc();
                $supplierName = $supplierInfo["sname"];

                $sizeResult = $conn->query("SELECT sizename FROM 0209266_size_31 WHERE sizeid = $sizeid");
                $sizeInfo = $sizeResult->fetch_assoc();
                $sizeName = $sizeInfo["sizename"];

                $categoryResult = $conn->query("SELECT cname FROM 0209266_categories_31 WHERE cid = $cid");
                $categoryInfo = $categoryResult->fetch_assoc();
                $categoryName = $categoryInfo["cname"];
        ?>
                <tr>
                    <td><?= $row["pid"] ?></td>
                    <td><?= $row["pname"] ?></td>
                    <td><?= $row["pdesc"] ?></td>
                    <td><img src="images/<?php echo $row["pimage"];?>" width=200></td>
                    <td><?= $row["cid"] ?></td>
                    <td><?= $row["sid"] ?></td>
                    <td><?= $row["sizeid"] ?></td>
                    <td>
					<?php
					if ($row["pstatus"] == 1) {
						echo "Active";
					} else {
						echo "Inactive";
					}
					?>
				    </td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="8">Không tìm thấy sản phẩm nào thỏa mãn điều kiện tìm kiếm.</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
        $result = $conn->query($sql);
        mysqli_data_seek($result, 0);
    ?>
    <table border="1" width="800" align="center">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Image</th>
        <th>Categories Name</th>
        <th>Supplier Name</th>
        <th>Size Name</th>
        <th>product Status</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sid = $row["sid"];
            $sizeid = $row["sizeid"];
            $cid = $row["cid"];
            $supplierResult = $conn->query("SELECT sname FROM 0209266_supplier_31 WHERE sid = $sid");
            $supplierInfo = $supplierResult->fetch_assoc();
            $supplierName = $supplierInfo["sname"];

            $sizeResult = $conn->query("SELECT sizename FROM 0209266_size_31 WHERE sizeid = $sizeid");
            $sizeInfo = $sizeResult->fetch_assoc();
            $sizeName = $sizeInfo["sizename"];

            $categoryResult = $conn->query("SELECT cname FROM 0209266_categories_31 WHERE cid = $cid");
            $categoryInfo = $categoryResult->fetch_assoc();
            $categoryName = $categoryInfo["cname"];
    ?>
            <tr>
                <td><?= $row["pid"] ?></td>
                <td><?= $row["pname"] ?></td>
                <td><?= $row["pdesc"] ?></td>
                <td><img src="images/<?php echo $row["pimage"];?>" width=200></td>
                <td><?= $categoryName ?></td>
                <td><?= $supplierName ?></td>
                <td><?= $sizeName ?></td>
                <td>
                <?php
                if ($row["pstatus"] == 1) {
                    echo "Active";
                } else {
                    echo "Inactive";
                }
                ?>
                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="8">Không tìm thấy sản phẩm nào thỏa mãn điều kiện tìm kiếm.</td>
        </tr>
    <?php
    }
    $conn->close();
    ?>
</table>

</body>
</html>
