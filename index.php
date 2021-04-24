<?php
    include('base_header.php');
    include('Model/Connection.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catalogue</title>
         
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
           <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

           

            <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="Style/style.css"/>



        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    <div class="body-hafco">

        <div class="banner bg-catalog">
            <div class="content container">
                <div class="text-width mx-auto">
                    <div class="input-group search">
                       <div class="row search-form">
                       
                            <div class="col-lg-12 search-content">
                                <div class="row px-12" id="adv-search">
                                    <div class="row">
                        
                        <h1 class="mb-4"> Rechercher dans <br/> notre<span id="ctlg"> catalogue </span> </h1>

                                        <form action="index.php" method="POST">
                                            <input type="text" class="form-control" id="search" name="search"  placeholder="Exemple : Fournitures de bureau" /> 

                                            <div class="col-md">
                                                <button type="submit" class="btn btn-secondary mt-4 mx-auto"> Rechercher </button>
                                            </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
       
        <div class="container section-content js-filter">
            <div class="row g-2">
                <div class="col-6 col-md-3 category-list">
                    <div class="p-3 border bg-light filter " data-bs-spy="scroll">
    
                        <div class="category"><h5>Catégories de produits</h5></div>
                        <hr>
                        <form action="index.php" method="GET">
                            <?php
                                $query = "SELECT * FROM  category ORDER BY category_name ASC";
                                $result = $conn->query($query);
                            
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="form-check">
                                                
                                                <input class="form-check-input" type="checkbox" value="'.$row['id'].'" id="'.$row['id'].'" name="categorie-meubles" >
                                                    <a href="?category='.$row['category_name'].'-meubles-"></a>
                                                </input>
                                                <label class="form-check-label" for="flexCheckDefault">'.$row['category_name'].'</label>
                                            </div>';
                                    }
                                }
                            ?>
                            
                            <button type="submit" id="searchByCategory" class="btn btn-primary mt-3">Rechercher</button>
                        </form>
                    </div>
                </div>

                 
                
                <div class="col-sm-6 col-md-9">
                    <div class="p-3 border bg-light">
                        <div>
                            <div class="category_link">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb bg-light">
                                        <div class="category"><h5>Liste de produits</h5></div>
                                    </ol>
                                </nav>
                            </div>
                            <hr>

                            <div class="row row-cols-1 row-cols-md-3 g-2 js-filster-content">


                                <?php

                                // Fetch Product
                                
                                    if(isset($_GET["categorie-meubles"])){

                                        // Pagination --------->

                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        
                                        $no_of_records_per_page = 12;
                                        $offset = ($pageno-1) * $no_of_records_per_page;

                                        $total_pages_sql = "SELECT COUNT(*) FROM product WHERE categories_id LIKE '".$_GET["categorie-meubles"]."'";
                                        $result = mysqli_query($conn,$total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                                        $query = "SELECT * FROM  product WHERE categories_id LIKE '".$_GET["categorie-meubles"]."' LIMIT $offset, $no_of_records_per_page";
                                        $result = $conn->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="col-md-4"> <div class="card mx-auto my-auto h-100">';
                                                echo '<img src="upload/images/products/'.$row['image'].'" style="height=100%; width=100%"/>'; 
                                                echo '<div class="card-body"> <h3 class="card-title">'. $row['product_name'] .'</h3> <hr>';
                                                echo '<p class="card-text">'. $row['product_description'] ;
                                                echo '</p> </div> <a href="show_product.php?product_id=<?='.$row['id'].'?>" >';
                                                echo '<div class="card-footer"> <small class="text"> Plus de détails </small> </div> </a> </div> </div>';
                                            }
                                        }else {
                                            echo '<div class="col-lg-7 alert alert-danger">Pas de produits dans cette catégorie</div>';
                                        } 
                                    }
                                     elseif(isset($_POST["search"])){

                                        // Pagination --------->

                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        
                                        $no_of_records_per_page = 12;
                                        $offset = ($pageno-1) * $no_of_records_per_page;

                                        $total_pages_sql = "SELECT COUNT(*) FROM product WHERE product_name LIKE '%".$_POST["search"]."%'";
                                        $result = mysqli_query($conn,$total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                                        $query = 'SELECT * FROM  product WHERE product_name LIKE "%'.$_POST["search"].'%"' ;
                                        $result = $conn->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="col-md-4"> <div class="card mx-auto my-auto h-100">';
                                                echo '<img src="upload/images/products/'.$row['image'].'" style="height=100%; width=100%"/>'; 
                                                echo '<div class="card-body"> <h3 class="card-title">'. $row['product_name'] .'</h3> <hr>';
                                                echo '<p class="card-text">'. $row['product_description'] ;
                                                echo '</p> </div> <a href="show_product.php?product_id=<?='.$row['id'].'?>" >';
                                                echo '<div class="card-footer"> <small class="text"> Plus de détails </small> </div> </a> </div> </div>';
                                            }
                                        }else {
                                            echo '<div class="col-lg-7 alert alert-danger">Pas de produits approprié à votre recherche</div>';
                                        } 
                                    }
                                    elseif(isset($_POST["search"]) AND ($_GET["categorie-meubles"])){

                                        // Pagination --------->

                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        
                                        $no_of_records_per_page = 12;
                                        $offset = ($pageno-1) * $no_of_records_per_page;

                                        $total_pages_sql = "SELECT COUNT(*) FROM product WHERE categories_id LIKE '".$_GET["categorie-meubles"]."' AND product_name LIKE '%".$_POST["search"]."%'";
                                        $result = mysqli_query($conn,$total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                                        $query = "SELECT * FROM product WHERE categories_id LIKE '".$_GET["categorie-meubles"]."' AND product_name LIKE '%".$_POST["search"]."%'";
                                        $result = $conn->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="col-md-4"> <div class="card mx-auto my-auto h-100">';
                                                echo '<img src="upload/images/products/'.$row['image'].'" style="height=100%; width=100%"/>'; 
                                                echo '<div class="card-body"> <h3 class="card-title">'. $row['product_name'] .'</h3> <hr>';
                                                echo '<p class="card-text">'. $row['product_description'] ;
                                                echo '</p> </div> <a href="show_product.php?product_id=<?='.$row['id'].'?>" >';
                                                echo '<div class="card-footer"> <small class="text"> Plus de détails </small> </div> </a> </div> </div>';
                                            }
                                        }else {
                                            echo '<div class="col-lg-7 alert alert-danger">Pas de produits approprié à votre recherche</div>';
                                        } 
                                    }
                                    
                                    else{

                                        // Pagination --------->

                                        if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                        } else {
                                            $pageno = 1;
                                        }
                                        
                                        $no_of_records_per_page = 12;
                                        $offset = ($pageno-1) * $no_of_records_per_page;

                                        $total_pages_sql = "SELECT COUNT(*) FROM product WHERE categories_id <> 0";
                                        $result = mysqli_query($conn,$total_pages_sql);
                                        $total_rows = mysqli_fetch_array($result)[0];
                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

                                        $query = "SELECT * FROM  product WHERE categories_id <> 0 ORDER BY product_name LIMIT $offset, $no_of_records_per_page";
                                        $result = $conn->query($query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="col-md-4"> <div class="card mx-auto my-auto h-100">';
                                                echo '<img src="upload/images/products/'.$row['image'].'" style="height=100%; width=100%"/>'; 
                                                    
                                                echo '<div class="card-body"> <h3 class="card-title">'. $row['product_name'] .'</h3> <hr>';
                                                echo '<p class="card-text">'. $row['product_description'] ;
                                                echo '</p> </div> <a href="show_product.php?product_id='.$row['id'].'-'.$row['product_name'].'" >';
                                                echo '<div class="card-footer"> <small class="text"> Plus de détails </small> </div> </a> </div> </div>';
                                            }
                                        }
                                    }
                                ?>


                            </div>
                            
                            <ul class="pagination">
                                <li><a href="?pageno=1" class="page-link">First</a></li>
                                <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"  class="page-link">Prev</a>
                                </li>
                                <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
                                </li>
                                <li><a href="?pageno=<?php echo $total_pages; ?>"  class="page-link">Last</a></li>
                            </ul>

                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        
    </div>

    <?php
        include('base_footer.php');
    ?>
    </body>
</html>

