<?php
if (isset($_POST['inserir'])) {
	//echo "ok!";
	require_once "src/functionsMatriculas.php";
	$aluno_id = filter_input(INPUT_POST, 'aluno_id', FILTER_SANITIZE_SPECIAL_CHARS);
	$turma_id = filter_input(INPUT_POST, 'turma_id', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	inserirAluno($conexao, $aluno_id, $turma_id);
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
						<search>
							<form>
								<input name="fsrch" id="fsrch" placeholder="Encontrar aluno" class="form-control">
							</form>
						</search>
					</p>
				</div>
				<div class="col">
					<p><label for="turma" class="form-label">Turma:</label>
						<search>
							<form>
								<input name="fsrch" id="fsrch" placeholder="Encontrar turma" class="form-control">
							</form>
						</search>
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

</body>

</html>