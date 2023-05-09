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
            <a href="../productline/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="#">Productlines</a></li>
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
                <th>Product Line</th>
                <th>Text Description</th>
                <th>HTML Description</th>
                <th>image</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $query = "SELECT * FROM productlines";
                $result = koneksi_db()->query($query);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <td>
                            <?php echo $row['productLine']; ?>
                        </td>
                        <td>
                            <?php echo $row['textDescription']; ?>
                        </td>
                        <td>
                            <?php echo $row['htmlDescription']; ?>
                        </td>
                        <td>
                            <?php
                                if($row['image'!=NULL]){
                                    $image = base64_encode($row['image']);
                                    echo '<img src="data:image/jpeg;base64,'.$image.'"/>';
                                }else{
                                    echo $row['image'];
                                }
                            ?>
                        </td>

                        <td>
                            <a href="../productline/kelola.php?ubah=<?php echo $row['productLine']; ?>" type="button" class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../productline/proses.php?hapus=<?php echo $row['productLine']; ?>" type="button" class="btn_hapus">
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