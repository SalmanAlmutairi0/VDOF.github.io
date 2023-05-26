<?php
    include 'conn.php';

    $id= $_GET['id'];

    $sql = "update users set level=0 where id = $id";
    if(mysqli_query($conn,$sql)){
        header('location: users.php');
        exit;
    }

?>