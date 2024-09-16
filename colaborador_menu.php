<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastros | Clínicas</title>
    <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="../../css/colaborador/colaborador_clinica.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <center>
    <div class="container">
        <h1>Cadastros de clinicas</h1><br>
        <div class="table">
        <table>
                 <tr>
                     <th>Nome da Clinica</th>
                     <th>CNPJ</th>
                     <th>Celular</th>
                     <th>CEP</th>
                     <th>UF</th>
                     <th>Cidade</th>
                     <th>Bairro</th>
                     <th>Rua</th>
                     <th>Nº</th>
                     <th>E-mail</th>
                 </tr>
                 <?php
                    include ('conexao.php');
                    if (isset($_POST['id_da_empresa'])) {
                        $_SESSION['id_da_empresa'] = $_POST['id_da_empresa'];
                     }

                    try {
                        $stmt = $pdo->prepare("SELECT clinica.id, clinica.nome,clinica.cnpj,clinica.celular,clinica.cep,clinica.uf,
                        clinica.cidade,clinica.bairro,clinica.rua,clinica.numero_de_residencia,clinica.email FROM vinculos 
                        INNER JOIN clinica ON vinculos.id_da_clinica = clinica.id 
                        WHERE vinculos.id_da_empresa = :id_da_empresa");
                        $stmt->bindParam(':id_da_empresa', $_SESSION['id_da_empresa'], PDO::PARAM_INT);
                        $stmt->execute();

                        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "
                                <tr>
                                <td>{$linha['nome']}</td>
                                <td>{$linha['cnpj']}</td>
                                <td>{$linha['celular']}</td>
                                <td>{$linha['cep']}</td>
                                <td>{$linha['uf']}</td>
                                <td>{$linha['cidade']}</td>
                                <td>{$linha['bairro']}</td>
                                <td>{$linha['rua']}</td>
                                <td>{$linha['numero_de_residencia']}</td>
                                <td>{$linha['email']}</td>
                                </tr>";
                        }
                    }
                    catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                        echo "<br><b>Não Conectado</b>";
                    }
                 ?> 
         </table>
     </div>
 </body>
</html>
