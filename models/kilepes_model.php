<?php

class Kilepes_Model
{
	public function get_data()
	{
		$retData['eredmény'] = "OK";
		$retData['uzenet'] = "Visszontlátásra kedves " . $_SESSION['username'] . "!";
		$_SESSION['userid'] =  0;
		$_SESSION['userlevel'] = "1__";
		Menu::setMenu();
		return $retData;
	}
}
