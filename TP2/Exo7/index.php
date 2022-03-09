<?php
require_once("./template/templateHeader.php");
require_once("./template/templateMenu.php");

$menuFR = array(
    'projectContent' => array('Projet'),
    'cvContent' => array('CV'),
    'hobbiesContent' => array('Passe-temps'),
);
$menuEN= array(
    'projectContent' => array('Project'),
    'cvContent' => array('CV'),
    'hobbiesContent' => array('Hobbies'),
); 

//Test mettre lang=jap dans l'URL
$menuJP= array(
    'projectContent' => array('Jap'),
    'cvContent' => array('Jap'),
    'hobbiesContent' => array('Jap'),
); 
$menuLang = array(
    'lang' => array('fr','eng','jp'),
    'menu' => array($menuFR, $menuEN, $menuJP)       
);


$currentPageId = 'projectContent';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}

$currentlang='fr';
if(isset($_GET['lang'])) {
    $currentlang = $_GET['lang'];
}

require_once("./renderer.php");
render($currentPageId, $currentlang, $menuLang);