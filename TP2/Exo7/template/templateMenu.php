<?php
function renderMenuToHTML($currentPageId, $currentlang,$menuLang)
{
    
    $cnt=0;
    foreach ($menuLang['lang'] as $lang){
        if($lang==$currentlang){
           
            echo '
                <ul class="topnav">';
                foreach ($menuLang['menu'][$cnt] as $pageId => $pageParameters) {
                    if ($currentPageId == $pageId) {
                        echo '<li id="current_page"><a href="index.php?page=' . $pageId . '&lang='.$currentlang.'">' . $pageParameters[0] . '</a></li>';
                    } else {
                        echo '<li><a href="index.php?page=' . $pageId . '&lang='.$currentlang.'">' . $pageParameters[0] . '</a></li>';
                }
            }
        }
        $cnt+=1;
    }
    echo '</ul>';
}