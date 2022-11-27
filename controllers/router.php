<?php

session_start();
if(! isset($_SESSION['userid'])) $_SESSION['userid'] = 0;
if(! isset($_SESSION['userfirstname'])) $_SESSION['userfirstname'] = "";
if(! isset($_SESSION['userlastname'])) $_SESSION['userlastname'] = "";
if(! isset($_SESSION['user'])) $_SESSION['user'] = "";
if(! isset($_SESSION['userlevel'])) $_SESSION['userlevel'] = "1__";

include(SERVER_ROOT . 'includes/database.inc.php');
include(SERVER_ROOT . 'includes/menu.inc.php');

$page = "nyitolap";
$subpage = "";
$vars = array();

function getServerQueryString()
{
    if(isset($_SERVER['QUERY_STRING']))
    {
        return $_SERVER['QUERY_STRING'];
    }
    elseif(isset($_SERVER['REQUEST_URI']))
    {
        $xpl = explode('/', $_SERVER['REQUEST_URI']);

        $baseName = $xpl[array_key_last($xpl)];

        if(strpos($baseName, '?') !== false)
        {
             return substr($baseName, strpos($baseName, '?')+1);
        }
    }

    return null;
}

$request = getServerQueryString();

if($request != "")
{
	$params = explode('/', $request);
	$page = array_shift($params);	
	if(array_key_exists($page, Menu::$menu) && count($params)>0)
	{
		$subpage = array_shift($params);
		if(! (array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page))
		{
			$vars[] = $subpage;
			$subpage = "";
		}
	}
	$vars += $_POST;
	
	foreach($params as $p) 
	{
		$vars[] = $p;
	}
}

$controllerfile = $page.($subpage != "" ? "_".$subpage : "");
$target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
if(! file_exists($target))
{
	$controllerfile = "error404";
	$target = SERVER_ROOT.'controllers/error404.php';
}

include_once($target);
$class = ucfirst($controllerfile).'_Controller';
if(class_exists($class))
	{ $controller = new $class; }
else
	{ die('class does not exists!'); }


spl_autoload_register(function($className) {
    $file = SERVER_ROOT.'models/'.strtolower($className).'.php';
    if(file_exists($file))
    { include_once($file); }
    else
    { 
			die("File '$filename' containing class '$className' not found.");    
		}
});

$controller->main($vars);
