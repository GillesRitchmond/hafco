<?php
 include('../../Model/Connection.php');

if(isset($_POST["product_name"]) AND ($_POST["product_description"]) AND ($_POST["product_price"]) AND ($_POST["image"]) AND ($_POST["categories_id"]) )
{

    try {

        $product_name = mysqli_real_escape_string($conn, $input["product_name"]);
        $product_description = mysqli_real_escape_string($conn, $input["product_description"]);
        $product_price = mysqli_real_escape_string($conn, $input["product_price"]);
        $image = mysqli_real_escape_string($conn, $input["image"]);
        $categories_id = mysqli_real_escape_string($conn, $input["categories_id"]);
       

        $stmt = $connect->prepare(" INSERT INTO product (product_name, product_description, product_price, image, categories_id)
                            VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $product_name, $product_description, $product_price, $image, $categories_id);
        
        $input = filter_input_array(INPUT_POST);

        
        if($stmt->execute()){
            echo 'Enregistrement réussi';
        }else
            echo '<div class="alert alert-danger" role="alert">
            L\' enregistrement n\'a pas été faite  !
            </div>'
        ;
    
    } catch(PDOException $e) {
        
        echo'<div class="alert alert-danger" role="alert">
            L\' enregistrement n\'a pas été faite  !
            </div>'
        ;
        // echo "Error: " . $e->getMessage();
    }

}
?>