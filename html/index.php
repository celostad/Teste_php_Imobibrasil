<?php
require_once("includes/connection.php");
include_once("includes/inc_define.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">    
    <title><?php echo _TITLE_; ?></title>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62bc7e6f9dcec20012dc1357&product=inline-share-buttons" async="async"></script>    

<?php
require_once("includes/inc_cabec.php");

if (isset($_POST["pesquisa"])) {
    $pesquisa = $_POST["pesquisa"];
    $sql = "SELECT * FROM imoveis WHERE imo_titulo LIKE \"%$pesquisa%\"";
} else {
    $sql = "SELECT * FROM imoveis order by imo_id DESC";
}

$result = mysqli_query($mysqli_connection, $sql);

while ($obj = mysqli_fetch_array($result)) {
    $id = $obj[0];
    $titulo = $obj[1];
    $desc = $obj[2];
    $preco = $obj[3];
    $img_local = $obj[4];
    $data_up = $obj[5];

    $data_up = implode("/", array_reverse(explode("-", $data_up))); ?>

<div class="col-lg-6 col-md-8 mx-auto">
    <h1><i class="fs-2"><?php echo $titulo; ?> (ID <?php echo $id; ?>)</i></h1>
    <?php  if (!empty($img_local)) { ?>
        <img src='<?php echo $img_local; ?>' class='img-imovel'>
    <?php } ?>
    <p class="fs-4">R$ <?php echo number_format($preco, 2, ",", "."); ?></p>    
    <p class="lead text-muted"><?php echo $desc; ?></p> 
    <div class="sharethis-inline-share-buttons"></div>  
    <p class="fs-5">Data de envio (<?php echo $data_up; ?>)</p>    
    <p>
        <a href="imoveis-midias.php?imo_id=<?php echo $id; ?>" class="btn btn-primary my-2">Documentação</a>
        <a href="imoveis-edicao.php?imo_id=<?php echo $id; ?>" class="btn btn-secondary my-2">Editar Imóvel</a>
        <a href="imoveis-excluir.php?imo_id=<?php echo $id; ?>" class="btn btn-danger my-2">Excluir Residência</a>
    </p>
    
</div>
<?php
} ?>
</center>

<?php require_once("includes/inc_footer.php"); ?>
</body>
</html>