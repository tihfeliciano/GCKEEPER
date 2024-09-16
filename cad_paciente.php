<?php
session_start(); 

include('conexao.php');

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
$tipo_exame = $_POST['tipo_exame'];
$id_da_empresa = $_POST['id_da_empresa'];
$passou = $_POST['passou_na_clinica'];
$area = $_POST['area'];
$_SESSION['id_da_clinica'] = $_POST['id_da_clinica'];

try {
    $stmt = $pdo->prepare('INSERT INTO `gckeeper`.`paciente` (`id_da_clinica`,`nome`,`sexo`,`data_de_nascimento`,`cpf`,`celular`, `cep`, `uf`,`cidade`,`bairro`, `rua`, `numero_de_residencia`,`email`,`tipo_exame`,`passou_na_clinica`,`id_da_empresa`) VALUES (:id_da_clinica,:nome,:sexo,:data_de_nascimento,:cpf,:celular,:cep,:uf,:cidade,:bairro,:rua,:numero_de_residencia,:email,:tipo_exame,:passou_na_clinica,:id_da_empresa)');
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
        ':tipo_exame' => $tipo_exame,
        ':id_da_empresa' =>$id_da_empresa,
        ':passou_na_clinica' => $passou
    ));
    $codigo = $pdo->lastInsertId();

    $interesse = $pdo->prepare('INSERT INTO `gckeeper`.`paciente_exame` (`nome`,`id_do_paciente`) VALUES (:nome,:id_do_paciente)');

    for ($i = 0; $i < count($area); $i++) {
        $interesse->execute(array(
            ':nome' => $area[$i],
            ':id_do_paciente' => $codigo
        ));
    }


    header('location:paciente.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    echo ("Não Conectado");
}
?>
