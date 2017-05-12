<?php

//inicia as variaveis com vazio
$rg= $cpf = $dtacontrato = $dtademissao="";
//objeto da classe motorista.class.php
$classmotorista = null;
//objeto da classe motoristaRepository
$motoristar =null;
//Verifica se o POST do botão btn_cadastrar existe


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de unidades</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastrocaminhao.php" method="post">
<h3>Cadastro de Motorista</h3>
<label>Nome do Funcionário</label><br>
<input type="text" name="nomefun"/><br>
<!--<label>Marca </label><br>
<input type="text" name="marca"/></br>
--><label>RG</label><br>
    <input type="text" name="rg_fun" /><br>
<label>CPF</label><br>
<input type="text" name="cpf_fun"/><br>
<label>Data de contrato</label><br>
<input type="text" name="dtaemissao" /><br>

<input type="submit" name="btn_cadastrar" value="Cadastrar"/>
<input type="submit" name="alterar" value="Alterar"/>
<input type="submit" name="excluir" value="Excluir"/> 
<input type="submit" name="btn_cancelar" value="Cancelar"/>
</form>
</body>
</html>