<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de romaneio</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastroromaneio.php" method="post">
<h3>Cadastro de romaneio</h3>
<label>Código da encomenda</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Observação</label><br>

<input type="text" name="codencom" value=""/>&nbsp;<input type="text" name="obsencom"/><br>

<label>Codigo cidade origem</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Cidade de Origem</label><br>

<input type="text" name="codcidorigem" value=""/>&nbsp;<input type="text" name="nomecidorigem"/><br>

<label>Codigo cidade destino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Cidade de Destino</label><br>
<input type="text" name="codciddest" value=""/>&nbsp;<input type="text" name="nomeciddest"/><br>

<label>Codigodo Motorista</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Nome do funcionário</label><br>

<input type="text" name="codfun" value=""/>&nbsp;<input type="text" name="nomefun"/><br>

<label>Codigo do Caminhão<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Placa do caminhão</label><br>
<input type="text" name="codcaminhao" value=""/>&nbsp;<input type="text" name="placadocaminhao"/><br>
<label>Data de cadastro</label><br>

<input type="date" name="data"/><br>

<input type="submit" name="btn_cadastrar" value="Cadastrar"/>
<input type="submit" name="alterar" value="Alterar"/>
<input type="submit" name="excluir" value="Excluir"/> 
<input type="submit" name="btn_cancelar" value="Cancelar"/>
</form>
</body>
</html>