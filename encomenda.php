<?php
      require "funcoes.php";
     
      $cod = $peso = $vr_total_nf = $data = $vet = "";

      $qtdeVolumes = $vr_frete = "";

?>
<?php
   
   if(isset($_POST["btnsalvar"]))
{
     /*$origem = $_POST["origem1"];
     $destino = $_POST["destino"];   */  
     $peso = $_POST["txtpeso"];
   //  $vr_total_nf = $_POST["txtvalornf"];
     $data = $vet = $_POST["txtdata"];
     $qtdeVolumes = $_POST["txtvolumes"];
     $vr_frete = $_POST["txtfrete"];
     $remetente = $_POST["cidadeorigem"];
     $destinatario = $_POST["cidadedestino"];
     
     //função pesquisa cliente($remetente, $destinario)
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Aliado Express</title>

 

</head>
<body>
 
		
	    <form id="formulariocotacao" action="Encomenda.php" method="post"> 
      

        
           
		<label>CEP de origem</label><br>
		<input type="text" name="cep"/><br>
        <label style="width: 50px;"> Cidade de Origem <span style="color:red"></span></label> <br/>
		<select name="cidadeorigem"> <option value="origem1" > Selecione uma cidade:  </option> </select> <!--chama funcão carrega_cidades -->
            <br/>
		<label>CEP de destino</label><br>
        <input type="text" name="cepdestino" /><br>
        <label style="width: 50px;"> Cidade de Destino <span style="color:red"></span></label><br/>
        <select name="cidadedestino"> <option value="destino" > Selecione uma cidade:  </option> </select> <!--chama funcão carrega_cidades -->
		    <br>
	       
            
        <label style="width: 50px;">Peso em KG<span style="color:red"></span></label>
        <br/>
        <input style="width: 150px;" type="text"  id="txtpeso" name="txtpeso" />
        <br/>
        <label>Observação da encomenda</label><br>
        <textarea name="observacao" cols=40 rows=5 placeholder="teste"></textarea><br>

        <label>Data de entrada</label><br>
        <input type="date" name="txtdata" /><br>

        <label>VALOR DO FRETE </label> <br>
        <input type="text" name="txtfrete" /><br> 
        

		
	    <input style=" background-color: rgb(165,0,33); color: white; border-radius: 5px; border: 1px; width: 80px;" type="submit" id="btnsalvar" name="btnsalvar" value="SALVAR"/> 
		</form>
		
        
         		
		</form>
		 
   
        
       