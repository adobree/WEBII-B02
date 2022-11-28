<?php

class Ext_Restful_Controller
{
	public $baseName = 'ext_restful';
	public function main(array $vars)
	{
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName . "_main");
	}
}
