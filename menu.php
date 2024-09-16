<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>GCKEEPER | Menu</title>
    <link rel="shortcut icon" type="image/png" href="../../fotos/logo_fundo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="../../css/empresa/menu.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
        if (isset($_SESSION['id_da_empresa'])) {
    ?>
    <iframe src="../../php/clinica/trabalho.php"  name="nova_aba"></iframe>
    <div class="container">
        <ul class="menu">
            <li>
                <div id="passar_mouse"><b>Clinicas Cadastradas</b>
                    <div id="mostrar"><a href="../../php/empresa/menu_clinica.php" target="nova_aba">Visualizar</a></div>
                </div>
            </li>
            <br>
            <li>
                <div id="passar_mouse"><b>Vinculos com Clinicas</b>
                    <div id="mostrar"><a href="../../php/empresa/menu_vinculo.php" target="nova_aba">Visualizar</a></div>
                </div>
            </li>
            <br>
            <li>
                <div id="passar_mouse"><b>Colaborador</b>
                    <div id="mostrar"><a href="../../php/empresa/colaborador.php" target="nova_aba">Cadastrar</a></div>
                    <div id="mostrar"><a href="../../php/empresa/menu_colaborador.php" target="nova_aba">Visualizar</a></div>
                </div>
            </li>
            <br>
            <br>
            <br>
            <li><a class='lixo' href='sair.php'>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a></li>
        </ul>
    </div>
</body>
</html>
<?php
        } else {
    ?>
            echo "<script>alert('Você não está mais logado!'); window.location.href = '../index.html';</script>";
<?php
        }
    ?>
