<?php
require_once "src/functionsMatriculas.php";
//obtendo o valor do parâmetro da url
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    excluirMatricula($conexao, $id);
    header("location:getMatriculas.php");
  