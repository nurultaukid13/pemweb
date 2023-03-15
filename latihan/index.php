<?php
    include 'koneksi.php';
    session_start();

    $query = "SELECT*FROM team;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--fontawesome-->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <title>TIM FUTSAL</title>
</head>

<body>
    <nav class="narvbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                TIM FUTSAL
            </a>
        </div>
    </nav>
    <!--JUDUL-->
    <div class="container">
        <h1 class="mt-4">Data Tim Futsal</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Data yang sudah  disimpan</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                FOTO<cite title="Source Title"> futsal dari mts</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa-plus"></i>
            Tambah data
        </a>

        <?php
             if (isset($_SESSION['eksekusi'])){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                    echo $_SESSION['eksekusi'];
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php
            session_destroy();
            };
        ?>

        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>No.</center></th>
                        <th>Kode</th>
                        <th>Tahun</th>
                        <th>Nama Tim</th>
                        <th>Foto Tim</th>
                        <th>Nama Turnamen</th>
                        <th>Juara Ke-</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                    <tr>
                        <td><center>
                                <?php echo ++$no; ?>.
                            </center></td>
                        <td>
                         <?php echo $result['kode']; ?>
                        </td>
                        <td>
                         <?php echo $result['tahun']; ?>
                        </td>
                        <td>
                            <?php echo $result['nama_tim']; ?>
                        </td>
                        <td>
                            <img src="img/<?php echo $result['foto_tim']; ?>" style="width:150px">
                        </td>
                        <td>
                         <?php echo $result['nama_turnamen']; ?>
                        </td>
                        <td>
                            <?php echo $result['juara_ke']; ?>
                        </td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>