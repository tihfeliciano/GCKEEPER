<?php
session_start();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastros | Vinculos</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="../../css/empresa/del.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <center>
        <div class="container">
            <h1>Vinculos </h1>
            <div class="table">
            <table>
                     <tr>
                         <th>ID</th>
                         <th>Nome da Clinica</th>
                     </tr>
                     <?php
                        include ('conexao.php');
                        if (isset($_POST['id_da_empresa'])) {
                            $_SESSION['id_da_empresa'] = $_POST['id_da_empresa'];
                         }
                            try {
                            $stmt = $pdo -> prepare('SELECT * from vinculos as vn inner join clinica as em on vn.id_da_clinica = em.id WHERE vn.id_da_empresa = :id_da_empresa  ORDER BY  nome ');
                            $stmt->bindParam(':id_da_empresa', $_SESSION['id_da_empresa'], PDO::PARAM_INT);
                            $stmt->execute();


                            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
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