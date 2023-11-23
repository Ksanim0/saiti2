<?php
include "connectBD.php";
$vagasTotal = 45;
$teste;

$subtraiDef = "SELECT COUNT(nome_completo) FROM aluno WHERE deficiencia != 'Nenhuma'";
$subDEFTratado = $conexao->query($subtraiDef);

function cotasDef($conexao)
{

  $consultaDefSQL = "SELECT nome_completo FROM aluno WHERE deficiencia != 'Nenhuma'";
  $alunosDeficientes = $conexao->query($consultaDefSQL);

  return $alunosDeficientes;

}


function aprovadosQuery(string $curso, string $conditions, $conexao){
  $aprovados = $conexao->query("SELECT nome_completo, media FROM aluno WHERE curso = '$curso' " . $conditions);
  return $aprovados;
}

?>