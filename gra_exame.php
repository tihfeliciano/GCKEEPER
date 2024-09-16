<?php
session_start();
include "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$valor = $_POST["valor"];

$stmt = "UPDATE `gckeeper`.`exame` SET nome=:nome, valor=:valor WHERE id=:id";
$dados = $pdo->prepare($stmt);
$dados->bindParam(':nome', $nome);
$dados->bindParam(':valor', $valor);
$dados->bindParam(':id', $id);


try {
    $pdo->beginTransaction();
    $dados->execute();
    $pdo->commit();

    echo "<script>alert('Registro alterado com sucesso!'); window.location.href = 'menu_exame.php?id=$id';</script>";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "<script>alert('Erro ao alterar o registro.'); history.go(-1);</script>";
}
?>
