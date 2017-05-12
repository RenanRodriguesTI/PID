<?php

    class motoristaRepository{
        public function gravar($motorista)
        {
            try{
              $pdo = Conectar();
              $comando = $pd->prepare("insert into motorista(NOME_FUN,RG_FUN,CPF_FUN,DTADMISSAO_FUN,DTDEMISSAO_FUN) values(:NOME,:RG,:CPF:ADMISSAO,:DEMISSAO)");
              $comando->bindValue(":NOME",$motorista->getNomemotorista());
              $comando->bindValue(":RG",$motorista->getRgmotorista());
              $comando->bindValue(":CPF",$motorista->getCpfmotorista());
              $comando->bindValue(":ADMISSAO",$motorista->getDtaemissao());
              $comando->bindValue(":DEMISSAO",NULL);
              $comando->execute();

              Desconectar($pdo);

            }   
            catch(Exception $e)
            {
                Desconectar($pdo);
            }            
        }
        public function alterar()
        {
            try{
                $pdo = Conectar();

                Desconectar();

            }
            catch(Exception $e)
            {
                Desconetar();
            }
        }
        public function excluir()
        {

        }
    }
?>