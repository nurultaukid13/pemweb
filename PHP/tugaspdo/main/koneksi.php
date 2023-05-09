<?php
function koneksi_db() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'classicmodels';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Koneksi gagal: " . $e->getMessage();
        die();
    }
}
?>
