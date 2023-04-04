<?php
include '../main/koneksi.php';

$id_driver = '';
$nama = '';
$no_sim = '';
$alamat = '';

if (isset($_GET['ubah'])) {
    $id_driver = $_GET['ubah'];
    $query = "SELECT * FROM driver WHERE id_driver = '$id_driver';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $id_driver = $result['id_driver'];
    $nama = $result['nama'];
    $no_sim= $result['no_sim'];
    $alamat= $result['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>driver</title>
</head>

<body>
    <nav>
        <h2>Trans UPN</h2>
        <ul>
            <li><a href="../main/bus.php">Bus</a></li>
            <li><a href="../main/driver.php">Driver</a></li>
            <li><a href="../main/kondektur.php">Kondektur</a></li>
            <li><a href="../main/trans_upn.php">Trans UPN</a></li>
        </ul>
    </nav>

    <div style="height:100px"></div>

    <div class="contentambah">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <label for="id_driver">
                ID Driver
            </label>
            <input required type="text" name="id_driver" id="id_driver" placeholder="Cth: 2(tidak boleh sama)"
                value="<?php echo $id_driver; ?>" <?php if (isset($_GET['ubah'])) { echo "disabled";} ?> >
            <label for="nama">
                Nama
            </label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Driver"
                value="<?php echo $nama; ?>">
            <label for="no_sim">
                No SIM
            </label>
            <input type="text" name="no_sim" id="no_sim" placeholder="Masukkan No SIM"
                value="<?php echo $no_sim; ?>">
            <label for="alamat">
                Alamat
            </label>
            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat"
                value="<?php echo $alamat; ?>">
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
            <a href="../main/driver.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>