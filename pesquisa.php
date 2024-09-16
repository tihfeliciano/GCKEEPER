<?php
    require ('conexao.php');

    $stmt ="SELECT * FROM gckeeper . paciente WHERE nome = ?";
    
    $stmt->prepare($sql);
    $stmt->bind_param("s", $_GET['q'];)
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($linha);
    $stmt->fetch();
    $stmt->close();

    echo"
        <tr>
        <td>{$linha['id']}</td>
        <td>{$linha['nome_do_paciente']}</td>
        <td>{$linha['sexo']}</td>
        <td>{$linha['data_de_nascimento']}</td>
        <td>{$linha['cpf']}</td>
        <td>{$linha['rg']}</td>
        <td>{$linha['telefone']}</td>
        <td>{$linha['celular']}</td>
        <td>{$linha['email']}</td>
        <td>{$linha['pais']}</td>
        <td>{$linha['cep']}</td>
        <td>{$linha['estado']}</td>
        <td>{$linha['rua']}</td>
        <td>{$linha['numero_de_residencia']}</td>
        <td>{$linha['tipo_sanguinio']}</td>
        <td>{$linha['id_da_empresa']}</td>
        <td>{$linha['data_que_o_paciente_passou_na_clinica']}</td>
        <td>{$linha['funcao']}</td>
        <td>{$linha['tipo_de_exame']}</td>
        </tr>";                           
   
?>