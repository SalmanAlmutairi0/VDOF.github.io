

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
        echo '<table width="50%" border="1" align="center" style="border-collapse:collapse; background-color: #f7f7f7; color:#333; font-family: Arial, sans-serif; font-size:14px; width:50%; margin: auto;">
        <tr>
        <th style="background-color: #dcdcdc; padding: 10px;">ID</th>
        <th style="background-color: #dcdcdc; padding: 10px;">Real Name</th>
        <th style="background-color: #dcdcdc; padding: 10px;">User Name</th>
        <th style="background-color: #dcdcdc; padding: 10px;">Email</th>
        <th style="background-color: #dcdcdc; padding: 10px;">User type</th>
        <th style="background-color: #dcdcdc; padding: 10px;">give admin</th>
        <th style="background-color: #dcdcdc; padding: 10px;">Delete User</th>
        ';
        
        include 'conn.php';

        $sql = "Select * from users";
        $query = mysqli_query($conn,$sql);
        $count = 1;
        while($row = mysqli_fetch_assoc($query)){
            if($row['level']==1){
                $userType = "admin";
            }else{
                $userType = "Normal User";
            }


        echo '<tr align="center">';
        echo '<td style="padding: 10px;">'.$count++.'</td>';
        echo '<td style="padding: 10px;">'.$row['real_name'].'</td>';
        echo '<td style="padding: 10px;">'.$row['user_name'].'</td>';
        echo '<td style="padding: 10px;">'.$row['email'].'</td>';
        echo '<td style="padding: 10px;">'. $userType .'</td>';
        if($row['level'] == 1){
            echo '<td style="padding: 10px;"><a href="unSetAdmin.php?id='.$row['id'].'"><button>remove admin</button></a></td>'; 
        }else{
            echo '<td style="padding: 10px;"><a href="setAdmin.php?id='.$row['id'].'"><button>make this user admin</button></a></td>'; 
        }
        echo '<td style="padding: 10px;"><a href="deleteUser.php?id='.$row['id'].'"><button>delete user</button></a></td>'; 



            
        }
        echo'<tr align="center"><td colspan="7" style=" padding: 10px;"><a href="../home.php"><button style="padding:4px 10px 4px 10px"> Back </button></a></td></tr>';
        echo "</table>";
    
    ?>


</body>
</html>