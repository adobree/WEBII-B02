<?php
//alkalmaz�s gy�k�r k�nyvt�ra a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/WEBII-B02/');
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/WEBII-B02/');
//URL c�m az alkalmaz�s gy�ker�hez
// define('SITE_ROOT', 'http://pfw.ddns.net/web2kovacsadam/');

// a router.php vez�rl� bet�lt�se
require_once(SERVER_ROOT . 'controllers/' . 'router.php');
