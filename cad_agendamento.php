<?php
require('conexao.php');
$nome_paciente = $_POST['nome_paciente'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$data_da_consulta =$_POST['data_da_consulta'];
$hora=$_POST['hora'];
$tipo_exame = $_POST['tipo_exame'];
$id_do_vinculos = $_POST['id_do_vinculos']; 
$_SESSION['id_do_colaborador'] = $_POST['id_do_colaborador'];

    try{
        $stmt =$pdo->prepare('INSERT INTO `gckeeper`.`agendamento_de_consulta` (`id_do_vinculos`,`id_do_colaborador`,`nome_paciente`,`cpf`,`celular`, `email`, `data_da_consulta`,`hora`,`tipo_exame`) VALUES (:id_do_vinculos,:id_do_colaborador,:nome_paciente,:cpf,:celular,:email,:data_da_consulta,:hora,:tipo_exame)');
        $stmt ->execute(array(
            ':id_do_colaborador' => $_SESSION['id_do_colaborador'],
            ':nome_paciente' =>$nome_paciente,
            ':cpf'=>$cpf,
            ':celular'=>$celular,
            ':email'=>$email,
            ':tipo_exame' => $tipo_exame,
            ':data_da_consulta'=>$data_da_consulta,
            ':hora'=>$hora,
            ':id_do_vinculos'=>$id_do_vinculos
        
        ));

        echo "<script>alert('Consulta agendada com sucesso!'); window.location.href = 'agendamento.php';</script>";
    }catch(PDOException $e){
        echo 'Erro: ' . $e->getMessage();
        echo("Não Conectado");
    }
?>