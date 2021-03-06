<?php
    // Initialize the session
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>
           Dashboard
        </title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      
            <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" 
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
            
            <link rel="stylesheet" href="../Style/style.css"/>


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
                <a class="btn btn-danger" href="logout.php">Se d??connecter</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row mt-5 mx-4">
                <div class="col-sm-2 bg-light p-2">
                    <nav class="nav flex-column">
                        <a href="?home" id="home" name="home" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-home mx-3"></i>Tableau de bord</a>
                        <a href="?produits" id="produits" name="produits" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-box-open mx-3"></i>Produits</a>
                        <a href="?categories" id="categories" name="categories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-list mx-3"></i>Cat??gories</a>
                        <a href="?subcategories" id="subcategories" name="subcategories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-star mx-3"></i>Sous-cat??gories</a>
                        <a href="?users" id="users" name="users" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-users mx-3"></i>Utilisateurs</a>
                    </nav>
                </div>

                <div class="col-sm-9 mx-3 bg-light p-2">
                    <?php
                        if(isset($_GET["produits"])){
                            productTable();
                            // include('adminProduct/index.php');
                        }
                        elseif(isset($_GET["categories"])){
                            categoryTable();
                        }
                        elseif(isset($_GET["subcategories"])){
                            subCategoryTable();
                        }
                        elseif(isset($_GET["users"])){
                            userTable();
                        }
                        elseif(isset($_GET["home"])){
                            home();
                        }
                        else{
                            home();
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    
    function producTable(){
        echo '<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th width="18%">Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
    </table>';
    }

    function home(){
        include('../Model/Connection.php');

            $query = "select qty_product, qty_category, qty_sub_category, qty_users from (select count(*) qty_product from product) t1_count, (select count(*) qty_category from category) t2_count, (select count(*) qty_sub_category from sub_category) t3_count, (select count(*) qty_users from user) t4_count";
            $result = mysqli_query($conn,$query);
            $result = $conn->query($query);
            
            echo '
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-8"> <h3>Tableau de bord de la HAFCO</h3> </div>
                </div>
            <hr>';

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-3 p-3 bordered">
                                <div class="row bg-white p-2 rounded">
                                    <div class="col-2 mt-3">
                                        <span class="material-icons" style="font-size: 48px;">
                                            bar_chart
                                        </span>
                                    </div>
                                   <div class="col">
                                        <p class="float-end fs-6">
                                            Produits <br> <span class="fs-3">'.$row["qty_product"].'</span>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-3 p-3 bordered">
                                <div class="row bg-white p-2 rounded">
                                    <div class="col-2 mt-3">
                                        <span class="material-icons" style="font-size: 48px;">
                                            list
                                        </span>
                                    </div>
                                   <div class="col">
                                        <p class="float-end fs-6">
                                            Cat??gories <br> <span class="fs-3">'.$row["qty_category"].'</span>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>



                            <div class="col-3 p-3 bordered">
                                <div class="row bg-white p-2 rounded">
                                    <div class="col-2 mt-3">
                                        <span class="material-icons" style="font-size: 48px;">
                                            bar_chart
                                        </span>
                                    </div>
                                   <div class="col">
                                        <p class="float-end fs-6">
                                            Sous-cat??gories <br> <span class="fs-3">'.$row["qty_sub_category"].'</span>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-3 p-3 bordered">
                                <div class="row bg-white p-2 rounded">
                                    <div class="col-2 mt-3">
                                        <span class="material-icons" style="font-size: 48px;">
                                            people
                                        </span>
                                    </div>
                                   <div class="col">
                                        <p class="float-end fs-6">
                                            Utilisateurs <br> <span class="fs-3">'.$row["qty_users"].'</span>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                <hr>';
                }
            }

            echo '
                <div class="container">
                    <h3>Formulaire d\'enregistrement</h3>
                    <div class="row">
                        <div class="col-6 p-3 bordered"  id="newProduct">
                            <div class="row bg-white p-2 rounded">
                                <div class="mt-3">
                                    <h5>Nouveau produit</h5>
                                    <hr>
                                    <div>';

                                    if(isset($_POST['upload']))
                                    {   
                                         
                                        $file = rand(1000,100000)."-".$_FILES['fileToUpload']['name'];
                                        $file_loc = $_FILES['fileToUpload']['tmp_name'];
                                        $file_size = $_FILES['fileToUpload']['size'];
                                        $file_type = $_FILES['fileToUpload']['type'];
                                        $folder="uploads/images/products/";
                                     
                                        /* new file size in KB */
                                        $new_size = $file_size/1024;  
                                        /* new file size in KB */
                                        
                                        /* make file name in lower case */
                                        $new_file_name = strtolower($file);
                                        /* make file name in lower case */
                                        
                                        $final_file = str_replace(' ','-',$new_file_name);
                                     
                                        if(move_uploaded_file($file_loc,$folder.$final_file))
                                        {
                                            // $sql="INSERT INTO image(file,type,size) VALUES('$final_file','$file_type','$new_size')";
                                            $stmt = $conn->prepare("INSERT INTO product (product_name, product_description, product_price, image) VALUES (?, ?, ?, ?)");
                                            
                                            // mysqli_query($conn,$sql);
                                            $input = filter_input_array(INPUT_POST);
                        
                                            $product_name = mysqli_real_escape_string($conn, $input["productName"]);
                                            $product_description = mysqli_real_escape_string($conn, $input["productDescription"]);
                                            $product_price = mysqli_real_escape_string($conn, $input["productPrice"]);
                                            // $image = mysqli_real_escape_string($conn, $input["fileToUpload"]["name"]);
                                            // $categories = mysqli_real_escape_string($conn, $input["categories"]);

                                            $product_name_sl = str_replace("\'", "'", $product_name);
                                            $product_description_sl = str_replace("\'", "'", $product_description);
                                            $product_price_sl = str_replace("\'", "'", $product_price);
                                            // $image_sl = str_replace(" ", "-", $target_file);
                                            // $categories_sl = str_replace("\'", "'", $categories);
                                            
                                            $stmt->bind_param('ssss', $product_name_sl, $product_description_sl, $product_price_sl, $final_file);
                                            
                                            if($stmt->execute())
                                            {
                                                // echo "File sucessfully upload";
                                                echo'<div class="alert alert-success" role="alert"> Enregistrement r??ussi ! </div>';    
                                            }
                                        }
                                     else
                                        {
                                      
                                            echo "Error.Please try again";
                                            
                                        }
                                }

                        echo '

                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom du produit</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" required name="productName" placeholder="Chaises en bois d\'??b??ne">
                                            </div>
                                
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1">Description du produit</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="productDescription" placeholder="Chaises pour des salons r??alis?? avec du bois d\'??b??ne ..."></textarea>
                                            </div>
                                
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Prix du produit</label>
                                                <input type="number" class="form-control" id="inputPassword2" name="productPrice" required placeholder="Prix en gourdes">
                                            </div>
                                
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlSelect1">Cat??gories</label>
                                                <select class="form-control" name="categories" id="exampleFormControlSelect1" required>';
                                                
                                                $query = "SELECT * FROM  category ORDER BY category_name DESC ";
                                                $result = $conn->query($query);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["id"].'" id="'.$row["id"].'">'.$row["category_name"].'</option>';
                                                    }
                                                }
                            echo'
                                                    
                                                </select>
                                            </div>
                                
                                            <div class="col-md-6 form_field">
                                                <label for="fileSelect">Filename:</label>
                                                <input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload" required>
                                            </div>
                                
                                            <button class="btn btn-primary form_btn mt-4" name="upload">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 p-3 bordered"  id="newUser">
                            <div class="row bg-white p-2 rounded">
                                <div class="mt-3">
                                    <h5>Nouvel utilisateurs</h5>
                                    <hr>
                                    ';

                            if(isset($_POST["nom"]) AND $_POST["prenom"]  AND $_POST["email"]  AND $_POST["username"]  AND $_POST["password"]){
                                try {

                                    $input = filter_input_array(INPUT_POST);
    
                                    $nom = mysqli_real_escape_string($conn, $input["nom"]);
                                    $prenom = mysqli_real_escape_string($conn, $input["prenom"]);
                                    $email = mysqli_real_escape_string($conn, $input["email"]);
                                    $username = mysqli_real_escape_string($conn, $input["username"]);
                                    $pass = mysqli_real_escape_string($conn, $input["password"]);
                                    $password = password_hash($pass, PASSWORD_DEFAULT);


                                    $stmt = $conn->prepare("INSERT INTO user (nom, prenom, email, username, password)
                                                        VALUES (?, ?, ?, ?, ?)");
                                    $nom_sl = str_replace("\'", "'", $nom);
                                    $prenom_sl = str_replace("\'", "'", $prenom);
                                    $email_sl = str_replace("\'", "'", $email);
                                    $username_sl = str_replace("\'", "'", $username);
                                    $password_sl = str_replace("\'", "'", $password);
                                    $stmt->bind_param('sssss', $nom_sl, $prenom_sl, $email_sl, $username_sl, $password_sl);
                                    
                                    $stmt->execute();
                                    
                                    echo'<div class="alert alert-success" role="alert">
                                        Enregistrement r??ussi !
                                        </div>'
                                    ;
                                } catch(PDOException $e) {
                                    
                                    echo'<div class="alert alert-danger" role="alert">
                                        L\' enregistrement n\'a pas ??t?? faite  !
                                        </div>'
                                    ;
                                    // echo "Error: " . $e->getMessage();
                                }
                            }

                    echo'
                                    <form method="POST">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom</label>
                                                <input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="Nom">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Pr??nom</label>
                                                <input type="text" class="form-control" name="prenom" id="exampleFormControlInput1" placeholder="Pr??nom" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="example@hafcosameubles.net" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom d\'utilisateur</label>
                                                <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="pr??nom.nom">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Password</label>
                                                <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="********" required>
                                            </div>
                                            <button class="btn btn-primary form_btn mt-4">Ajouter</button>
                                    </form
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 p-3 bordered" id="newCategory">
                            <div class="row bg-white p-2 rounded">';

                            if(isset($_POST["descriptionCategory"]) AND $_POST["categoryName"]){
                                try {

                                    $input = filter_input_array(INPUT_POST);
    
                                    $category_description = mysqli_real_escape_string($conn, $input["descriptionCategory"]);
                                    $category_name = mysqli_real_escape_string($conn, $input["categoryName"]);

                                    $stmt = $conn->prepare(" INSERT INTO category (category_name, category_description)
                                                        VALUES (?, ?)");
                                    $name_categ = str_replace("\'", "'", $category_name);
                                    $desc_categ = str_replace("\'", "'", $category_description);
                                    $stmt->bind_param('ss', $name_categ, $desc_categ);
                                    
                                    $stmt->execute();
                                    
                                    echo'<div class="alert alert-success" role="alert">
                                        Enregistrement r??ussi !
                                        </div>'
                                    ;
                                } catch(PDOException $e) {
                                    
                                    echo'<div class="alert alert-danger" role="alert">
                                        L\' enregistrement n\'a pas ??t?? faite  !
                                        </div>'
                                    ;
                                    // echo "Error: " . $e->getMessage();
                                }
                            }

                    echo'
                                <div class="mt-3">
                                    <h5>Nouvelle cat??gorie</h5>
                                    <hr>
                                    <div>
                                        <form method="POST">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="categoryName" placeholder="Nom de la cat??gorie" required>
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1">Description du produit</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="descriptionCategory" rows="3" placeholder="Chaises pour des salons r??alis?? avec du bois d\'??b??ne ..."></textarea>
                                            </div>
                                
                                            <button class="btn btn-primary form_btn mt-4">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 p-3 bordered" id="newSubCategory">
                            <div class="row bg-white p-2 rounded">
                                <div class="mt-3">
                                    <h5>Nouvelle sous-cat??gorie</h5>
                                    <hr>
                                    <div>';

                                    if(isset($_POST["descriptionSubCategory"]) AND $_POST["subcategoryName"] AND $_GET["categoryID"]) {
                                        try {
        
                                            $input = filter_input_array(INPUT_POST);
                                            // $value = $_POST["categoryID"];

                                            $subcategory_description = mysqli_real_escape_string($conn, $input["descriptionSubCategory"]);
                                            $subcategory_name = mysqli_real_escape_string($conn, $input["subcategoryName"]);
                                            // $categoryID = mysqli_real_escape_string($conn, $input["categoryID"]);
        
                                            $stmt = $conn->prepare("INSERT INTO sub_category (sub_category_name, category_description, category_id)
                                                                VALUES (?, ?, ?)");
                                            $name_sub_categ = str_replace("\'", "'", $subcategory_name);
                                            $desc_sub_categ = str_replace("\'", "'", $subcategory_description);
                                            $categ_id = str_replace("\'", "'", $categoryID);

                                            $stmt->bind_param('sss', $name_sub_categ, $desc_sub_categ, $_GET["categoryID"]);
                                            
                                            $stmt->execute();
                                            
                                            echo'<div class="alert alert-success" role="alert">
                                                Enregistrement r??ussi !
                                                </div>'
                                            ;
                                        } catch(PDOException $e) {
                                            
                                            echo'<div class="alert alert-danger" role="alert">
                                                L\' enregistrement n\'a pas ??t?? faite  !
                                                </div>'
                                            ;
                                            // echo "Error: " . $e->getMessage();
                                        }
                                    }
        
                            echo'
                                        <form method="POST">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="subcategoryName" placeholder="Meuble pour salle de reception">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlSelect1">Appartient ?? la cat??gorie</label>
                                                <select class="form-control" name="categoryID">';
                                                
                                                $query = "SELECT * FROM  category ORDER BY category_name DESC ";
                                                $result = $conn->query($query);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["id"].'" id="'.$row["id"].'">'.$row["category_name"].'</option>';
                                                    }
                                                }
                            echo'
                                            </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1">Description du produit</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptionSubCategory" placeholder="Meubles pour les salles de reception des bureaux"></textarea>
                                            </div>
                                
                                            <button class="btn btn-primary form_btn mt-4">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div style="margin: 0 auto; text-align: center">Developp?? par <a href="">Ritchmond Gilles</a></div>  
                </div>';
                

        
    }
    
