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
    <title>Driver</title>
</head>

<body>
    <nav>
        <div class="buttonposition">
            <a href="../driver/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Trans UPN</h2>
        <ul>
            <li><a href="bus.php">Bus</a></li>
            <li><a href="#">Driver</a></li>
            <li><a href="kondektur.php">Kondektur</a></li>
            <li><a href="trans_upn.php">Trans UPN</a></li>
            <li><a href="../driver/gaji.php">Gaji Driver</a></li>
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
                <th>ID Driver</th>
                <th>Nama</th>
                <th>No SIM</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM driver";
                $result = mysqli_query(koneksi_db(), $query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <td>
                            <?php echo $row['id_driver']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama']; ?>
                        </td>
                        <td>
                            <?php echo $row['no_sim']; ?>
                        </td>
                        <td>
                            <?php echo $row['alamat']; ?>
                        </td>
                        <td>
                            <a href="../driver/kelola.php?ubah=<?php echo $row['id_driver']; ?>" type="button"
                                class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../driver/proses.php?hapus=<?php echo $row['id_driver']; ?>" type="button"
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