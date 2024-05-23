<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/css/<?=$nameCSS?>.css">
    <title><?=$titlePage?></title>
</head>
<body>
    <header id="main-header">
        <div>
            <img src="/style/images/logo_topoclimat.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
            <h1>Météo Lorraine Alsace Champagne-Ardenne</h1>
        </div>
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
    </header>
    <header id="mobile-header">
        <img src="/style/images/logo_mini.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
        <h1>Météo Lorraine Alsace Champagne-Ardenne</h1>
    </header>
    <nav id="main-nav">
        <ul>
            <li>
                <a href="/admin" title="Page d'accueil"><img src="/style/images/pictos/nav/home.svg"  alt="Page d'accueil"> Tableau de bord</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/news.svg" alt="Les articles"><a href="/admin/manageArticles" title="Liste des articles">Liste des articles</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/flask-solid.svg" alt="Prévisions"><a href="#" title="Prévisions" >État des prévisions</a>
            </li>
            <li>
                <a href="#" title="Gestion des utilisateurs"><img src="/style/images/pictos/nav/user-solid.svg" alt="Les utilisateurs">Gestion des utilisateurs</a>
            </li>
            <li>
                <img src="/public/style/images/pictos/buttons/warming.svg"><a href="riskMap/add" title="Gestion des riques">Gestion des risques</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt=""><a href="#" title="Infographie">Générateur d'infographie</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/user-solid.svg" alt="Utilisateur"> <a href="#" title="mon profil"> <?=$_SESSION['user']['first_name'].'.'.$_SESSION['user']['name'][0];?> </a>
            </li>
          
        </ul>
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
            <li class="selected"><img src="/style/images/pictos/nav/home.svg" alt="Tableau de bord">Tableau de bord</li>
            <li><img src="/style/images/pictos/buttons/warming.svg" alt="Gestion des risques">Gestion des risques</li>
            <li><img src="/style/images/pictos/nav/news.svg" alt="Liste des articles">Liste des articles</li>
            <li><img src="/style/images/pictos/nav/burger.svg" alt="Menu"></li>
        </ul>
    </nav>
    <nav id="mobile-nav-open">
        <div>
            <img src="/style/images/pictos/nav/home.svg" alt="" id="btn-close">
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
                    <li><a href="#" target="_blank">Accueil</a></li>
                    <li><a href="#" target="_blank">Prévisions</a></li>
                    <li><a href="#" target="_blank">Risques météo en cours</a></li>
                    <li><a href="#" target="_blank">Schémas interactifs</a></li>
                    <li><a href="#" target="_blank">Gellerie photo</a></li>

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
    <script src="/script/nav/notif.js"></script>
</body>
</html>