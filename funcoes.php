

<?php
//
function busca_cep($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
} 

function getConnection()
{
    $pdo = new PDO("mysql:host=127.0.0.1;port=3311;dbname=aliado_Express","root","root");
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function cadastrodecliente($cep,$bairro,$cidade,$rua,$email,$login,$senha,$nome,$identcli)
{
 
    try{
        //cria objeto de conexão com o banco
        $pdo = getConnection();
        //prepara um comando  de inserção no banco de dados
        $comando = $pdo-> prepare ("insert into cliente(NOME_CLIENTE,EMAIL_CLIENTE,ENDERECO_CLIENTE,BAIRRO_CLIENTE,CEP_CLIENTE,LOGIN_CLIENTE,SENHA_CLIENTE,IDENTIFICACAO_CLIENTE,COD_CIDADE) values(:NOME_CLIENTE,:EMAIL_CLIENTE,:ENDERECO_CLIENTE,:BAIRRO_CLIENTE,:CEP_CLIENTE,:LOGIN_CLIENTE,:SENHA_CLIENTE,:IDENTIFICACAO_CLIENTE,:COD_CIDADE)");
        //cria um vetor da posição Nome_cliente recebendo o array
        $parametro[":NOME_CLIENTE"]= $nome;
        $parametro[":EMAIL_CLIENTE"]= $email;
        $parametro[":ENDERECO_CLIENTE"]= $rua;
        $parametro[":BAIRRO_CLIENTE"]= $bairro;
        $parametro[":IDENTIFICACAO_CLIENTE"] = $identcli;
        $parametro[":COD_CIDADE"] = $cidade;
        $parametro[":CEP_CLIENTE"]= $cep;
        $parametro[":LOGIN_CLIENTE"]= $login;
        $parametro[":SENHA_CLIENTE"]=$senha;
        //executa o comando de inserção no banco passando como parametro o array $parametro
        $comando ->execute($parametro);
        $pdo = null;

    }
    catch(Exception $e)
    {
        echo $e;
    }


}

function alterardadosdocliente ($cep,$bairro,$cidade,$rua,$email,$login,$senha,$nome,$identcli)

{
    //Esta função deverá alterar os dados dos clientes cadastrados
    try{
        $pdo = getConnection();
        $comando = $pdo->prepare("update cliente set nome_cliente =:nome, email_cliente =:email,endereco_cliente=:endereco,bairro_cliente=:bairro,cep_cliente = :cep,login_cliente = :login,senha_cliente = :senha, cod_cidade = :cidade, identificacao_cliente = :cliente where cod_cliente = :codcli");
        $parametro[":codcli"]=$identcli;
         $parametro[":cliente"]=$identcli;
        $parametro[":nome"] = $nome;
        $parametro[":email"] = $email;
        $parametro[":cidade"] = $cidade;
        $parametro[":endereco"] = $rua;
        $parametro[":bairro"] = $bairro;
        $parametro[":cep"] = $cep;
        $parametro[":login"] = $login;
        $parametro[":senha"] = $senha;
        $comando ->execute($parametro); 
        $pdo=null;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
     
}

function excluircliente()
{
    //Exclui os clientes cadastrados
}

function cadastracidadeeestado($cidade,$estado,$id)
{
    try{
            $pdo = getConnection();
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
            $pdo=null;
    }
    catch(Exception $e)
    {
        echo $e ->getMessage();
    }
}
function carregacliente($codigocli,&$nome,&$email,&$endereco,&$bairro,&$cep,&$senha,&$identificacao)
{
    //Esta função deverá realizar uma pesquisa dos clientes cadastrados 
    try{
        $pdo = getConnection();
        $comando = $pdo->prepare("select * from cliente where cod_cliente = :codigo");
        $parametro[":codigo"] = $codigocli;
        $comando ->execute($parametro);
        $linha  = $comando ->fetch(PDO::FETCH_ASSOC);
     $nome =  $linha["NOME_CLIENTE"];
     $email = $linha["EMAIL_CLIENTE"];
     $endereco = $linha["ENDERECO_CLIENTE"];
     $bairro = $linha["BAIRRO_CLIENTE"];
     $cep = $linha["CEP_CLIENTE"];
     $senha = $linha["SENHA_CLIENTE"];
     $identificacao = $linha["IDENTIFICACAO_CLIENTE"];
    $pdo=null;
    }
    catch(Exception $e )
    {}
 

}

function carregacidade()
{
     $valordoselect="";

    try{
        $pdo= getConnection();
        $comando =$pdo-> prepare("select * from cidade");
        $comando ->execute();
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        while($linha)
        {
            $valordoselect .= "<option value='{$linha['COD_CIDADE']}'>{$linha['NOME_CIDADE']}</option>";
            $linha = $comando->fetch(PDO::FETCH_ASSOC);
        }
        $pdo=null;

    }
    catch(Exception $e)
    {
        echo $e;
    }
    return $valordoselect;
}

function alterarcidade($idcidade,$cidade,$estado)
{
    //Esta função deverá alterar as cidades cadastradas no banco
    $pdo = getConnection();
    $comando = $pdo-> prepare("update  cidade set nome_cidade = :cidade, uf_cidade = :uf where cod_cidade = :codcid");
    $parametro[":codcid"] =$idcidade;
    $parametro[":cidade"] = $cidade;
    $parametro[":uf"] = $estado; 
    $comando -> execute($parametro);
    $pdo=null;
}

function excluircidade($idcidade)
{
    // Esta função deverá excluir as cidades cadastradas no banco
    $pdo = getConnection();
    $comando = $pdo -> prepare("delete from cidade where cod_cidade = :codcidade");
    $parametro[":codcidade"] = $idcidade;
    $comando ->execute($parametro);
    $pdo = null;
}
function localizacidade($cidade)
{
    try{
        $pdo = getConnection();
        $comando = $pdo->prepare("select COD_CIDADE,NOME_CIDADE from cidade where NOME_CIDADE = :NOME_CIDADE");
        $parametro[":NOME_CIDADE"]=$cidade;
        $comando->execute($parametro);
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        if($linha == TRUE)
        {
           return $linha["COD_CIDADE"];
        }


    }
    catch(Exception $e)
    {
        ECHO $e;
    }
}


function cadastroencomenda($origem, $destino, $peso, $vr_total_nf, $data, $qtdeVolumes, $vr_frete)
{ 
 
 try{
            $pdo = getConnection();
            $comando = $pdo -> prepare("insert into ENCOMENDA (PESO_ENCOM, DATA_ENCOM, VALOR_FRETE_ENCOM, ORIGEM_UNIDADE, DESTINO_UNIDADE, COD_ENTREGA, COD_ROMANEIO, COD_CLIENTE, MATRICULA_FUN, 
                                                                COD_UNIDADE, COD_CAMINHAO) values(:peso,:data,:vr_frete,:origem, :destino");
            
            $parametro[":origem"] = $origem;
            $parametro[":destino"] = $destino;
            $parametro[":peso"] = $peso;
            $parametro[":vr_total_nf"] = $vr_total_nf;
            $parametro[":data"] = $data;
            $parametro[":qtdeVolumes"] = $qtdeVolumes;
            $parametro[":vr_frete"] = $vr_frete;

                
            $comando ->execute($parametro);
            $pdo=null;
    }
    catch(Exception $e)
    {
        echo $e ->getMessage();
    }
}

function alterarencomenda()
{
    //Altera os dados  da encomenda cadastrada no sistema.
    $pdo = getConnection();
    $comando = $pdo->prepare(" ");
}
function excluirencomenda()
{
    //exclui as encomendas cadastradas

}

function cadastrarunidades($cidade,$nomeunidade)
{
    try{
                $pdo = getConnection();
    $comando = $pdo -> prepare ("insert into unidades (COD_CIDADE,NOME_UNIDADE) VALUES(:CIDADE,:UNIDADE)");
    $parametro[":CIDADE"] = $cidade;
    $parametro[":UNIDADE"] = $nomeunidade;
    $comando -> execute($parametro);
    $pdo=null;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
function alterarunidades($unidade,$codcidade,$nomeunidade)
{
    //altera as informações sobre as unidades cadastrada
   try{
        $pdo = getConnection();
    $comando= $pdo->prepare("update unidades set nome_unidade =:unidade,cod_cidade=:cidade where cod_unidade = :coduni");
    $parametro[":coduni"] = $unidade;
    $parametro[":cidade"]=$codcidade;
    $parametro[":unidade"] = $nomeunidade;
    $comando->execute($parametro);
    $pdo=null;
   }
   catch(Exception $e)
   {

   }

}
function excluirunidades($codunidade)
{
   
    //excluir unidade cadastradas do sistemas
    try{
        $pdo=getConnection();
        $comando = $pdo->prepare("delete from unidades where cod_unidade = :coduni");
        $parametro[":coduni"] = $codunidade;
        $comando->execute($parametro);
        $pdo=null;

    }
    catch(Exception $e)
    {

    }
}
?>
    