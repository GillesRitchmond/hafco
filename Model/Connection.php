<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hafcodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

function catalogFetchData(){
    $query = "SELECT * FROM  product, category ORDER BY product_name AND ORDER BY category_name";
    $result = $conn->query($query);

    $conn->close();
}

function catalogFetchDataByID($id){
    $query = "SELECT * FROM  product WHERE id =" .$id;
    $result = $conn->query($query);

    $conn->close();
}

function catalogFetchDataByName($product_name){
    $query = "SELECT * FROM  product WHERE product_name = ". $product_name ."ORDER BY product_name";
    $result = $conn->query($query);

    $conn->close();
}

function catalogFetchDataByCategory($categories_id){
    $query = "SELECT * FROM  product WHERE categories_id = ". $categories_id ."ORDER BY product_name";
    $result = $conn->query($query);

    $conn->close();
}

?>