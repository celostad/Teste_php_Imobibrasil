<?php
require_once("includes/connection.php");

$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$preco = $_POST['preco'];
$local = $_POST['local'];
$id = $_POST['id'];

$sql = "UPDATE `imoveis`
 SET `imo_titulo`='".$titulo."',`imo_desc`= '".$desc."',`imo_preco`= '".$preco."',`imo_img_local`='".$local."'
  WHERE  `imo_id`='".$id."' ";

mysqli_query($mysqli_connection, $sql);

echo "<script language='javascript' type='text/javascript'>

  alert('O Imovel de ID:$id foi alterado com sucesso!');
  
  window.location.replace('index.php');
    
</script>";
