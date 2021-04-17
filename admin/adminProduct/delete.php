<?php
 include('../../Model/Connection.php');

if(isset($_POST["id"]))
{
 $query = "DELETE FROM product WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Deleted';
 }
}
?>