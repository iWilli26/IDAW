<?php
function footer($currentPageId, $currentLang, $menuLang)
{
    echo '
    <div id="footer">
    <ul id="foot" style="display:flex;">

        <li><a href="https://twitter.com/willi_ng" target="_blank" rel="noopener noreferrer">Twitter</a></li>
        <li><a href="https://github.com/iWilli26" target="_blank" rel="noopener noreferrer">Github</a></li>
        <li>
            <a href="https://www.linkedin.com/in/william-nguyen-9193a6152/" target="_blank"
                rel="noopener noreferrer">LinkedIn</a>
        </li>
        <li>
            <a href="mailto:william.nguyen@etu.imt-nord-europe.fr" target="_blank" rel="noopener noreferrer">Email</a>
        </li>
';
    foreach ($menuLang['lang'] as $lang) {
        if ($currentLang != $lang) {
            echo '
            <li>
                <a href="index.php?page=' . $currentPageId . '&lang=' . $lang . '">' . strtoupper($lang) . '
                </a>
            </li>';
        }
    }


    echo '
</ul>
</div>';
}