<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $customernumber = $data['customernumber'];
        $customername = $data['customername'];
        $contactlastname = $data['contactlastname'];
        $contactfirstname = $data['contactfirstname'];
        $phone = $data['phone'];
        $addresline1 = $data['addresline1'];
        $addresline2 = $data['addresline2'];
        $city = $data['city'];
        $state = $data['state'];
        $postalcode = $data['postalcode'];
        $country = $data['country'];
        $salesrepemployeenumber = $data['salesrepemployeenumber'];
        $creditlimit = $data['creditlimit'];

        $query = "INSERT INTO customers VALUES (:customernumber, :customername, :contactlastname, :contactfirstname, :phone, :addresline1, :addresline2, :city, :state, :postalcode, :country, :salesrepemployeenumber, :creditlimit)";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':customernumber', $customernumber);
        $stmt->bindParam(':customername', $customername);
        $stmt->bindParam(':contactlastname', $contactlastname);
        $stmt->bindParam(':contactfirstname', $contactfirstname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':addresline1', $addresline1);
        $stmt->bindParam(':addresline2', $addresline2);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':postalcode', $postalcode);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':salesrepemployeenumber', $salesrepemployeenumber);
        $stmt->bindParam(':creditlimit', $creditlimit);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function ubah_data ($data){
        $customernumber = $data['customernumber'];
        $customername = $data['customername'];
        $contactlastname = $data['contactlastname'];
        $contactfirstname = $data['contactfirstname'];
        $phone = $data['phone'];
        $addresline1 = $data['addresline1'];
        $addresline2 = $data['addresline2'];
        $city = $data['city'];
        $state = $data['state'];
        $postalcode = $data['postalcode'];
        $country = $data['country'];
        $salesrepemployeenumber = $data['salesrepemployeenumber'];
        $creditlimit = $data['creditlimit'];

        $query = "UPDATE customers SET customerName = :customername, contactLastName = :contactlastname, contactFirstName = :contactfirstname, phone = :phone, addressLine1 = :addresline1, addressLine2 = :addresline2, city = :city, state = :state, postalCode=:postalcode, country=:country, salesRepEmployeeNumber = :salesrepemployeenumber, creditLimit=:creditlimit WHERE customerNumber=:customernumber";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':customernumber', $customernumber);
        $stmt->bindParam(':customername', $customername);
        $stmt->bindParam(':contactlastname', $contactlastname);
        $stmt->bindParam(':contactfirstname', $contactfirstname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':addresline1', $addresline1);
        $stmt->bindParam(':addresline2', $addresline2);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':postalcode', $postalcode);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':salesrepemployeenumber', $salesrepemployeenumber);
        $stmt->bindParam(':creditlimit', $creditlimit);

        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    function hapus_data($data){
        $customernumber = $data['hapus'];
        $querytampil = "SELECT * FROM customers WHERE customerNumber = :customernumber;";
        $stmt = koneksi_db()->prepare($querytampil);
        $stmt->bindParam(':customernumber', $customernumber);
        $stmt->execute();
        $result = $stmt->fetch();
    
        $query = "DELETE FROM customers WHERE customerNumber = :customernumber";
        $stmt = koneksi_db()->prepare($query);
        $stmt->bindParam(':customernumber', $customernumber);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }    
?>