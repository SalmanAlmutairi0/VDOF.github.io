<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <title>add product</title>
</head>
<body>

    <div class="container">
        <form action="form.php" method="post" enctype="multipart/form-data" align="center" class="form1">
            <h2>Add product</h2><br><br>
           
            <label>product Name</label>
            <input type="text" name="name" class="text"><br><br>
            
            <label>Brand: </label>
            <select name="brand">
                <option value="null">Select brand </option>
            <?php

                include "conn.php";
                $sql = "select * from brands";
                $query = mysqli_query($conn,$sql);
                
                while($row = mysqli_fetch_row($query)){
                    echo '<option value = "'.$row[0].'">'.$row[1].'</option>';
                }
            
            
            
            ?>
            </select><br><br>
            

                

            <label>Ram: </label>
            <input type="radio" name="ram" value="4">
            <label>4gb ram</label>
            <input type="radio" name="ram" value="8">
            <label>8gb ram</label>
            <input type="radio" name="ram" value="16">
            <label>16gb ram</label>
            <input type="radio" name="ram" value="32">
            <label>32gb ram</label><br><br>

            <label>Processor:</label>
            <select name="processor" class="text">
                <option>processor</option>
                <option value="i3-10100f">i3-10100f</option>
                <option value="i5-9900f">i5-9900f</option>
                <option value="i5-13900f">i5-13900k</option>
                <option value="i7-9900k">i7-9900k</option>
                <option value="i7-13900k">i7-13900k</option>
                <option value="i9-9900k">i9-9900k</option>
                <option value="i9-13900k">i9-13900k</option>
            </select><br><br>


            <label>price range: </label>
            <select name="budget" class="text">
                <option>price range</option>
                <option value="1000">1000 SR - 2000 SR</option>
                <option value="2000">2000 SR - 4000 SR</option>
                <option value="5000">4000 SR - 6000 SR</option>
                <option value="10000">6000 SR - 8000 SR </option>
                <option value="20000">8000 SR or higher</option>
            </select><br><br>

            <label>Category: </label>
            <input type="radio" name="pcType" value="Desktop">
            <label>Desktop</label>
            <input type="radio" name="pcType" value="laptop">
            <label>laptop</label>
            <input type="radio" name="pcType" value="gaming PC">
            <label>Gaming PC</label><br><br>


            <input type="file" name="photo"><br><br>

            <input type="submit" value="submit" name="submit" class="submit"><br><br>

            
            <?php

            if(isset($_POST['submit'])){
                    

                   
                  
                 $fileloc ='img/';
                 $filename = basename($_FILES["photo"]["name"]);
                 $file_path = $fileloc.$filename;
                 move_uploaded_file($_FILES["photo"]["tmp_name"], $file_path);

                $name = $_POST['name'];
                $brand = $_POST['brand'];
                $ram = $_POST['ram'];
                $pross = $_POST['processor'];
                $price = $_POST['budget'];
                $category = $_POST['pcType'];



                $sql = "insert into product (name , bname , Processor , ram , Category , price , img) 
                values('$name','$brand','$pross','$ram','$category','$price','$file_path')";

                if(mysqli_query($conn,$sql)){
                    echo "Product has been inserted";
                }else{
                    echo "error";
                }
                
                
                mysqli_close($conn);
                
                
                
                }
            ?>
            
        </form>
            
   
            
            
            
    
    
    
</body>
</html>