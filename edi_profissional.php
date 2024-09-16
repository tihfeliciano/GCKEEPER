<?php
session_start();
include "conexao.php";

$id = $_GET["id"];
$stmt = $pdo->prepare('SELECT * FROM `gckeeper`.`profissional` WHERE id = :id');
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
            <div class="titulo">Atualização de Cadastro</div>
            <form action="../../php/clinica/gra_profissional.php" method="POST">
                <div class="user-details">
                    <div class="imput-box">
                        <span class="details">Id:</span>
                        <input type="text" name="id" readonly value="<?php echo $linha['id']; ?>">
                    </div>
                    <div class="imput-box">
                        <span class="details">Nome Do Profissional:</span>
                        <input type="text" name="nome" id="nome"  required maxlength="50" value="<?php echo $linha['nome']; ?>">
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
                    <div class="imput-box">
                        <span class="details">Celular:</span>
                        <input type="number" name="celular" id="celular" required maxlength="11" value="<?php echo $linha['celular']; ?>">
                    </div>
                    <div class="imput-box">
                    <label>Cep:
                        <input name="cep" type="text" id="cep" size="10" maxlength="9"onblur="pesquisacep(this.value);" value="<?php echo $linha['cep']; ?>"/></label><br />
                    </div>
                    <div class="imput-box">   
                        <label>UF:
                        <input name="uf" type="text" id="uf" size="2" value="<?php echo $linha['uf']; ?>"/></label><br />
                    </div>
                    <div class="imput-box">  
                        <label>Cidade:
                        <input name="cidade" type="text" id="cidade" size="40" value="<?php echo $linha['cidade']; ?>"/></label><br />
                    </div>
                    <div class="imput-box">
                        <label>Bairro:
                        <input name="bairro" type="text" id="bairro" size="40" value="<?php echo $linha['bairro']; ?>"/></label><br />
                    </div>
                    <div class="imput-box">   
                            <label>Rua:
                        <input name="rua" type="text" id="rua" size="60" value="<?php echo $linha['rua']; ?>"/></label><br />
                    </div>
                    <div class="imput-box">
                        <span class="details">Nº De Residência:</span>
                        <input type="number" name="numero_de_residencia" required maxlength="11" value="<?php echo $linha['numero_de_residencia']; ?>">
                    </div>
                    <div class="imput-box">
                        <span class="details">E-mai:</span>
                        <input type="email" name="email" id="email" required  maxlength="70" value="<?php echo $linha['email']; ?>">
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