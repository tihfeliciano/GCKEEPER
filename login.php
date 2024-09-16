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
        <script>
        function myFunction() {
            var x = document.getElementById("senha");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
	</head>
    <body>
    <div class="balao">
        <div class="logo">
			<img src="../fotos/logo_fundo.png"> 
		</div>
        <div class="container">
            <div class="titulo">LOGIN</div>
            <form action="../php/acesso.php" method="POST">
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Tipo:</span>
                    </div>
                </div>
                    <div class="tipo">
                        <select name="tipo">
                            <option value="" disabled selected></option>
                            <option value="empresa">Empresa</option>
                            <option value="clinica">Clínica</option>
                            <option value="colaborador">Colaborador</option>
                        </select>
                    </div>  
                    <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Usuário:</span>
                        <input type="text" name="email" id="email" placeholder="Digite o e-mail cadastrado" required maxlength="50">
                    </div>
                    <div class="imput-box">
                    <span class="details">Senha:</span>
                    <input type="password" id="senha" name="senha" required maxlength="10">
                    <div class='olho' onclick="myFunction()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>                        
                    </div>
                </div>
                    <h5><a href="esqueceu.php">Esqueceu a senha?</a></h5>
                    <div class="button">
                        <input  type="submit" value="Entrar">
                    </div>
                </div>
            </form>
        </div>
</div>
    </body>
</html>
