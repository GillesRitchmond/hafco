<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         
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

         <!-- <nav class="navbar fixed-top navbar-expand-lg fixed-navbar navbar-light">
            
            <div class="container-fluid">
                
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse sticky-top navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {% if controller_name is defined and controller_name == 'HomeController' %} active {% endif %}" aria-current="page" href="{{path('home')}}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {% if controller_name is defined and controller_name == 'AboutUsController' %} active {% endif %}" href="{{path('about_us')}}">Qui sommes-nous ?</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link navbar-brand" href="#">
                                <img src="{{asset('images/group4@2x.png')}}" alt="" width="100%" height="100%" class="d-inline-block align-top">
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {% if controller_name is defined and controller_name == 'CatalogController' %} active {% endif %}" href="{{path('catalog')}}">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {% if controller_name is defined and controller_name == 'ContactAndServicesController' %} active {% endif %}" href="{{path('contact_and_services')}}">Services & Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>  -->
        <nav class="navbar navbar-expand-lg sticky-top navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">Qui sommes-nous ?</a>
                        </li>

                        <li class="nav-item navbar-brand">
                            <a class="nav-link navbar-brand" href="#">
                                <img src="images/group4@2x.png" alt="" width="100%" height="100%" class="d-inline-block brand align-top">
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services_and_contact.php">Services & Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </body>
</html>