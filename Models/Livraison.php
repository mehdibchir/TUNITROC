<?php

class Livraison{
	
	private $IdLivraison;
	private $dateLivraison;
	private $telephone;
	private $adresse;
	//private $NomLivraison;


	function __construct($dateLivraison,$telephone,$adresse)
	{	
		//$this->id=$id;
		//$this->$NomLivraison=$NomLivraison;
		$this->dateLivraison=$dateLivraison;
		$this->telephone=$telephone;
		$this->adresse=$adresse;
	}

	// public function getNomLivraison(){
	// 	return $this->NomLivraison;
	// }

	public function getIdLivraison(){
		return $this->IdLivraison;
	}


	public function getDateLivraison(){
		return $this->dateLivraison;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function getAdresse(){
		return $this->adresse;
	}

	public function setId($id){
		$this->id=$id;
	}
	// public function setNomLivraison($NomLivraison){
	// 	$this->NomLivraison=$NomLivraison;
	// }
	public function setDateLivraison($dateLivraison){
		$this->dateLivraison=$dateLivraison;
	}

	public function setTelephone($telephone){
		$this->telephone=$telephone;
	}
	public function setAdresse($adresse){
		$this->adresse=$adresse;
	}

	
	

}

?>