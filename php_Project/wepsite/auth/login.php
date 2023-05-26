<?php 
session_start(); 

$ms1 = $ms2 = $ms3 = "";
if(isset($_POST['submit'])){
    $uname = $_POST['UserName'];
    $password = $_POST['password'];

    if(empty($uname)){
        $ms1 = "Please Enter Your User name or Email";
    }
    if(empty($password)){
        $ms2 = "Please Enter Your Password";
    }

    if($ms1 == "" && $ms2 == ""){
        include "conn.php";

        $sql = "select * from users where user_name = '$uname' or email = '$uname' and password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        
        if(mysqli_num_rows($query)==1){
            $_SESSION['uid'] = $row['id'];
            $_SESSION['uname'] = $row['user_name'];
            $_SESSION['ulevel'] = $row['level'];

            header('location: ../home.php');
            exit;
        }else{
            $ms3 = "user name and password does not exist";
        }


    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>

    <container class="all">
        <div class="login">

        <h2>Login</h2>
        <?php echo '<p style="font-size:large; color:red;"> ' . $ms3 .'</p>'; ?>
            
        <div class="info">
            <form action="login.php" method="post">
            <?php echo '<p> ' . $ms1 .'</p>'; ?>
                <input type="text" name="UserName" placeholder="Enter Your UserName or Email  ">
                <?php echo '<p> ' . $ms2 .'</p>'; ?>
                <input type="password" name="password" placeholder="Enter Your Password">
                <input type="submit" name="submit" value="Login">
            </form>
        </div>


        <div class="create">
            Don't have an account? <a href="signUp.php">Create Account</a>
        </div>

        </div>



    </container>

    
</body>
</html>