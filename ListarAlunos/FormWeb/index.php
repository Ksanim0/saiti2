<?php
include "../connectBD.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_aluno = "SELECT * FROM aluno WHERE id = '$id'";
$resultado_aluno = mysqli_query($conexao, $result_aluno);
$linha_aluno = mysqli_fetch_assoc($resultado_aluno);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>EEEP Manoel Mano | Inserir/Editar Dados Alunos</title>
    <link rel="stylesheet" href="styleNew.css">
    <link rel="stylesheet" href="btn-style.css">
    <meta name="google-site-verification" content="ezTnfxOAOeXB6FaEOsqR0fcf63u74YI3CQX8biM0w7I" />
    <!-- Script para as Mascaras --> 
    <script src="js/MaskInput.js"></script>

    
    <script src="js/ValidarCEP.js"></script>
<!--     <script src="js/MaskNotas.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Favicon EEEP Manoel Mano -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://eeepmanoelmano.com.br/favicon.svg">
   
  
</head>
<body>
    <div class="header">
        <div class="container-main-menu">
            <div class="container">
                <div class="row-1">
                    <div class="col-0">
                        <a href="https://www.ceara.gov.br/"target="_blank"><img src="logo-governo.svg" alt="Logo do Governo do Ceará"></a>
                        <a href="https://selecao.eeepmanoelmano.com.br/"target="_self"><img src="logo-mm.svg" alt="Logo da EEEP Manoel Mano"></a>
                    </div>
                    <div class="col-0" id="Titulo"  >
                        <h3>formulario</h3>

<div class="links-btn">
        <a class="fcc-btn" href="#">Inicio</a>
        <a class="fcc-btn" href="#">Cursos</a>
        <a class="fcc-btn" href="#">Cadastros</a>
        <a class="fcc-btn" href="#">Relatorios</a>
       
    </div>
</div>

