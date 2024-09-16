<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Usuários </title>
        <link rel="shortcut icon" type="image/png" href="../../fotos/logo_fundo.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../css/user.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/empresa/colaborador.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>     
        <div class="container">
            <div class="titulo">Cadastro de Usuário <?php echo $_SESSION['id_da_empresa']; ?></div>
            <form action="cad_colaborador.php" method="POST">
            <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Nome:</span>
                        <input type="text" name="nome" id="nome"  required maxlength="50">
                    </div>
                    <input type="hidden" name="id_da_empresa" id="id_da_empresa"  value="<?php echo $_SESSION['id_da_empresa']; ?>" readonly>
                    <div class="imput-box" >
                        <span class="details">Celular:</span>
                        <input type="text" name="celular" id="celular" required>                   
                    </div>
                    <div class="imput-box">
                        <span class="details">E-mail:</span>
                        <input type="email" name="email" id="email" required  maxlength="70">
                    </div>
                    <input type="hidden" name="tipo" id="tipo"  value="colaborador" readonly>
                    
                    <div class="imput-box">
                        <span class="details">Senha:</span>
                        <input type="password" name="senha" id="senha" required maxlength="15">
                    </div>
                    <div class="button">
                        <input  type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

