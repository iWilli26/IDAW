<?php 
require_once("template/templateHeader.php")
?>

<body>
    <?php 
  require_once("template/templateMenu.php");
  renderMenutoHTML('hobbies');
?>

    <div class="hobby">
        <div class="cardJeu">
            <h3>Prés' de l'asso jeu de société "Taverne de l'Imaginaire"</h3>
            <br />
            Organise des soirées jeu de société régulièrement ouvert à tous les étudiants (et prof??)<br />

            <div class="infoJeu">
                <h2>Meilleur jeu</h2>
                <ul>
                    <a href="https://www.amazon.fr/Alderac-Entertainment-Group-Lettre-damour/dp/B076ZVPKY1"
                        target="_blank" rel="noopener noreferrer">
                        <li><strong>Love Letter</strong></li>
                    </a>
                    <a href="https://www.amazon.fr/Matagot-Shadow-Hunters/dp/B002MA9KNO/" target="_blank"
                        rel="noopener noreferrer">
                        <li><strong>Shadow Hunter</strong></li>
                    </a>
                    <a href="www.amazon.fr/Molog-Secret-Hitler-Version-améliorée/dp/B07J457JWZ/" target="_blank"
                        rel="noopener noreferrer">
                        <li><strong>Secret Hitler</strong></li>
                    </a>

                    <a href="https://www.amazon.fr/STUDIO-Shamans-Jeu-Plateau-STSHA/dp/B08MWTJ836/" target="_blank"
                        rel="noopener noreferrer">
                        <li><strong>Shaman</strong></li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="cardJap">
            <h3>La culture japonaise</h3>
            <br />
            Waifu is love, Waifus is life<br />
            <div class="infoJap">
                <h2>Anime Préféré</h2>
                <ul>
                    <a href="https://anilist.co/anime/21827/Violet-Evergarden/" target="_blank"
                        rel="noopener noreferrer">
                        <li><strong>Violet Evergarden</strong></li>
                    </a>
                    <a href="https://anilist.co/anime/9253/SteinsGate/" target="_blank" rel="noopener noreferrer">
                        <li><strong>Steins;Gate</strong></li>
                    </a>
                    <a href="https://anilist.co/anime/101291/Rascal-Does-Not-Dream-of-Bunny-Girl-Senpai/"
                        target="_blank" rel="noopener noreferrer">
                        <li><strong>Bunny Girl Senpai</strong></li>
                    </a>
                    <a href="https://anilist.co/anime/101280/That-Time-I-Got-Reincarnated-as-a-Slime/" target="_blank"
                        rel="noopener noreferrer">
                        <li><strong>Tensura</strong></li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="card">
            <h3>Piano</h3>
            <br />
            Pratique régulière du piano depuis 14 ans<br />
        </div>
        <div class="card">
            <h3>Badminton</h3>
            <br />
            Joue au Badminton depuis 8 ans<br />
        </div>
        <div class="card">
            <h3>Natation</h3>
            <br />
            A pratiqué pendant 5 ans la Natation<br />
        </div>
    </div>

    <?php require_once("template/templateFoorter.php")?>
</body>

</html>