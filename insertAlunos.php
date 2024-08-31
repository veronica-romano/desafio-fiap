<?php
if (isset($_POST['inserir'])) {
	//echo "ok!";
	require_once "src/functionsAlunos.php";
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$nascimento = filter_input(INPUT_POST, 'nascimento');
	inserirAluno($conexao, $nome, $nascimento);
	header("location:getAlunos.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
	<div class="container">
		<h1 class="text-center mt-4">Cadastrar um novo aluno </h1>
		<hr>
		<br>
		<p class="text-center">Utilize o formulário abaixo para cadastrar um novo aluno.</p>
		<br>
		<form action="#" method="POST">

			<p><label for="nome" class="form-label">Nome:</label>
				<input type="text" class="form-control" name="nome" id="nome" required>
			</p>
			<div class="row">
				<div class="col">
					<p><label for="nascimento" class="form-label">Data de nascimento:</label>
						<input type="date" class="form-control" name="nascimento" required>
					</p>
				</div>
			</div>
			<div class="row mt-4">
				<p class="col text-center"><a href="index.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i> Voltar ao início</a></p>
				<p class="col text-center">
					<button type="submit" name="inserir" class="btn btn-success btn-lg"><i class="bi bi-check-square"></i> Cadastrar aluno</button>
				</p>
			</div>

		</form>
		<hr>
</body>

</html>

</body>

</html>