<?php
class Regisztracio_Controller
{
	public $baseName = 'regisztracio';
	public function main(array $vars)
	{
		$regisztracioModel = new Regisztracio_Model;
		$regisztracioModel->regisztracio();		
		$view = new View_Loader($this->baseName."_main");	
	}
}
