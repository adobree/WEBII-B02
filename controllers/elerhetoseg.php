<?php

class Elerhetoseg_Controller
{
	public $baseName = 'elerhetoseg';
	public function main(array $vars)
	{
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName . "_main");
	}
}
