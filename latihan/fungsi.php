<?php
    include 'koneksi.php';

    function tambah_data($data, $files){
        $dirfoto = "img/";
        $tmpfile = $files['foto_tim']['tmp_name'];

        $kode = $data['kode'];
        $tahun = $data['tahun'];
        $nama_tim = $data['nama_tim'];

        $split = explode('.', $files['foto_tim']['name']);
        $format = $split[count($split) - 1];
        $foto = $kode.'.'.$format;

        $turnamen = $data['nama_turnamen'];
        $juara = $data['juara_ke'];

        move_uploaded_file($tmpfile, $dirfoto.$foto);

        $query = "INSERT INTO team VALUES(null ,'$kode', '$tahun', '$nama_tim', '$foto', '$turnamen', '$juara')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data, $files){
        $id = $data['id'];
        $kode = $data['kode'];
        $tahun = $data['tahun'];
        $nama_tim = $data['nama_tim'];
        $turnamen = $data['nama_turnamen'];
        $juara = $data['juara_ke'];

        $querytampil = "SELECT*FROM team WHERE id = '$id';";
        $sqltampil = mysqli_query($GLOBALS['conn'], $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        if($files['foto_tim']['name']==""){
            $foto = $result['foto_tim'];
        }else{
            $split = explode('.', $files['foto_tim']['name']);
            $format = $split[count($split) - 1];

            $foto = $result['kode'].'.'.$format;

            unlink("img/". $result['foto_tim']);
            move_uploaded_file($files['foto_tim']['tmp_name'], 'img/' . $foto);
        }

        $query = "UPDATE team SET kode='$kode', tahun='$tahun', nama_tim='$nama_tim', nama_turnamen='$turnamen', juara_ke='$juara', foto_tim = '$foto' WHERE id = '$id';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_tim = $data['hapus'];
        $querytampil = "SELECT*FROM team WHERE id = '$id_tim'; ";
        $sqltampil = mysqli_query($GLOBALS['conn'], $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        unlink("img/". $result['foto_tim']);

        $query = "DELETE FROM team WHERE id = '$id_tim';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
?>