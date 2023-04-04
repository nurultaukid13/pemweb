<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $id_kondektur = $data['id_kondektur'];
        $nama = $data['nama'];

        $query = "INSERT INTO kondektur VALUES('$id_kondektur', '$nama')";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $id_kondektur = $data['id_kondektur'];
        $nama = $data['nama'];

        $query = "UPDATE kondektur SET id_kondektur = '$id_kondektur', nama = '$nama' WHERE id_kondektur = '$id_kondektur'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $id_kondektur = $data['hapus'];
        $querytampil = "SELECT*FROM kondektur WHERE id_kondektur = '$id_kondektur'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>