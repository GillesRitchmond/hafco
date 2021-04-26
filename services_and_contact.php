<?php

use PHPMailer\PHPMailer\PHPMailer;

include('base_header.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact & Services</title>
         
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

        <div class="body-hafco body-services-hafco">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h1>Réparations et restauration de <br>  toutes sortes de meubles </h1>
                                <div class="mt-4"></div>
                                <p>Obtenez l’appareil électronique que vous voulez avec ces offres.</p>
                                
                                <a href="#" class="btn btn-brand mt-5"></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Les meilleurs produits <br> sont à votre disposition</h1>
                                <div class="mt-4"></div>
                                <p>Nous sommes là pour répondre à vos besoins</p>
                                
                                <a href="#" class="btn btn-brand mt-5"></a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/home-banner.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Demandez votre devis</h1>
                                <div class="mt-4"></div>
                                <p>Nous sommes disponibles 24/7 pour répondre à <br> vos besoins et services.</p>

                                <a href="#" class="btn btn-brand mt-5"></a>
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
                </div>
                    <!-- <div class="banner banner-services">

                        <div class="content container">
                            <div class="text-width">
                                <h1>  <span id="ctlg"> Réparations et restauration </span> de toutes sortes de meubles </h1>
                                <li class="meubles-btn"> 
                                <a href="index.php">Voir nos meubles</a>
                                </li>
                            </div>
                        </div>
                    </div> -->
                        
                       
                    <!-- </div>
                </div> -->



            <div class="section-content">
                <div class="container services">
                    <h1> Besoin d'aide ? </h1>
                    <div class="help-services">
                        <p>
                            Nous sommes disponibles 24/7 pour répondre à vos besoins et services.
                            <br/>N'hésitez pas à passer nous voir ou à nous appeler au :
                            <br/> <span class="bg-light"> 19, Angle rues Villate et Magny, Pétion-Ville, Haïti
                            <br/> 509 28 13 1786   |   509 28 13 1787 </span>
                        </p>
                    </div>

                    <div class="starred-link">
                        <div class="bg-light">
                            <span id="services-hours"> Nos heures de services </span>
                            <br/>
                            <div class="m-table-auto">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                                <td><h5>Lundi </h5> </td>
                                                <td>8:00 AM  -  4:00 PM</td>
                                        </tr> 
                                        <tr>
                                                <td><h5>Mardi </h5> </td>
                                                <td>8:00 AM  -  4:00 PM</td>
                                        </tr>
                                        <tr>
                                                <td><h5>Mercredi </h5> </td>
                                                <td>8:00 AM  -  4:00 PM</td>
                                        </tr>
                                        <tr>
                                                <td><h5>Jeudi </h5> </td>
                                                <td>8:00 AM  -  4:00 PM</td>
                                        </tr>
                                        <tr>
                                                <td><h5>Vendredi </h5> </td>
                                                <td>8:00 AM  -  4:00 PM</td>
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
                                            <input type="text" class="form-control" name="fullname" id="floatingInput" placeholder="Veuillez insérez votre nom complet">
                                            <label for="floatingInput">Nom complet</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                        <div class="col-12 submit-btn">
                                            <button class="btn btn-primary" type="submit">Envoyer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                                <div class="col-sm">
                                    <img class="img-pub" src="images/img2.jpg" width="100%" height="100%"  alt=""/>
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


$mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->isHTML();
    $mail->Username = 'ritchmond.gilles@esih.edu';
    $mail->Password = 'aniteraymond';
    $mail->SetFrom('ritchmond.gilles@esih.edu', 'Mailer');
    $mail->Subject = 'Test';
    $mail->Body = 'Bonjour';
    $mail->AddAddress('gritchmond@gmail.com');

    $mail->send();
    // echo 'Message has been sent';


    if(isset($_POST['fullname']) AND  isset($_POST['email']) AND isset($_POST['comment'])){
    //     require_once('PHPMailer-master/src/Exception.php');
    //     require_once('PHPMailer-master/src/PHPMailer.php');
    //     require_once('PHPMailer-master/src/SMTP.php');
        

    //     $mail = new PHPMailer();
    //     try {
    //         $mail->isSMTP();
    //         $mail->SMTPAuth = true;
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->Port = 587;
    //         $mail->isHTML();
    //         $mail->Username = 'ritchmond.gilles@esih.edu';
    //         $mail->Password = 'aniteraymond';
    //         $mail->SetFrom('ritchmond.gilles@esih.edu', 'Mailer');
    //         $mail->Subject = $subject;
    //         $mail->Body = $messag;
    //         $mail->AddAddress('gritchmond@gmail.com');

    //         $mail->send();
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
        
        // $to = "gritchmond@gmail.com";
        $subject = "Demande d'informations sur nos produits et servcices";

        $messag = '
        <!doctype html>
            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

            <head>
            <title>
            </title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
                #outlook a {
                padding: 0;
                }

                body {
                margin: 0;
                padding: 0;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                }

                table,
                td {
                border-collapse: collapse;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                }

                img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
                }

                p {
                display: block;
                margin: 13px 0;
                }
            </style>
            <!--[if mso]>
                    <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG/>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]-->
            <!--[if lte mso 11]>
                    <style type="text/css">
                    .mj-outlook-group-fix { width:100% !important; }
                    </style>
                    <![endif]-->
            <style type="text/css">
                @media only screen and (min-width:480px) {
                .mj-column-per-100 {
                    width: 100% !important;
                    max-width: 100%;
                }
                }
            </style>
            <style type="text/css">
                @media only screen and (max-width:480px) {
                table.mj-full-width-mobile {
                    width: 100% !important;
                }

                td.mj-full-width-mobile {
                    width: auto !important;
                }
                }
            </style>
            </head>

            <body>
            <div style="">
                <!--[if mso | IE]>
                <table
                    align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                >
                    <tr>
                    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                <![endif]-->
                <div style="margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                        <!--[if mso | IE]>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            
                    <tr>
                
                        <td
                        class="" style="vertical-align:top;width:600px;"
                        >
                    <![endif]-->
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                    <tbody>
                                    <tr>
                                        <td style="width:100px;">
                                        <img height="auto" src="images/hafco_logo_png" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="100" />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <p style="border-top:solid 4px #345282;font-size:1px;margin:0px auto;width:100%;">
                                </p>
                                <!--[if mso | IE]>
                    <table
                    align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 4px #345282;font-size:1px;margin:0px auto;width:550px;" role="presentation" width="550px"
                    >
                    <tr>
                        <td style="height:0;line-height:0;">
                        &nbsp;
                        </td>
                    </tr>
                    </table>
                <![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div style="font-family:helvetica;font-size:20px;line-height:1;text-align:center;color:#345282;">
                                Demande d\'informations sur nous produits et services
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:0px;word-break:break-word;">
                                <!--[if mso | IE]>
                
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td height="40" style="height:40px;">
                
                <![endif]-->
                                <div style="height:40px;"> &nbsp; </div>
                                <!--[if mso | IE]>
                
                    </td></tr></table>
                
                <![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div style="font-family:helvetica;font-size:20px;line-height:1;text-align:center;color:#000000;">
                                '.$_POST["fullname"].'
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div style="font-family:helvetica;font-size:20px;line-height:1;text-align:center;color:#000000;">
                                '.$_POST["email"].'
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div style="font-family:helvetica;font-size:20px;line-height:1;text-align:left;color:#000000;">
                                '.$_POST["comment"].'
                                </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <!--[if mso | IE]>
                        </td>
                    
                    </tr>
                
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <!--[if mso | IE]>
                    </td>
                    </tr>
                </table>
                <![endif]-->
            </div>
            </body>

            </html>
        ';
        $message= "Bonjour";
        // Always set content-type when sending HTML email
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        // $headers = 'From: ritchmond.gilles@esih.edu'       . "\r\n" .
        //          'Reply-To: gritchmond@gmail.com' . "\r\n" .
        //          'X-Mailer: PHP/' . phpversion();
        // mail($to,$subject,$message, $headers);
    }
?>

