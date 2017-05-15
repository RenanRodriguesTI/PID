<?php
    //classe responsável por gerenciar a gravação dos dados do cliente
    class Gerenciarclientes {

        public function gravar($cliente)
{
 
    try{
        //cria objeto de conexão com o banco
        $pdo = Conectar();
        //prepara um comando  de inserção no banco de dados
        $comando = $pdo-> prepare ("insert into cliente(NOME_CLIENTE,EMAIL_CLIENTE,ENDERECO_CLIENTE,BAIRRO_CLIENTE,CEP_CLIENTE,LOGIN_CLIENTE,SENHA_CLIENTE,COD_CIDADE) values(:NOME_CLIENTE,:EMAIL_CLIENTE,:ENDERECO_CLIENTE,:BAIRRO_CLIENTE,:CEP_CLIENTE,:LOGIN_CLIENTE,:SENHA_CLIENTE,:COD_CIDADE)");
        //cria um vetor da posição Nome_cliente recebendo o array
        $parametro[":NOME_CLIENTE"]= $cliente->getNomecliente();
        $parametro[":EMAIL_CLIENTE"]= $cliente->getEmail();
        $parametro[":ENDERECO_CLIENTE"]= $cliente->getEndereco();
        $parametro[":BAIRRO_CLIENTE"]= $cliente->getBairro();
      
        $parametro[":COD_CIDADE"] = $cliente->getCodcidade();
        $parametro[":CEP_CLIENTE"]= $cliente->getCep();
        $parametro[":LOGIN_CLIENTE"]= $cliente->getLogin();
        $parametro[":SENHA_CLIENTE"]=$cliente->getsenha();
        //executa o comando de inserção no banco passando como parametro o array $parametro
        $comando ->execute($parametro);
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        echo $e;
        Desconectar($pdo);
    }


}

public function Alterar ($cliente)

{
    //Esta função deverá alterar os dados dos clientes cadastrados
    try{
        $pdo = getConnection();
        $comando = $pdo->prepare("update cliente set nome_cliente =:nome, email_cliente =:email,endereco_cliente=:endereco,bairro_cliente=:bairro,cep_cliente = :cep,login_cliente = :login,senha_cliente = :senha, cod_cidade = :cidade where cod_cliente = :codcli");
        $parametro[":codcli"]=$cliente->getCodcliente();
         
        $parametro[":nome"] = $cliente->getNomecliente();
        $parametro[":email"] = $cliente->getEmail();
        $parametro[":endereco"] = $cliente->getEndereco();
        $parametro[":bairro"] = $cliente->getBairro();
        $parametro[":cep"] = $cliente->getCep();
        $parametro[":login"] = $cliente->getLogin();
        $parametro[":senha"] = $cliente->getSenha();
        $comando ->execute($parametro); 
        $pdo=null;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
     
}

public function Excluir($cod)
{
    //Exclui os clientes cadastrados
    try{
        $pdo = Conectar();
        $comando->prepare("delete from cliente where cod_cliente = :codcliente");
        $comando->bindValue(":codcliente",$cod);
        $comando->execute();
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
//metodo para localizar o cliente pelo código
public function localizarcodigo($codigo)
{

    try{
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do código
        $comando = $pdo->prepare("select * from cliente where cod_cliente = :cod");
        //atribui um valor para o parâmetro :cod
        $comando->bindValue(":cod",$codigo);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo stream_select
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        //se $linha for verdadeiro retorna a linha encotrada na banco
        if($linha)
        {
            return $linha;
        }
        //destroi o objeto de conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
public function localizarporcpf($cpf)
{
    try
    {
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do cpf
        $comando = $pdo->prepare("select * from cliente where cpf_cliente = :cpf");
        //atribui um valor para o parâmetro :cpf
        $comando->bindValue(":cpf",$cpf);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo select
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        //se $linha for verdadeiro retorna a linha encotrada na banco
        if($linha)
        {
            return $linha;
        }
        //fecha a conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
public function localizarpornome($nome)
{
    try{
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do nome
        $comando = $pdo->prepare("select * from cliente where nome_cliente = :nome");
        //atribui um valor para o parâmetro :cpf
        $comando->bindValue(":cpf",$nome);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo select
        
        //enquanto $linha for verdadeiro retorna a linha encotrada na banco
        while($linha = $comando->fetch(PDO::FETCH_ASSOC))
        {
            //guardar cada linha recebida 
        }
        //fecha a conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}


    }
?>




