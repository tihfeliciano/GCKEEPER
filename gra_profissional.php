<?php
session_start();
include "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$sexo = $_POST['sexo'];
$data = $_POST['data_de_nascimento'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero_de_residencia'];
$email = $_POST['email'];

$stmt = "UPDATE `gckeeper`.`profissional` SET nome=:nome, sexo=:sexo, data_de_nascimento=:data_de_nascimento, cpf=:cpf, celular=:celular, cep=:cep, uf=:uf, cidade=:cidade, bairro=:bairro, rua=:rua, numero_de_residencia=:numero_de_residencia, email=:email  WHERE id=:id";
$dados = $pdo->prepare($stmt);
$dados->bindParam(':id', $id);
$dados->bindParam(':nome', $nome);
$dados->bindParam(':sexo', $sexo);
$dados->bindParam(':data_de_nascimento', $data);
$dados->bindParam(':cpf', $cpf);
$dados->bindParam(':celular', $celular);
$dados->bindParam(':cep', $cep);
$dados->bindParam(':uf', $uf);
$dados->bindParam(':cidade', $cidade);
$dados->bindParam(':bairro', $bairro);
$dados->bindParam(':rua', $rua);
$dados->bindParam(':numero_de_residencia', $numero);
$dados->bindParam(':email', $email);

try {
    $pdo->beginTransaction();
    $dados->execute();
    $pdo->commit();

    echo "<script>alert('Registro alterado com sucesso!'); window.location.href = 'menu_profissional.php?id=$id';</script>";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "<script>alert('Erro ao alterar o registro.'); history.go(-1);</script>";
}
?>
