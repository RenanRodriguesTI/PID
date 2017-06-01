<?php
require "funcoes.php";
require_once "unidadeRepository.class.php";
$nomeunidade = "";
$codcidade = $codunidade =0;


if(isset($_POST["btn_cadastrar"]))
{
    $nomeunidade = $_POST["nomeunidade"];
    $codcidade = $_POST["codcidade"];

    $cidade =new cidade();
    $cidade->setCodcidade($codcidade);
    $unidade = new unidade($codunidade,$cidade,$nomeunidade);
    $unidadeR = new unidadeRepository();
    $unidadeR->gravar($unidade);
   
}
if(isset($_POST["alterar"]))
{
    $codunidade = $_POST["coduni"];
    $nomeunidade = $_POST["nomeunidade"];
    $codcidade = $_POST["codcidade"];
   $cidade =new cidade();
    $cidade->setCodcidade($codcidade);
    $unidade = new unidade($codunidade,$cidade,$nomeunidade);
    $unidadeR = new unidadeRepository();
    $unidadeR->alterar($unidade);
} 
if(isset($_POST["excluir"]))
{
    
    $codunidade = $_POST["coduni"];
    $nomeunidade = $_POST["nomeunidade"];
    $codcidade = $_POST["codcidade"];
   $cidade =new cidade();
    $cidade->setCodcidade($codcidade);
    $unidade = new unidade($codunidade,$cidade,$nomeunidade);
    $unidadeR = new unidadeRepository();
    $unidadeR->excluir($unidade);
}

echo date('d/m/y');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de unidades</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastrodeunidade.php" method="post">
<h3>Cadastro de unidades</h3>
<label>Código</label><br>
<input type="text" name="coduni" value="<?=$codunidade?>"/><br>
<label>Nome da unidade</label><br>
<input type="text" name="nomeunidade" value="<?$nomeunidade?>"/></br>
<label>cidade da unidade</label><br>
<select name="codcidade">
<option value="0"></option>
<?=carregacidade($codcidade)?>

</select><br>
<input type="submit" name="btn_cadastrar" value="Cadastrar"/>
<input type="submit" name="alterar" value="Alterar"/>
<input type="submit" name="excluir" value="Excluir"/> 
<input type="submit" name="btn_cancelar" value="Cancelar"/>
</form>
</body>
</html>

<?php

?>