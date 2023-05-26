<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brands</title>
</head>
<body>
    <div align = "center">
        <fieldset>
            <legend>add Brands</legend>
            <form action="form.php" method="post">

                <label>Brand name: </label>
                <input type="text" name="Brand"><br><br>

                <input type="submit" name="submit" value="insert into brands"><br><br>
            </form>
        </fieldset>

        <?php


        if(isset($_POST['submit'])){

            
            
            $Brand = $_POST['Brand'];
    
                include 'conn.php';

                $sql = "insert into brands (Brand) values('$Brand')";

                if(mysqli_query($conn,$sql)){
                    echo "brand has benn inserted";
                }else{
                    echo "error";
                }

                mysqli_close($conn);
                    
                



            }

        ?>

    </div>
    
    
</body>
</html>