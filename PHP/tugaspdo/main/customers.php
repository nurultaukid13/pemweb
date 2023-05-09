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
            <a href="../customers/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="productline.php">Productlines</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="product.php">Product</a></li>
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
                <th>Customer Number</th>
                <th>Customer Name</th>
                <th>Contact Last Name</th>
                <th>Contact First Name</th>
                <th>Phone</th>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Sales Rep Employee Number</th>
                <th>Credit Limit</th>
                <th>Aksi</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                $query = "SELECT * FROM customers";
                $result = koneksi_db()->query($query);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <td>
                            <?php echo $row['customerNumber']; ?>
                        </td>
                        <td>
                            <?php echo $row['customerName']; ?>
                        </td>
                        <td>
                            <?php echo $row['contactLastName']; ?>
                        </td>
                        <td>
                            <?php echo $row['contactFirstName']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                        <td>
                            <?php echo $row['addressLine1']; ?>
                        </td>
                        <td>
                            <?php echo $row['addressLine2']; ?>
                        </td>
                        <td>
                            <?php echo $row['city']; ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        <td>
                            <?php echo $row['postalCode']; ?>
                        </td>
                        <td>
                            <?php echo $row['country']; ?>
                        </td>
                        <td>
                            <?php echo $row['salesRepEmployeeNumber']; ?>
                        </td>
                        <td>
                            <?php echo $row['creditLimit']; ?>
                        </td>
                        <td>
                            <a href="../customers/kelola.php?ubah=<?php echo $row['customerNumber']; ?>" type="button"
                                class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../customers/proses.php?hapus=<?php echo $row['customerNumber']; ?>" type="button"
                                class="btn_hapus">
                                <i>Hapus</i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                } else {
                    echo "Data tidak ada";
                }
                ?>
        </tbody>
    </table>
</body>

</html>