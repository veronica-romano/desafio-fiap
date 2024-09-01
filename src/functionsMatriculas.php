<?php
require_once "src/connect.php";

//get
function lerMatriculas(PDO $conexao):array{
    $sql = "SELECT * FROM matricula";

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
function lerUmaMatricula(PDO $conexao, int $id):array{
    $sql = "SELECT * FROM matricula WHERE id = :id";
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

///getJoined
function lerMatriculaTurmaEAluno(PDO $conexao, int $turma_id):array{
    $sql = "SELECT matricula.id as matriculaId, matricula.aluno_id as idAluno, matricula.turma_id as idTurma, turma.nome as nomeTurma, aluno.nome as nomeAluno from matricula INNER JOIN turma ON turma_id = turma.id INNER JOIN aluno ON aluno_id = aluno.id WHERE turma.id = :turma_id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':turma_id', $turma_id, PDO::PARAM_INT);
        $consulta->execute();
        //$resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    } 
    return $resultado;
}


//Insert
function inserirMatricula(PDO $conexao, string $aluno_id, string $turma_id):void{
    $sql = "INSERT INTO matricula (aluno_id, turma_id) VALUES (:aluno_id, :turma_id)";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':aluno_id', $aluno_id, PDO::PARAM_STR);
        $consulta->bindParam(':turma_id', $turma_id, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}


//Update
function atualizarMatricula(PDO $conexao, int $id, string $aluno_id, string $turma_id):void{
    $sql = "UPDATE matricula SET aluno_id = :aluno_id, turma_id = :turma_id WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':aluno_id', $aluno_id, PDO::PARAM_INT);
        $consulta->bindParam(':turma_id', $turma_id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }
}


//Delete
function excluirMatricula(PDO $conexao, int $id):void{
    $sql = "DELETE FROM matricula WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}