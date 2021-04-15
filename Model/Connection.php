<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hafcodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


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

    function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


?>