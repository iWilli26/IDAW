<?php
renderMenuToHTML($currentPageId);

function render($currentPageId, $currentlang){
echo '<section class="corps">';
    $pageToInclude = $currentPageId . ".php";
    if(is_readable($pageToInclude))
    require_once($pageToInclude);
echo '</section>';



require_once("./template/templateFooter.php");
}
?>