<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
         
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
           <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

           

            <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
            <!-- <link rel="stylesheet" href="Style/style.css"/> -->



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

        <style>
            .brand{
                height: 50px;
                width: 150px;
                object-fit: contain;
                margin-bottom: 20px;
            }
            
            .img{
                height: 493px;
                width: 600px;
                object-fit: cover;
                /* border-radius: 15px; */
            }
            .fw-bolder{
                color: #345282;
            }
            hr{
                visibility: hidden;
                display: none;
            }

            @media screen and (max-width: 767px) {
                body{
                    background-color: #f8f9fb;
                }
                .img{
                    visibility: hidden;
                    display: none;
                }
                .login{
                    margin-top:-380px;
                }
                .brand{
                    margin-left: 85px;
                    margin-bottom: 40px;
                    text-align: center;
                }
                p{
                    margin: 0 auto;
                    font-size: 15px;
                    width: 200px;
                    text-align: center;
                    padding-bottom: 20px;
                }
                .btn{
                    width: 100%;
                }
                hr{
                    display: contents;
                    visibility: visible;
                }
                
            }
        </style>

    </head> 


    <body>
        <div class="container ms-auto my-5 ">
            <div class="row bg-light h-75">
                <div class="col-sm-7 h-75">
                        <img src ="../images/img3.jpg" class="img w-100" />
                </div>
                <div class="col py-4 login">
                    <div class="row">
                        <div class="col-12">
                            <img src="../images/hafco_logo.png" alt="" class="brand" height="100%">
                        </div>
                        <hr>
                        <div class="col-12">
                            <p class="text-uppercase fs-5 fw-bolder">Connectez-vous à votre compte</p>
                        </div>
                    </div>
                    
                        <form method="POST" action="index.php" class="form-group">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <div class="mb-4 form-floating">
                                            <input type="text" class="form-control" name="username" required>
                                            <label for="floatingInput">Identifiant</label>
                                        </div>
                                        <div class="mb-4 form-floating">
                                            <input type="password" class="form-control" name="password" required>
                                            <label for="floatingInput">Mot de passe</label>
                                        </div>
                                        <div class="col-12">
                                            <button class="col-md-12 btn btn-primary" type="submit">Se connecter</button>
                                        </div>
                                    </div>

                                    <div class="col link mt-4">
                                        <div class="col-12">
                                            <a href="#" class="text-muted nav-link">Mot de passe oublier ?</a>
                                        </div>
                                        <div class="col-12">
                                            <a href="#" class="nav-link">Terms of use. Privacy policy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </body>

</html>

<?php
    include('../Model/Connection.php');
    // session_start();

    if(isset($_POST['username']) AND isset($_POST['password'])){

        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $query = "SELECT * FROM user WHERE username LIKE $username AND password LIKE $password";
        $result = $conn->query($query);

        if (mysqli_num_rows($result) > 0) {
            // session_register("username");
            header("Location: adminProduct.php");
            // $_SESSION['login_user'] = $username;
            echo $row['id'] .'-'. $row['nom'] .'-'. $row['prenom'] .'-'. $row['username'] .'-'. $row['password'] ;
        }
        else{
            echo 'Erreur de connection';
        }
    }
?>