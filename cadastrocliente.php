<?php
require_once "clienteRepository.class.php";
require_once "cliente.class.php";
require_once "cidade.class.php";
require_once "cidadeRepository.class.php";


$nomefantasiainput="";
require "funcoes.php";
      $cep = $bairro = $cidade = $rua = $vet = $checked2 ="";

      $email = $login = $senha = $confirmasenha = $option = "";

      $nome = $identcli= $codigodacidade = $codcliente=$checked="";

      //valor do 
      $RG_RAZ="RG";
      $CPF_CNPJ="CPF";

  
                if(isset($_POST["cep"])/*||isset($_POST["cidade"])*/)
{
    $identcli = $_POST["txtcodcli"];
     $nome= $_POST["txtnome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
 
    $rua = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    // $codigodacidade = localizacidade($cidade);
    $cep = $_POST["cep"];
    $vet = busca_cep($cep);
    $cidade = mb_convert_encoding($vet["cidade"],"utf-8","ISO-8859-1");
    $bairro = mb_convert_encoding($vet["bairro"],"utf-8","ISO-8859-1");
    $rua = mb_convert_encoding($vet["logradouro"],"utf-8","ISO-8859-1");
    //LOcaliza cidade
    $classcidade = new cidade();
    $classcidade->setNomecidade($cidade);
    $localizar = new cidadeRepository();
    $codigodacidade = $localizar->localizarporcidade($classcidade->getNomecidade());
if(isset($_POST["clioption"]))
{
     $clioption= $_POST["clioption"];
     if($clioption =="J")
    {
        $checked2 = "checked";
        $checked = "";
        $CPF_CNPJ = "CNPJ";
        $RG_RAZ ="Razao Social";
        $nomefantasiainput = "<label>Nome Fantasia</label><br><input type='text' name='nomefantasia' /><br>";
    }
    else
    {
        $checked = "checked";
        $checked2 = "";
        $CPF_CNPJ = "CPF";
        $RG_RAZ ="RG";
        $nomefantasiainput="";
    }
}
     
    

}

if(isset($_POST["btnCadastrar"]))
{
    $nome= $_POST["txtnome"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
  
    $rua = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
   
    $cep = $_POST["cep"];
    $rgouraz=$_POST["razaosoc_rg"];
    $cpfoucnpj = $_POST["cnpj_cpf"];

    $codigodacidade = new cidade();
        $codigodacidad->setCodcidade($codigodacidade);
        //chamar o objeto fisico e juridico
    //objeto cliente
  
    $cliente = new cliente($identcli,$cidade,$nome,$email,$rua,$bairro,$cep,$login,$senha);
    //Repositorio cliente
    $Rcliente = new clienteRepository($cliente);
    $Rcliente->gravar($cliente);
   
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

    $classcidade = new cidade();
    $classcidade->setCodcidade($codigodacidade);
   
    $cep = $_POST["cep"];
     $cliente = new cliente($identcli,$classcidade,$nome,$email,$rua,$bairro,$cep,$login,$senha);
    //Repositorio cliente
    $Rcliente = new clienteRepository($cliente);
    $Rcliente->alterar($cliente);
    
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
                 document.getElementById("formulariocotacao").submit();
                document.getElementById("razaosoc_rg").innerHTML = "RG";
                document.getElementById("cnpj_cpf").innerHTML = "CPF";
            };
            document.getElementsByName("clioption")[1].onclick = function()
            {
                document.getElementById("formulariocotacao").submit();
                document.getElementById("razaosoc_rg").innerHTML = "Razão Social";
                document.getElementById("cnpj_cpf").innerHTML = "CNPJ";
            };
           
            document.getElementById("cidade").onchange = function()
            {
                if(document.getElementById("cidade").value="")
                {
                    alert("Foi dele !!!!!!!");
                }
            };
        },false);
    
    </script>
  </head>
  <body>
    <form name="formulariocad" id="formulariocotacao" action="cadastrocliente.php" method="post"> 
        <fieldset>
        <legend>CADASTRO DO USUÁRIO</legend>
         <label style="width: 50px;">Código: (Consulta) <span style="color:red"></span></label><br/>
        <input style="width: 350px;" type="text" id="txtcodcli" name="txtcodcli" value="<?=$identcli ?>"  />
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
   
        <input id="fisico"  type="radio" name="clioption" <?=$checked?> value="F" /><label>Físico</label>
        <input id="juridico" type="radio" name="clioption" <?=$checked2?> value="J"  /><label>Jurídico</label><br>
       <?=$nomefantasiainput ?>
        <label id="razaosoc_rg"><?=$RG_RAZ?></label><br>
        <input type="text" name="razaosoc_rg" /><br>
        <label id="cnpj_cpf"><?=$CPF_CNPJ?></label><br>
        <input type="text" name="cnpj_cpf" /><br>
        <label >Endereço</label><br>
        <input type="text" name="endereco" value="<?=$rua?>"/><br>
        <label>Bairro</label><br>
        <input type="text" name="bairro" value="<?=$bairro ?>" /><br>
        <label>Cidade</label><br>
        <input id="cidade" type="text" name="cidade"  value="<?=$cidade?>"  /><br>    
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