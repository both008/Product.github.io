<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myshop";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
     
     $sql = "DELETE FROM clients WHERE id=$id";
     $result = $conn->query($sql);
    }
    header("location: index.php");
    exit;
?>