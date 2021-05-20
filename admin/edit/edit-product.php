<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../index.php");
        exit;
    }

    // Database connection

    include('../../Model/Connection.php');
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
           Dashboard
        </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
        300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
        <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        
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

        <!-- DATATABLES.NET -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

        <!-- GOOGLE ICONS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Icons">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-md">
                <h1 class="secondary">
                    <a class="navbar-brand" href="#">HAFCO - Dashboard</a>
                </h1>
                <a class="btn btn-danger" href="logout.php">Se déconnecter</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row mt-5 mx-4">
                <div class="col-sm-2 bg-light p-2">
                    <nav class="nav flex-column">
                        <a href="../dashboard.php" id="home" name="home" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-home mx-3"></i>Tableau de bord</a>
                        <a href="../dashboard.php?produits" id="produits" name="produits" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-box-open mx-3"></i>Produits</a>
                        <a href="../dashboard.php?categories" id="categories" name="categories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-list mx-3"></i>Catégories</a>
                        <a href="../dashboard.php?subcategories" id="subcategories" name="subcategories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-star mx-3"></i>Sous-catégories</a>
                        <a href="../dashboard.php?users" id="users" name="users" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-users mx-3"></i>Utilisateurs</a>
                    </nav>
                </div>

                <div class="col-sm-9 mx-3 bg-light p-2" id="table-container">
                <div class="container">
                    <!-- <h3>Formulaire d'enregistrement</h3> -->
                    
                    <div class="row">
                        <div class="p-3 bordered"  id="newProduct">
                            <div class="bg-white p-3 rounded">
                                <div class="mt-3">
                                    <h3>Mise à jour d'un produit</h3>
                                    <hr>
                                    <div>


                                        <?php
                                            $id = $_GET['edit_product_id'];
                                            if(isset($_POST['upload']))
                                            {   
                                                
                                                $file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
                                                $file_loc = $_FILES['fileToUpload']['tmp_name'];
                                                $file_size = $_FILES['fileToUpload']['size'];
                                                $file_type = $_FILES['fileToUpload']['type'];
                                                $folder="../uploads/images/products/";
                                            
                                                /* new file size in KB */
                                                $new_size = $file_size/1024;  
                                                /* new file size in KB */
                                                
                                                /* make file name in lower case */
                                                $new_file_name = strtolower($file);
                                                /* make file name in lower case */
                                                
                                                $final_file = str_replace(' ','-',$new_file_name);
                                            
                                                if(move_uploaded_file($file_loc, $folder.$final_file))
                                                {
                                                    // $sql="INSERT INTO image(file,type,size) VALUES('$final_file','$file_type','$new_size')";
                                                    $stmt = $conn->prepare("UPDATE product SET product_name=?, product_description=?, product_price=?, image=?, categories_id=?
                                                                             WHERE product.id = ?");
                                                    
                                                    // mysqli_query($conn,$sql);
                                                    $input = filter_input_array(INPUT_POST);
                                
                                                    $product_name = mysqli_real_escape_string($conn, $input["productName"]);
                                                    $product_description = mysqli_real_escape_string($conn, $input["productDescription"]);
                                                    $product_price = mysqli_real_escape_string($conn, $input["productPrice"]);
                                                    // $image = mysqli_real_escape_string($conn, $input["fileToUpload"]["name"]);
                                                    $categories = mysqli_real_escape_string($conn, $input["categories"]);

                                                    $product_name_sl = str_replace("\'", "'", $product_name);
                                                    $product_description_sl = str_replace("\'", "'", $product_description);
                                                    $product_price_sl = str_replace("\'", "'", $product_price);
                                                    // $image_sl = str_replace(" ", "-", $target_file);
                                                    $categories_sl = str_replace("\'", "'", $categories);
                                                    
                                                    $stmt->bind_param('sssssi', $product_name_sl, $product_description_sl, $product_price_sl, $final_file, $categories, $id);
                                                    
                                                    if($stmt->execute())
                                                    {
                                                        // echo "File sucessfully upload";
                                                        echo'<div class="alert alert-success" role="alert"> Enregistrement réussi ! </div>';    
                                                    }
                                                }
                                            else
                                                {
                                                    echo '<div class="alert alert-danger" role="alert">Enregistrement échoué. Veuillez essayer à nouveau </div>';
                                                }
                                        }
                                        ?>



                                        <form method="POST" enctype="multipart/form-data" class="row p-3">
                                            <?php
                                                $id = $_GET['edit_product_id'];

                                                $query = 'SELECT * FROM  product WHERE product.id ='. $id;
                                                $result = $conn->query($query);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo'
                                            
                                                        <div class="col mb-3">
                                                            <label for="exampleFormControlInput1">Nom du produit</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" required name="productName" value="'.$row['product_name'].'">
                                                        </div>
                                            
                                                        <div class="col-12 mb-3">
                                                            <label for="exampleFormControlTextarea1">Description du produit</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="productDescription">'.$row['product_description'].'</textarea>
                                                        </div>
                                            
                                                        <div class=" col-md-6 mb-3">
                                                            <label for="exampleFormControlInput1">Prix du produit</label>
                                                            <input type="number" class="form-control" id="inputPassword2" name="productPrice" required value="'.$row['product_price'].'">
                                                        </div>';
                                                    }
                                                }
                                            ?>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="exampleFormControlSelect1">Catégories</label>
                                                <select class="form-control" name="categories" id="exampleFormControlSelect1" required>
                                                    <?php
                                                    
                                                        $query = "SELECT * FROM  category ORDER BY category_name DESC ";
                                                        $result = $conn->query($query);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="'.$row["id"].'">'.$row["category_name"].'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                            
                                            <div class="col-md-6 form_field">
                                            <?php
                                                $id = $_GET['edit_product_id'];

                                                $query = 'SELECT * FROM  product WHERE product.id ='. $id;
                                                $result = $conn->query($query);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo'
                                                        <label for="fileSelect">Filename:</label>
                                                        <input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload" value="'.$row['image'].'">';
                                                    }
                                                }
                                            ?>
                                            </div>
                                
                                            <button class="btn btn-primary form_btn mt-4" name="upload">Modifier le produit</button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>