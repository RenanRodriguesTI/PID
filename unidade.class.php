<?php
 class unidade{
     //atributo correspondente ao código da unidade
     private $codunidade;
     //atributo correspondente ao nome da unidade
     private $nomeunidade;
     //atributo correspondente ao código da cidade
     private $codcidade;

     //métodos
     public function __construct($codunidade="",$nomeunidade="",$codcidade=null)
     {
        //o atributo codunidade recebe o parametro $codunidade
           $this->codunidade = $codunidade;
           //o atributo nomeunidade recebe o parametro $nomeunidade
           $this->nomeunidade = $nomeunidade;
           //o atributo codcidade recebe o parametro $codcidade
            $this->codcidade = $codcidade;

            
         
       

     }
     //retorna o valor do atributo código unidade
    public function getcodunidade(){
		return $this->codunidade;
	}
    //recebe o valor do atributo código 
	public function setcodunidade($codunidade){
		$this->codunidade = $codunidade;
	}
    //retorna o nome da unidade
	public function getnomeunidade(){
		return $this->nomeunidade;
	}
    //recebe o nome da unidade
	public function setnomeunidade($nomeunidade){
		$this->nomeunidade = $nomeunidade;
	}
    //retorna código cidade 
	public function getcodcidade(){
		return $this->codcidade;
	}
    //recebe o código da cidade
	public function setcodcidade($codcidade){
        //alterar pois será necessário implementar o objeto
		$this->codcidade = $codcidade;
	}
 }
?>