<?php
include('koneksi.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Classic Model</title>
</head>

<body>
    <nav>
        <div class="buttonposition">
            <a href="../product/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="productline.php">Productlines</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="#">Product</a></li>
        </ul>
    </nav>

    <div style="height:50px"></div>

    <?php
    if (isset($_SESSION['eksekusi'])) {
        echo '<div class="alert-success">';
        echo $_SESSION['eksekusi'];

        // Hapus pesan dari session
        unset($_SESSION['eksekusi']);
        echo '</div>';
        session_destroy();
    }
    ;
    ?>

    <table>
        <thead>
            <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Line</th>
                    <th>Product Sclae</th>
                    <th>Product Vendor</th>
                    <th>Product Description</th>
                    <th>Quantity In Stock</th>
                    <th>Buy Price</th>
                    <th>MSRP</th>
                    <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                $query = "SELECT * FROM products";
                $result = mysqli_query(koneksi_db(), $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['productCode']; ?>
                            </td>
                            <td>
                                <?php echo $row['productName']; ?>
                            </td>
                            <td>
                                <?php echo $row['productLine']; ?>
                            </td>
                            <td>
                                <?php echo $row['productScale']; ?>
                            </td>
                            <td>
                                <?php echo $row['productVendor']; ?>
                            </td>
                            <td>
                                <?php echo $row['productDescription']; ?>
                            </td>
                            <td>
                                <?php echo $row['quantityInStock']; ?>
                            </td>
                            <td>
                                <?php echo $row['buyPrice']; ?>
                            </td>
                            <td>
                                <?php echo $row['MSRP']; ?>
                            </td>
                        <td>
                            <a href="../product/kelola.php?ubah=<?php echo $row['productCode']; ?>" type="button" class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../product/proses.php?hapus=<?php echo $row['producCode']; ?>" type="button"
                                class="btn_hapus">
                                <i>Hapus</i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Data tidak ada";
                }
                mysqli_close(koneksi_db());
                ?>
        </tbody>
    </table>
</body>

</html>