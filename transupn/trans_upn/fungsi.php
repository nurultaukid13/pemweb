<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $id_trans_upn = $data['id_trans_upn'];
        $id_kondektur = $data['id_kondektur'];
        $id_bus = $data['id_bus'];
        $id_driver = $data['id_driver'];
        $jumlah_km = $data['jumlah_km'];
        $tanggal = $data['tanggal'];

        $query = "INSERT INTO trans_upn VALUES('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal' )";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $id_trans_upn = $data['id_trans_upn'];
        $id_kondektur = $data['id_kondektur'];
        $id_bus = $data['id_bus'];
        $id_driver = $data['id_driver'];
        $jumlah_km = $data['jumlah_km'];
        $tanggal = $data['tanggal'];

        $query = "UPDATE trans_upn SET id_trans_upn = '$id_trans_upn', id_kondektur = '$id_kondektur', id_bus = '$id_bus', id_driver = '$id_driver', jumlah_km = '$jumlah_km', tanggal = '$tanggal' WHERE id_trans_upn = '$id_trans_upn'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $id_trans_upn = $data['hapus'];
        $querytampil = "SELECT*FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>