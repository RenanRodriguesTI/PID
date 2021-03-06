<?php
    class juridicoRepository{
         function gravar($juridico)
        {
            try{
                //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara o comando sql para inserir no banco
                $comando = $pdo->prepare("insert into juridica(razaosocial_juridica,cnpj_juridica,cod_cliente) values(:razaosocialjuridica,:cnpj,:cod)");
                $comando->bindValue(":cnpj",$juridico->getCnpjJuridica());
                $comando->bindValue(":razaosocialjuridica",$juridico->getRazaoSocialJuridica());
                $comando->bindValue(":cod",$juridico->getCodcliente());
                //executa o comando sql
                $comando->execute();
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        function alterar($juridico)
        {
             try{                  
                $pdo = Conectar();              
                $comando = $pdo->prepare("update juridica set cnpj_juridica = :cnpj,razaosocial_juridica = :razaosocialjuridica where cod_cliente = :cod");
                $comando->bindValue(":cnpj",$juridico->getCnpjJuridica());
                $comando->bindValue(":razaosocialjuridica",$juridico->getRazaoSocialJuridica());
                $comando->bindValue(":cod",$juridico->getCodcliente()); 
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        function excluir($juridico)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("delete from juridica where cod_cliente = :cod");
                $comando->bindValue(":cod",$juridico->getCodcliente());
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        function localizarporcodigo($juridico)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from juridica where cod_cliente = :cod");
                $comando->bindValue(":cod",$juridico->getCodcliente());
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }        
        function localizarporcnpj($juridico)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from juridica where cnpj_juridica = :cnpj");
                $comando->bindValue(":cnpj",$juridico->getCnpjJuridica()); 
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        
        
    }
?>