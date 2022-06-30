<?php
require_once("includes/connection.php");

$id_midia = $_GET['mid_id'];

$sql= "DELETE FROM midias WHERE  mid_id = $id_midia";

mysqli_query($mysqli_connection, $sql);

echo "<script language='javascript' type='text/javascript'>

  window.location.replace('index.php');
    
</script>";
