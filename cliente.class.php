<?php
//objeto cliente 
//contém todos os atributos do cliente
    class cliente{
        private $codcliente;
        private $codcidade;
        private $nomecliente;
        private $email;
        private $endereco;
        private $bairro;
        
        private $cep;
        private $login;
        private $senha;

    public function getCodcliente(){
		return $this->codcliente;
	}

	public function setCodcliente($codcliente){
		$this->codcliente = $codcliente;
	}

	public function getCodcidade(){
		return $this->codcidade;
	}

	public function setCodcidade($codcidade){
		$this->codcidade = $codcidade;
	}

	public function getNomecliente(){
		return $this->nomecliente;
	}

	public function setNomecliente($nomecliente){
		$this->nomecliente = $nomecliente;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}


    public function validacao()
    {
        //atribuir validações no objeto cliente
		return true;
    }
    }

?>