?>


<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
                label: "First name:",
                name: "first_name"
            }, {
                label: "Last name:",
                name: "last_name"
            }, {
                label: "Position:",
                name: "position"
            }, {
                label: "Office:",
                name: "office"
            }, {
                label: "Extension:",
                name: "extn"
            }, {
                label: "Start date:",
                name: "start_date",
                type: "datetime"
            }, {
                label: "Salary:",
                name: "salary"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
 
    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "../php/staff.php",
        order: [[ 1, 'asc' ]],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "first_name" },
            { data: "last_name" },
            { data: "position" },
            { data: "office" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>





<?php


function productTable(){
    include('../Model/Connection.php');

    // Pagination --------->

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM product ";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    
        $query = "SELECT product.id, product_name, product_description, product_price, image, category_name FROM  product, category WHERE categories_id = category.id";
        $result = $conn->query($query);

            echo '
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-5"> <h3>Liste des produits |</h3> </div>
                        <div class="col"><a class="btn btn-outline-primary" href="?home#newUser">Ajouter</a></div>
                        <div class="col"> 
                            <form method="POST" action="#" class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                            </form>
                    </div>
                </div>
            <hr>';

            echo '<div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Cat??gorie</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>';

                if(isset($_POST["search"])){


                    $query_search = 'SELECT * FROM product LEFT JOIN category ON categories_id <> 0 WHERE product_name LIKE "%'.$_POST["search"].'%"
                                    OR product_description LIKE "%'.$_POST["search"].'%"  OR category_name LIKE "%'.$_POST["search"].'%"';
                    $resultat = $conn->query($query_search);
    
                    if (mysqli_num_rows($resultat) > 0) {
                        while($row = mysqli_fetch_assoc($resultat)) {
                            echo'
                            <tr>
                                <td>'.$row["product_name"].'</td>
                                <td >'.$row["product_description"].'</td>
                                <td>'.$row["product_price"].'</td>
                                <td style="word-wrap: break-word; min-width: 160px; max-width: 160px;">'.$row["image"].'</td>
                                <td style="word-wrap: break-word; min-width: 140px; max-width: 140px;">'.$row["category_name"].'</td>
                                <td>
                                    <div class="row">
                                        <div class="col p-2">
                                            <a href="edit/edit-product.php?edit_product_id='.$row['product.id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="?delete_product_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        ';
                            
                        }
                        echo '</tbody></div>';
                    }
                    else{

                    }
                }else{
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo' <tbody>
                    <tr>
                        <td>'.$row["product_name"].'</td>
                        <td>'.$row["product_description"].'</td>
                        <td>'.$row["product_price"].'</td>
                        <td style="word-wrap: break-word; min-width: 160px; max-width: 160px;">'.$row["image"].'</td>
                        <td style="word-wrap: break-word; min-width: 140px; max-width: 140px;">'.$row["category_name"].'</td>
                        <td>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="edit/edit-product.php?edit_product_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col">
                                    <a href="?delete_product_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';
                }
            }
        }
        echo '</tbody>
        </table>';

        // delete();
}


