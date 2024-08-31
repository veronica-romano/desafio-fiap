<?php
require_once "src/functionsTurmas.php";
$listaDeTurmas = lerTurmas($conexao);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$aluno = lerUmaTurma($conexao, $id);
$listaDeTurmas = lerTurmas($conexao);
if (isset($_POST['atualizar'])) {
    //echo "ok!";
    require_once "../exercicio-php-crud/src/functionsTurmas.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarAluno($conexao, $id, $nome, $descricao);
    header("location:getTurmas.php?status=sucesso");
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
        <p class="text-center">Utilize o formulário abaixo para atualizar os dados da turma.</p>
        <form action="" method="post">
            <p>
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control mb-4" name="nome" id="nome" value="<?= $aluno['nome'] ?>" required>
            </p>
            <div class="row">
                <div class="col">
                    <p>
                        <label for="descricao" class="form-label">descricao:</label>
                        <input type="text" class="form-control mb-4" name="descricao" id="descricao" value="<?= $aluno['descricao'] ?>" required>
                    </p>
                </div>
                <div class="col">
                    <p>
                        <label for="tipo" class="form-label">tipo:</label>
                        <input type="text" class="form-control mb-4" name="tipo" id="tipo" value="<?= $aluno['tipo'] ?>" required>
                    </p>
                </div>
            </div>


            <div class="row">
                <p class="col text-center mt-4"><a href="visualizar.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i>Voltar à lista de turmas</a></p>
                <p class="col text-center">
                    <button type="submit" class="btn btn-success btn-lg mt-4" name="atualizar"><i class="bi bi-check-square"></i> Atualizar dados da turma</button>
                </p>
            </div>

        </form>
        <hr>
    </div>
    <script src="script.js"></script>
</body>

</html>