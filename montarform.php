<?php

function montarform($opcao)
{
    if($opcao == "inserir")
    {
        $inp="";
    }
    else
    {
        if($opcao =="alterar")
        {
            $input ="<label>Código</label><br><input type='text' name='id'/><br>";
        }
        else{
            if($opcao == "excluir")
            {
                 $input ="<label>Código</label><br><input type='text' name='id'/><br>";
            }
        }
    }
}

?>