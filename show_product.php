<?php
    include('base_header.php');
    include('Model/Connection.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Produit</title>
         
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
    
    <div class="container product">
        <div class="row g-0 bg-light position-relative">

                    <?php
                            $id = $_GET['meubles'];
                            $query = "SELECT * FROM  product WHERE id = '$id'";
                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {

                                    echo '<div class="col-md-6 mb-md-0 p-md-4">
                                        <img src="admin/uploads/images/products/'.$row['image'].'" class="w-100"/> </div>
                                        <div class="col-md-6 p-4 ps-md-0"> 
                                        <div class="product-details">
                                    ';

                                    echo '<h1>'. $row['product_name'] .'</h1> <hr>
                                    <p>'. $row['product_description'].'</p>
                                    <span class="price"> Prix : '. $row['product_price'] .' HTG</span>';
                                    
                                    if ($row['product_price'] == 0)
                                    {
                                        echo '<p class="text-muted mt-2">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Il n\'y a pas de prix précis pour ce genre de produits. 
                                        <br/> Veuillez nous contacter pour un devis
                                        </p>';
                                    }
                                }
                            }
                            
                            
                    echo '</div>';
                ?>

                <div class="product-details">
                   
                    <div class="message-btn btn">
                        <a class="btn whatsapp-btn" href="https://wa.me/message/CHRWTAHNTEOOB1">Ecrivez nous sur whatsapp</a>
                        <br/><br/>
                    </div>

                    <div class="message-btn btn">
                        <a class="btn form-btn" href="#contactForm">Formulaire d'informations</a>
                        <br/><br/>
                    </div>
                    <a class="link ms-1" href="{{path ('catalog')}}">Retournez à la liste des produits</a>
                </div>
            
            </div>
        </div>

         <div class="bg-light mt-4" id="contactForm">
            <h3>Ecrivez-nous par email</h3>
            <hr>
            
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput">
                            <label for="floatingInput">Nom</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput">
                            <label for="floatingInput">Prénom</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingInput">
                            <label for="floatingInput">Numéro de téléphone</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingInput" style="height: 100px"></textarea>
                        <label for="floatingInput" style="margin-left: 10px;">Commentaire</label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary form_btn"> Envoyer </button> 
                </div>
        </div>

    </div>

        <?php
            include('base_footer.php');
        ?>
    </body>
</html>