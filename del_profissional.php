<?php
session_start();
include("conexao.php");
$id = $_GET["id"];

try {
    $stmt = $pdo->prepare('DELETE FROM `gckeeper`.`profissional` WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo "<script>alert('Registro excluido com sucesso!'); window.location.href = 'menu_profissional.php?id=$id';</script>";
} catch (PDOException $ex) {
    echo "Não foi possível excluir da tabela: " . $ex->getMessage();
}
unset($pdo);
?>