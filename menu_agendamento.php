<?php
session_start();
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastros | Profissionais</title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="../../css/clinica/tab.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <center>
        <div class="container" style="overflow-x:auto;">
            <h1>Consultas agendadas </h1>
            <div class="table">
            <br>
            <table>
                     <tr>
                         <th>Nome da clinica</th>
                         <th>Data da consulta</th>
                         <th>Hora</th>
                         <th>Tipo de exame</th>
                         <th>Delete</th>
                     </tr>
                     <?php
                        include('conexao.php');
                        $colaboradorId = $_SESSION['id_do_colaborador']; 
                        $clinicaId = $_SESSION['id_da_clinica']; 

                        try {
                            $sql = "SELECT agendamento_de_consulta.id_do_vinculos, 
                            agendamento_de_consulta.data_da_consulta, 
                            agendamento_de_consulta.hora, 
                            agendamento_de_consulta.tipo_exame,
                            agendamento_de_consulta.id,
                            clinica.nome
                            FROM agendamento_de_consulta 
                            INNER JOIN vinculos ON agendamento_de_consulta.id_do_vinculos = vinculos.id_da_clinica 
                            INNER JOIN clinica ON vinculos.id_da_clinica = clinica.id
                            WHERE agendamento_de_consulta.id_do_colaborador = :colaborador_id 
                            AND vinculos.id_da_clinica = :clinica_id";

                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':colaborador_id', $colaboradorId);
                            $stmt->bindParam(':clinica_id', $clinicaId);
                            $stmt->execute();

                            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "
                                    <tr>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['data_da_consulta']}</td>
                                        <td>{$linha['hora']}</td>
                                        <td>{$linha['tipo_exame']}</td>
                                        <td><a class='lixo' href='del_agendamento.php?id={$linha["id"]}'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                            echo "<br><b>Não Conectado</b>";
                        }
                        ?>
             </table>
            </div>
         </div>
     </body>
</html>