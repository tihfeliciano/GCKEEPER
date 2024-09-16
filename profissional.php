<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCKEEPER | Profissional </title>
        <link rel="shortcut icon" type="imagex/png" href="../fotos/logo_fundo.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../css/clinica/cad_profissional.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">

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
            <div class="titulo">Cadastro de Profissionais<?php echo $_SESSION['id_da_clinica'];?></div>
            <form action="../../php/clinica/cad_profissional.php" method="POST">
                <div class="user-details">
                    <input type="hidden" name="id_da_clinica" id="id_da_clinica"  value="<?php echo $_SESSION['id_da_clinica']; ?>" readonly>
                    <div class="imput-box">
                        <span class="details">Nome Do Profissional:</span>
                        <input type="text" name="nome" id="nome"  required maxlength="50">
                    </div>  
                    <div class="imput-box">
                        <span class="details">Sexo:</span>
                        <input type="text" name="sexo" id="sexo" required maxlength="9">
                    </div>
                    <div class="imput-box">
                        <span class="details">Data De Nascimento:</span>
                        <input type="date" name="data_de_nascimento" id="data_de_nascimento" required>
                    </div>
                    <div class="imput-box">
                        <span class="details">CPF:</span>
                        <input type="number" name="cpf" id="cpf" maxlength="11" required>
                    </div>
                    <div class="imput-box">
                        <span class="details">Celular:</span>
                        <input type="text" name="celular" id="celular" required maxlength="11">
                    </div>
                    <div class="imput-box">
                    <label>Cep:
                        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                            onblur="pesquisacep(this.value);" /></label><br />
                    </div>
                    <div class="imput-box">   
                            <label>Rua:
                        <input name="rua" type="text" id="rua" size="60" /></label><br />
                    </div>
                    <div class="imput-box">
                        <label>Bairro:
                        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
                    </div>
                    <div class="imput-box">  
                        <label>Cidade:
                        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
                    </div>
                    <div class="imput-box">   
                        <label>UF:
                        <input name="uf" type="text" id="uf" size="2" /></label><br />
                    </div>
                    <div class="imput-box">
                        <span class="details">Nº De Residência:</span>
                        <input type="number" name="numero_de_residencia" required maxlength="11">
                    </div>
                    <div class="imput-box">
                        <span class="details">E-mai:</span>
                        <input type="email" name="email" id="email" required  maxlength="70">
                    </div>
                        <div class="button">
                            <input  type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
