<?php
session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Exame</title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../css/clinica/cad.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="titulo">Cadastro de Exame <?php echo $_SESSION['id_da_clinica']; ?></div>
            <form action="cad_exame.php" method="POST">
                <div class="user-details">
                    <div class="imput-box">
                        <input type="hidden" name="id_da_clinica" id="id_da_clinica"  value="<?php echo $_SESSION['id_da_clinica']; ?>" readonly>
                        <span class="details" id="nomeExame" required>Nome Do Exame: </span>
                        <select name="nome">
                            <option value="" data-default disabled selected></option>
                            <option value="acuidade">Acuidade Visual</option>
                            <option value="audiometria">Audiometria </option>
                            <option value="anamnese">Anamnese </option>
                            <option value="avaliação">Avaliação Pisicologica </option>
                            <option value="clinico">Exame Clinico </option>
                            <option value="colesterol">Colesterol </option>
                            <option value="eletrocardiograma">Eletrocardiograma</option>
                            <option value="eletrol">Eletro Encefalograma</option>
                            <option value="espirometria">Espirometria </option>
                            <option value="hemograma">Hemograma Completo</option>
                            <option value="glisemia">Glisemia </option>
                            <option value="raio-X">Raio-X </option>
                        </select>
                    </div>
                </div>
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Valor:</span>
                        <input type="number" name="valor" id="valor" required step="0.01">
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
