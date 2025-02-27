<?php
require_once "src/connect.php";

//get
function lerTurmas(PDO $conexao):array{
    $sql = "SELECT * FROM turma ORDER BY nome ASC";

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
function lerUmaTurma(PDO $conexao, int $id):array{
    $sql = "SELECT * FROM turma WHERE id = :id";
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
function inserirTurma(PDO $conexao, string $nome, string $tipo, string $descricao):void{
    $sql = "INSERT INTO turma (nome, tipo, descricao) VALUES (:nome, :tipo, :descricao)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}

function tiposTurma(PDO $conexao): array {
    $sql = "SHOW COLUMNS FROM turma WHERE Field = 'tipo'";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Extrair os valores ENUM da coluna 'tipo'
        $enum_values = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $resultado['Type']));

        return $enum_values;
    } catch (Exception $erro) {
       die("Erro: " . $erro->getMessage());
    }
}


//Update
function atualizarTurma(PDO $conexao, int $id, string $nome, string $tipo, string $descricao):void{
    $sql = "UPDATE turma SET nome = :nome, tipo = :tipo, descricao = :descricao WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}


//Delete
function excluirTurma(PDO $conexao, int $id):void{
    $sql = "DELETE FROM turma WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        //die("Erro: ".$erro->getMessage());
        if ($erro->getCode() == 23000) {
            if (strpos($erro->getMessage(), '1451 Cannot delete or update a parent row') !== false) {
                die("Erro: Existem alunos matriculados. Não será possível excluir a turma.");
            } else {
                echo "Erro: Não foi possível excluir a turma. Entre em ontato com o suporte.";
            }
        } else {
            echo "Erro inesperado: " . $erro->getMessage();
        }
    }
}