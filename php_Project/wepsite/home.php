<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>  
  
    
    <?php

        $uid = $_SESSION['uid'];
        $uname = $_SESSION['uname'];
        $ulevel = $_SESSION['ulevel'];

        if(isset($uid)){
            
            echo '
            <div style="text-align:center; border: 1px solid black; width:250px; height: auto; padding: 20px; margin:20px 0px 50px 4px;">

            <h2 >Welcome '.$uname.' </h2> 
            <a href="auth/logout.php"><button>Logout</button></a>';

            if($ulevel ==1){
            echo' <a href="users_page/users.php"><button>see all users</button></a>';
            }

        echo' </div> ';

            
        include 'conn.php';

        

    $sql = 'select * from product';
    $query = mysqli_query($conn, $sql);
    
    echo '<table width="50%" border="1" align="center" style="border-collapse:collapse; background-color: #f7f7f7; color:#333; font-family: Arial, sans-serif; font-size:14px; width:50%; margin: auto;">
     <tr>
     <th style="background-color: #dcdcdc; padding: 10px;">Photo</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Brand Name</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Product Name</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Processor</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Ram</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Category</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Price</th>
     <th style="background-color: #dcdcdc; padding: 10px;">Details</th>';
        
     
        if($ulevel == 1){
        echo '<th style="background-color: #dcdcdc; padding: 10px;">Delete</th>';
        }
        echo '</tr>';
     

    while($row = mysqli_fetch_assoc($query)){
        $sql1 = 'select brand from brands where NO='.$row['bname'];
        $query1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($query1);

        echo '<tr align="center">';
        echo '<td style="padding: 10px;"><img src="/add_product/'.$row['img'].'" width="50" height="50"></td>';
        echo '<td style="padding: 10px;">'.$row1['brand'].'</td>';
        echo '<td style="padding: 10px;">'.$row['name'].'</td>';
        echo '<td style="padding: 10px;">'.$row['Processor'].'</td>';
        echo '<td style="padding: 10px;">'.$row['ram'].'</td>';
        echo '<td style="padding: 10px;">'.$row['Category'].'</td>';
        echo '<td style="padding: 10px;">$'.$row['price'].'</td>';
        echo '<td style="padding: 10px;"><a href="details.php?id='.$row['No'].'"><button>Details</button></a></td>'; 
        if($ulevel == 1){

            echo '<td style="padding: 10px;"><a href="delete.php?id='.$row['No'].'"><button>Delete</button></a></td>'; 
        }
    
        echo '</tr>';
    }
    echo "</table>";
}else{
    header('location: auth/login.php');
}
    mysqli_close($conn);

?>
    
</body>
</html>