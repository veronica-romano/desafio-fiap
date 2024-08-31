<?php
require_once "src/functionsTurmas.php";
//obtendo o valor do parâmetro da url
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    excluirTurma($conexao, $id);
    header("location:getTurmas.php");
  