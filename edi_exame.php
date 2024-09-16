<?php
session_start();
include "conexao.php";

$id = $_GET["id"];
$stmt = $pdo->prepare('SELECT * FROM `gckeeper`.`exame` WHERE id = :id');
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
        <title>GCKEEPER | Exame </title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../css/clinica/cad.css" rel="stylesheet" type="text/css"/>
	</head>
    <body>
        <div class="container">
            <div class="titulo">Atualização de Cadastro</div>
            <form action="gra_exame.php" method="POST">
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Id:</span>
                        <input type="text" name="id" readonly value="<?php echo $linha['id']; ?>">
                    </div>
                    <div class="imput-box">
                        <span class="details">Nome Do Exame:</span>
                        <input type="text" name="nome" readonly value="<?php echo $linha['nome']; ?>">
                    </div>
                    <div class="imput-box">
                        <span class="details">Valor:</span>
                        <input type="number" name="valor" value="<?php echo $linha['valor']; ?>">
                    </div>
                    <div class="button">
                        <input  type="submit" value="Editar">
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
