

<?php

require_once "banco.php";

//
function busca_cep($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
} 

function selecionaselect()
{

}



function cadastracidadeeestado($cidade,$estado,$id)
{
    try{
            $pdo = Conectar();
            if($id ==0)
            {
                $comando = $pdo -> prepare("insert into CIDADE (NOME_CIDADE, UF_CIDADE) values(:NOME_CIDADE,:UF_CIDADE) ");
                
            
            }
            else
            {
                $comando = $pdo-> prepare("update cidade set nome_cidade = :NOME_CIDADE, uf_cidade = :UF_CIDADE where cod_cidade = :codcid");
                $parametro[":codcid"] = $id;
            }
            $parametro[":NOME_CIDADE"] = $cidade;
            $parametro[":UF_CIDADE"] =  $estado;
            $comando ->execute($parametro);
            Desconectar($pdo);
    }
    catch(Exception $e)
    {
        echo $e ->getMessage();
    }
}


function carregacidade($opvalue)
{
     $valordoselect="";
     $select ="";

    try{
        $pdo= Conectar();
        $comando =$pdo-> prepare("select * from cidade");
        $comando ->execute();
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        while($linha)
        {
            if($opvalue == $linha['COD_CIDADE'])
            {
                $select = "selected";
            }
            else
            {
                $select="";
            }
            $valordoselect .= "<option value='{$linha['COD_CIDADE']}' $select>{$linha['NOME_CIDADE']}</option>";
            $linha = $comando->fetch(PDO::FETCH_ASSOC);
        }
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        echo $e;
    }
    return $valordoselect;
}
if(isset($_POST["clioption"]))
{
    $CPF_CNPJ = "";
    
    $clioption="";
    $clioption= $_POST["clioption"];
    if($clioption =="J")
    {
        $checked2 = "checked";
        $checked = "";
        $CPF_CNPJ = "CNPJ";
        $RG_RAZ ="Razao Social";
        $nomefantasiainput = "<label>Nome Fantasia</label><br><input type='text' name='nomefantasia' /><br>";
    }
    else
    {
        $checked = "checked";
        $checked2 = "";
        $CPF_CNPJ = "CPF";
        $RG_RAZ ="RG";
        $nomefantasiainput="";
    }
    
}







?>
    