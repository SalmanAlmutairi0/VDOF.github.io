<?php
    include 'conn.php';
    $id = $_GET['id'];
    
    $sql = 'delete from product where No='.$id;
    mysqli_query($conn, $sql);

    mysqli_close($conn);
   
    header("location: home.php");
    exit();
    

?>