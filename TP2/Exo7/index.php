<?php
require_once("./template/templateHeader.php");
require_once("./template/templateMenu.php");
$currentPageId = 'accueil';
if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}
$currentlang='fr';
if(isset($_GET['lang'])) {
    $currentlang = $_GET['lang'];
}

require_once("./renderer.php");
render($currentPageId, $currentlang)
?>