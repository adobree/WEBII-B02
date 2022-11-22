<?php
//alkalmaz�s gy�k�r k�nyvt�ra a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/WEBII-B02/');
define('URLI', '');
// define('SITE_ROOT', 'http://pfw.ddns.net/web2kovacsadam/');
define('SITE_ROOT', '');
//URL c�m az alkalmaz�s gy�ker�hez


// a router.php vez�rl� bet�lt�se
require_once(SERVER_ROOT . 'controllers/' . 'router.php');
