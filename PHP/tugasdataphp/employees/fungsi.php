<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $employeesnumber= $data['employeesnumber'];
        $lastname= $data['lastname'];
        $firstname= $data['firstname'];
        $extension= $data['extension'];
        $email= $data['email'];
        $officecode= $data['officecode'];
        $reportsto= $data['reportsto'];
        $jobtittle= $data['jobtittle'];

        $query = "INSERT INTO employees VALUES('$employeesnumber', '$lastname', '$firstname', '$extension', '$email', '$officecode', '$reportsto', '$jobtittle')";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $employeesnumber= $data['employeesnumber'];
        $lastname= $data['lastname'];
        $firstname= $data['firstname'];
        $extension= $data['extension'];
        $email= $data['email'];
        $officecode= $data['officecode'];
        $reportsto= $data['reportsto'];
        $jobtittle= $data['jobtittle'];

        $query = "UPDATE employees SET lastName = '$lastname', firstName = '$firstname', extension= '$extension', email = '$email',  officeCode = '$officecode', reportsTo = '$reportsto',  jobTitle = '$jobtittle' WHERE employeeNumber = '$employeesnumber'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $employeesnumber = $data['hapus'];
        $querytampil = "SELECT*FROM employees WHERE employeeNumber = '$employeesnumber'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM employees WHERE employeeNumber = '$employeesnumber';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>