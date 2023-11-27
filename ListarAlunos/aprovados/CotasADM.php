<?php
include "../connectBD.php";
include "funcaoCotas.php";
include "cursos.php";
#Administração Cotas
$AprovadosDEFSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Administração' ORDER BY media DESC LIMIT 2;";
$LimitadorCotaDEF = "SELECT COUNT(nome_completo) FROM aluno WHERE curso='Administração' AND deficiencia!='Nenhuma' LIMIT 2";

$AprovadosAdministraçãoCotaTerritorialSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10";
$AprovadosAdministraçãoAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 6;";
$AprovadosAdministraçãoCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 3";

$NaoAprovadosAdministraçãoAmplaPublicaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 24";
$NaoAprovadosAdministraçãoCTPublicaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 10; ";
$NaoAprovadosAdministraçãoAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 6";
$NaoAprovadosAdministraçãoCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Administração' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 3";
$NaoAprovadosDEFAdministraçãoSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Administração' ORDER BY media DESC LIMIT 10 OFFSET 2;";
#CONSULTAS
$vagas = 45;


function limiterAmpla($conexao, $queryCotas){
    $limitAmpla = 23;
    $defCount = mysqli_num_rows(cotasDef($conexao));

    if ($defCount <=0)
        $limitAmpla=$limitAmpla+2;

    if ($defCount == 1)
        $limitAmpla = $limitAmpla +1;

    $cotasCount = mysqli_num_rows($queryCotas);

    if( $cotasCount == 0 ) 
        $limitAmpla= $limitAmpla+11;

echo $limitAmpla;
    return $limitAmpla;
}

function limiterAmplaPrivado($conexao, $queryCotas){
    $limitAmpla = "6";

    $cotasCount = mysqli_num_rows($queryCotas);

    if( $cotasCount == 0 ) 
        $limitAmpla = "9";

    return $limitAmpla;
}

$AprovadosCOTATERRITORIALENFERM = $conexao->query($AprovadosAdministraçãoCotaTerritorialSQL);
$AprovadosCTEnfermagePrivada = $conexao->query($AprovadosAdministraçãoCTPrivadaSQL);

$limitAmpla = limiterAmpla($conexao, $AprovadosCOTATERRITORIALENFERM);
$limitAmplaPrivado = limiterAmplaPrivado($conexao, $AprovadosCTEnfermagePrivada);


$AprovadosDEF = $conexao->query($AprovadosDEFSQL);
$AprovadosAMPLAPUBLICAENFERM = $conexao->query("SELECT * FROM aluno where curso = 'Administração' AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPública' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT {$limitAmpla};" );
$AprovadosAMPLAENFERMPRIVADA =  $conexao->query("SELECT * FROM aluno where curso = 'Administração' AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPrivada' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT {$limitAmplaPrivado};" );
$AprovadosCTEnfermagePrivada = $conexao->query($AprovadosAdministraçãoCTPrivadaSQL);

$NaoAprovadosAmplaPublicaAdministração = $conexao->query($NaoAprovadosAdministraçãoAmplaPublicaSQL);
$NaoAprovadosCTPublicaAdministração = $conexao->query($NaoAprovadosAdministraçãoCTPublicaSQL);
$NaoAprovadosAmplaPrivadaAdministração = $conexao->query($NaoAprovadosAdministraçãoAmplaPrivadaSQL);
$NaoAprovadosCTPrivadaAdministração = $conexao->query($NaoAprovadosAdministraçãoCTPrivadaSQL);
$NaoAprovadosDEFAdministração = $conexao->query($NaoAprovadosDEFAdministraçãoSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotas ADM</title>
</head>
<body>
    <h1>Administração</h1>
    <h2>Ampla Concorrência Publica aprovados</h2>
    
    
    
     <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Administração--> 
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($AprovadosAMPLAPUBLICAENFERM)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>      
        </tr>
    </tbody>
                                                    <?php } ?>
    </table>


    <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Administração-->
    <h2>Ampla Concorrência Publica não aprovados</h2>
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPublicaAdministração)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>    
        </tr>
    </tbody>
                                                    <?php } ?>
    </table> 



<!--TABELA PROS APROVADOS COTA TERRITORAL Administração-->
<h2>Cota Territorial Publica aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($AprovadosCOTATERRITORIALENFERM)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>                                                                

<!--TABELA PROS APROVADOS COTA TERRITORAL Administração-->
<h2>Cota Territorial Publica Não aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPublicaAdministração)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Administração--> 
<h2>Ampla Concorrência Privado aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosAMPLAENFERMPRIVADA)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Administração--> 
<h2>Ampla Concorrência Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPrivadaAdministração)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>


<!--TABELA PROS APROVADOS C.T PRIVADA Administração-->
<h2>Ampla C.T Privado aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosCTEnfermagePrivada)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS APROVADOS NÃO C.T PRIVADA Administração-->
<h2>Ampla C.T Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPrivadaAdministração)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>




<!--TABELA PROS DEF=TRUE Administração aprovados-->
<h2>Aprovados Administração DEF=TRUE aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($AprovadosDEF)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

<!--TABELA PROS DEF=TRUE Administração NÃO aprovados-->
<h2>Aprovados Administração DEF=TRUE NÃO aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosDEFAdministração)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>

</body>
</html>