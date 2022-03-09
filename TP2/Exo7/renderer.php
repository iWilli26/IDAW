<?php
function render($currentPageId, $currentlang, $menuLang)
{
    renderMenuToHTML($currentPageId, $currentlang, $menuLang);
    echo '<section class="corps">';
    $pageToInclude = __DIR__ .'/'. $currentlang .'/'. $currentPageId . ".php";
    if (is_readable($pageToInclude)) {
        require_once($pageToInclude);
    }
    echo '</section>';
    require_once("./template/templateFooter.php");
    footer($currentPageId, $menuLang);
}