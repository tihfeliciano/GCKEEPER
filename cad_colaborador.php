<?php
include('conexao.php');
session_start(); 

$nome = $_POST['nome'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];
$senha = $_POST['senha'];
$_SESSION['id_da_empresa'] = $_POST['id_da_empresa'];

try {
        // Verificar se o e-mail já está cadastrado
        $stmt_check_email = $pdo->prepare('SELECT * FROM `gckeeper`.`colaborador` WHERE `email` = :email');
        $stmt_check_email->execute(array(':email' => $email));
    
        if ($stmt_check_email->rowCount() > 0) {
            echo "<script>alert('O e-mail informado já está cadastrado. Tente outro e-mail.');window.location.href = 'colaborador.php'</script>";
        }else
    $stmt = $pdo->prepare('INSERT INTO `gckeeper`.`colaborador` (`id_da_empresa`, `nome`, `celular`, `email`, `tipo`, `senha`) VALUES (:id_da_empresa, :nome, :celular, :email, :tipo, :senha)');
    $stmt->execute(array(
        ':id_da_empresa' => $_SESSION['id_da_empresa'],
        ':nome' => $nome,
        ':celular' => $celular,
        ':email' => $email,
        ':tipo' => $tipo,
        ':senha' => $senha
    ));

    echo $stmt->rowCount();
    header('Location: colaborador.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
    echo "Não Conectado";
}
?>
