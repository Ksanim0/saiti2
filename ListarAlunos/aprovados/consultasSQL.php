<?php
include "connectBD.php";
#ENFERMAGEM Cotas
$AprovadosDEFSQL = "SELECT nome_completo, media FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Enfermagem' ORDER BY media DESC LIMIT 2;    ";
$LimitadorCotaDEF = "SELECT COUNT(nome_completo) FROM aluno WHERE curso='Enfermagem' AND deficiencia!='Nenhuma' LIMIT 2";

$numDEF = $conexao->query($LimitadorCotaDEF);

$AprovadosDEF = $conexao->query($AprovadosDEFSQL);
while ($linha = $AprovadosDEF->fetch_assoc()){
    echo " Nome: " . $linha["nome_completo"]. " - Media: " . $linha["media"]. "<br>";
}

while ($linha = $numDEF->fetch_assoc()) {
    if ($linha["COUNT(nome_completo)"] >= 2){
        $linha["COUNT(nome_completo)"] = 2;
    }
    echo $linha["COUNT(nome_completo)"];
}
#Montar Tabela dos aprovados


?>