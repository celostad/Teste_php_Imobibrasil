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
    <title><?php echo _TITLE_CADASTRO_IMOVEIS. " - ". _SITE_; ?></title>
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/imoveis-cadastro.css"> -->
<?php
$pagina="cad-imovel";
require_once("includes/inc_cabec.php");
?>
<div class="tudo-cadastroimoveis">
 
<?php

if (isset($_POST["acao"])) {
    $titulo = $_POST["titulo"];
    $desc = $_POST["desc"];
    $preco = $_POST["preco"];

    if (isset($_FILES['file'])) {
        $arquivo = $_FILES["file"]["name"];
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION)); // PEGANDO A EXTENSÃO DO ARQUIVO SEMPRE EM MINUSCULO POR CAUSA DO (strtolower)
        // PEGANDO A EXTENSÃO DO ARQUIVO = SE É .pdf .word .png
        $novo_nome = md5(time()).".".$extensao;
        $local = "img/";

        $loc = $local . $novo_nome;

        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');

        move_uploaded_file($_FILES['file']['tmp_name'], $local . $novo_nome);
    
        // Insert query execution
        $sql = "INSERT INTO imoveis (imo_id, imo_titulo, imo_desc, imo_preco, imo_img_local, imo_data_up) VALUES (NULL, '$titulo', '$desc', '$preco', '$loc', '$data')";
        
        if (mysqli_query($mysqli_connection, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Imóvel cadastrado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Imovel não foi cadastrado!<br>ERROR:".$sql.mysqli_error($mysqli_connection)."</div";
        }

        // Close connection
        mysqli_close($mysqli_connection);
    }
}
        

?>

    <div id="div40">
        <h1><i><?php echo _TITLE_CADASTRO_IMOVEIS; ?></i></h1><br>
        
            <form action="" method="post" enctype="multipart/form-data">
            
                <input type="text" name="titulo" placeholder="Digite o Título" required><br><br>
                <input type="text" name="desc" placeholder="Digite a Descrição" required><br><br>
                <input type="text" name="preco" placeholder="Digite o Preço" required><br><br>
                <label for="exampleFormControlInput1" class="form-label"><b>Foto do Imóvel</b></label><br>
                <input type="file" class="form-control" name="file" required/><br><br><br>

                <a href='index.php' class="btn btn-danger">Cancelar</a>  <button type="submit" class="btn btn-success" name="acao" value="Enviar">Enviar</button>
                
            </form>
    </div>
</div>
</center>
<?php require_once("includes/inc_footer.php"); ?>
</body>
</html>