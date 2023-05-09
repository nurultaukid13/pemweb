<?php
include '../main/koneksi.php';

$productcode = '';
$productname = '';
$productline = '';
$productscale = '';
$productvendor = '';
$productdescription = '';
$quantityinstock = '';
$buyprice = '';
$msrp = '';

if(isset($_GET['ubah'])){
    $productcode = $_GET['ubah'];
    $query = "SELECT * FROM products WHERE productCode = :productcode;";
    $stmt = koneksi_db()->prepare($query);
    $stmt->bindParam(':productcode', $productcode);
    $stmt->execute();
    $result = $stmt->fetch();

    $productcode = $result['productCode'];
    $productname = $result['productName'];
    $productline = $result['productLine'];
    $productscale = $result['productScale'];
    $productvendor = $result['productVendor'];
    $productdescription = $result['productDescription'];
    $quantityinstock = $result['quantityInStock'];
    $buyprice = $result['buyPrice'];
    $msrp = $result['MSRP'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Classic Models</title>
</head>

<body>
    <nav>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="../main/employees.php">Employees</a></li>
            <li><a href="../main/productline.php">Productlines</a></li>
            <li><a href="../main/customers.php">Customers</a></li>
            <li><a href="../main/product.php">Product</a></li>
        </ul>
    </nav>

    <div style="height:100px"></div>

    <div class="contentambah">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <label for="productcode">
                Product Code
            </label>
            <input required type="text" name="productcode" id="productcode"
                placeholder="Cth: S12_1989" value="<?php echo $productcode; ?>">
            <label for="productname">
                Product Name
            </label>
            <input type="text" name="productname" id="productname"
                placeholder="Masukkan Product Name" value="<?php echo $productname; ?>">
            <label for="producline">
                Product Line
            </label>
            <input type="text" name="productline" id="productline"
                placeholder="Masukkan Product Line" value="<?php echo $productline; ?>">
            <label for="productscale">
                Product Scale
            </label>
            <input type="text" name="productscale" id="productscale"
                placeholder="Cth: 1:10" value="<?php echo $productscale; ?>">
            <label for="productvendor">
                Product Vendor
            </label>
            <input type="text" name="productvendor" id="productvendor"
                placeholder="Masukkan Product vendor" value="<?php echo $productvendor; ?>">
            <label for="productdescription">
                Product description
            </label>
            <input type="text" name="productdescription" id="productdescription"
                placeholder="Masukkan Product description" value="<?php echo $productdescription; ?>">
            <label for="quantityinstock">
                Quantity In Stock
            </label>
            <input type="text" name="quantityinstock" id="quantityinstock"
                placeholder="Cth: 7820" value="<?php echo $quantityinstock; ?>">
            <label for="buyprice">
                Buy Price
            </label>
            <input type="text" name="buyprice" id="buyprice"
                placeholder="Cth: 89.22" value="<?php echo $buyprice; ?>">
            <label for="msrp">
                MSRP
            </label>
            <input type="text" name="msrp" id="msrp"
                placeholder="Cth: 98.70" value="<?php echo $msrp; ?>">
            <?php
            if (isset($_GET['ubah'])) {
                ?>
                <button type="submit" name="aksi" value="edit">
                    <i aria-hidden="true"></i>
                    Simpan Perubahan
                </button>
                <?php
            } else {
                ?>
                <button type="submit" name="aksi" value="add">
                    <i aria-hidden="true"></i>
                    Tambahkan
                </button>
                <?php
            }
            ?>
            <a href="../main/product.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>