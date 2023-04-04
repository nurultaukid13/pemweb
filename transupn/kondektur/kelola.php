<?php
include '../main/koneksi.php';

$id_kondektur = '';
$nama = '';

if (isset($_GET['ubah'])) {
    $id_kondektur = $_GET['ubah'];
    $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $id_kondektur = $result['id_kondektur'];
    $nama = $result['nama'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>kondektur</title>
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
            <label for="id_kondektur">
                ID Kondektur
            </label>
            <input required type="text" name="id_kondektur" id="id_kondektur" placeholder="Cth: 12(tidak boleh sama)"
                value="<?php echo $id_kondektur; ?>" <?php if (isset($_GET['ubah'])) { echo "disabled";} ?> >
            <label for="nama">
                Nama
            </label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Kondektur"
                value="<?php echo $nama; ?>">
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
            <a href="../main/kondektur.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>