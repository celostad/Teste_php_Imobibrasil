<?php
require_once("includes/connection.php");
include_once("includes/inc_define.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _TITLE_EDICAO_IMOVEL. " - ". _SITE_; ?></title>

<?php
$pagina="cad-imovel";
require_once("includes/inc_cabec.php");


$id = $_GET['imo_id'];
$sql = "SELECT * FROM imoveis  WHERE imo_id = $id ";

$result = mysqli_query($mysqli_connection, $sql);

while ($obj = mysqli_fetch_array($result)) {
    $id = $obj[0];
    $titulo = $obj[1];
    $desc = $obj[2];
    $preco = $obj[3];
    $local = $obj[4]; ?>

<form method="post" action="imoveis-alterar.php">
<div id="div40">
    <h1><i><?php echo _TITLE_EDICAO_IMOVEL; ?></i></h1>
    <label class="form-label"><br>ID Imóvel</label><br>
    <input type="text" value="<?php echo $id; ?>" name="id" readonly><br>
    <label class="form-label"><br>Título</label><br>
    <input type="text" value="<?php echo $titulo; ?>" name="titulo"><br>
    <label class="form-label"><br>Descrição</label><br>
    <textarea name="desc" rows="3"><?php echo $desc; ?></textarea><br>
    <!-- <input type="textarea" value="<?php echo $desc; ?>" name="desc"><br> -->
    <label class="form-label"><br>Preço R$</label><br>
    <input type="text" value="<?php echo $preco; ?>" name="preco"><br>
    <label class="form-label"><br>Local da imagem</label><br>
    <input type="text" value="<?php echo $local; ?>" name="local"><br><br>
    <button type="submit" class="btn btn-success" name="bt" value="Alterar Imóvel">Alterar Imóvel</button> 
    <br> <br>
</div>  
    </form>

<?php
}
    mysqli_close($mysqli_connection);

?>
</center>
<?php require_once("includes/inc_footer.php"); ?>
</body>
</html>

