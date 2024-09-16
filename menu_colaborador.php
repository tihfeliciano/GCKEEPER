<?php
session_start();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastros | Colaboradores</title>
        <link rel="shortcut icon" type="image/png" href="../../fotos/logo_fundo.png">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="../../css/clinica/tab.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <center>
        <div class="container" >
            <h1>Cadastros de Colaboradores </h1>
            <div class="table">
            <table>
                     <tr>
                         <th>ID</th>
                         <th>Nome</th>
                         <th>Celular</th>
                         <th>E-mail</th>
                         <th>Senha</th>
                         <th>Edite/Delete</th>
                     </tr>
                     <?php
                        include('conexao.php');
                        if (isset($_POST['id_da_empresa'])) {
                            $_SESSION['id_da_empresa'] = $_POST['id_da_empresa'];
                        }

                        try {
                            $stmt = $pdo->prepare('SELECT * FROM gckeeper.colaborador WHERE id_da_empresa = :id_da_empresa ORDER BY nome;');
                            $stmt->bindParam(':id_da_empresa', $_SESSION['id_da_empresa'], PDO::PARAM_INT);
                            $stmt->execute();

                            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo "
                                    <tr>
                                        <td>{$linha['id']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['celular']}</td>
                                        <td>{$linha['email']}</td>
                                        <td>{$linha['senha']}</td>
                                        <td><a class='pincel' href='edi_colaborador.php?id={$linha["id"]}'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                                </svg>
                                            </a>
                                            <a class='lixo' href='del_colaborador.php?id={$linha["id"]}'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                </svg>
                                            </a>
                                        </td>
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
