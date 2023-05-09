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
    
        $query = "INSERT INTO employees VALUES(:employeesnumber, :lastname, :firstname, :extension, :email, :officecode, :reportsto, :jobtittle)";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':employeesnumber', $employeesnumber);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':extension', $extension);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':officecode', $officecode);
        $stmt->bindParam(':reportsto', $reportsto);
        $stmt->bindParam(':jobtittle', $jobtittle);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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

        $query = "UPDATE employees SET lastName = :lastname, firstName = :firstname, extension= :extension, email = :email,  officeCode = :officecode, reportsTo = :reportsto,  jobTitle = :jobtittle WHERE employeeNumber = :employeesnumber";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':employeesnumber', $employeesnumber);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':extension', $extension);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':officecode', $officecode);
        $stmt->bindParam(':reportsto', $reportsto);
        $stmt->bindParam(':jobtittle', $jobtittle);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function hapus_data($data){
        $employeesnumber = $data['hapus'];

        $querytampil = "SELECT * FROM employees WHERE employeeNumber = :employeesnumber";
        $stmt = koneksi_db()->prepare($querytampil);
        $stmt->bindParam(':employeesnumber', $employeesnumber);
        $stmt->execute();
        $result = $stmt->fetch();

        $query = "DELETE FROM employees WHERE employeeNumber = :employeesnumber";
        $stmt = koneksi_db()->prepare($query);
        $stmt->bindParam(':employeesnumber', $employeesnumber);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
?>