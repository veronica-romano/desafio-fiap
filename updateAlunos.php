<?php
require_once "src/functionsAlunos.php";
$listaDeAlunos = lerAlunos($conexao);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$aluno = lerUmAluno($conexao, $id);
$listaDeAlunos = lerAlunos($conexao);

if (isset($_POST['atualizar'])) {
    //echo "ok!";
    require_once "src/functionsAlunos.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarAluno($conexao, $id, $nome, $nascimento);
    header("location:getAlunos.php?status=sucesso");
}

if (!empty($aluno)) {
    $nomeAluno = $aluno['nome'];
} else {
    $nomeAluno = 'Aluno não encontrado'; // Fallback title if no student found
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Atualizar dados do aluno <?= htmlspecialchars($nomeAluno) ?> </h1>
        <hr>
        <p class="text-center">Utilize o formulário abaixo para atualizar os dados do aluno.</p>
        <form action="" method="post">
            <p>
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control mb-4" name="nome" id="nome" value="<?= $aluno['nome'] ?>" required>
            </p>
            <div class="row">
                <div class="col">
                    <p>
                        <label for="nascimento" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" name="nascimento" value="<?= $aluno['nascimento'] ?>" required>
                    </p>
                </div>
            </div>


            <div class="row">
                <p class="col text-center mt-4"><a href="getAlunos.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i>Voltar à lista de alunos</a></p>
                <p class="col text-center">
                    <button type="submit" class="btn btn-success btn-lg mt-4" name="atualizar"><i class="bi bi-check-square"></i> Atualizar dados do aluno</button>
                </p>
            </div>

        </form>
        <hr>
    </div>
    <script src="script.js"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="script.js"></script>
</html>