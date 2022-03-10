<?php
require_once("./template/templateHeader.php");
require_once("./template/templateMenu.php");

$menuFR = array(
    'projectContent' => array('Projet'),
    'cvContent' => array('CV'),
    'hobbiesContent' => array('Passe-temps'),
);
$menuEN = array(
    'projectContent' => array('Project'),
    'cvContent' => array('CV'),
    'hobbiesContent' => array('Hobbies'),
);

$menuLang = array(
    'lang' => array('fr', 'eng'),
    'menu' => array($menuFR, $menuEN )
);


$currentPageId = 'projectContent';
if (isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}

$currentlang = 'fr';
if (isset($_GET['lang'])) {
    $currentlang = $_GET['lang'];
}

require_once("./renderer.php");
render($currentPageId, $currentlang, $menuLang);