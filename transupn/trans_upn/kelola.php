<?php
include '../main/koneksi.php';

$id_trans_upn = '';
$id_kondektur = '';
$id_bus = '';
$id_driver = '';
$jumlah_km = '';
$tanggal = '';

if (isset($_GET['ubah'])) {
    $id_trans_upn = $_GET['ubah'];
    $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $id_trans_upn = $result['id_trans_upn'];
    $id_kondektur = $result['id_kondektur'];
    $id_bus = $result['id_bus'];
    $id_driver = $result['id_driver'];
    $jumlah_km = $result['jumlah_km'];
    $tanggal = $result['tanggal'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>TransUPN</title>
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
            <label for="id_trans_upn">
                ID Trans UPN
            </label>
            <input required type="text" name="id_trans_upn" id="id_trans_upn" placeholder="Cth: 1(tidak boleh sama)"
                value="<?php echo $id_trans_upn; ?>" <?php if (isset($_GET['ubah'])) { echo "disabled";} ?> >
            <label for="id_kondektur">
                ID Kondektur
            </label>
            <input type="text" name="id_kondektur" id="id_kondektur" placeholder="Cth: 3(harus sama dengan tabel utama)"
                value="<?php echo $id_kondektur; ?>">
            <label for="id_bus">
                ID Bus
            </label>
            <input type="text" name="id_bus" id="id_bus" placeholder="Cth: 5(harus sama dengan tabel utama)"
                value="<?php echo $id_bus; ?>">
            <label for="id_driver">
                ID Driver
            </label>
            <input type="text" name="id_driver" id="id_driver" placeholder="Cth: 18(harus sama dengan tabel utama)"
                value="<?php echo $id_driver; ?>">
            <label for="jumlah_km">
                Jumlah KM
            </label>
            <input type="text" name="jumlah_km" id="jumlah_km" placeholder="Masukkan Jumlah KM"
                value="<?php echo $jumlah_km; ?>">
            <label for="tanggal">
                Tanggal
            </label>
            <input type="text" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal (yyyy-mm-dd)"
                value="<?php echo $tanggal; ?>">
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
            <a href="../main/trans_upn.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>