<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

include('../Model/Connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Dashboard
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Style/style.css" />


    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- DATATABLES.NET -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- ICONS GOOGLE -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">


    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function reload()
        {

        }
    </script>
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
                    <a href="dashboard.php?home" id="home" name="home" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-home mx-3"></i>Tableau de bord</a>
                    <a href="productTable.php" id="produits" name="produits" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-box-open mx-3"></i>Produits</a>
                    <a href="categoryTable.php" id="categories" name="categories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-list mx-3"></i>Catégories</a>
                    <a href="subCategoryTable.php" id="subcategories" name="subcategories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-star mx-3"></i>Sous-catégories</a>
                    <a href="userTable.php" id="users" name="users" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-users mx-3"></i>Utilisateurs</a>
                </nav>
            </div>
            <div class="col-sm-9 mx-3 p-2" id="table-container">
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md">
                            <h3>Liste des produits |</h3>
                        </div>
                        <!-- <div class="col-md float-start"><a class="btn btn-outline-primary" href="dashboard.php?home#newUser">Ajouter</a></div> -->
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table id="dataTable" class="display wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Image</th>
                                    <th>Catégorie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT product.id, product_name, product_description, product_price, image, category_name FROM  product, category WHERE categories_id = category.id";
                                $result = $conn->query($query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                    <tr>
                        <td>' . $row["product_name"] . '</td>
                        <td style="word-wrap: break-word; min-width: 200px; max-width: 200px;">' . $row["product_description"] . '</td>
                        <td>' . $row["product_price"] . '</td>
                        <td style="word-wrap: break-word; min-width: 100px; max-width: 100px;">' . $row["image"] . '</td>
                        <td style="word-wrap: break-word; min-width: 140px; max-width: 140px;">' . $row["category_name"] . '</td>
                        <td style="word-wrap: break-word; min-width: 100px; max-width: 100px;">

                        <div class="row">
                            <div class="col-md-4"><a href="edit/edit-product.php?edit_product_id=' . $row['id'] . '" class="nav-link"><span class="material-icons-outlined"> mode_edit </span></a></div>
                            <div class="col-md-4"><a onClick="history.go(-1)" href="productTable.php?delete_product_id=' . $row['id'] . '" class="nav-link text-danger"> <span class="material-icons-outlined"> delete </span></a></div>
                        </div>
                            
                        </td>
                    </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                    if(isset($_GET["delete_product_id"])){
    
                        $query = "DELETE FROM product WHERE id = '".$_GET["delete_product_id"]."'";
                        mysqli_query($conn, $query);
                        
                        
                    }
                ?>

</body>

</html>