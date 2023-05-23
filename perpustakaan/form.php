<?php
$kodebuku = '';
$judul = '';
$pengarang = '';
$penerbit = '';
$tahunTerbit = '';
$cover = '';

if (isset($_GET['kode'])) {
    $kodebuku = $_GET['kode'];

    //mengambil data buku berdasarkan kode
    $file_name = 'buku.txt';
    if (file_exists($file_name)) {
        $read = file($file_name);
        foreach ($read as $buku) {
            $bukuinfo = explode('-', $buku);
            if ($bukuinfo[0] === $kodebuku) {
                $judul = $bukuinfo[1];
                $pengarang = $bukuinfo[2];
                $penerbit = $bukuinfo[3];
                $tahunterbit = $bukuinfo[4];
                $cover = $bukuinfo[5];
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Buku</title>
</head>

<body>
    <nav>
        <h2>Tambah Data Buku</h2>
    </nav>

    <div style="height:100px"></div>

    <div class="contentambah">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <?php
            if (!isset($_GET['kode'])) {
                echo '<label for="kode">Kode Buku</label>';
            }
            ?>
            <input type="text" name="kode" value="<?php echo $kodebuku; ?>" <?php if (isset($_GET['kode'])){ echo "hidden";} ?> placeholder="Masukkan Kode Buku">
            <label for="judul">
                Judul
            </label>
            <input required type="text" name="judul" id="judul" placeholder="Masukkan Judul"
                value="<?php echo $judul; ?>" required>
            <label for="pengarang">
                Pengarang
            </label>
            <input type="text" name="pengarang" id="pengarang" placeholder="Masukkan Pengarang"
                value="<?php echo $pengarang; ?>">
            <label for="penerbit">
                Penerbit
            </label>
            <input type="text" name="penerbit" id="penerbit" placeholder="Masukkan Penerbit"
                value="<?php echo $penerbit; ?>">
            <label for="tahunterbit">
                Tahun Terbit
            </label>
            <input type="text" name="tahunterbit" id="tahunterbit" placeholder="Masukkan Tahun Terbit"
                value="<?php echo $tahunterbit; ?>">
            <label for="cover">Cover Buku</label>
            <?php if (isset($_GET['kode'])): ?>
                <input type="hidden" name="existing_cover" value="<?php echo $cover; ?>">
                <?php if (!empty($cover)): ?>
                    <img src="img/<?php echo $cover; ?>" alt="Cover Buku" width="200">
                    <input type="file" name="cover" accept="image/*">
                <?php else: ?>
                    <?php if (!empty($_POST['existing_cover'])): ?>
                        <img src="img/<?php echo $_POST['existing_cover']; ?>" alt="Cover Buku" width="200">
                    <?php else: ?>
                        <p>Tidak ada cover tersedia</p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <input type="file" name="cover" accept="image/*">
            <?php endif; ?>

            <br><br>
            <?php if (isset($_GET['kode'])): ?>
                <button type="submit" name="aksi" value="edit">
                    <i aria-hidden="true"></i>
                    Simpan Perubahan
                </button>
            <?php else: ?>
                <button type="submit" name="aksi" value="add">
                    <i aria-hidden="true"></i>
                    Tambahkan
                </button>
            <?php endif; ?>
            <a href="baca.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>