<?php
require_once "src/connect.php";

//get
function lerAlunos(PDO $conexao):array{
    $sql = "SELECT * FROM aluno ORDER BY nome ASC";

    try {
        setlocale(LC_ALL, 'pt_BR');
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}


///getOne
function lerUmAluno(PDO $conexao, int $id):array{
    $sql = "SELECT * FROM aluno WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        //$resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    } 
    return $resultado;
}


//Insert
function inserirAluno(PDO $conexao, string $nome, string $nascimento):void{
    $sql = "INSERT INTO aluno (nome, nascimento) VALUES (:nome, :nascimento)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}


//Update
function atualizarAluno(PDO $conexao, int $id, string $nome, string $nascimento):void{
    $sql = "UPDATE aluno SET nome = :nome, nascimento = :nascimento WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}


//Delete
function excluirAluno(PDO $conexao, int $id):void{
    $sql = "DELETE FROM aluno WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}