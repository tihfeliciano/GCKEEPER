<?php
session_start(); 

require('conexao.php');
$nome = $_POST['nome'];
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
$_SESSION['id_da_clinica'] = $_POST['id_da_clinica'];

try {
    $stmt = $pdo->prepare('INSERT INTO `gckeeper`.`profissional` (`id_da_clinica`,`nome`, `sexo`, `data_de_nascimento`, `cpf`, `celular`, `cep`, `uf`, `cidade`, `bairro`, `rua`, `numero_de_residencia`, `email`) VALUES (:id_da_clinica,:nome,:sexo,:data_de_nascimento,:cpf,:celular,:cep,:uf,:cidade,:bairro,:rua,:numero_de_residencia,:email)');
    $stmt->execute(array(
        ':id_da_clinica' => $_SESSION['id_da_clinica'],
        ':nome' => $nome,
        ':sexo' => $sexo,
        ':data_de_nascimento' => $data,
        ':cpf' => $cpf,
        ':celular' => $celular,
        ':cep' => $cep,
        ':uf' => $uf,
        ':cidade' => $cidade,
        ':bairro' => $bairro,
        ':rua' => $rua,
        ':numero_de_residencia' => $numero,
        ':email' => $email,
    ));

    echo $stmt->rowCount();
    $_SESSION['cadastro_profissional'] = true;

    header('location:profissional.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    echo("Não Conectado");
}
?>
