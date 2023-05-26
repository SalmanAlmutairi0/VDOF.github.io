<?php

    include 'conn.php';
    $id = $_GET['id'];
    $sql = "delete from users where id = $id";
    if(mysqli_query($conn,$sql)){
        header('location: users.php');
    }

?>