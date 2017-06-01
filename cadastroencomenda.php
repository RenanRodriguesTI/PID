<?php
     require "encomendaRepository.class.php";
    require "clienteRepository.class.php";
      
      
     
      $codencom = $peso = $vr_total_nf = $data = $vet = "";

      $cepdest =  $ceporig= $vr_frete = $codcli ="";

      $observ ="";


?>
<?php
if(isset($_POST["localizarcli"]))
{
    //classe cliente e repositorio do cliente
      $cliente =  $clienteR =null;
      $encomenda = $encomendaR = null;
    $codcli = $_POST["codcli"];
   
   $cliente = new cliente();
   $cliente->setCodcliente($codcli);
   $clienteR = new clienteRepository();
    //localiza o código do cliente
    $codcli =$cliente->getCodcliente();
    
    

}
   
   if(isset($_POST["btnsalvar"]))
{
    $codcli = $_POST["codcli"];
     $cliente = new cliente();
   $cliente->setCodcliente($codcli);
    
    $observ =  $_POST["observacao"];
    $data = $_POST["datadeemissao"];
     $vr_frete = $_POST["valorfrete"];
    
     $peso = $_POST["peso"];

     //$codencom="",$peso="",$data="",$valorfrete="",$cliente=null,$unidadeorigem=null,$unidadedestino=null
     $encomenda = new encomenda($codencom,$peso,$data,$observ,$vr_frete,$cliente,($unidadeorigem=0),($unidadedestino=0));
     $encomendaR =new encomendaRepository();
     $encomendaR->gravar($encomenda);

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Aliado Express</title>

 

</head>
<body>
 
		
	    <form id="formulariocotacao" action="cadastroencomenda.php" method="post"> 
      
        <label>Cliente</label><br>
        <input type="text" name="codcli"value="<?=$codcli?>"/>&nbsp;&nbsp;<input type="submit" name="localizarcli" value="Localizar"/><br>
        
           <!--
		<label>CEP de origem</label><br>
		<input type="text" name="cep"/><br>
        <label style="width: 50px;"> Cidade de Origem <span style="color:red"></span></label> <br/>
		<input type="text" name="cidadeorigem" value=""/> chama funcão carrega_cidades -->
           <!-- <br/>
		<label>CEP de destino</label><br>
        <input type="text" name="cepdestino" /><br>
        <label style="width: 50px;"> Cidade de Destino <span style="color:red"></span></label><br/>
        <input type="text" name="cidadedestino" /> 
		    <br>-->
	       
            
        <label style="width: 50px;">Peso em KG<span style="color:red"></span></label>
        <br/>
        <input style="width: 150px;" type="text"  id="txtpeso" name="peso" />
        <br/>
        <label>Observação da encomenda</label><br>
        <textarea name="observacao" cols=40 rows=5 placeholder="Observação" maxlength="250" value="<?=$observ?>"></textarea><br>

        <label>Data de entrada</label><br>

        <input type="date" name="datadeemissao" /><br>

        <label>VALOR DO FRETE </label> <br>
        <input type="text" name="valorfrete" /><br> 
        

		
	    <input  type="submit" id="btnsalvar" name="btnsalvar" value="SALVAR"/> 
		</form>
		
        
         		
		</form>
		 
   
        
       