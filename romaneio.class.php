<?php

class romaneio{
    private $codromaneio;
    private $dataemissao;
    private $motorista;
    private $codcaminhao;
    private $codencomenda;

    public function __construct($codromaneio="",$dataemissao="", $motorista=null,$codcamihao=null,$codencomenda=null)
    {
        $this->codromaneio = $codromaneio;
        $this->dataemissao = $dataemissao;
        $this->motorista = $motorista;
        $this->codcaminhao = $codcaminhao;
        $this->codencomenda = $codencomenda;
    }

    	public function getCodromaneio(){
		return $this->codromaneio;
	}

	public function setCodromaneio($codromaneio){
		$this->codromaneio = $codromaneio;
	}

	public function getDataemissao(){
		return $this->dataemissao;
	}

	public function setDataemissao($dataemissao){
		$this->dataemissao = $dataemissao;
	}

	public function getMotorista(){
		return $this->motorista;
	}

	public function setMotorista($motorista){
		$this->motorista = $motorista;
	}

	public function getCodcaminhao(){
		return $this->codcaminhao;
	}

	public function setCodcaminhao($codcaminhao){
		$this->codcaminhao = $codcaminhao;
	}

	public function getCodencomenda(){
		return $this->codencomenda;
	}

	public function setCodencomenda($codencomenda){
		$this->codencomenda = $codencomenda;
	}
}


?>