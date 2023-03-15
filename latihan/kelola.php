<?php
    include 'koneksi.php';

        $kode = '';    
        $id = '';
        $tahun = '';
        $nama_tim = '';
        $foto_tim = '';
        $turnamen = '';
        $juara = '';

    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];
        $query = "SELECT * FROM team WHERE id = '$id';";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        $kode = $result['kode'];
        $tahun = $result['tahun'];
        $nama_tim = $result['nama_tim'];
        $foto_tim = $result['foto_tim'];
        $turnamen = $result['nama_turnamen'];
        $juara = $result['juara_ke'];
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--fontawesome-->
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <title>TIM FUTSAL</title>
</head>

<body>
    <nav class="narvbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                TIM FUTSAL
            </a>
        </div>
    </nav>
    <div class="container">
       <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo$id ?>" name="id">
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-tabel">
                    KODE
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="kode" class="form-control" id="kode" placeholder="Cth: 101 (tidak boleh sama)" value="<?php echo $kode; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun" class="col-sm-2 col-form-tabel">
                    Tahun
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="tahun" class="form-control" id="tahun" placeholder="Cth: 2017" value="<?php echo $tahun; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="namatim" class="col-sm-2 col-form-tabel">
                    Nama Tim
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_tim" class="form-control" id="namatim" placeholder="Cth: Persija" value="<?php echo $nama_tim; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fototim" class="col-sm-2 col-form-label">
                    Foto Tim
                </label>
                <div class="col-sm-10">
                    <input <?php if (!isset($_GET['ubah'])) {echo "required";} ?> class="form-control" type="file" name="foto_tim" id="fototim" accept="image/*">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="turnamen" class="col-sm-2 col-form-label">
                    Nama Turnamen
                </label>
                <div class="col-sm-10">
                    <input required class="form-control" type="text" name="nama_turnamen" id="turnamen" placeholder="Cth: Mansda Cup" value="<?php echo $turnamen; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="juara" class="col-sm-2 col-form-tabel">
                    Juara
                </label>
                <div class="col-sm-10">
                    <select required id="juara" name="juara_ke" class="form-select">
                        <option value="1" <?php if ($juara == '1') {echo "selected";} ?>>1</option>
                        <option value="2" <?php if ($juara == '2') {echo "selected";} ?>>2</option>
                        <option value="3" <?php if ($juara == '3') {echo "selected";} ?>>3</option>
                        <option value="4" <?php if ($juara == '4') {echo "selected";} ?>>4</option>
                        <option value="0" <?php if ($juara == '0') {echo "selected";} ?>>0</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                        }else{
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            Tambahkan
                        </button>
                    <?php
                        }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-step-backward" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
       </form>
    </div>
</body>
</html> 