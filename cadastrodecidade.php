<?php
require "cidade.class.php";
require "cidadeRepository.class.php";

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
        $objcidade = new cidade(0,$cidade,$estado);
        $gravar = new cidadeRepository($objcidade);
        $gravar->gravar($objcidade);
    }
    if(isset($_POST["alterar"]))
    {
        $id = $_POST["cod"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $objcidade = new cidade($id,$cidade,$estado);
        $alterar = new cidadeRepository($objcidade);
    }
    if(isset($_POST["excluir"]))
    {
        $id = $_POST["cod"];
        excluircidade($id);
        $objcidade = new cidade();
        $objcidade->setCidade($id);
        $excluir = new cidadeRepository;
        $excluir->excluir($id);
    }
?>
</form>

</body>
</html>