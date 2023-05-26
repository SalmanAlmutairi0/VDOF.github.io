    <?php

       $nameMsg = $Umsg = $eMsg = $passmsg = $re_passmsg = $finl_passmsg = $created= "";
        if(isset($_POST['submit'])){

            if(empty($_POST['realName'])){
                $nameMsg = "real name is required";
            }
            if(empty($_POST['UserName'])){
                $Umsg = "User Name is required";
            }
            if(empty($_POST['email'])){
                $eMsg = "Email is required";
            }
            if(empty($_POST['password'])){
                $passmsg = "password is required";
            }
            if(empty($_POST['re-password'])){
                $re_passmsg = "re-password is required";
            }
            
            include 'conn.php';
            $real_name = $_POST['realName'];
            $username = $_POST['UserName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $re_password = $_POST['re-password'];
            
            if($password != $re_password){
                $finl_passmsg = "password doesn't matches";
            }

            $checkUserName = "select * from users where user_name ='$username'";
            $query = mysqli_query($conn,$checkUserName);
            if(mysqli_num_rows($query)==1){
                $Umsg = "User Name is already exist";
            }

            $checkEmail = "select * from users where email = '$email'";
            $query = mysqli_query($conn,$checkEmail);
            if(mysqli_num_rows($query)==1){
                $eMsg = "Email is already exist";
            }

            if($nameMsg == "" && $Umsg == "" && $eMsg == "" && $passmsg == "" && $re_passmsg == "" && $finl_passmsg == ""){

                $sql = "insert into users (real_name , user_name , email ,password , level)
                                    values('$real_name','$username','$email','$password',0) ";
               
               if( mysqli_query($conn,$sql)){
                    $created = "your account has been created successfully";
               }else{
                    echo "error";
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
    <title>sign</title>
</head>
<body>

    <container class="all">
        <div class="login">

        <h2>Create Account</h2>
        <?php echo '<p class="reg"> ' . $created .'</p>'; ?>
        <div class="info">
            <form action="signUp.php" method="post">
                <?php echo '<p> ' . $nameMsg .'</p>'; ?>
                <input type="text" name="realName" placeholder=" Real Name">
                <?php echo '<p> ' . $Umsg .'</p>'; ?>
                <input type="text" name="UserName" placeholder=" UserName ">
                <?php echo '<p> ' . $eMsg .'</p>'; ?>
                <input type="text" name="email" placeholder=" Email ">
                <?php echo '<p> ' . $passmsg.$finl_passmsg .'</p>'; ?>
                <input type="password" name="password" placeholder=" Password">
                <?php echo '<p> ' .  $passmsg .'</p>'; ?>
                <input type="password" name="re-password" placeholder=" Repeat Password">
                <input type="submit" name="submit" value="Login">
            
            </form>
        
        
        </div>


        <div class="create">
            already have an account? <a href="login.php">Login</a>
        </div>

        </div>



    </container>


    
</body>
</html>