<?php
require_once "src/functionsMatriculas.php";
$listaDeMatriculas = lerMatriculas($conexao);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$matricula = lerUmaMatricula($conexao, $id);
$listaDeMatriculas = lerMatriculas($conexao);
if (isset($_POST['atualizar'])) {
    //echo "ok!";
    require_once "../exercicio-php-crud/src/functionsMatriculas.php";
    $aluno_id = filter_input(INPUT_POST, 'aluno_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $turma_id = filter_input(INPUT_POST, 'turma_id', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    atualizarAluno($conexao, $id, $aluno_id, $turma_id);
    header("location:getMatriculas.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar dados - CRUD com PHP e MySQL</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Atualizar dados da turma </h1>
        <hr>
        <p class="text-center">Utilize o formulário abaixo para atualizar a matrícula.</p>
        <form action="" method="post">
            <p>
                <label for="aluno_id" class="form-label">Aluno:</label>
                <input type="text" class="form-control mb-4" name="aluno_id id=" aluno_id value="<?= $matricula['aluno_id'] ?>" required>
            </p>
            <div class="row">
                <div class="col">
                    <p>
                        <label for="turma_id" class="form-label">Turma:</label>
                        <input type="text" class="form-control mb-4" name="turma_id" id="turma_id" value="<?= $matricula['turma_id'] ?>" required>
                    </p>
                </div>
                
            </div>


            <div class="row">
                <p class="col text-center mt-4"><a href="getMatriculas.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i>Voltar à lista de matrículas</a></p>
                <p class="col text-center">
                    <button type="submit" class="btn btn-success btn-lg mt-4" name="atualizar"><i class="bi bi-check-square"></i> Atualizar matrícula</button>
                </p>
            </div>

        </form>
        <hr>
    </div>
    <script src="script.js"></script>
</body>

</html>