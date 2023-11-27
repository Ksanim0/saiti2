<?php
$servername = "localhost";
$database = "eeepma26_battle_royale";
$username = "root";#eeepma26_edital
$password = "";#ee3pm41@3!MM
try{
$conexao = mysqli_connect($servername, $username, $password, $database);
}catch(mysqli_sql_exception $e){
    var_dump($e);
}

?> 
