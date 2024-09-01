<?php
/*Script de conexão ao servidor banco de dados */
$ini = parse_ini_file("php.ini");

$servidor = $ini["servidor"];
$usuario = $ini["usuario"];
$senha = $ini["senha"];
$banco = $ini["banco"];

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