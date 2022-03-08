<?php
function renderMenuToHTML($currentPageId)
{
    $mymenu = array(
        'projectContent' => array('Project'),
        'cvContent' => array('CV'),
        'hobbiesContent' => array('Hobbies'),
    );
    echo '
    <ul class="topnav">';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($currentPageId == $pageId) {
            echo '<li id="current_page"><a href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a></li>';
        } else {
            echo '<li><a href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a></li>';
        }
    }
    echo '</ul>';
}