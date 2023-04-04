<?php
include '../main/koneksi.php';

$id_bus = '';
$plat = '';
$status = '';

if (isset($_GET['ubah'])) {
    $id_bus = $_GET['ubah'];
    $query = "SELECT * FROM bus WHERE id_bus = '$id_bus';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $id_bus = $result['id_bus'];
    $plat = $result['plat'];
    $status= $result['status'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>bus</title>
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
            <label for="id_bus">
                ID Bus
            </label>
            <input required type="text" name="id_bus" id="id_bus" placeholder="Cth: 22(tidak boleh sama)"
                value="<?php echo $id_bus; ?>" <?php if (isset($_GET['ubah'])) { echo "disabled";} ?> >
            <label for="plat">
                Plat
            </label>
            <input type="text" name="plat" id="plat" placeholder="Masukkan Plat Bus"
                value="<?php echo $plat; ?>">
            <label for="status">
                Status
            </label>
            <input type="text" name="status" id="status" placeholder="Masukkan Status"
                value="<?php echo $status; ?>">
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
            <a href="../main/bus.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>