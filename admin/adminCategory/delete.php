<?php
 include('../../Model/Connection.php');

if(isset($_POST["id"]))
{
 $query = "DELETE FROM category WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Deleted';
 }
}
?>