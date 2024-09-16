<?php
include('conexao.php');

$nome = $_POST['nome'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$numero = $_POST['numero_de_residencia'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];
$senha = $_POST['senha'];

if ($tipo === 'empresa' || $tipo === 'clinica') {
    try {
        // Verificar se o e-mail já está cadastrado
        $stmt_check_email = $pdo->prepare('SELECT * FROM `gckeeper`.`' . $tipo . '` WHERE `email` = :email');
        $stmt_check_email->execute(array(':email' => $email));

        // Verificar se o CNPJ já está cadastrado
        $stmt_check_cnpj = $pdo->prepare('SELECT * FROM `gckeeper`.`' . $tipo . '` WHERE `cnpj` = :cnpj');
        $stmt_check_cnpj->execute(array(':cnpj' => $cnpj));

        if ($stmt_check_email->rowCount() > 0) {
            echo "<script>alert('O e-mail informado já está cadastrado. Tente outro e-mail.');window.location.href = '../html/index.html'</script>";
        } elseif ($stmt_check_cnpj->rowCount() > 0) {
            echo "<script>alert('O CNPJ informado já está cadastrado. Tente outro CNPJ.');window.location.href = '../html/index.html'</script>";
        } else {
            $stmt = $pdo->prepare('INSERT INTO `gckeeper`.`' . $tipo . '` (`nome`, `celular`, `cep`, `uf`, `cidade`, `bairro`, `rua`, `numero_de_residencia`, `cnpj`, `email`, `tipo`, `senha`) VALUES (:nome, :celular, :cep, :uf, :cidade, :bairro, :rua, :numero_de_residencia, :cnpj, :email, :tipo, :senha)');

            $stmt->execute(array(
                ':nome' => $nome,
                ':celular' => $celular,
                ':cep' => $cep,
                ':uf' => $uf,
                ':cidade' => $cidade,
                ':bairro' => $bairro,
                ':rua' => $rua,
                ':numero_de_residencia' => $numero,
                ':cnpj' => $cnpj,
                ':email' => $email,
                ':tipo' => $tipo,
                ':senha' => $senha
            ));

            echo $stmt->rowCount();
            header('Location: ../html/index.html');
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
        echo "Não Conectado";
    }
} else {
    echo 'Tipo inválido';
}
?>
