<?php
session_start();

?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> Agendar  Consultas</title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="../../css/colaborador/agendamento.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="titulo">Agendamento de Consultas <?php echo $_SESSION['id_do_colaborador']; ?></div>
            <form action="../../php/colaborador/cad_agendamento.php" method="POST">
            <input type="hidden" name="id_do_colaborador" id="id_do_colaborador"  value="<?php echo $_SESSION['id_do_colaborador']; ?>" readonly>
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Nome:</span>
                        <input type="text" name="nome_paciente" id="nome_paciente"  required maxlength="50">
                    </div>
                    <div class="imput-box">
                        <span class="details">CPF:</span>
                        <input type="text" name="cpf" id="cpf"  required maxlength="50">
                    </div>
                    <div class="imput-box">
                        <span class="details">Celular:</span>
                        <input type="text" name="celular" id="celular"  required maxlength="50">
                    </div>
                    <div class="imput-box">
                        <span class="details">E-mail:</span>
                        <input type="text" name="email" id="email"  required maxlength="50">
                    </div>
                    <div class="imput-box">
                        <span class="details">Data Da Consulta:</span>
                        <input type="date" name="data_da_consulta" id="data_da_consulta"  required maxlength="50">
                    </div>
                    <div class="imput-box">
                        <span class="details">Hora:</span>
                        <input type="time" name="hora" id="hora"  required maxlength="50">
                    </div>
                    <div class="user-details">
                    <div class="imput-box">
                        <span class="details" name="tipo_exame" id="tipo_exame" required>Exame:</span>
                        <select name="tipo_exame">
                            <option value="" data-default disabled selected></option>
                            <option value="admissional">Exame Admissional</option>
                            <option value="periodico">Exame Periódico</option>
                            <option value="mudanca">Mudança de Função</option>
                            <option value="demissional">Exame Demissional</option>
                            <option value="retorno">Retorno do Trabalho</option>
                        </select>
                    </div>
                    <label for="id_do_vinculos">Selecione a Clínica:</label>
                            <select name="id_do_vinculos">
                            <option value="" data-default disabled selected></option>
                                                <?php
                                                    include ('conexao.php');
                                                    if (isset($_POST['id_da_empresa'])) {
                                                        $_SESSION['id_da_empresa'] = $_POST['id_da_empresa'];
                                                     }
                                
                                                    try {
                                                        $stmt = $pdo -> prepare("SELECT clinica.id, clinica.nome,clinica.cnpj,clinica.celular,clinica.cep,clinica.uf,
                                                        clinica.cidade,clinica.bairro,clinica.rua,clinica.numero_de_residencia,clinica.email FROM vinculos 
                                                        INNER JOIN clinica ON vinculos.id_da_clinica = clinica.id 
                                                        WHERE vinculos.id_da_empresa = :id_da_empresa");
                                                        $stmt->bindParam(':id_da_empresa', $_SESSION['id_da_empresa'], PDO::PARAM_INT);
                                                        $stmt->execute();
                                                        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                            echo "
                                                                <option value='{$linha['id']}'>{$linha['nome']}</option>";
                                                        
                                                                
                                                        }
                                                    }
                                                    catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                        echo "<br><b>Não Conectado</b>";
                                                    }
                                                ?>
                            </select>
                </div>
                    <div class="button">
                        <input  type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>