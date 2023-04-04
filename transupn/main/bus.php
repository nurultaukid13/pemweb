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
    <style>
        .merah {
            background-color: #ed6e6e;
        }

        .hijau {
            background-color: #8ced6e;
        }

        .kuning {
            background-color: #ede46e;
        }

        .atasan {
            display: flex;
            flex-direction: row;
        }

        .kotak {
            margin-left: 400px;
            height: 20px;
        }

        .form-group {
            margin-left: 20px;
        }
    </style>
    <title>Bus</title>
</head>

<body>
    <nav>
        <div class="buttonposition">
            <a href="../bus/kelola.php" type="button" class="button">
                <i>Tambahkan Data</i>
            </a>
        </div>
        <h2>Trans UPN</h2>
        <ul>
            <li><a href="#">Bus</a></li>
            <li><a href="driver.php">Driver</a></li>
            <li><a href="kondektur.php">Kondektur</a></li>
            <li><a href="trans_upn.php">Trans UPN</a></li>
        </ul>
    </nav>

    <div style="height:100px"></div>

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
                <th>ID Bus</th>
                <th>Plat</th>
                <th>Status</th>
                <th>Jumlah KM</th>
                <th>Aksi</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php
            //proses untuk filter data berdasarkan status bus
            $status = "";
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status == "semua") {
                    $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus";
                } else {
                    $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus WHERE status = '$status' GROUP BY bus.id_bus";
                }
            } else {
                $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus";
            }
            $result = mysqli_query(koneksi_db(), $query);
            ?>

            <div class="atasan">
                <form method="get">
                    <div class="form-group">
                        <label for="status">Filter status bus:</label>
                        <select class="form-control" id="status" name="status" onchange="this.form.submit()">
                            <option value="semua" <?php if ($status == 'semua')
                                echo 'selected="selected"'; ?>>Semua
                            </option>
                            <option value="0" <?php if ($status == '0')
                                echo 'selected="selected"'; ?>>0</option>
                            <option value="1" <?php if ($status == '1')
                                echo 'selected="selected"'; ?>>1</option>
                            <option value="2" <?php if ($status == '2')
                                echo 'selected="selected"'; ?>>2</option>
                        </select>
                    </div>
                </form>
                <div class="kotak">
                    <div style="background-color: red; width: 20px; height: 20px; display: inline-block;"></div>
                    <span style="display: inline-block; margin-right: 10px;">bus dalam perbaikan/rusak</span>
                    <div style="background-color: yellow; width: 20px; height: 20px; display: inline-block;"></div>
                    <span style="display: inline-block; margin-right: 10px;">bus cadangan</span>
                    <div style="background-color: green; width: 20px; height: 20px; display: inline-block;"></div>
                    <span style="display: inline-block; margin-right: 10px;">bus beroperasi / aktif</span>
                </div>
            </div>

            <?php

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr class="<?php echo $row['status'] == 1 ? 'hijau' : ($row['status'] == 2 ? 'kuning' : 'merah') ?>">
                        <td>
                            <?php echo $row['id_bus']; ?>
                        </td>
                        <td>
                            <?php echo $row['plat']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <?php if ($row['jumlah_km']) {
                                echo $row['jumlah_km'];
                            } else {
                                echo "0";
                            }
                            ; ?>
                        </td>
                        <td>
                            <a href="../bus/kelola.php?ubah=<?php echo $row['id_bus']; ?>" type="button" class="btn_edit">
                                <i>Edit</i>
                            </a>
                            <a href="../bus/proses.php?hapus=<?php echo $row['id_bus']; ?>" type="button" class="btn_hapus">
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