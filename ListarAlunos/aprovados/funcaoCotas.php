<?php
include "../connectBD.php";
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
    $condicao = !$conditions ? "" : $conditions;
  $aprovados = $conexao->query("SELECT * FROM aluno where curso = '{$curso}'AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPública' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT {$conditions};");
  return $aprovados;
}

?>