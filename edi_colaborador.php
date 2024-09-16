<?php
session_start();
include "conexao.php";

$id = $_GET["id"];
$stmt = $pdo->prepare('SELECT * FROM `gckeeper`.`colaborador` WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() == 1) {
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
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
        <div class="titulo">Cadastro de Usuário<?php echo $_SESSION['id_da_empresa']; ?></div>
        <form action="../../php/empresa/gra_colaborador.php" method="POST">
            <div class="user-details">
                <div class="imput-box">
                    <span class="details">Id:</span>
                    <input type="text" name="id" readonly value="<?php echo $linha['id']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">Nome:</span>
                    <input type="text" name="nome" id="nome" maxlength="50" value="<?php echo $linha['nome']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">Celular:</span>
                    <input type="text" name="celular" id="celular" required value="<?php echo $linha['celular']; ?>">                   
                </div>
                <div class="imput-box">
                    <span class="details">E-mail:</span>
                    <input type="email" name="email" id="email" required maxlength="70" value="<?php echo $linha['email']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">Senha:</span>
                    <input type="password" name="senha" id="senha" required maxlength="15" value="<?php echo $linha['senha']; ?>">
                </div>
                <div class="button">
                    <input type="submit" value="Salvar">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
} else {
    echo "<script>alert('Dados não encontrados');history.go(-1);</script>";
}
?>
