<?php

class Ora_Controller
{
	public $baseName = 'ora'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}
