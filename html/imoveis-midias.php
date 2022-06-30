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
    <title><?php echo _TITLE_MIDIAS. " - ". _SITE_; ?></title>

<?php
require_once("includes/inc_cabec.php");

$id = $_GET["imo_id"];

echo "<h1>Documentações da Residência de ID $id</h1><br>";
echo"<form method='post' action=''>";
echo"<input type='text' name='pesquisa' class='pesquisa'  placeholder='Pesquise o tipo do documento aqui!'>";
echo"<input type='submit' name='bt' class='botao' value='Pesquisar'>";
echo "</form><br><br>";
echo "<a class='btn btn-success' id='imoveis-anexar' href='midias-cadastro.php'>Anexar Documentos</a><br><br>";

if (isset($_POST['bt'])) {
    $pesquisa = $_POST['pesquisa'];
    if ($pesquisa == '') {
        $sql = "SELECT * FROM midias WHERE imo_id = $id ";
    } else {
        $sql = "SELECT * FROM midias WHERE mid_tipo LIKE \"%$pesquisa%\" ";
    }
} else {
    $sql = "SELECT * FROM midias WHERE imo_id = $id ";
}

$result = mysqli_query($mysqli_connection, $sql);

while ($obj = mysqli_fetch_array($result)) {
    $id_midia = $obj[0];
    $id_imovel = $obj[1];
    $tipo = $obj[2];
    $local = $obj[4];
    $titulo = $obj[3];
    $data = $obj[5];
    $email = $obj[6]; ?>

 <form method='post' action='midias-alterar.php'>
    
    <h1 class="title-label"><?php echo $tipo; ?></h1>
    <p class="title-label">ID Mídia</p>
        <input type='text' name='id_midia' value='<?php echo $id_midia; ?>' readonly>
    <p class="title-label">ID Imóvel</p>
        <input type='text' name='id_imovel' value='<?php echo $id_imovel; ?>' readonly>
    <p class="title-label">Título</p>
        <input type='text' name='titulo' value='<?php echo $titulo; ?>'>
    <p class="title-label">Tipo da documentação</p>
        <input type='text' name='tipo' value='<?php echo $tipo; ?>'><br>
    <p class="title-label">Data de inclusão</p>
        <input type='date' name='data' value='<?php echo $data; ?>' readonly><br>
    <p class="title-label">Local do Arquivo</p>
        <input type='text' name='local' value='<?php echo $local; ?>'><br>
    <p class="title-label">Email do Remetente</p>
        <input type='text' name='email' value='<?php echo $email; ?>'><br><br><br>
    <a href='midias-excluir.php?mid_id=<?php echo $id_midia; ?>' class="btn btn-danger">Deletar</a>    
    <button type="submit" class="btn btn-success" href="midias-alterar.php?mid_id=<?php echo $id_midia; ?>">Alterar</button>
</form><br>
    <img src='<?php echo $local; ?>' class='midia-arquivo'><br><br><br><br>
<?php
}
?>

</center>
<?php require_once("includes/inc_footer.php"); ?>
</body>
</html>