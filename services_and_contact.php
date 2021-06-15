<?php

use PHPMailer\PHPMailer\PHPMailer;

include('base_header.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Contact & Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,
            300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://kit.fontawesome.com/c32e345056.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style/style.css" />



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</head>


<body>

    <div class="body-hafco body-services-hafco">

        <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin-top: 80px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block"  style="margin-top: 80px;">
                                <h1>Réparations et restauration de toutes sortes de meubles </h1>
                                <div class=""></div>
                                <p>Obtenez l’appareil électronique que vous voulez avec ces offres.</p>
                                
                                <!-- <a href="#" class="btn btn-brand mt-1"></a> --
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Les meilleurs produits sont à votre disposition</h1>
                                <div class=""></div>
                                <p>Nous sommes là pour répondre à vos besoins</p>
                                
                                <a href="#" class="btn btn-brand mt-3"></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Demandez votre devis</h1>
                                <div class="mt-4"></div>
                                <p>Nous sommes disponibles 24/7 pour répondre à <br> vos besoins et services.</p>

                                <a href="#" class="btn btn-brand mt-3"></a>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> -->
        <div class="banner banner-services">

            <div class="content container">
                <div class="text-width">
                    <h1> <span id="ctlg"> Réparations et restauration </span> de toutes sortes de meubles </h1>
                    <li class="meubles-btn">
                        <a href="index.php">Voir nos meubles</a>
                    </li>
                </div>
            </div>
        </div>


        <!-- </div>
                </div> -->



        <div class="section-content">
            <div class="container services">
                <h1> Besoin d'aide ? </h1>
                <div class="help-services">
                    <p>
                        Nous sommes disponibles 24/7 pour répondre à vos besoins et services.
                        <br />N'hésitez pas à passer nous voir ou à nous appeler au :
                        <br /> <span class="bg-light"> 19, Angle rues Villate et Magny, Pétion-Ville, Haïti
                            <br /> 509 28 13 1786 | 509 28 13 1787 </span>
                    </p>
                </div>

                <div class="starred-link">
                    <div class="bg-light">
                        <span id="services-hours"> Nos heures de services </span>
                        <br />
                        <div class="m-table-auto">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5>Lundi </h5>
                                        </td>
                                        <td>8:00 AM - 4:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Mardi </h5>
                                        </td>
                                        <td>8:00 AM - 4:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Mercredi </h5>
                                        </td>
                                        <td>8:00 AM - 4:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Jeudi </h5>
                                        </td>
                                        <td>8:00 AM - 4:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Vendredi </h5>
                                        </td>
                                        <td>8:00 AM - 4:00 PM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="form-contact">

                    <div class="row">
                        <div class="col-sm">
                            <h1>Formulaire de contact</h1>
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="fullname" id="floatingInput" placeholder="Veuillez insérez votre nom complet" require>
                                        <label for="floatingInput">Nom complet</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" require>
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" require></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>
                                    <div class="col-12 submit-btn">
                                        <button class="btn btn-primary" name="submit" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-sm">
                            <img class="img-pub" src="images/img2.jpg" width="100%" height="100%" alt="" />
                        </div>


                    </div>

                </div>

            </div>
            <div>

            </div>

            <?php
            include('base_footer.php');
            ?>
</body>

</html>


<?php

require_once('PHPMailer-master/src/Exception.php');
require_once('PHPMailer-master/src/PHPMailer.php');
require_once('PHPMailer-master/src/SMTP.php');

if (isset($_POST['submit'])) {

    $fullname = '<b>Nom de la personne :</b> '.$_POST['fullname'];
    $mail = '<b>Email de contact :</b> '.$_POST['email'];
    $comment = '<b>Message :</b>'.$_POST['comment'];

    $body = $fullname.' <br> '.$mail.' <br> '.$comment;
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->isHTML();
    $mail->Username = 'nepasrepondre.hafcosa@gmail.com';
    $mail->Password = 'hafco-website';
    $mail->SetFrom('nepasrepondre.hafcosa@gmail.com', 'HAFCO S.A');
    $mail->Subject = 'Demande d\'informations sur nos produits ou services';
    $mail->Body = $body;
    $mail->AddAddress('gritchmond@gmail.com');


    if ($mail->send()) {
        echo '<div class="alert alert-success" role="alert"> Message Envoyé ! </div>';
    }
}
?>