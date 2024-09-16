<?php
session_start();
require('conexao.php');
$tipo = $_POST['tipo'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if($tipo === 'empresa'){
    try {
        $stmt = $pdo->query("SELECT id,tipo,email,senha FROM gckeeper.empresa WHERE email ='$email' AND senha ='$senha'");
        if ($stmt->rowCount() > 0) {
            $linha = $stmt->fetch(); 
            $id = $linha['id']; // Obtém o valor do campo 'id'
            $_SESSION['id_da_empresa'] = $linha['id'];
            header("Location:../html/empresa/menu.php"); 
        }
        else {
            // Credenciais inválidas, redirecionar para a página de login novamente
            echo "<script>alert('Credenciais incorretas. Tente novamente!'); window.location.href = 'login.php';</script>";
            header("Location: login.php");
        }
        exit();
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
if($tipo === 'clinica'){
    try {
        $stmt = $pdo->query("SELECT id,tipo,email,senha FROM gckeeper.clinica WHERE email ='$email' AND senha ='$senha'");
        if ($stmt->rowCount() > 0) {
            $linha = $stmt->fetch(); 
            $id = $linha['id']; // Obtém o valor do campo 'id'
            $_SESSION['id_da_clinica'] = $linha['id'];
            header("Location:../html/clinica/menu.php"); 
        }
        else {
            // Credenciais inválidas, redirecionar para a página de login novamente
            echo "<script>alert('Credenciais incorretas. Tente novamente!'); window.location.href = 'login.php';</script>";
            header("Location: login.php");
        }
        exit();
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
if($tipo === 'colaborador'){
    try {
        $stmt = $pdo->query("SELECT id,tipo,email,senha FROM gckeeper.colaborador WHERE email ='$email' AND senha ='$senha'");
        if ($stmt->rowCount() > 0) {
            $linha = $stmt->fetch(); 
            $id = $linha['id']; 
            $_SESSION['id_do_colaborador'] = $linha['id'];
            header("Location:../html/colaborador/menu.php"); 
        }
        else {
            // Credenciais inválidas, redirecionar para a página de login novamente
            echo "<script>alert('Credenciais incorretas. Tente novamente!'); window.location.href = 'login.php';</script>";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}

?>
