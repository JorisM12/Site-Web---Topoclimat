<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prévions météo à 6 jours sur la région Grand Est! Actualités et photographies d'orages"> 
    <link rel="stylesheet" href="/style/css/<?=$nameCSS?>.css">
    <link rel="icon" type="image/png" href="/style/images/favicon.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <title><?=$titlePage?></title>
</head>
<body>
    <header id="main-header">
        <div>
            <a href="/" title="Retour sur la page d'accueil"><img src=" <?= isset($logo) ? $logo :'/style/images/logo_topoclimat.png'?>" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est"></a>
            <h1>Météo Lorraine Alsace Champagne-Ardenne</h1>
        </div>
        <div id="social">
            <a href="https://www.facebook.com/TopoClimat" title="Page facebook" target="_blank">
                <img src="/style/images/pictos/social/facebook.svg" alt="Lien vers le Facebook de TopoClimat" title="TopoClimat sur Facebook">
            </a>
            <a href="https://www.youtube.com/@topoclimat8652" title="Chaine Youtube" target="_blank">
                <img src="/style/images/pictos/social/youtube.svg" alt="Lien vers la chaine Youtube de TopoClimat" title="Chaine Youtube de TopoClimat">
            </a>
            <a href="#" title="Compte X">
                <img src="/style/images/pictos/social/twitter.svg"" alt="Lien vers le compte X de TopoClimat" title="TopoClimat sur X">
            </a>
        </div>
    </header>
    <header id="mobile-header">
        <img src="/style/images/logo_mini.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
        <h1>Météo Lorraine Alsace Champagne-Ardenne</h1>
    </header>
    <nav id="main-nav">
        <ul>
            <li>
                <a href="/" title="Page d'accueil"><img src="/style/images/pictos/nav/home.svg"  alt="Page d'accueil"></a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/weather.svg" alt="Prévisions"><a href="/" title="Prévisions" >Prévisions</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/news.svg" alt="Actualités"><a href="/articles" title="Les actualités">Actualités</a>
            </li>
            <li>
                <a href="#" title="Découvrir la région"><img src="/style/images/pictos/nav/atlas.svg" alt="La région">La région</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/school.svg" alt="La météo"><a href="/schema/typesFoudre" title="Découvrir la météo">Pédagogie</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/photo.svg" alt="photo"><a href="/storm" title="Photographies d'orages">Chasseur d'orages</a>
            </li>
            <li id="burger-menu">
                <img src="/style/images/pictos/nav/burger.svg" alt="menu burger">
            </li>
        </ul>
        <nav id="main-nav-open">
            <ul>
                <li><a href="/" class="menu-open-elem">Carte de prévisions</a></li>
                <li><a href="/" class="menu-open-elem">Prévisions massif des Vosges</a></li>
                <li><a href="main/forcastCity" class="menu-open-elem">Prévisions ville par ville</a></li>
                <li><a href="/riskMap" class="menu-open-elem">Risque météo en cours</a></li>
            </ul>            
        </nav>
    </nav>
    <main>
    <?php if(!empty($_SESSION['error'])):?>
        <div id="bloc-notif">
                <p class="shadow-and-radius error"><img src="/style/images/pictos/buttons/warming.svg" alt=""><?=$_SESSION['error']?><img src="/style/images/pictos/buttons/xmark.svg" alt=""></p>
        </div>
    <?php endif; unset($_SESSION['error']) ;?>
    <?php if(!empty($_SESSION['message'])):?>
            <div id="bloc-notif">
                <p class="shadow-and-radius ok"><img src="/style/images/pictos/buttons/check-solid.svg" alt=""><?=$_SESSION['message']?><img src="/style/images/pictos/buttons/xmark.svg" alt=""></p>
            </div>
    <?php endif; unset($_SESSION['message']); ?>
        <?= $content ?>
    </main>
    <nav id="mobile-nav">
        <ul>
            <li><a href="/"><img src="/style/images/pictos/nav/weather.svg" alt="Prévisions">Prévisions</a></li>
            <li><a href="/riskMap"><img src="/style/images/pictos/buttons/storm.svg" alt="Carte des risques">Carte des risques</a></li>
            <li><a href="/articles"><img src="/style/images/pictos/nav/news.svg" alt="Actualités">Actualités</a></li>
            <li><img src="/style/images/pictos/nav/burger.svg" alt="Menu"></li>
        </ul>
    </nav>
    <nav id="mobile-nav-open">
        <div>
            <img src="/style/images/pictos/nav/close.png" alt="" id="btn-close">
            <img src="/style/images/logo_mini.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
            <div id="social">
                <a href="#" title="Page facebook">
                    <img src="/style/images/pictos/social/facebook.svg" alt="Lien vers le Facebook de TopoClimat" title="TopoClimat sur Facebook">
                </a>
                <a href="#" title="Chaine Youtube">
                    <img src="/style/images/pictos/social/youtube.svg" alt="Lien vers la chaine Youtube de TopoClimat" title="Chaine Youtube de TopoClimat">
                </a>
                <a href="#" title="Compte X">
                    <img src="/style/images/pictos/social/twitter.svg"" alt="Lien vers le compte X de TopoClimat" title="TopoClimat sur X">
                </a>
            </div>
        </div>
        <ul>
            <li><a href="#" class="titles-burger">ACCUEIL<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
            <li><a href="#" class="titles-burger ">PRÉVISIONS<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a >
            </li>
            <li><a href="#" class="titles-burger">ACTUALITÉS<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
            <li><a href="#" class="titles-burger">LA RÉGION<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
            <li><a href="#" class="titles-burger">PÉDAGOGIE<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
            <li><a href="#" class="titles-burger">CHASSEUR D'ORAGES<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
            <li><a href="#" class="titles-burger">PHOTOS<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></a></li>
        </ul>
        
    </nav>
    <footer>
        <div id="footer-logo">
            <img src="/style/images/logo_topoclimat.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
            <div>
                <a href="https://www.facebook.com/TopoClimat" title="Page facebook" target="_blank"> 
                    <img src="/style/images/pictos/social/facebook.svg" alt="Lien vers le Facebook de TopoClimat" title="TopoClimat sur Facebook">
                </a>
                <a href="https://www.youtube.com/@topoclimat8652" title="Chaine Youtube" target="_blank">
                    <img src="/style/images/pictos/social/youtube.svg" alt="Lien vers la chaine Youtube de TopoClimat" title="Chaine Youtube de TopoClimat">
                </a>
                <a href="#" title="Compte X">
                    <img src="/style/images/pictos/social/twitter.svg"" alt="Lien vers le compte X de TopoClimat" title="TopoClimat sur X">
                </a>
            </div>
            <p id="version">v1.0.3</p>
            <p id="dev">Développement:<a href="https://www.linkedin.com/in/joris-m12" target="_blank">J.MICHEL</a></p>
        </div>
        <section>
            <div class="limit"></div>
            <div id="about">
                <h4>A propos</h4>
                <p>
                    Prévisions et suivis des phénomènes météo sur l'ensemble du Grand Est.Photographies d'orages
                </p>
            </div>
            <div class="limit"></div>
            <nav>
                <h4>Accès rapide</h4>
                <ul>
                    <li><a href="/" target="_blank" title="Accueil">Accueil</a></li>
                    <li><a href="/main/forcastCity" target="_blank">Prévisions</a></li>
                    <li><a href="/riskMap" target="_blank">Risques météo en cours</a></li>
                    <li><a href="/schema/typesFoudre" target="_blank">Schémas interactifs</a></li>
                    <li><a href="/gallery" target="_blank">Galerie photo</a></li>

                </ul>
            </nav>
            <div class="limit"></div>
            <nav>
                <h4>Autres</h4>
                <ul>
                    <li><a href="#" target="_blank">Mentions légales</a></li>
                    <li><a href="#" target="_blank">Cookies</a></li>
                    <li><a href="#" target="_blank">Autres</a></li>
                    <li><a href="#" target="_blank">Nous contacter</a></li>

                </ul>
            </nav>
        </section>
    </footer>
<script src="/script/nav/nav-open.js"></script>
</body>
</html>