<?php
include "connectBD.php";
#Informática Cotas
$AprovadosDEFSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Informática' ORDER BY media DESC LIMIT 2;";
$LimitadorCotaDEF = "SELECT COUNT(nome_completo) FROM aluno WHERE curso='Informática' AND deficiencia!='Nenhuma' LIMIT 2";

$AprovadosInformáticaAmplaPublicaSQL = "SELECT * FROM aluno WHERE curso ='Informática' AND deficiencia = 'Nenhuma' AND concorrencia = 'EscolaPública' AND (bairro != 'Príncipe Imperial' AND bairro != 'Venâncios') ORDER BY media DESC LIMIT 24;";
$AprovadosInformáticaCotaTerritorialSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10";
$AprovadosInformáticaAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 6;";
$AprovadosInformáticaCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 3";

$NaoAprovadosInformáticaAmplaPublicaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 24";
$NaoAprovadosInformáticaCTPublicaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPública' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 10; ";
$NaoAprovadosInformáticaAmplaPrivadaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro!='Príncipe Imperial' AND bairro!='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 6";
$NaoAprovadosInformáticaCTPrivadaSQL = "SELECT * FROM aluno WHERE curso='Informática' AND deficiencia='Nenhuma' AND concorrencia='EscolaPrivada' AND (bairro='Príncipe Imperial' OR bairro='Venâncios') ORDER BY media DESC LIMIT 10 OFFSET 3";
$NaoAprovadosDEFInformáticaSQL = "SELECT * FROM aluno WHERE deficiencia!='Nenhuma' AND curso='Informática' ORDER BY media DESC LIMIT 10 OFFSET 2;";
#CONSULTAS
$vagas = 45;

$numDEF = $conexao->query($LimitadorCotaDEF);

$AprovadosDEF = $conexao->query($AprovadosDEFSQL);
$AprovadosAMPLAPUBLICAENFERM = $conexao->query($AprovadosInformáticaAmplaPublicaSQL);
$AprovadosCOTATERRITORIALENFERM = $conexao->query($AprovadosInformáticaCotaTerritorialSQL);
$AprovadosAMPLAENFERMPRIVADA = $conexao->query($AprovadosInformáticaAmplaPrivadaSQL);
$AprovadosCTEnfermagePrivada = $conexao->query($AprovadosInformáticaCTPrivadaSQL);

$NaoAprovadosAmplaPublicaInformática = $conexao->query($NaoAprovadosInformáticaAmplaPublicaSQL);
$NaoAprovadosCTPublicaInformática = $conexao->query($NaoAprovadosInformáticaCTPublicaSQL);
$NaoAprovadosAmplaPrivadaInformática = $conexao->query($NaoAprovadosInformáticaAmplaPrivadaSQL);
$NaoAprovadosCTPrivadaInformática = $conexao->query($NaoAprovadosInformáticaCTPrivadaSQL);
$NaoAprovadosDEFInformática = $conexao->query($NaoAprovadosDEFInformáticaSQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotas Informática</title>
</head>
<body>
    <h1>Informática</h1>
    <h2>Ampla Concorrência Publica aprovados</h2>
    
    
    
     <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Informática--> 
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


    <!--TABELA PROS APROVADOS AMPLA CONCORRENCIA Informática-->
    <h2>Ampla Concorrência Publica não aprovados</h2>
    <table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>Media</th>
        </tr>
    </thead>

  
    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPublicaInformática)) { ?>

    <tbody>
        <tr>
            <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td>    
        </tr>
    </tbody>
                                                    <?php } ?>
    </table> 



<!--TABELA PROS APROVADOS COTA TERRITORAL Informática-->
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

<!--TABELA PROS APROVADOS COTA TERRITORAL Informática-->
<h2>Cota Territorial Publica Não aprovados</h2>
<table border="1">
<thead>
    <tr>
        <th>nome_completo</th>
        <th>media</th>
    </tr>
</thead>

<?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPublicaInformática)) { ?>

<tbody>
    <tr>
    <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
    </tr>
</tbody>
<?php } ?>
</table>

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Informática--> 
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

<!--TABELA PROS APROVADOS AMPLA CONCORRENCIA PRIVADA Informática--> 
<h2>Ampla Concorrência Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosAmplaPrivadaInformática)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>


<!--TABELA PROS APROVADOS C.T PRIVADA Informática-->
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

<!--TABELA PROS APROVADOS NÃO C.T PRIVADA Informática-->
<h2>Ampla C.T Privado Não aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosCTPrivadaInformática)) { ?>
    
    <tbody>
        <tr>
        <th><?php echo $usuario['nome_completo'];?></th>
                <td> <?php echo $usuario['media'];?> </td> 
        </tr>
    </tbody>
    <?php } ?>
</table>




<!--TABELA PROS DEF=TRUE Informática aprovados-->
<h2>Aprovados Informática DEF=TRUE aprovados</h2>
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

<!--TABELA PROS DEF=TRUE Informática NÃO aprovados-->
<h2>Aprovados Informática DEF=TRUE NÃO aprovados</h2>
<table border="1">
    <thead>
        <tr>
            <th>nome_completo</th>
            <th>media</th>
        </tr>
    </thead>

    <?php while ($usuario = mysqli_fetch_assoc($NaoAprovadosDEFInformática)) { ?>
    
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