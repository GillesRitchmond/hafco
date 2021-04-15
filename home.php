<?php
    include('base_header.php');
    include('Model/Connection.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
         
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

        <div class="banner">
             <div class="content container">
                <div class="text-width">
                    <h1> 50 ans d'expérience dans la fabrication de <span id="ctlg"> mobilier scolaire <span> </h1>
                    <li class="meubles-btn"> 
                        <a href="#">Voir nos meubles</a>
                    </li>
                </div>
            </div>

            <!-- <div id="carouselExampleDark" class="carousel carousel-light slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item first active" data-bs-interval="5000">
                        {# <img src="https://via.placeholder.com/728x350" class="d-block w-100" alt="..."> #}
                        <div class="carousel-caption d-none d-md-block">
                            <div class="content">
                                <div class="text-width">
                                    <h1> <span id="ctlg"> HAFCO <br/> </span> Haitian American Fiberglass Company S.A. </h1>
                                    <li class="meubles-btn"> 
                                        <a href="{{ path('about_us')}}#aboutUs">Qui sommes-nous ?</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item second" data-bs-interval="5000">
                    {# <img src="https://via.placeholder.com/728x350" class="d-block w-100" alt="..."> #}
                        <div class="carousel-caption d-none d-md-block">
                            <div class="content ">
                                <div class="text-width">
                                    <h1> Des services de <span id="ctlg"> réparations et de restauration de meubles </span> </h1>
                                    <li class="meubles-btn"> 
                                        <a href="{{path('contact_and_services')}}">Nos services</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item third" data-bs-interval="5000">
                    {# <img src="https://via.placeholder.com/728x350" class="d-block w-100" alt="..."> #}
                    <div class="carousel-caption d-none d-md-block">
                        <div class="content ">
                            <div class="text-width">
                                <h1> 50 ans d'expérience <br/> dans la fabrication de <span id="ctlg"> mobilier scolaire </span> </h1>
                                <li class="meubles-btn"> 
                                    <a href="{{path('catalog')}}">Voir nos meubles</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                {# <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="iconify iconify-left" data-icon="fa-angle-left" data-inline="false" style="color: white;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="iconify" data-icon="fa-angle-right" data-inline="false" style="color: white;"></span>
                    <span class="visually-hidden">Next</span>
                </button> #}
            </div>
            {# <div class="bg-home-video">
                <video autoplay muted loop id="myVideo">
                    <source src="{{asset('videos/meubles.mp4')}}" type="video/mp4">
                </video>
            </div> #} -->
        </div>

        <div class="section-content">
            <div class="container">
                <div class="starred-link">
                    
                    <span class="span-product"> Liens importants</span>
                    
                    <div class="links row">
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{path('catalog')}}">Découvrir notre catalogue</a></li>
                                <li class="breadcrumb-item"><a href="{{path('catalog')}}">Acheter nos produits</a></li>
                                <li class="breadcrumb-item"><a href="{{path('about_us')}}">Pourquoi choisir la HAFCO ?</a></li>
                                <li class="breadcrumb-item"><a href="{{path('contact_and_services')}}">Nos services</a></li>
                            </ol>
                        </nav>
                    </div>  
                </div>

                <div class="home-aboutUs">
                    
                    <div class="row flex">
                        <div class="col-sm-8">
                            <div class="bg-color">
                                <h1>Historicité<hr></h1>
                            
                                <p>
                                    La HAFCO est la première manufacture de meubles en fibre de verre (fiberglass) fondée 
                                    en 1971 pour répondre à un besoin spécifique du marché. En effet, avec l'essor 
                                    remarquable du secteur touristique qu'à connu Haïti à l'époque, il fallait bien meubler les 
                                    hôtels et les restaurants qui se multipliaient à travers le territoire, El Rancho, Villa Créole, 
                                    Olofson et autres.
                                </p>
                                <br/>
                                <a href="about_us.php#historicité">Lire plus</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <img src="images/img8.jpg" class="about-img" width="100%" height="auto" alt=""/>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-sm-4">
                            <img src="images/img6.jpg" class="about-img" width="100%" height="100%"  alt=""/>
                        </div>

                        <div class="col-sm-8">
                            <div class="bg-color">
                                <h1>Notre sélection <hr></h1>
                                <p>
                                    HAFCO S.A. vous offre toute une gamme de meubles en : fibre de verre, bois, fer forgé concus pour
                                    répondre aux besoins d'ameublement de votre institution. Quand il s'agit de mobilier, HAFCO S.A.
                                    est le leader dans la fabrication de produits durables et de haute qualité, concus et fabriqués à
                                    des prix abordables.
                                </p>
                                <br/>
                                <a href="about_us.php#aboutUs">Lire plus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="products">
                    <div class="starred-link">
                        <span> Nos produits </span>

                        <p class="span-product mt-4"> Quand il s'agit de mobilier, HAFCO S.A. est le leader dans la 
                            fabrication de produits durables et de haute qualité, concus et fabriqués à des prix abordables.
                        </p>
                    </div>

                    
                    <div class="product-content">
                        <div class="row flex">

                            <?php

                                $query = "SELECT * FROM  product WHERE categories_id <> 0 ORDER BY product_name DESC LIMIT 12";
                                $result = $conn->query($query);

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {

                                        echo '<div class="col-sm p-1"> <a href="" >';
                                        echo '<div class="img-hover"><a href="" class="details-btn">Détails</a></div>';
                                        echo '<img src="upload/images/products/'.$row['image'].'" class="img-product" alt=""/> </a> </div>';
                                    }
                                }
                            ?>
                            
                        </div>
                    
                        <div class="more-link"><a href="index.php">Voir plus</a></div>

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