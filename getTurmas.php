<?php
require_once "src/functionsTurmas.php";
$listaDeTurmas = lerTurmas($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Turmas</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Lista de Turmas</h1>
        <hr>
        <div class=" container responsive-table center shadow mt-1 mb-2">
            <table class="table table-hover" id="the-table">
                <thead>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Detalhes</th>
                    <th scope="col"> Editar</th>
                    <th scope="col">Excluir</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaDeTurmas as $turma) {
                    ?>
                        <tr>
                            <th scope="row" class="turmas id"><?= $turma['id'] ?></th>
                            <td class="turmas nome"><?= $turma['nome'] ?></td>
                            <td class="turmas descricao"><?= $turma['descricao'] ?></td>
                            <td class="turmas tipo"><?= $turma['tipo'] ?></td>
                            <td class="turmas detalhes"><a href="getTurma.php?turma_id=<?= $turma['id'] ?>" class="btn btn-success"><i class="bi bi-people"></i></a></td>
                            <td class="turmas atualizar"><a href="updateTurmas.php?id=<?= $turma['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="turmas excluir"><a href="deleteTurmas.php?id=<?= $turma['id'] ?>" class="exclusao btn btn-danger"><i class="bi bi-trash"></i></a></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- HTML  e o PHP necessários
para exibir a relação de alunos existentes no banco de dados e links dinâmicos para as páginas de atualização e exclusão. -->
        <div class="row mt-4">
            <p class="col text-center"><a href="index.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i> Voltar</a></p>
            <p class="col text-center"><a href="insertTurmas.php" class="btn btn-success btn-lg"><i class="bi bi-plus-lg"></i> Inserir Turmas</a></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


    <script src="script.js"></script>

</body>

</html>