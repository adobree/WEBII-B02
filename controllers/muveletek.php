<?php

class Muveletek_Controller
{
	public $baseName = 'muveletek';
	public function main(array $vars)
	{
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName . "_main");
	}
}
