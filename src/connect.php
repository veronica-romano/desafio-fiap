<?php
/*Script de conexão ao servidor banco de dados */

$servidor = "localhost";
$usuario = "ruth";
$senha = "senha-muito-longa";
$banco = "desafio_fiap";
try{
//Criando a conexão com o MySQL (API/ Driver de conexão)
    $conexao = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8", $usuario, $senha);
// Habilita a  verificação de erros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(Exception $erro){
    die("Erro: " .$erro->getMessage());
} finally{

}


?>