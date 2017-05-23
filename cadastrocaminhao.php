<?php
require "caminhao.class.php";
require "caminhaoRepository.class.php";
//inicia as variaveis com vazio
$idcaminhao= $codplaca = $anofab = $combustivel="";
//objeto da classe caminhao.class.php
$classcaminhao = null;
//objeto da classe caminhaoRepository
$caminhaor =null;
//Verifica se o POST do botão btn_cadastrar existe
if(isset($_POST["btn_cadastrar"]))
{
    //Código da placa do caminhão
    $codplaca = $_POST["placa"];
    //Ano de fabricação
    $anofab = $_POST["ano_fab"];
    //Tipo do combustivel
    $combustivel = $_POST["combustivel"];
    $classcaminhao = new caminhao($idcaminhao,$codplaca,$anofab,$combustivel);
    $caminhaor = new caminhaoRepository;
    $caminhaor->gravar($classcaminhao);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de unidades</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastrocaminhao.php" method="post">
<h3>Cadastro de caminhão</h3>
<label>Código da Placa</label><br>
<input type="text" name="placa"/><br>
<!--<label>Marca </label><br>
<input type="text" name="marca"/></br>
--><label>Combustível</label><br>
<select name="combustivel">
<option value="0"></option>
<option>Diesel</option>
<option>Gasolina</option>
<option>Alcool</option>

</select><br>
<label>Ano de fabricação</label><br>
<input type="date" name="ano_fab"/><br>

<input type="submit" name="btn_cadastrar" value="Cadastrar"/>
<input type="submit" name="alterar" value="Alterar"/>
<input type="submit" name="excluir" value="Excluir"/> 
<input type="submit" name="btn_cancelar" value="Cancelar"/>
</form>
</body>
</html>