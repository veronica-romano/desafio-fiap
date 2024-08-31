<?php
require_once "src/functionsMatriculas.php";
$listaDeMatriculas = lerMatriculas($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Matriculas</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Lista de Matrículas</h1>
        <hr>
        <div class=" container responsive-table center shadow mt-1 mb-2">
            <table class="table table-hover" id="the-table">
                <thead>
                    <th scope="col">id</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Turma</th>
                    <th scope="col"> Editar</th>
                    <th scope="col">Excluir</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaDeMatriculas as $matricula) {
                    ?>
                        <tr>
                            <th scope="row" class="matriculas id"><?= $matricula['id'] ?></th>
                            <td class="matriculas matricula"><?= $matricula['aluno_id'] ?></td>
                            <td class="matriculas turma"><?= $matricula['turma
                            _id'] ?></td>
                            <td class="matriculas atualizar"><a href="update.php?id=<?= $matricula['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="matriculas excluir"><a href="delete.php?id=<?= $matricula['id'] ?>" class="exclusao btn btn-danger"><i class="bi bi-trash"></i></a></td>

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
            <p class="col text-center"><a href="inserir.php" class="btn btn-success btn-lg"><i class="bi bi-plus-lg"></i> Inserir Matrícula</a></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


    <script src="script.js"></script>

</body>

</html>