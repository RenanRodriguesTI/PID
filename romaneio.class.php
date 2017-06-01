<?php

class romaneio{
    private $codromaneio;
	private $motorista;
    private $codcaminhao;
    private $codencomenda;
	private $origem;
	private $destino;
    private $dataemissao;
    

    public function __construct($codromaneio="",$dataemissao="", $motorista=null,$codcaminhao=null,$codencomenda=null)
    {
        $this->codromaneio = $codromaneio;
        $this->dataemissao = $dataemissao;
		if($motorista == null)
		{
			$this->$motorista = new motorista();
		}
		else{
			$this->motorista = $motorista;

		}
		if($codcaminhao == null)
		{
			//$this->motorista = new caminhao();
		}
		else{
			 $this->codcaminhao = $codcaminhao;
		}
        if($codencomenda == null)
		{
			//$this->codencomenda = new encomenda();
		}
		else{
			$this->codencomenda = $codencomenda;
		}
      
        
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
	public function getOrigem(){
		return $this->origem;
	}

	public function setOrigem($origem){
		$this->origem = $origem;
	}

	public function getDestino(){
		return $this->destino;
	}

	public function setDestino($destino){
		$this->destino = $destino;
	}
}


?>