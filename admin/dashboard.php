<?php
    // include('../Model/Connection.php');
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
                        <a href="?produits" id="produits" name="produits" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-box-open mx-3"></i>Produits</a>
                        <a href="?categories" id="categories" name="categories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-list mx-3"></i>Catégories</a>
                        <a href="?subcategories" id="subcategories" name="subcategories" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-star mx-3"></i>Sous-catégories</a>
                        <a href="?users" id="users" name="users" class="btn btn-outline-primary mt-2 p-2 float-start"> <i class="fas fa-users mx-3"></i>Utilisateurs</a>
                    </nav>
                </div>

                <div class="col-sm-9 mx-3 bg-light p-2">
                    <?php
                        if(isset($_GET["produits"])){
                            productTable();
                        }
                        if(isset($_GET["categories"])){
                            categoryTable();
                        }
                        if(isset($_GET["subcategories"])){
                            subCategoryTable();
                        }
                        if(isset($_GET["users"])){
                            userTable();
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

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
        
        
            $query = "SELECT * FROM  product, category LIMIT $offset, $no_of_records_per_page";
            $result = $conn->query($query);

            echo '
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-5"> <h3>Liste des produits |</h3> </div>
                            <div class="col"><a class="btn btn-outline-primary" href="?newSubCategories">Ajouter</a></div>
                            <div class="col"> 
                                <form method="POST" action="#" class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                        </div>
                    </div>
                <hr>';

            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Image</th>
                            <th>Catégorie</th>
                            <th>Action</th>
                        </tr>
                    </thead>';

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo ' <tbody>
                        <tr>
                            <td>'.$row["product_name"].'</td>
                            <td>'.$row["product_description"].'</td>
                            <td>'.$row["product_price"].'</td>
                            <td>'.$row["image"].'</td>
                            <td>'.$row["category_name"].'</td>
                            <td>
                                <div class="row">
                                    <div class="col p-2">
                                        <a href="" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                                
                                
                            </td>
                        </tr>
                    ';
                }
            }
            echo '</tbody>
            </table>';

            echo'
            <ul class="pagination">
                <li><a href="?produits?pageno=1" class="page-link">First</a></li>
                <li class="page-item'; ?> <?php if($pageno <= 1){ echo 'disabled'; } ?> <?php echo ' ">
                    <a href="';?> <?php if($pageno <= 1){ echo '?produits'; } else { echo "pageno=".($pageno - 1); } ?> <?php echo '" class="page-link">Prev</a>
                </li>
                <li class="page-item';?> <?php if($pageno >= $total_pages){ echo 'disabled'; } ?> <?php echo'">
                    <a href="';?> <?php if($pageno >= $total_pages){ echo '?produits'; } else { echo "?pageno=".($pageno + 1); } ?> <?php echo'" class="page-link">Next</a>
                </li>
                <li><a href="?pageno=';?> <?php echo $total_pages; ?> <?php echo'"  class="page-link">Last</a></li>
            </ul>';
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
            
            
                $query = "SELECT * FROM  category LIMIT $offset, $no_of_records_per_page";
                $result = $conn->query($query);
                
                echo '
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-5"> <h3>Liste des catégories |</h3> </div>
                            <div class="col"><a class="btn btn-outline-primary" href="?newSubCategories">Ajouter</a></div>
                            <div class="col"> 
                                <form method="POST" action="#" class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
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
    
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo ' <tbody>
                            <tr>
                                <td>'.$row["category_name"].'</td>
                                <td>'.$row["category_description"].'</td>
                                <td>
                                    <div class="row">
                                        <div class="col p-2">
                                            <a href="" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                }
                echo '</tbody>
                </table>';
    
                echo'
                <ul class="pagination">
                <li><a href="?pageno=1" class="page-link">First</a></li>
                <li class="page-item'; ?> <?php if($pageno <= 1){ echo 'disabled'; } ?> <?php echo ' ">
                    <a href="';?> <?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?> <?php echo '" class="page-link">Prev</a>
                </li>
                <li class="page-item';?> <?php if($pageno >= $total_pages){ echo 'disabled'; } ?> <?php echo'">
                    <a href="';?> <?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> <?php echo'" class="page-link">Next</a>
                </li>
                <li><a href="?pageno=';?> <?php echo $total_pages; ?> <?php echo'"  class="page-link">Last</a></li>
                </ul>';
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
            
            
                $query = "SELECT * FROM  sub_category, category LIMIT $offset, $no_of_records_per_page";
                $result = $conn->query($query);
                
                echo '
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-5"> <h3>Liste des sous-catégories |</h3> </div>
                            <div class="col"><a class="btn btn-outline-primary" href="?newSubCategories">Ajouter</a></div>
                            <div class="col"> 
                                <form method="POST" action="#" class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                        </div>
                    </div>
                <hr>';

                echo '<table class="table table-bordered mt-4">
                        <thead>
                            <tr">
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>Action</th>
                            </tr>
                        </thead>';
    
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo ' <tbody>
                            <tr>
                                <td>'.$row["sub_category_name"].'</td>
                                <td>'.$row["sub_category_description"].'</td>
                                <td>'.$row["category_name"].'</td>
                                <td>
                                    <div class="row">
                                        <div class="col p-2">
                                            <a href="" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                }
                echo '</tbody>
                </table>';
    
                echo'
                <ul class="pagination">
                    <li><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="page-item'; ?> <?php if($pageno <= 1){ echo 'disabled'; } ?> <?php echo ' ">
                        <a href="';?> <?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?> <?php echo '" class="page-link">Prev</a>
                    </li>
                    <li class="page-item';?> <?php if($pageno >= $total_pages){ echo 'disabled'; } ?> <?php echo'">
                        <a href="';?> <?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> <?php echo'" class="page-link">Next</a>
                    </li>
                    <li><a href="?pageno=';?> <?php echo $total_pages; ?> <?php echo'"  class="page-link">Last</a></li>
                </ul>';
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
                            <div class="col"><a class="btn btn-outline-primary" href="?newSubCategories">Ajouter</a></div>
                            <div class="col"> 
                                <form method="POST" action="#" class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                        </div>
                    </div>
                <hr>';


                echo '<table class="table table-bordered">
                        <thead>
                            <tr">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>username</th>
                                <th>Action</th>
                            </tr>
                        </thead>';
    
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
                                            <a href="" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                }
                echo '</tbody>
                </table>';
    
                echo'
                <ul class="pagination">
                    <li><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="page-item'; ?> <?php if($pageno <= 1){ echo 'disabled'; } ?> <?php echo ' ">
                        <a href="'?> <?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?> <?php echo '"  class="page-link">Prev</a>
                    </li>
                    <li class="page-item <?php if($pageno >= $total_pages){ echo \'disabled\'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo \'#\'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>"  class="page-link">Last</a></li>
                </ul>';
        }
    
?>