</div>
        </div>
    </div>
    </div>

    

    <div class="container-0">
        <div class="area-formulario">
            <div class="formulario">
                <form action="editar.php" method="post">
                    <div class="col-0-vdc" >
                    Dados Pessoais:
                 </div>

                    <div class="mb-3">
                        <input type="text" class="col-01" placeholder="Nome completo*" name="nome_completo" value="<?php echo $linha_aluno['nome_completo'];  ?>" required>
                        <input type="text" class="col-01" placeholder="Nome Social" name="nome_social" value="<?php echo $linha_aluno['nome_social'];  ?>">
                        <input type="text" class="col-01" placeholder="Nome Mãe" name="nome_mae" value="<?php echo $linha_aluno['nome_mae'];  ?>">
                        <input type="text" class="col-01" placeholder="Nome Pai" name="nome_pai" value="<?php echo $linha_aluno['nome_pai'];  ?>">
                    </div>
                    <div class="row">
                        
                        <div class="col"> 
                         <input type="text" name="telefone1" id="telefoneInput" placeholder="Contato 1*" maxlength="11" oninput="mascaraTel(this)" value="<?php echo $linha_aluno['telefone1'];  ?>" required>
                    </div>

                    <div class="col">
                    <input type="text" name="telefone2" id="telefoneInput2" placeholder="Contato 2" maxlength="11" oninput="mascaraTel2(this)" value="<?php echo $linha_aluno['telefone2'];  ?>" >
                    </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                        <input type="text"  placeholder="CPF: 000.000.000-00*" maxlength="11" id="cpf"
                        oninput="mascaraCpf('cpf')"  name= "cpf" value="<?php echo $linha_aluno['cpf'];  ?>" required >
                    </div>

                    <div class="col">
                        <input type="text"  placeholder="CEP: 0000-00" maxlength="8" name="cep" id="cep"
                         onblur="buscaCep(this.value)" value="<?php echo $linha_aluno['cep'];  ?>" >
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Endereço" aria-label="Endereço" name="endereco" id="rua" value="<?php echo $linha_aluno['endereco'];  ?>" required>
                        </div>
                        <div class="col">
                        <input type="text" placeholder="Bairro" aria-label="Bairro" name="bairro" id="bairro" value="<?php echo $linha_aluno['bairro'];  ?>">
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Município" aria-label="Município" name="municipio" id="localidade" value="<?php echo $linha_aluno['municipio'];  ?>">
                        </div>
                    <div class="col">
                    <input type="text" placeholder="Estado" aria-label="Estado" name="estado" id="uf" value="<?php echo $linha_aluno['estado'];  ?>">
                        </div>
                    </div>

                    <!-- SELECTS COMENTADOS NAO SEI SETAR KKK -->
                    
                    <!-- <div class="row">
                        <div class="DataNasc">
                        <input type="date" name="data_nasc" id="">
                    </div>
                    <div class="col-gen">
                        <select name="genero" id="Gen">
              
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                          <option value="Outro">Outros</option>
                          <option value="4" disabled selected>Gênero</option>
                        </select>
                      </div>
                      <div class="col-cur">
                        <select name="curso" id="Cur" required >
              
                          <option value="Enfermagem">Enfermagem</option>
                          <option value="Informatica">Informática</option>
                          <option value="Comercio">Comércio</option>
                          <option value="Administracao" >Administração</option>
                          <option value="5" disabled selected>Curso</option>
                        </select>
                      </div>
                    </div>
                 <div class="row">
                   <div class="col">
                    <select name="deficiencia" id="Def">
                        <option value="BaixaVisao">Baixa visão</option>
                        <option value="Cegueira">Cegueira</option>
                        <option value="DeficienciaAuditiva">Deficiêcia auditiva</option>
                        <option value="DeficienciaFisica" >Deficiêcia física</option>
                        <option value="DeficienciaIntelectual" >Deficiêcia intelectual</option>
                        <option value="Surdez" >Surdez</option>
                        <option value="Surdocegueira" >Surdocegueira</option>
                        <option value="DeficienciaMultipla" >Deficiêcia múltipla</option>
                        <option value="TranstornoDoEspectroAutista" >Transtorno de espectro autista</option>
                        <option value="Nenhuma  " >Nenhuma</option>
                        <option value="5" disabled selected>Deficiências</option>
                    </select>
                   </div> 
                   <div class="col">
                    <select name="concorrencia" id="Concorrencia">
              
                        <option value="EscolaPublica">Escola pública</option>
                        <option value="EscolaPrivada">Escola privada</option>
                        <option value="4" disabled selected>Concorrência</option>
                      </select>
                   </div>
                  </div> -->
               

                   
          
            </div>
        </div>


     
        <div class="container-1">
        
        <table>
            
            <div>
            <thead>
                
                <tr>
                    <th>Materia</th>
                    <th>6°Ano</th>
                    <th>7°Ano</th>
                    <th>8°Ano</th>
                    <th>9°Ano</th>
                </tr>
            </thead>
            <tbody>
         <tr>
                    <td>Matemática</td>

                    <!-- repita esta porra aq <3 -->
                    <td><input value="<?php echo $linha_aluno['matematica6'];  ?>" name="matematica6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?"  id="myInput" min="0" max="10" oninput="validateInput()" required> </td>
                    <td><input value="<?php echo $linha_aluno['matematica7'];  ?>" name="matematica7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['matematica8'];  ?>" name="matematica8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['matematica9'];  ?>" name="matematica9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                </tr>

          


                <tr>
                    <td>Português</td>
                    <td><input value="<?php echo $linha_aluno['portugues6'];  ?>" name="portugues6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['portugues7'];  ?>" name="portugues7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['portugues8'];  ?>" name="portugues8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['portugues9'];  ?>" name="portugues9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
                  <tr>
                    <td>Ciências</td>
                    <td><input value="<?php echo $linha_aluno['ciencias6'];  ?>" name="ciencias6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()"  required/></td>
                    <td><input value="<?php echo $linha_aluno['ciencias7'];  ?>" name="ciencias7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['ciencias8'];  ?>" name="ciencias8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['ciencias9'];  ?>" name="ciencias9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
               
               
                
                <tr>
                    <td>História</td>
                    <td><input value="<?php echo $linha_aluno['historia6'];  ?>" name="historia6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()"  required/></td>
                    <td><input value="<?php echo $linha_aluno['historia7'];  ?>" name="historia7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['historia8'];  ?>" name="historia8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['historia9'];  ?>" name="historia9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
                <tr>
                    <td>Geografia</td>
                    <td><input value="<?php echo $linha_aluno['geografia6'];  ?>" name="geografia6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['geografia7'];  ?>" name="geografia7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['geografia8'];  ?>" name="geografia8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['geografia9'];  ?>" name="geografia9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
                <tr>
                    <td>Inglês</td>
                    <td><input value="<?php echo $linha_aluno['ingles6'];  ?>" name="ingles6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['ingles7'];  ?>" name="ingles7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['ingles8'];  ?>" name="ingles8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['ingles9'];  ?>" name="ingles9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
                <tr>
                    <td>Artes</td>
                    <td><input value="<?php echo $linha_aluno['artes6'];  ?>" name="artes6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['artes7'];  ?>" name="artes7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()"  required/></td> 
                    <td><input value="<?php echo $linha_aluno['artes8'];  ?>" name="artes8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['artes9'];  ?>" name="artes9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
               
                </tr>
                <tr>
                    <td>Ed.fisica</td>
                    <td><input value="<?php echo $linha_aluno['edfisica6'];  ?>" name="edfisica6"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['edfisica7'];  ?>" name="edfisica7"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td> 
                    <td><input value="<?php echo $linha_aluno['edfisica8'];  ?>" name="edfisica8"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                    <td><input value="<?php echo $linha_aluno['edfisica9'];  ?>" name="edfisica9"oninput=" if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number" maxlength = "5" pattern="[0-9] + ([,\.][0-9]+)?" id="myInput" min="0" max="10" oninput="validateInput()" required/></td>
                </tr>
            </tbody>

        </div>
        </table>

        <input type="hidden" name=id value="<?php echo $linha_aluno['id'];  ?>">

        <div class="btn-container">
        <button type="submit" class="enviar" >Editar</button>
        </div>
    </div>
    </div>

    </form>


    <!-- <script> console.log("") </script> -->
    
    
 
    
        <footer><img src="./ondas-governo-rodape.png" alt=""></footer>
        
</body>
</html>
