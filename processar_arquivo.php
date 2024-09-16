<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST["destinatario"];
    $arquivo = $_FILES["arquivo"];

    // Verificar se o arquivo foi enviado sem erros
    if ($arquivo["error"] == UPLOAD_ERR_OK) {
        // Mova o arquivo para um diretório de armazenamento
        $diretorio_destino = "../../uploads/";
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