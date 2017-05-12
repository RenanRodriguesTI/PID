<?php
require "funcoes.php";
    $cidade = $estado = "";
    $id=0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Cadastro de cidade</title>
<meta charset="utf-8" />
</head>
<body>
<form action="cadastrodecidade.php" method="post">
<label>Código</label><br>
<input type="text" name="cod" /><br>
<label>Estado</label><br>
<input type="text" name="estado" /><br>
<label>Cidade</label><br>
<input type="text" name="cidade" /><br><br>
<input type="submit" name="btn_enviar" value="Cadastrar" />
<input type="submit" name="alterar" value="Alterar" />
<input type="submit" name="excluir" value="Excluir" />
<?php
    if(isset($_POST["btn_enviar"]))
    {
        $id = $_POST["cod"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
      cadastracidadeeestado($cidade,$estado,$id);
    }
    if(isset($_POST["alterar"]))
    {
        $id = $_POST["cod"];
           $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        alterarcidade($id,$cidade,$estado);
    }
    if(isset($_POST["excluir"]))
    {
        $id = $_POST["cod"];
        excluircidade($id);
    }
?>
</form>

</body>
</html>