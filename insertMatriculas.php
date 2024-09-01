<?php
require_once "src/functionsMatriculas.php";
$turma_id = filter_input(INPUT_GET, 'turma_id', FILTER_SANITIZE_NUMBER_INT);
$aluno_id = filter_input(INPUT_GET, 'aluno_id', FILTER_SANITIZE_NUMBER_INT);
require_once "src/functionsAlunos.php";
$listaDeAlunos = lerAlunos($conexao);
require_once "src/functionsTurmas.php";
$listaDeTurmas = lerTurmas($conexao);
if (isset($_POST['inserir'])) {
	//echo "ok!";
	require_once "src/functionsMatriculas.php";
	$aluno_id = filter_input(INPUT_POST, 'aluno_id', FILTER_SANITIZE_NUMBER_INT);
	$turma_id = filter_input(INPUT_POST, 'turma_id', FILTER_SANITIZE_NUMBER_INT);
	inserirMatricula($conexao, $aluno_id, $turma_id);
	header("location:getMatriculas.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fazer Matrícula - CRUD com PHP e MySQL</title>
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
	<div class="container">
		<h1 class="text-center mt-4">Matricular aluno</h1>
		<hr>
		<br>
		<p class="text-center">Utilize o formulário abaixo para matricular um aluno.</p>
		<br>
		<form action="#" method="post">

			<div class="row">
				<div class="col">
					<p><label for="aluno" class="form-label">Aluno:</label>
						<select id="validationDefault01" name="aluno_id" class="form-control" required>
							<option value="">Selecione um aluno</option>
							<!-- PHP will generate options here -->
							<?php foreach ($listaDeAlunos as $aluno): ?>
								<option value="<?= $aluno['id']; ?>"<?= ($aluno_id == $aluno['id']) ? 'selected' : ''; ?>><?= $aluno['nome']; ?></option>
							<?php endforeach; ?>
						</select>
					</p>
				</div>
				<div class="col">
					<p><label for="turma" class="form-label">Turma:</label>
						<select id="validationDefault01" name="turma_id" class="form-control" required>
							<option value="">Selecione a turma</option>
							<?php foreach ($listaDeTurmas as $turma): ?>
								<option value="<?= $turma['id']; ?>" <?= ($turma_id == $turma['id']) ? 'selected' : ''; ?>><?= $turma['nome']; ?></option>
							<?php endforeach; ?>

						</select>
					</p>
				</div>
			</div>
			<div class="row mt-4">
				<p class="col text-center"><a href="index.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i> Voltar ao início</a></p>
				<p class="col text-center">
					<button type="submit" name="inserir" class="btn btn-success btn-lg"><i class="bi bi-check-square"></i> Salvar</button>
				</p>
			</div>

		</form>
		<hr>
</body>

</html>




</html>