function categoryTable(){
    include('../Model/Connection.php');

    // Pagination --------->

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM category ";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    
        $query = "SELECT * FROM  category ORDER BY category_name ASC";
        $result = $conn->query($query);
        
        echo '
            <div class="container">
                <div class="row mt-4">
                    <div class="col-5"> <h3>Liste des cat??gories |</h3> </div>
                    <div class="col"><a class="btn btn-outline-primary" href="?home#newCategory">Ajouter</a></div>
                    <div class="col"> 
                        <form method="POST" action="#" class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                        </form>
                </div>
            </div>
        <hr>';

        echo '<table class="table table-bordered">
                <thead>
                    <tr">
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>';

        if(isset($_POST["search"])){


            $query_search = 'SELECT * FROM category WHERE category_name LIKE "%'.$_POST["search"].'%" ';
            $resultat = $conn->query($query_search);

            if (mysqli_num_rows($resultat) > 0) {
                while($row = mysqli_fetch_assoc($resultat)) {
                    echo'<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLabel">Suppression d\'un ??l??ment</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    Vous ??tes sur le point de supprimer un ??l??ment, il se peut qu\'il soit attach?? ?? d\'autres.
                                    Si c\'est le cas, les ??l??ments auxquels il est attach?? seront supprim?? aussi !
                                <hr>
                                    Etes-vous vraiment s??re de votre suppression ?
                            </div>
                            <div class="modal-footer">
                            <div class="modal-footer">
                                <a href="#" class="btn btn-warning">Valider</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>';
                    
                    echo' <tbody>
                    <tr>
                        <td>'.$row["category_name"].'</td>
                        <td>'.$row["category_description"].'</td>
                        <td>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="edit/edit-category.php?edit_category_id='.$row['id'].'" class="btn btn-outline-primary align-middle"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-outline-danger align-middle" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                '; 
            }
            }else{
                echo '<div class="alert alert-danger">Aucune cat??gorie dans cette liste</div>';
            }
        }else{
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo'<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLabel">Suppression d\'un ??l??ment</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    Vous ??tes sur le point de supprimer un ??l??ment, il se peut qu\'il soit attach?? ?? d\'autres.
                                    Si c\'est le cas, les ??l??ments auxquels il est attach?? seront supprim?? aussi !
                                <hr>
                                    Etes-vous vraiment s??re de votre suppression ?
                            </div>
                            <div class="modal-footer">
                                <a href="?delete_category_id='.$row['id'].'" class="btn btn-warning">Valider</a>
                            </div>
                        </div>
                    </div>
                </div>';
                    
                    echo' <tbody>
                    <tr>
                        <td>'.$row["category_name"].'</td>
                        <td>'.$row["category_description"].'</td>
                        <td>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="edit/edit-category.php?edit_category_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col">
                                    <a href="?delete_category_id='.$row['id'].'" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';
                }
            }
        }
    echo '</tbody>
    </table>';

    // delete();

}


