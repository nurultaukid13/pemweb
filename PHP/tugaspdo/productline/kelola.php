<?php
include '../main/koneksi.php';

$productline = '';
$textdescription = '';
$htmldescription = '';
$image = '';

if(isset($_GET['ubah'])){
    $productline = $_GET['ubah'];
    $query = "SELECT * FROM productlines WHERE productLine = :productline;";
    $stmt = koneksi_db()->prepare($query);
    $stmt->bindParam(':productline', $productline);
    $stmt->execute();
    $result = $stmt->fetch();

    $productline = $result['productLine'];
    $textdescription = $result['textDescription'];
    $htmldescription = $result['htmlDescription'];
    $image = $result['image'];
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
            <label for="productLine">
                Product Line
            </label>
            <input required type="text" name="productline" id="productline"
                placeholder="Masukkan Product Line" value="<?php echo $productline; ?>">
            <label for="textDescription">
                Text Description
            </label>
            <input type="text" name="textdescription" id="textdescription"
                placeholder="Masukkan Text Description" value="<?php echo $textdescription; ?>">
            <label for="htmlDescription">
                HTML Description
            </label>
            <input type="text" name="htmldescription" id="htmldescription"
                placeholder="Masukkan HTML Description" value="<?php echo $htmldescription; ?>">
            <label for="image">
                Image
            </label>
            <input <?php if (!isset($_GET['ubah'])) {
                echo "required";
            } ?> class="custom-file-upload" type="file"
                name="image" id="image" accept="image/*">
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
            <a href="../main/productline.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>