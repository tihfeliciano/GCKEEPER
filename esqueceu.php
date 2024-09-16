<?php
session_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Login </title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../css/login.css" rel="stylesheet" type="text/css"/>
	</head>
    <body>
        <div class="container">
            <div class="titulo">RECUPERAR SENHA</div>
            <form action="../php/acesso.php" method="POST">
            <div class="user-details">
                    <div class="imput-box">
                        <span class="details">E-MAIL:</span>
                        <input type="text" name="email" id="email" placeholder="Digite o e-mail cadastrado" required maxlength="50">
                    </div>
                    <div class="button">
                        <input  type="submit"name="Recuperar" value="Recuperar">
                    </div>
                    
        </div>
    </body>
</html>
