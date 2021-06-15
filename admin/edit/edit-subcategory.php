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
            <script src="https://code.jquery.com/jquery-3.6.0.js" 
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
            
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Suppression d'un élément</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Vous êtes sur le point de supprimer un élément, il se peut qu'il soit attaché à d'autres.
                            Si c'est le cas, les éléments auxquels il est attaché seront supprimé aussi !
                        <hr>
                            Etes-vous vraiment sûre de votre suppression ?
                    </div>
                    <div class="modal-footer">
                        <form action="?categories" method="post">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismi   -->
                            <button type="submit" name="valider" class="btn btn-warning">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-md">
                <h1 class="secondary">
                    <a class="navbar-brand" href="#">HAFCO - Dashboard</a>
                </h1>
                <a class="btn btn-danger" href="logout.php">Se déconnecter</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row mt-5 mx-4 g-2">
                <div class="col-sm-2">
                    <nav class="nav bg-light p-2 flex-column">
                        <a href="../dashboard.php" id="home" name="home" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-home mx-3"></i>Tableau de bord</a>
                        <a href="../productTable.php" id="produits" name="produits" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-box-open mx-3"></i>Produits</a>
                        <a href="../categoryTable.php" id="categories" name="categories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-list mx-3"></i>Catégories</a>
                        <a href="../subCategoryTable.php" id="subcategories" name="subcategories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-star mx-3"></i>Sous-catégories</a>
                        <a href="../userTable.php" id="users" name="users" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-users mx-3"></i>Utilisateurs</a>
                    </nav>
                </div>

                <div class="col-sm-9 bg-light p-3 mb-4" id="table-container">
                    <div class="bg-white p-3 rounded">
                        <div class="mt-3">
                            <h5>Mise à jour d'une sous-catégorie</h5>
                            <hr>

                            <?php
                                $id = $_GET['edit_subcategory_id'];
                                if(isset($_POST["descriptionSubCategory"]) AND $_POST["subcategoryName"] AND $_POST["categoryID"]) {
                                    try {
    
                                        $input = filter_input_array(INPUT_POST);
                                        // $value = $_POST["categoryID"];

                                        $subcategory_description = mysqli_real_escape_string($conn, $input["descriptionSubCategory"]);
                                        $subcategory_name = mysqli_real_escape_string($conn, $input["subcategoryName"]);
                                        $categoryID = mysqli_real_escape_string($conn, $input["categoryID"]);
                                                
                                        $stmt = $conn->prepare("UPDATE sub_category SET sub_category_name=?, sub_category_description=?, category_id=?
                                                            WHERE sub_category.id=?");
                                        $name_sub_categ = str_replace("\'", "'", $subcategory_name);
                                        $desc_sub_categ = str_replace("\'", "'", $subcategory_description);
                                        // $categ_id = str_replace("\'", "'", $categoryID);

                                        $stmt->bind_param('sssi', $name_sub_categ, $desc_sub_categ, $categoryID, $id);
                                        
                                        $stmt->execute();
                                        
                                        echo'<div class="alert alert-success" role="alert">
                                            Enregistrement réussi !
                                            </div>'
                                        ;
                                    } catch(PDOException $e) {
                                        
                                        echo '<div class="alert alert-danger" role="alert">Enregistrement échoué. Veuillez essayer à nouveau </div>';
                                    }
                                }
                            ?>
                            <form method="POST">
                                <?php
                                    $id = $_GET['edit_subcategory_id'];
                                    $query = 'SELECT sub_category.id, sub_category_name, sub_category_description FROM  sub_category WHERE sub_category.id ='. $id;
                                    $result = $conn->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<div class="form-group mb-3">
                                                <label for="exampleFormControlInput1">Nom</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" name="subcategoryName" value="'.$row["sub_category_name"].'">
                                            </div>';
                                        }
                                    }
                                ?>
                                <div class="form-group mb-3">
                                    <label for="exampleFormControlSelect1">Appartient à la catégorie</label>
                                    <select class="form-control" name="categoryID">';
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

                                <?php
                                    $id = $_GET['edit_subcategory_id'];
                                    $query = 'SELECT sub_category.id, sub_category_name, sub_category_description FROM  sub_category WHERE sub_category.id ='. $id;
                                    $result = $conn->query($query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<div class="form-group mb-3">
                                                    <label for="exampleFormControlTextarea1">Description du produit</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptionSubCategory" placeholder="Meubles pour les salles de reception des bureaux">'.$row['sub_category_description'].'</textarea>
                                            </div>';
                                        }
                                    }
                                ?>

                    
                                <button class="btn btn-primary form_btn mt-4">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>