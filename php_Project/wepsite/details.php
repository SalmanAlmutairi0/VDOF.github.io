<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include 'conn.php';

    $id = $_GET["id"];
    
    
    $sql = 'Select * from product where No='.$id;
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

    $sql1 = 'select * from brands where No='.$row['bname'];

    $query1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($query1);
    
    


    echo '<div align="center">';
    echo '<table border="1" width="30%" style="border-collapse: collapse; background-color: #f7f7f7; color: #333; font-family: Arial, sans-serif; font-size: 14px; margin: auto;">';

    echo '<tr><th colspan="2" style="background-color: #dcdcdc; padding: 10px;"> All Details </th></tr>';
    echo '<tr><td style="padding: 10px;">Photo:</td><td align="center" style="padding: 10px;"><img src="/add_product/'.$row['img'].'" width="50" height="50"></td></tr>';
    echo '<tr><td style="padding: 10px;">Brand name:</td><td style="padding: 10px;">'.$row1['brand'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Product Name:</td><td style="padding: 10px;">'.$row['name'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Processor:</td><td style="padding: 10px;">'.$row['Processor'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Ram:</td><td style="padding: 10px;">'.$row['ram'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Category:</td><td style="padding: 10px;">'.$row['Category'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Price:</td><td style="padding: 10px;">$'.$row['price'].'</td></tr>';
    echo '<tr><td style="padding: 10px;">Product number:</td><td style="padding: 10px;">'.$row['No'].'</td></tr>';
    echo'<tr align="center"><td colspan="2" style=" padding: 10px;"><a href="home.php"><button> Back </button></a></td></tr>';
    echo '</table>';
    echo '</div>';


             
    ?>
    
</body>
</html>