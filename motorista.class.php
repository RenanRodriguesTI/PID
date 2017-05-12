<?php
    class motorista{
        private $codmotorista;
        private $nomemotorista;
        private $cpfmotorista;
        private $rgmotorista;
        private $dtaemissao;
        private $dtademissao;
    
    public function __construct($codmotorista="",$nomemotorista="",$cpfmotorista="",$rgmotorista="",$dtaemissao="")
    {
        //atributos
        $this->codmotorista = $codmotorista;
        $this->nomemotorista = $nomemotorista;
        $this->cpfmotorista = $cpfmotorista;
        $this->rgmotorista = $rgmotorista;
        $this->dtaemissao = $dtaemissao;
    } 

    public function getCodmotorista(){
		return $this->codmotorista;
	}

	public function setCodmotorista($codmotorista){
		$this->codmotorista = $codmotorista;
	}

	public function getNomemotorista(){
		return $this->nomemotorista;
	}

	public function setNomemotorista($nomemotorista){
		$this->nomemotorista = $nomemotorista;
	}

	public function getCpfmotorista(){
		return $this->cpfmotorista;
	}

	public function setCpfmotorista($cpfmotorista){
		$this->cpfmotorista = $cpfmotorista;
	}

	public function getRgmotorista(){
		return $this->rgmotorista;
	}

	public function setRgmotorista($rgmotorista){
		$this->rgmotorista = $rgmotorista;
	}

	public function getDtaemissao(){
		return $this->dtaemissao;
	}

	public function setDtaemissao($dtaemissao){
		$this->dtaemissao = $dtaemissao;
	}

	public function getDtademissao(){
		return $this->dtademissao;
	}

	public function setDtademissao($dtademissao){
		$this->dtademissao = $dtademissao;
	}
    }

?>