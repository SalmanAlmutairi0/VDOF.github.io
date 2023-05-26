<?php
    include 'conn.php';
    $id = $_GET['id'];
    echo $id;
    $sql = "update users set level = 1 where id =$id";

    if(mysqli_query($conn,$sql)){
        header('location: users.php');
        exit;
    }else{
        echo 'error';
    }



?>