<?php
include "connectBD.php";

$nome_completo = $_POST['nome_completo'];
$nome_social = $_POST['nome_social'];

$endereco = $_POST['rua'];
$bairro = $_POST['bairro'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];
$genero = $_POST['genero'];


$curso = $_POST['curso'];

$deficiencia = $_POST['deficiencia'];

$concorrencia = $_POST['concorrencia'];

try{
   /*  $query =  *//* "INSERT INTO aluno(nome_completo, nome_social, endereco, municipio, bairro, estado, cpf, cep, deficiencia, genero, curso, concorrencia, portugues6, portugues7, portugues8, portugues9, matematica6, matematica7, matematica8, matematica9, ciencias6, ciencias7, ciencias8, ciencias9, historia6, historia7, historia8, historia9, geografia6, geografia7, geografia8, geografia9, ingles6, ingles7, ingles8, ingles9, artes6, artes7, artes8, artes9, edfisica6, edfisica7, edfisica8, edfisica9, data_nasc) VALUES ('$nome_completo', '$nome_social', '$endereco', '$municipio', '$bairro', '$estado', '$cpf', '$cep', '$deficiencia', '$genero', '$curso', '$concorrencia', '$portugues6' , '$portugues7' , '$portugues8' , '$portugues9' , '$matematica6' , '$matematica7' ,	'$matematica8' , '$matematica9' , '$ciencias6' , '$ciencias7' , '$ciencias8' , '$ciencias9' , '$historia6' , '$historia7' ,	'$historia8' , '$historia9' , '$geografia6' ,	'$geografia7' , '$geografia8' , '$geografia9' , '$ingles6', '$ingles7' , '$ingles8' , '$ingles9' , '$artes6' ,	'$artes7 , '$artes8' ,	'$artes9' , '$edfisica6' , '$edfisica7' , '$edfisica8' 	, '$edfisica9', '$data_nasc') "; */
    $result = mysqli_query($conexao, "INSERT INTO aluno(nome_completo, nome_social, endereco, municipio, bairro, estado, cpf, cep, data_nasc, deficiencia, genero, curso, concorrencia) VALUES ('$nome_completo', '$nome_social', '$endereco', '$municipio', '$bairro', '$estado', '$cpf', '$cep', '$data_nasc', '$deficiencia', '$genero', '$curso', '$concorrencia') ");
} catch (mysqli_sql_exception $e) { 
    var_dump($e);
    exit; 
 } 

 if ($result) {
    echo $data_nasc;
}

?>
