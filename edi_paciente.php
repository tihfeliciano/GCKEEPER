<?php
session_start();
include "conexao.php";

$id = $_GET["id"];
$stmt = $pdo->prepare('SELECT * FROM `gckeeper`.`paciente` WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() == 1) {
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Profissional </title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../css/clinica/cad_paciente.css" rel="stylesheet" type="text/css"/>
        <script>
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('rua').value=("");
                    document.getElementById('bairro').value=("");
                    document.getElementById('cidade').value=("");
                    document.getElementById('uf').value=("");
        
            }
        
            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
                
            function pesquisacep(valor) {
        
                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');
        
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
        
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
        
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
        
                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";
        
                        //Cria um elemento javascript.
                        var script = document.createElement('script');
        
                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
        
                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);
        
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
            </script>
    </head>
    <body>
    <div class="container">
        <div class="titulo">Cadastro de Pacientes</div>
        <form action="../../php/clinica/gra_paciente.php" method="POST">
            <div class="user-details">
                
                <div class="imput-box">
                        <span class="details">Id:</span>
                        <input type="text" name="id" readonly value="<?php echo $linha['id']; ?>">
                    </div>
                <div class="imput-box">
                    <span class="details">Nome Do Paciente:</span>
                    <input type="text" name="nome" id="nome" required maxlength="50" value="<?php echo $linha['nome']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">Sexo:</span>
                    <input type="text" name="sexo" id="sexo" required maxlength="9" value="<?php echo $linha['sexo']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">Data De Nascimento:</span>
                    <input type="date" name="data_de_nascimento" id="data_de_nascimento" required value="<?php echo $linha['data_de_nascimento']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">CPF:</span>
                    <input type="number" name="cpf" id="cpf" maxlength="11" required value="<?php echo $linha['cpf']; ?>">
                </div>
                <div class="imput-box" >
                    <span class="detais">Celular</span>
                    <input type="text" name="celular" required value="<?php echo $linha['celular']; ?>">                   
                </div>
                <div class="imput-box">
                    <label>Cep:
                        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" value="<?php echo $linha['cep']; ?>">
                    </label>
                </div>
                <div class="imput-box">   
                    <label>UF:
                        <input name="uf" type="text" id="uf" size="2" value="<?php echo $linha['uf']; ?>">
                    </label><br />
                </div>
                <div class="imput-box">  
                    <label>Cidade:
                        <input name="cidade" type="text" id="cidade" size="40" value="<?php echo $linha['cidade']; ?>">
                    </label><br />
                </div>
                <div class="imput-box">
                    <label>Bairro:
                        <input name="bairro" type="text" id="bairro" size="40" value="<?php echo $linha['bairro']; ?>">
                    </label><br />
                </div>
                <div class="imput-box">   
                    <label>Rua:
                        <input name="rua" type="text" id="rua" size="60" value="<?php echo $linha['rua']; ?>">
                    </label><br />
                </div>
                <div class="imput-box">
                    <span class="details">Nº De Residência:</span>
                    <input type="number" name="numero_de_residencia" required maxlength="11" value="<?php echo $linha['numero_de_residencia']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">E-mail:</span>
                    <input type="email" name="email" id="email" required maxlength="70" value="<?php echo $linha['email']; ?>">
                </div>
                <div class="imput-box">
                    <span class="details">O Paciente Esteve:</span>
                    <input type="date" name="passou_na_clinica" class="passou_na_clinica" required value="<?php echo $linha['passou_na_clinica']; ?>">
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
                </div>
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details" name="id_da_empresa" id="id_da_empresa">Empresa:</span>
                        <select name="id_da_empresa">
                            <option value="" data-default disabled selected></option>
                            <?php
                            require('conexao.php');

                            try {
                                $stmt = $pdo->query('SELECT * FROM gckeeper.empresa;');

                                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<option value='{$linha['id']}'>{$linha['nome']}</option>";
                                }
                            }
                            catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                                echo "<br><b>Não Conectado</b>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="check">
                    <input type="checkbox" id="acuidade" name="area[]" value="acuidade">
                    <span for="acuidade">Acuidade Visual</span> 
                </div>
                <div class="check">
                    <input type="checkbox" id="audiometria" name="area[]" value="audiometria">
                    <span for="audiometria">Audiometria</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="anamnese" name="area[]" value="anamnese">
                    <span for="anamnese">Anamnese</span>
                </div>
                <div class= "check">
                    <input type="checkbox" id="avaliacao" name="area[]" value="avaliacao">
                    <span for="avaliacao">Avaliação Psicológica</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="clinico" name="area[]" value="clinico">
                    <span for="clinico">Exame Clínico</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="colesterol" name="area[]" value="colesterol">
                    <span for="colesterol">Colesterol</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="eletrocardiograma" name="area[]" value="eletrocardiograma">
                    <span for="eletrocardiograma">Eletrocardiograma</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="eletroencefalograma" name="area[]" value="eletroencefalograma">
                    <span for="eletroencefalograma">Eletroencefalograma</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="espirometria" name="area[]" value="espirometria">
                    <span for="espirometria">Espirometria</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="hemograma" name="area[]" value="hemograma">
                    <span for="hemograma">Hemograma Completo</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="glicemia" name="area[]" value="glicemia">
                    <span for="glicemia">Glicemia</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="raio-X" name="area[]" value="raio-X">
                    <span for="raio-X">Raio-X</span>
                </div>
                <div class="check">
                    <input type="checkbox" id="toxicologico" name="area[]" value="toxicologico">
                    <span for="toxicologico">Toxicológico</span>
                    <br>
                </div>
            </div>
                    <div class="button">
                        <input  type="submit" value="Salvar">
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>
<?php
} else {
    echo "<script>alert('Dados não encontrados');history.go(-1);</script>";
}
?>