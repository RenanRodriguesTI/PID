<?php
require "banco.php";
require_once "romaneio.class.php";
    class romaneioRepository{
        public function gravar($romaneio){
            try{
                
            $pdo = Conectar();
            $comando=$pdo->prepare("insert into romaneio(cod_romaneio,data_Emissao_romaneio,cod_caminhao) values(:cod,:data,:caminhao)");
            $comando->bindValue(":cod",2);
            $comando->bindValue(":data",$romaneio->getDataemissao());
            $comando->bindValue(":caminhao",$romaneio-> getCodcaminhao()->getIdcaminhao());
            $comando->bindValue(":matricula",$romaneio->getMotorista()->getCodmotorista());
           // $comando->bindValue(":encom",$romaneio->getCodencomenda());
            $comando->execute();
            Desconectar($pdo);
            }
            catch(Expection $e)
            {
                Desconectar($pdo);
            }
        }
        public function alterar($romaneio){
            $pdo = Conectar();
            $comando = $pdo->prepare("update romaneio set cod_cidade = :cod, cod_caminhao=:caminhao,matricula_fun=:funcionario, cod_rota:rota where cod_romaneio = :id");
             $comando->bindValue(":cod",$romaneio->getCodcidade());
            $comando->bindValue(":data",$romaneio->getDataemissao());
            $comando->bindValue(":caminhao",$romaneio->getCodcaminhao()->getIdcaminhao());
            $comando->bindValue(":matricula",$romaneio->getMotorista());
            $comando->bindValue(":encom",$romaneio->getCodencomenda());
            
            $comando->execute();
            Desconectar($pdo);
            }
        
        public function excluir($cod){
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("delete from romaneio where cod_romaneio = :cod");
                $comando->bindValue(":cod",$cod);
                $comando->execute();
                Desconectar($pdo);     

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }

        }
        public function localizarcodromaneio($cod)
        {
             try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as romaneio pelo código 
                $comando = $pdo->prepare("select * from romaneio where cod_romaneio = :cod");
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$cod);
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

        public function localizardata($data)
        {
            try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as romaneio pela data
                $comando = $pdo->prepare("select * from romaneio where data_romaneio = :data");
                //atribui valor ao parametro :cod
                $comando->bindValue(":data",$data);
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
        

        //Várias estruturas select
    }

?>