function subCategoryTable(){
    include('../Model/Connection.php');

    // Pagination --------->

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM sub_category ";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    
        $query = "SELECT sub_category.id, sub_category_name, sub_category_description, category_name FROM  sub_category, category WHERE category_id = category.id";
        $result = $conn->query($query);
        
        echo '
            <div class="container">
                <div class="row mt-4">
                    <div class="col-5"> <h3>Liste des sous-cat??gories |</h3> </div>
                    <div class="col"><a class="btn btn-outline-primary" href="?home#newSubCategory">Ajouter</a></div>
                    <div class="col"> 
                        <form method="POST" action="#" class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                        </form>
                </div>
            </div>
        <hr>';

        echo '<table class="table table-bordered mt-4">
                <thead>
                    <tr">
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Cat??gorie</th>
                        <th>Action</th>
                    </tr>
                </thead>';

    if(isset($_POST["search"])){

        $input = filter_input_array(INPUT_POST);
        $search = mysqli_real_escape_string($conn, $input["search"]);

        $query_search = 'SELECT sub_category.id, sub_category_name, sub_category_description, category_name FROM `sub_category` RIGHT JOIN category ON category_id = category.id
                WHERE sub_category_name LIKE "%'.$_POST["search"].'%" OR sub_category_description LIKE "%'.$_POST["search"].'%" OR category_name LIKE "%'.$_POST["search"].'%"';
        $resultat = $conn->query($query_search);

        if (mysqli_num_rows($resultat) > 0) {
            while($row = mysqli_fetch_assoc($resultat)) {
                echo' <tbody>
                    <tr>
                        <td>'.$row["sub_category_name"].'</td>
                        <td>'.$row["sub_category_description"].'</td>
                        <td>'.$row["category_name"].'</td>
                        <td>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="edit/edit-subcategory.php?edit_subcategory_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col">
                                    <a href="?delete_subcategory_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }else{
            echo '<div class="alert alert-danger">Aucune sous-cat??gorie dans cette liste</div>';
        }
    }else{
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo' <tbody>
                    <tr>
                        <td>'.$row["sub_category_name"].'</td>
                        <td>'.$row["sub_category_description"].'</td>
                        <td>'.$row["category_name"].'</td>
                        <td>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="edit/edit-subcategory.php?edit_subcategory_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col">
                                    <a href="?delete_subcategory_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }
    }
        echo '</tbody>
        </table>';
        
        // delete();
}


function userTable(){
    include('../Model/Connection.php');

    // Pagination --------->

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM user ";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    
        $query = "SELECT * FROM  user LIMIT $offset, $no_of_records_per_page";
        $result = $conn->query($query);

        echo '
            <div class="container">
                <div class="row mt-4">
                    <div class="col-5"> <h3>Liste des utilisateurs |</h3> </div>
                    <div class="col"><a class="btn btn-outline-primary" href="?home#newUser">Ajouter</a></div>
                    <div class="col"> 
                        <form method="POST" action="#" class="d-flex">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                </div>
            </div>
        <hr>';


         echo '<table class="table table-bordered">
                <thead>
                    <tr">
                        <th>Nom</th>
                        <th>Pr??nom</th>
                        <th>Email</th>
                        <th>username</th>
                        <th>Action</th>
                    </tr>
                </thead>';

        if(isset($_POST["search"])){

            $input = filter_input_array(INPUT_POST);
            $search = mysqli_real_escape_string($conn, $input["search"]);

            $query_search = 'SELECT * FROM user WHERE nom LIKE "%'.$_POST["search"].'%" OR prenom LIKE "%'.$_POST["search"].'%"
            OR email LIKE "%'.$_POST["search"].'%"  OR username LIKE "%'.$_POST["search"].'%"';
            $resultat = $conn->query($query_search);

            if (mysqli_num_rows($resultat) > 0) {
                while($row = mysqli_fetch_assoc($resultat)) {
                    echo ' <tbody>
                        <tr>
                            <td>'.$row["nom"].'</td>
                            <td>'.$row["prenom"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["username"].'</td>
                            <td>
                                <div class="row">
                                    <div class="col p-2">
                                        <a href="edit/edit-user.php?edit_user_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="?delete_user_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ';
                }
            }else{
                echo '<div class="alert alert-danger">Aucun utilisateur dans cette liste</div>';
            }
        } else{
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo ' <tbody>
                        <tr>
                            <td>'.$row["nom"].'</td>
                            <td>'.$row["prenom"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["username"].'</td>
                            <td>
                                <div class="row">
                                    <div class="col p-2">
                                        <a href="edit/edit-user.php?edit_user_id='.$row['id'].'" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="?delete_user_id='.$row['id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ';
                }
            }
        }
        echo '</tbody>
        </table>';
        
        // delete();
}

