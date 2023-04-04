<?php
include("data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel MHS</title>
</head>
<body>
    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NPM</th>
                <th>IPK</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            while ($no<3){
                ?>
            <tr>
                <td><?php echo $nama_mhs["mhs".$no]; ?></td>
                <td><?php echo $npm_mhs["mhs".$no]; ?></td>
                <td><?php echo $ipk_mhs["mhs".$no]; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>