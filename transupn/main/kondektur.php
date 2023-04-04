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
    <title>Kondektur</title>
</head>

<body>
    <nav>
        <div class="buttonposition">
            <a href="../kondektur/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Trans UPN</h2>
        <ul>
            <li><a href="bus.php">Bus</a></li>
            <li><a href="driver.php">Driver</a></li>
            <li><a href="#">Kondektur</a></li>
            <li><a href="trans_upn.php">Trans UPN</a></li>
            <li><a href="../kondektur/gaji.php">Gaji Kondektur</a></li>
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
                <th>ID Kondektur</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM kondektur";
                $result = mysqli_query(koneksi_db(), $query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <td>
                            <?php echo $row['id_kondektur']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama']; ?>
                        </td>
                        <td>
                            <a href="../kondektur/kelola.php?ubah=<?php echo $row['id_kondektur']; ?>" type="button"
                                class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../kondektur/proses.php?hapus=<?php echo $row['id_kondektur']; ?>" type="button"
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