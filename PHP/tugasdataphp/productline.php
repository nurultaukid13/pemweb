<?php
    include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Classic Model</title>
</head>
<body>
    <nav>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="employees.php">Employees</a></li>
            <li><a href="#">Productlines</a></li>
        </ul>
    </nav>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Product Line</th>
                    <th>Text Description</th>
                    <th>HTML Description</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $query = "SELECT * FROM productlines";
                        $result = mysqli_query($conn,$query);

                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php echo $row['productLine']; ?></td>
                    <td><?php echo $row['textDescription']; ?></td>
                    <td><?php echo $row['htmlDescription']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                </tr>
                <?php
                    }
                    mysqli_free_result($result);
                }else{
                    echo "Data tidak ada";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>