<?php
require_once "src/functionsMatriculas.php";
require_once "src/functionsAlunos.php";
$aluno_id = filter_input(INPUT_GET, 'aluno_id', FILTER_SANITIZE_NUMBER_INT);
$aluno = lerUmAluno($conexao, $aluno_id);
$detalhes = lerMatriculaTurmaEAlunoByAluno($conexao, $aluno_id);
if (!empty($aluno)) {
    $nomeAluno = $aluno['nome'];
} else {
    $nomeAluno = 'Aluno não encontrado';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do aluno - <?= htmlspecialchars($nomeAluno) ?></title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Detalhes do aluno - <?= htmlspecialchars($nomeAluno) ?> </h1>
        <hr>
        <div class=" container responsive-table center shadow mt-1 mb-2">
            <table class="table table-hover" id="the-table">
                <thead>
                    <th scope="col">Matrícula</th>
                    <th scope="col">Turma</th>
                    <th scope="col"> Editar</th>
                    <th scope="col">Excluir</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($detalhes as $detalhe) {
                    ?>
                        <tr>
                            <td scope="row" class="turmas id"><?= $detalhe['matriculaId'] ?></td>
                            <td class="alunos nome"><?= $detalhe['nomeTurma'] ?></td>
                            <td class="turmas atualizar"><a href="updateMatriculas.php?id=<?= $detalhe['matriculaId'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="turmas excluir"><a href="deleteMatriculas.php?id=<?= $detalhe['matriculaId'] ?>" class="exclusao btn btn-danger"><i class="bi bi-trash"></i></a></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- links-->

    </div>
    <div class="row mt-4">
        <p class="col text-center"><a href="getAlunos.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i> Voltar</a></p>
        <p class="col text-center"><a href="insertMatriculas.php?aluno_id=<?= $aluno_id?>" class="btn btn-success btn-lg"><i class="bi bi-plus-lg"></i> Nova Matrícula</a></p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


    <script src="script.js"></script>

</body>

</html>