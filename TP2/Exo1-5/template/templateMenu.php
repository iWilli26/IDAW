<?php
function renderMenuToHTML($currentPageId){
    $mymenu = array(
        'project' => array('Project'),
        'cv' => array('CV'),
        'hobbies' => array('Hobbies')
    );
    echo '
    <ul class="topnav">';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($currentPageId == $pageId) {
            echo '<li id="current_page"><a href="'.$pageId.'.php">'.$pageParameters[0].'</a></li>';
        }
        else{
            echo'<li><a href="'.$pageId.'.php">'.$pageParameters[0].'</a></li>';
        }    
    }
    echo '</ul>';
}