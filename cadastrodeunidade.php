<?php
require "funcoes.php";
$nomeunidade = "";
$codcidade = $codunidade =0;

if(isset($_POST["btn_cadastrar"]))
{
    $nomeunidade = $_POST["nomeunidade"];
    $codcidade = $_POST["codcidade"];
    cadastrarunidades($codcidade,$nomeunidade);
}
if(isset($_POST["alterar"]))
{
    $codunidade = $_POST["coduni"];
    $nomeunidade = $_POST["nomeunidade"];
    $codcidade = $_POST["codcidade"];
    alterarunidades($codunidade,$codcidade,$nomeunidade);
} 
if(isset($_POST["excluir"]))
{
    $codunidade = $_POST["coduni"];
    excluirunidades($codunidade);
}
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
<input type="text" name="coduni"/><br>
<label>Nome da unidade</label><br>
<input type="text" name="nomeunidade"/></br>
<label>cidade da unidade</label><br>
<select name="codcidade">
<option value="0"></option>
<?=carregacidade()?>

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