<?php
session_start();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastros | Clinicas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="../../css/empresa/del.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <center>
        <div class="container">
            <h1>Cadastros de Clinicas </h1>
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
    
                        try {
                            $stmt = $pdo -> prepare('SELECT * FROM gckeeper . clinica ORDER BY nome;');
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
        </div>
     </body>
</html>