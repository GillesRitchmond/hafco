<?php
 include('../../Model/Connection.php');

if(isset($_POST["category_name"]) AND ($_POST["category_description"]) )
{

    try {

        $category_name = mysqli_real_escape_string($conn, $input["category_name"]);
        $category_description = mysqli_real_escape_string($conn, $input["category_description"]);
       

        $stmt = $connect->prepare(" INSERT INTO category (category_name, category_description)
                            VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $category_name, $category_description);
        
        $input = filter_input_array(INPUT_POST);

        
        if($stmt->execute()){
            echo 'Enregistrement réussi';
        }
    
    } catch(PDOException $e) {
        
        echo'<div class="alert alert-danger" role="alert">
            L\' enregistrement n\'a pas été faite  !
            </div>'
        ;
        // echo "Error: " . $e->getMessage();
    }

}
?>