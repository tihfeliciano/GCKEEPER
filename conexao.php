<?php
// Configurações do servidor, banco de dados, usuario e senha
// onde o PHP vai se conectar
$servidor='localhost';
$db = "gckeeper";
$user = 'root';
$pass = ''; 
//$pass = 'usbw'; // senha para o usbwebserver
try {
  // $pdo - é a variável que irá receber
  // os dados da conexão ao Banco de dados
  // No caso do exemplo um servidor MySQL
  $pdo = new PDO('mysql:host='.$servidor.';dbname='.$db ,  $user, $pass);
  //echo "Conectado com sucesso!!!";

  // Testa um erro de exception na classe PDO
  // Classe responsável pela conexão ao banco
  //  de dados
} catch (PDOException $e) {
  // Mostra mensagem do erro ocorrido
    echo 'Erro número : ' . $e->getMessage();
}
?>