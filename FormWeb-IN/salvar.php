<?php
include "connectBD.php";

$nome_completo = $_POST['nome_completo'];
$nome_social = $_POST['nome_social'];

$endereco = $_POST['endereco'];
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


$portugues6 = $_POST['portugues6'];
$portugues7 = $_POST['portugues7'];
$portugues8 = $_POST['portugues8'];
$portugues9 = $_POST['portugues9'];

$matematica6 = $_POST['matematica6'];
$matematica7 = $_POST['matematica7'];
$matematica8 = $_POST['matematica8'];
$matematica9 = $_POST['matematica9'];

$ciencias6 = $_POST['ciencias6'];
$ciencias7 = $_POST['ciencias7'];
$ciencias8 = $_POST['ciencias8'];
$ciencias9 = $_POST['ciencias9'];

$historia6 = $_POST['historia6'];
$historia7 = $_POST['historia7'];
$historia8 = $_POST['historia8'];
$historia9 = $_POST['historia9'];

$geografia6 = $_POST['geografia6'];
$geografia7 = $_POST['geografia7'];
$geografia8 = $_POST['geografia8'];
$geografia9 = $_POST['geografia9'];

$ingles6 = $_POST['ingles6'];
$ingles7 = $_POST['ingles7'];
$ingles8 = $_POST['ingles8'];
$ingles9 = $_POST['ingles9'];

$artes6 = $_POST['artes6'];
$artes7 = $_POST['artes7'];
$artes8 = $_POST['artes8'];
$artes9 = $_POST['artes9'];

$edfisica6 = $_POST['edfisica6'];
$edfisica7 = $_POST['edfisica7'];
$edfisica8 = $_POST['edfisica8'];
$edfisica9 = $_POST['edfisica9'];

$media = ($portugues6 +	$portugues7 + $portugues8 +	$portugues9 + $matematica6 + $matematica7 +	$matematica8 + $matematica9 + $ciencias6 + $ciencias7 +	$ciencias8 + $ciencias9 + $historia6 + $historia7 +	$historia8 + $historia9 + $geografia6 +	$geografia7 + $geografia8 + $geografia9 + $ingles6 + $ingles7 + $ingles8 + $ingles9 + $artes6 +	$artes7 + $artes8 +	$artes9 + $edfisica6 + $edfisica7 + $edfisica8 	+ $edfisica9 	)/32;



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
