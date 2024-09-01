<?php
require_once "src/connect.php";

//get
function lerAlunos(PDO $conexao): array
{
    $sql = "SELECT * FROM aluno ORDER BY nome ASC";

    try {
        setlocale(LC_ALL, 'pt_BR');
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: " . $erro->getMessage());
    }
    return $resultado;
}


///getOne
function lerUmAluno(PDO $conexao, int $id): array
{
    $sql = "SELECT * FROM aluno WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        //$resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: " . $erro->getMessage());
    }
    return $resultado;
}


//Insert
function inserirAluno(PDO $conexao, string $nome, string $nascimento): void
{
    if (strlen($nome) < 3) {
        die("Erro: O nome deve ter pelo menos 3 letras. Volte e tente novamente.");
    }
    
    $sql = "INSERT INTO aluno (nome, nascimento) VALUES (:nome, :nascimento)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {

        if ($erro->getCode() == 23000) { 
            if (strpos($erro->getMessage(), '1062 Duplicate entry') !== false) {
                die("Erro: Aluno '$nome' já está cadastrado. Volte e tente novamente.");
            } else {
                echo "Erro: Não foi possível adicionar o aluno. Entre em ontato com o suporte.";
            }
        } else {
            echo "Erro inesperado: " . $erro->getMessage();
        }
    }
}


//Update
function atualizarAluno(PDO $conexao, int $id, string $nome, string $nascimento): void
{
    $sql = "UPDATE aluno SET nome = :nome, nascimento = :nascimento WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: " . $erro->getMessage());
    }
}


//Delete
function excluirAluno(PDO $conexao, int $id): void
{
    $sql = "DELETE FROM aluno WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        //die("Erro: " . $erro->getMessage());
        if ($erro->getCode() == 23000) {
            if (strpos($erro->getMessage(), '1451 Cannot delete or update a parent row') !== false) {
                die("Erro: Aluno com matrícula ativa. Não será possível excluir.");
            } else {
                echo "Erro: Não foi possível excluir. Entre em ontato com o suporte.";
            }
        } else {
            echo "Erro inesperado: " . $erro->getMessage();
        }
    }
}
