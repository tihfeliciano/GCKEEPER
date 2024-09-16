<?php
session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Upload de Relatório</title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../css/clinica/upload.css" rel="stylesheet" type="text/css"/>
	</head>
    <body>
        <div class="container">
        <div class="titulo"><b>Enviar Relatório</b></div>
            <br>
            <form action="processar_arquivo.php" method="POST" enctype="multipart/form-data">
                <label for="arquivo">Selecione o arquivo:</label>
                <input type="file" name="arquivo" id="arquivo" required>
                <br>
                <br>
                <label for="destinatario">Destinatário:</label>
                <input type="text" name="email" id="email" required><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>
