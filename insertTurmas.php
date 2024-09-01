<?php
require_once "src/functionsTurmas.php";
$tiposDeTurma = tiposTurma($conexao);
if (isset($_POST['inserir'])) {
	//echo "ok!";
	require_once "src/functionsTurmas.php";
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
	inserirTurma($conexao, $nome, $tipo, $descricao);
	header("location:getTurmas.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar uma turma - CRUD com PHP e MySQL</title>
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
	<div class="container">
		<h1 class="text-center mt-4">Cadastrar turma </h1>
		<hr>
		<br>
		<p class="text-center">Utilize o formulário abaixo para cadastrar uma turma.</p>
		<br>
		<form action="#" method="post">

			<p><label for="nome" class="form-label">Nome:</label>
				<input type="text" class="form-control" name="nome" id="validationDefault01" required>
			</p>
			<div class="row">
				<div class="col">
					<p><label for="descricao" class="form-label">Descricao:</label>
						<input type="text" class="form-control" id="validationDefault01" name="descricao" required>
					</p>
				</div>
				<div class="col">
					<p><label for="segunda" class="form-label">Tipo:</label>
						<select name="tipo" id="validationDefault01" class="form-control" required>
							<option value="">Selecione o tipo de turma</option>

							<?php foreach ($tiposDeTurma as $tipo): ?>
								<option value="<?= htmlspecialchars($tipo); ?>"><?= ucfirst(htmlspecialchars($tipo)); ?></option>
							<?php endforeach; ?>
						</select>
					</p>
				</div>
			</div>
			<div class="row mt-4">
				<p class="col text-center"><a href="index.php" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left"></i> Voltar ao início</a></p>
				<p class="col text-center">
					<button type="submit" name="inserir" class="btn btn-success btn-lg"><i class="bi bi-check-square"></i> Cadastrar turma</button>
				</p>
			</div>

		</form>
		<hr>
</body>

</html>

</body>

</html>