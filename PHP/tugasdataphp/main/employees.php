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
            <a href="../employees/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="#">Employees</a></li>
            <li><a href="productline.php">Productlines</a></li>
            <li><a href="customers.php">Customers</a></li>
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
                <th>Employees Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Extension</th>
                <th>Email</th>
                <th>Office Code</th>
                <th>Reports To</th>
                <th>Job Tittle</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM employees";
                $result = mysqli_query(koneksi_db(), $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <tr>
                        <td>
                            <?php echo $row['employeeNumber']; ?>
                        </td>
                        <td>
                            <?php echo $row['lastName']; ?>
                        </td>
                        <td>
                            <?php echo $row['firstName']; ?>
                        </td>
                        <td>
                            <?php echo $row['extension']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['officeCode']; ?>
                        </td>
                        <td>
                            <?php echo $row['reportsTo']; ?>
                        </td>
                        <td>
                            <?php echo $row['jobTitle']; ?>
                        </td>
                        <td>
                            <a href="../employees/kelola.php?ubah=<?php echo $row['employeeNumber']; ?>" type="button"
                                class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../employees/proses.php?hapus=<?php echo $row['employeeNumber']; ?>" type="button"
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