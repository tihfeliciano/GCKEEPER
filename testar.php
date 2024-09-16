<!DOCTYPE html>
<html>
<head>
    <title>Enviar Arquivo</title>
</head>
<body>
    <h1>Enviar Arquivo</h1>
    <form action="processar_arquivo.php" method="POST" enctype="multipart/form-data">
        <label for="arquivo">Selecione o arquivo:</label>
        <input type="file" name="arquivo" id="arquivo" required><br><br>
        <label for="destinatario">Destinatário:</label>
        <input type="text" name="destinatario" id="destinatario" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST["destinatario"];
    $arquivo = $_FILES["arquivo"];

    // Verificar se o arquivo foi enviado sem erros
    if ($arquivo["error"] == UPLOAD_ERR_OK) {
        // Mova o arquivo para um diretório de armazenamento
        $diretorio_destino = "uploads/";
        $nome_arquivo = basename($arquivo["name"]);
        $caminho_arquivo = $diretorio_destino . $nome_arquivo;

        if (move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo)) {
            echo "Arquivo enviado com sucesso para " . htmlspecialchars($destinatario);
        } else {
            echo "Erro ao mover o arquivo para o servidor.";
        }
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Arquivo</title>
</head>
<body>
    <h1>Visualizar Arquivo</h1>
    <?php
    $arquivo_a_visualizar = $_GET["arquivo"];

    // Certifique-se de validar e sanitizar $arquivo_a_visualizar para evitar vulnerabilidades de segurança.

    echo "<a href='uploads/$arquivo_a_visualizar' download>Download do arquivo</a>";
    ?>
</body>
</html>
