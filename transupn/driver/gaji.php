<?php
include('../main/koneksi.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gaji Driver</title>
</head>

<body>
    <nav>
        <h2>Trans UPN</h2>
        <ul>
            <li><a href="../main/bus.php">Bus</a></li>
            <li><a href="../main/driver.php">Driver</a></li>
            <li><a href="../main/kondektur.php">Kondektur</a></li>
            <li><a href="../main/trans_upn.php">Trans UPN</a></li>
        </ul>
    </nav>
    <div style="height:100px"></div>

    <form action="" method="post" style="margin-left:30px">
		<label for="bulan">Pilih Bulan:</label>
		<select name="bulan" id="bulan">
			<option value="01">Januari</option>
			<option value="02">Februari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
		<button type="submit">Tampilkan</button>
	</form>

    <table>
        <thead>
            <tr>
                <th>ID Driver</th>
                <th>Nama</th>
                <th>Jumlah KM</th>
                <th>Gaji</th>
            </tr>
            </tr>
        </thead>
        <tbody>
    <?php
        if(isset($_POST["bulan"])){
            $bulan = $_POST["bulan"];
        }else{
            $bulan = "01";
        }
    ?>
    <h2>GAJI DRIVER BULAN KE- <?php echo $bulan?></h2>
    <?php
        $query = "SELECT driver.id_driver, driver.nama, SUM(trans_upn.jumlah_km) as total_km
                FROM driver
                JOIN trans_upn ON driver.id_driver = trans_upn.id_driver
                WHERE MONTH(trans_upn.tanggal) = '$bulan' AND YEAR(trans_upn.tanggal) = YEAR(CURRENT_DATE())
                GROUP BY driver.id_driver";

        $result = mysqli_query(koneksi_db(), $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <tr>
                    <td><?php echo $row['id_driver']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['total_km']; ?></td>
                    <td><?php echo "Rp.".$row['total_km']*3000; ?></td>
                </tr>
    <?php
            }
            mysqli_free_result($result);
        } else {
    ?>
</tbody>
    </table>
    <?php
            echo "<i style='margin-left:60px'>Tidak ada data.</i>";
            }
            mysqli_close(koneksi_db());
        ?>
</body>

</html>