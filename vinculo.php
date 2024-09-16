<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Vínculos</title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../css/clinica/upload.css" rel="stylesheet" type="text/css"/>
	</head>
    <body>
        <div class="container">
        <div class="titulo"><b>Vínculos com Clínicas</b><?php echo $_SESSION['id_da_clinica']; ?></div>
        <input type="hidden" name="id_da_empresa" id="id_da_empresa"  value="<?php echo $_SESSION['id_da_clinica']; ?>" readonly>
        <br>
            <form method="post" action="cad_vinculo.php">
        <label for="id_da_empresa">Selecione a Empresa:</label>
        <select name="id_da_empresa">
        <option value="" data-default disabled selected></option>
                            <?php
                                require ('conexao.php');

                                try {
                                    $stmt = $pdo -> query('SELECT * FROM gckeeper . empresa;');
                                    
                                    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        echo "
                                            <option value='{$linha['id']}'>{$linha['nome']}</option>";
                                    
                                            
                                    }
                                }
                                catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                    echo "<br><b>Não Conectado</b>";
                                }
                            ?>
        </select>

        <input type="submit" value="Criar Vínculo">
    </form>
        </div>
    </body>
</html>