<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
           New Product
        </title>
        
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      
            <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../../Style/style.css"/>


        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>

    </head>

<body>

        <div class="container">
            <div class="section">
                <ul>
                    <li>
                        <a href="#" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
                    </li>
                    <li>
                        <h2> Ajouter un nouveau produit </h2>
                    </li>
                </ul>
            </div>
            
                <hr>
                


    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <div class="row form_product">

            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Nom du produit</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Chaises en bois d'ébène">
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1">Description du produit</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Chaises pour des salons réalisé avec du bois d'ébène ..."></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Prix du produit</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Prix en gourdes">
            
                
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlSelect1">Catégories</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <?php 
                        echo '<option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>'; 
                    ?>
                </select>
            </div>

            <div class="col-md-6 form_field">
                <label for="fileSelect">Filename:</label>
                <input type="file" name="photo" class="form-control-file" id="fileSelect">
            </div>

            <button class="btn btn-primary form_btn mt-4">Ajouter</button>
            
        </div>
    </form>
    
    </body>

</html>




<?php
    // // Check if the form was submitted
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    //     // Check if file was uploaded without errors
    //     if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
    //         $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    //         $filename = $_FILES["photo"]["name"];
    //         $filetype = $_FILES["photo"]["type"];
    //         $filesize = $_FILES["photo"]["size"];
        
    //         // Verify file extension
    //         $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //         if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
    //         // Verify file size - 5MB maximum
    //         $maxsize = 5 * 1024 * 1024;
    //         if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
    //         // Verify MYME type of the file
    //         if(in_array($filetype, $allowed)){
    //             // Check whether file exists before uploading it
    //             if(file_exists("upload/" . $filename)){
    //                 echo $filename . " is already exists.";
    //             } else{
    //                 move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
    //                 echo "Your file was uploaded successfully.";
    //             } 
    //         } else{
    //             echo "Error: There was a problem uploading your file. Please try again."; 
    //         }
    //     } else{
    //         echo "Error: " . $_FILES["photo"]["error"];
    //     }
    // }


    // if($_FILES["photo"]["error"] > 0){
    //     echo "Error: " . $_FILES["photo"]["error"] . "<br>";
    // } else{
    //     echo "File Name: " . $_FILES["photo"]["name"] . "<br>";
    //     echo "File Type: " . $_FILES["photo"]["type"] . "<br>";
    //     echo "File Size: " . ($_FILES["photo"]["size"] / 1024) . " KB<br>";
    //     echo "Stored in: " . $_FILES["photo"]["tmp_name"];
    // }
?>