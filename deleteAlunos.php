<?php
require_once "src/functionsAlunos.php";
//obtendo o valor do parâmetro da url
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    excluirAluno($conexao, $id);
    header("location:getAlunos.php");
  