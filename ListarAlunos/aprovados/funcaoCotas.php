<?php
include "connectBD.php";
$vagasTotal = 45;
$teste;

$subtraiDef = "SELECT COUNT(nome_completo) FROM aluno WHERE deficiencia != 'Nenhuma'";
$subDEFTratado = $conexao->query($subtraiDef);


function cotasDef ($conexao) {

$consultaDefSQL = "SELECT * FROM aluno WHERE deficiencia != 'Nenhuma'";
$consultaTratada = $conexao->query($consultaDefSQL);


}
$usuario = mysqli_fetch_assoc($subDEFTratado);
echo $usuario[2];
?>