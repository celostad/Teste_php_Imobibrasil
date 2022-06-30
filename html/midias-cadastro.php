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
    <title><?php echo _TITLE_CADASTRO_MIDIAS. " - ". _SITE_; ?></title>

<?php
$pagina="cad-midia";
require_once("includes/inc_cabec.php");

if (isset($_POST['bt'])) {
    $nome = $_POST['mid_nome'];
    $email = $_POST['mid_email'];
    $id_imovel = $_POST['imo_number'];



    if (isset($_POST['escritura'])) {
        $tipo = "Escritura";
        $local = "documentos/escrituras/";
    }
    if (isset($_POST['planta'])) {
        $tipo = "Planta-Baixa";
        $local = "documentos/planta-baixa/";
    }
    if (isset($_POST['comprovante'])) {
        $tipo = "Comprovante de Locação";
        $local ="documentos/comprovante/";
    }

    if (isset($_FILES['file'])) {
        $arquivo = $_FILES['file']['name'];
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

        $novo_nome = $nome . "." . $extensao;

        $loc = $local . $novo_nome;

        // Insert query execution
        $sql = "INSERT INTO midias (mid_id, imo_id, mid_tipo, mid_titulo, mid_caminho, mid_data_up, mid_email_user) VALUES (NULL, '$id_imovel', '$tipo', '$nome', '$loc', NOW(), '$email')";
    
        move_uploaded_file($_FILES['file']['tmp_name'], $local . $novo_nome);

        if (mysqli_query($mysqli_connection, $sql)) {
            echo "<div class='alert alert-success' role='alert'>Esta midia foi cadastrada com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Midia não foi cadastrada!<br>ERROR:".$sql.mysqli_error($mysqli_connection)."</div";
        }
 
        // Close connection
        mysqli_close($mysqli_connection);
    }
}
?>

    <form method="post" action="" enctype="multipart/form-data">    
    <h1><i><?php echo _TITLE_CADASTRO_MIDIAS; ?></i></h1>
    <div id="div40">    
            <input type="text" class="form-control" name="mid_nome" placeholder="Digite o nome do Arquivo!" required><br>
            <input type="text" class="form-control" name="mid_email" placeholder="Digite seu Email!" required>
            <label for="exampleFormControlInput1" class="form-label"><br>Digite o ID do Imóvel a Anexar!</label>
            <br>
            <input type="text" class="form-control" name="imo_number" placeholder="" required><br>
            <label for="exampleFormControlInput1" class="form-label"><b>Tipo de Documento</b></label><br>
           
            <input type="checkbox" class="form-check-input mt-0" name="escritura">Escritura<br>
            <input type="checkbox" class="form-check-input mt-0" name="planta">Planta-Baixa<br>
            <input type="checkbox" class="form-check-input mt-0" name="comprovante">Comprovante de Locação<br><br>
            <input type="file" class="form-control" name="file" required><br><br>
        
            <a href='index.php' class="btn btn-danger">Cancelar</a>  <button type="submit" name="bt" class="btn btn-success">Cadastrar</button>
            
        </div>
    </form>


</center>
<?php require_once("includes/inc_footer.php"); ?>
</body>
</html>