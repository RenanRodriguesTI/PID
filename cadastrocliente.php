<?php
require "clienteRepository.class.php";
require_once "cliente.class.php";
require "funcoes.php";
      $cep = $bairro = $cidade = $rua = $vet = "";

      $email = $login = $senha = $confirmasenha = $option = "";

      $nome = $identcli= $codigodacidade = $codcliente = $nomefantasiainput= "";
  
                if(isset($_POST["cep"])/*||isset($_POST["cidade"])*/)
{
     $nome= $_POST["txtnome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
 
    $rua = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
     $codigodacidade = localizacidade($cidade);
    $cep = $_POST["cep"];
    $vet = busca_cep($cep);
    $cidade = mb_convert_encoding($vet["cidade"],"utf-8","ISO-8859-1");
    $bairro = mb_convert_encoding($vet["bairro"],"utf-8","ISO-8859-1");
    $rua = mb_convert_encoding($vet["logradouro"],"utf-8","ISO-8859-1");

}
if(isset($_POST["clioption"]))
{
    $opcli = $_POST["clioption"];
     if($opcli == "J")
     {
            $nomefantasiainput ="<label >Nome Fantasia</label><br>
        <input  type='text' name = 'fantasia' /><br>";
     }
}
if(isset($_POST["btnCadastrar"])&& $codigodacidade)
{
    $nome= $_POST["txtnome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
  
    $rua = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
   
    $cep = $_POST["cep"];
    cadastrodecliente($cep,$bairro,$codigodacidade,$rua,$email,$login,$senha,$nome,$identcli);
}
if(isset($_POST["btnAlterar"]))
{
    $identcli = $_POST["txtcodcli"];
    $nome= $_POST["txtnome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $identcli = $_POST["txtcodcli"];
    $rua = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
   
    $cep = $_POST["cep"];
    alterardadosdocliente($cep,$bairro,$codigodacidade,$rua,$email,$login,$senha,$nome,$identcli);
}
/*if(isset($_POST["txtcodcli"]))
{
    $codcliente = $_POST["txtcodcli"];
    carregacliente($codcliente,$nome,$email,$rua,$bairro,$cep,$senha,$identcli);
    
}*/

if(isset($_POST["localizar"]))
{
    $codcliente = $_POST["txtcodcli"];
    $objcliente = new cliente();
   
    $objdbcliente = new clienteRepository();
    
     $confirmasenha=   $objdbcliente ->localizarcodigo($codcliente);
     $identcli = $confirmasenha["COD_CLIENTE"];
     $codigodacidade = $confirmasenha["COD_CIDADE"];
     $nome = $confirmasenha["NOME_CLIENTE"];
     $email = $confirmasenha["EMAIL_CLIENTE"];
     $rua = $confirmasenha["ENDERECO_CLIENTE"];
     $bairro = $confirmasenha["BAIRRO_CLIENTE"];
     $cep = $confirmasenha["CEP_CLIENTE"];
     $login = $confirmasenha["LOGIN_CLIENTE"];
     $senha = $confirmasenha["SENHA_CLIENTE"];
     
     $objcliente =$objdbcliente =null;
}

if(isset($_POST["excluir"]))
{
    $identcli = $_POST["txtcodcli"];
   $objcliente = new cliente();
   
    $objdbcliente = new clienteRepository();
    $objdbcliente->excluir($identcli);
}
        ?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            
            document.getElementsByName("clioption")[0].onclick = function()
            {
                document.getElementById("razaosoc_rg").innerHTML = "RG";
                document.getElementById("cnpj_cpf").innerHTML = "CPF";
            };
            document.getElementsByName("clioption")[1].onclick = function()
            {
                document.getElementById("razaosoc_rg").innerHTML = "Razão Social";
                document.getElementById("cnpj_cpf").innerHTML = "CNPJ";
            };
        },false);
    
    </script>
  </head>
  <body>
    <form name="formulariocad" id="formulariocotacao" action="cadastrocliente.php" method="post"> 
        <fieldset>
        <legend>CADASTRO DO USUÁRIO</legend>
         <label style="width: 50px;">Código: (Consulta) <span style="color:red"></span></label><br/>
        <input style="width: 350px;" type="text" id="txtcodcli" name="txtcodcli" value="<?=$codcliente ?>"  />
        <input type="submit" name="localizar" value="Localizar"/>
            <br/>
        <label>Email</label><br>
        <input type="email" style="width:200px" name="email" value="<?=$email?>"/><br>
        <label>Login</label><br>
        <input type="text" name="login" value="<?=$login?>" /><br>
        <label>Senha</label><br>
        <input type="text" name="senha" value="<?=$senha?>"/><br>
        <label>Confirmar senha</label><br>
        <input type="text" name="confirmarsenha" />
        </fieldset>

        <fieldset>
        <legend>informações pessoais do cliente</legend>
        
        <span id="msg"></span>
        <label style="width: 50px;">Nome Completo:* <span style="color:red"></span></label><br/>
        <input style="width: 350px;" type="text" id="txtNome" name="txtnome" value="<?=$nome ?>"/>
            <br/>
        
        <label>Tipo do cliente</label><br>
        <input id="fisico"  type="radio" name="clioption" checked value="F" /><label>Físico</label>
        <input id="juridico" type="radio" name="clioption" value="J"  /><label>Jurídico</label><br>
       <?=$nomefantasiainput ?>
        <label id="razaosoc_rg">RG</label><br>
        <input type="text" name="razaosoc_rg" /><br>
        <label id="cnpj_cpf">CPF</label><br>
        <input type="text" name="cnpj_cpf" /><br>
        <label >Endereço</label><br>
        <input type="text" name="endereco" value="<?=$rua?>"/><br>
        <label>Bairro</label><br>
        <input type="text" name="bairro" value="<?=$bairro ?>" /><br>
        <label>Cidade</label><br>
        <input type="text" name="cidade" value="<?=$cidade?>"  /><br>    
        <label>CEP</label><br>
            <input type="text" name="cep" value="<?=$cep?>" onblur="formulariocad.submit()" /><br>
            <label>N°</label><br>
            <input type="number" name="numero" /><br>
        </fieldset>

         <input  type="submit" id="btnCadastrar" name="btnCadastrar" value="Cadastrar"/>
        <input  type="submit" id="btnAlterar" name="btnAlterar" value="Alterar"/>
        <input type="submit" name="excluir" value="Excluir"/>
         <input  type="submit" name="btnCancelar" value="Cancelar"/>
        <br/>
    </form>
 
  </body>
</html>