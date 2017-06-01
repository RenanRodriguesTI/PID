<?php
require "romaneio.class.php";
require "romaneioRepository.class.php";
require_once "caminhao.class.php";
require "motorista.class.php";
require "encomenda.class.php";
    $codromaneio = $codencomenda = $codcidadorigem = $codcidaddestino = $codmotorista =$codcaminhao=0;
    //Data de emissão
    $dta="";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de romaneio</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastroromaneio.php" method="post">
<h3>Cadastro de romaneio</h3>
<?php
    if(isset($_POST["btn_cadastrar"]))
    {
        //Obs: o codigo da encomenda 
        $codcidadorigem = $_POST["codcidorigem"];
        $codcidaddestino= $_POST["codciddest"];
        $codmotorista = $_POST["codfun"];
        $codcaminhao = $_POST["codcaminhao"];
        $dta = $_POST["data"];
        //objeto
        $caminhao =new caminhao();
        $caminhao->setIdcaminhao($codcaminhao);
        $motorista = new motorista();
        $motorista->setCodmotorista($codmotorista);

        //Criando  objeto da classe romaneio $codromaneio="",$dataemissao="", $motorista=null,$codcamihao=null,$codencomenda=null
        $romaneio = new romaneio($codromaneio,$dta,$motorista,$caminhao,$codencomenda);
        //Criando objeto da classe repository romaneio
        $romaneioR = new romaneioRepository();
        $romaneioR->gravar($romaneio);
    }
?>

<label>Codigo cidade origem</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Cidade de Origem</label><br>

<input type="text" name="codcidorigem" value=""/>&nbsp;<input type="text" name="nomecidorigem"/><br>

<label>Codigo cidade destino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Cidade de Destino</label><br>
<input type="text" name="codciddest" value=""/>&nbsp;<input type="text" name="nomeciddest"/><br>

<label>Codigodo Motorista</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nome do funcionário</label><br>

<input type="text" name="codfun" value=""/>&nbsp;<input type="text" name="nomefun"/><br>

<label>Codigo do Caminhão<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Placa do caminhão</label><br>
<input type="text" name="codcaminhao" value=""/>&nbsp;<input type="text" name="placadocaminhao"/><br>

<label>Lista de encomenda </label><br>
<label>Código da encomenda</label><button>+</button><br>
<input type="text" name="codencom" value="" />

<br>
<label>Data de cadastro</label><br>
<input type="date" name="data"/><br>

<input type="submit" name="btn_cadastrar" value="Cadastrar"/>
<input type="submit" name="alterar" value="Alterar"/>
<input type="submit" name="excluir" value="Excluir"/> 
<input type="submit" name="btn_cancelar" value="Cancelar"/>
</form>
</body>
</html>