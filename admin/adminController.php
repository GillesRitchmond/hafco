<?php
    include('../Model/Connection.php');
    if(isset($_POST['username']) AND isset($_POST['password'])){

        $query = "SELECT * FROM user WHERE username =".$_POST['username']."AND password =".$_POST['password'];
        $result = $conn->query($query);

        if (mysqli_num_rows($result) == 1) {
            header("Location: adminProduct.php");
            exit();
        }
        else{
            header("Location: index.php");
            exit();
            echo 'Erreur de connection';
        }
    }
?>