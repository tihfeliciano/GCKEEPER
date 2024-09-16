<?php
include('conexao.php');
session_start(); 


$id_da_clinica = $_SESSION['id_da_clinica'];
$id_da_empresa = $_POST['id_da_empresa']; 
try {
            // Verificar se a empresa já está cadastrada
        $stmt_check_id_da_empresa = $pdo->prepare("SELECT * FROM vinculos WHERE id_da_clinica = :id_da_clinica AND id_da_empresa = :id_da_empresa");
        $stmt_check_id_da_empresa->bindParam(':id_da_clinica', $id_da_clinica, PDO::PARAM_INT);
        $stmt_check_id_da_empresa->bindParam(':id_da_empresa', $id_da_empresa, PDO::PARAM_INT);
        $stmt_check_id_da_empresa->execute();
        
         if ($stmt_check_id_da_empresa->rowCount() > 0) {
            echo "<script>alert('A empresa informada já está vinculada.');window.location.href = 'vinculo.php'</script>";
        } else

        $stmt = $pdo->prepare("INSERT INTO vinculos (id_da_clinica, id_da_empresa) VALUES (:id_da_clinica, :id_da_empresa)");
        $stmt->bindParam(':id_da_clinica', $id_da_clinica, PDO::PARAM_INT);
        $stmt->bindParam(':id_da_empresa', $id_da_empresa, PDO::PARAM_INT);
        $stmt->execute();

        echo "<script>alert('Vinculo criado com sucesso!'); window.location.href = 'vinculo.php';</script>";
    } catch (PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    
}
?>