function editUser(){
    include('../Model/Connection.php');

    if(isset($_GET["edit_user_id"])){
        $query = "UPDATE FROM user WHERE id = '".$_GET["edit_user_id"]."'";
    }
}

function delete(){
    include('../Model/Connection.php');
            
            
            if(isset($_GET["delete_user_id"])){

                    $query = "DELETE FROM user WHERE id = '".$_GET["delete_user_id"]."'";
                    mysqli_query($conn, $query);
        
                    userTable();
            
            } 
            if(isset($_GET["delete_product_id"])){
    
                $query = "DELETE FROM product WHERE id = '".$_GET["delete_product_id"]."'";
                mysqli_query($conn, $query);
    
                productTable();
            
            } 
            if(isset($_GET["delete_category_id"])){

                
                // echo "<script> $('#exampleModal').modal('show'); </script>";

                    $query = "DELETE FROM category WHERE id = '".$_GET["delete_category_id"]."'";
                    mysqli_query($conn, $query);
        
                    categoryTable();

            } 
            if(isset($_GET["delete_subcategory_id"])){
    
                $query = "DELETE FROM sub_category WHERE id = '".$_GET["delete_subcategory_id"]."'";
                mysqli_query($conn, $query);
    
                subCategoryTable();
            
            }
}

?>