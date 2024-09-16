<?php
session_start(); 

include('conexao.php');
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$_SESSION['id_da_clinica'] = $_POST['id_da_clinica'];

try {
    $stmt = $pdo->prepare('INSERT INTO `gckeeper`.`exame` (`id_da_clinica`,`nome`, `valor`) VALUES (:id_da_clinica, :nome, :valor)');
    $stmt->execute(array(
        ':id_da_clinica' => $_SESSION['id_da_clinica'],
        ':nome' => $nome,
        ':valor' => $valor
    ));

    echo $stmt->rowCount();
    header('location:exame.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    echo("Não Conectado");
}
?>
