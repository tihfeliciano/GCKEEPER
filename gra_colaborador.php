<?php
session_start();
include "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = "UPDATE `gckeeper`.`colaborador` SET nome=:nome, celular=:celular, email=:email, senha=:senha WHERE id=:id";
$dados = $pdo->prepare($stmt);
$dados->bindParam(':nome', $nome);
$dados->bindParam(':celular', $celular);
$dados->bindParam(':email', $email);
$dados->bindParam(':senha', $senha);
$dados->bindParam(':id', $id);


try {
    $pdo->beginTransaction();
    $dados->execute();
    $pdo->commit();

    echo "<script>alert('Registro alterado com sucesso!'); window.location.href = 'menu_colaborador.php?id=$id';</script>";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "<script>alert('Erro ao alterar o registro.'); history.go(-1);</script>";
}
?>
