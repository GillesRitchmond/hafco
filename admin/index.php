<?php

    // Initialize the session
    session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

    include('../Model/Connection.php');
    // session_start();

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = $login_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM user WHERE username = ?";


            if($stmt = $conn->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Store result
                    $stmt->store_result();
                    
                    // Check if username exists, if yes then verify password
                    if($stmt->num_rows == 1){                    
                        // Bind result variables
                        $stmt->bind_result($id, $username, $hashed_password);
                        if($stmt->fetch()){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                // Redirect user to welcome page
                                header("location: adminProduct/index.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
        
        // Close connection
        $conn->close();
    }

?>


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


                <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                ?>

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <div class="mb-4 form-floating">
                                            <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" name="username" required>
                                            <label for="floatingInput">Identifiant</label>
                                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                        </div>
                                        <div class="mb-4 form-floating">
                                            <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password" required>
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
