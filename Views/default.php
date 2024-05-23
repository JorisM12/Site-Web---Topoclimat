<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/css/home.css">
    <title>Accueil</title>
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
    <nav id="main-nav">
        <ul>
            <li>
                <a href="#" title="Page d'accueil"><img src="/style/images/pictos/nav/home.svg"  alt="Page d'accueil"></a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/weather.svg" alt="Prévisions"><a href="#" title="Prévisions" >Prévisions</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/news.svg" alt="Actualités"><a href="#" title="Les actualités">Actualités</a>
            </li>
            <li>
                <a href="#" title="Découvrir la région"><img src="/style/images/pictos/nav/atlas.svg" alt="La région">La région</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/school.svg" alt="La météo"><a href="#" title="Découvrir la météo">Pédagogie</a>
            </li>
            <li>
                <img src="/style/images/pictos/nav/photo.svg" alt="photo"><a href="#" title="Photographies d'orages">Chasseur d'orages</a>
            </li>
            <li id="burger-menu">
                <img src="/style/images/pictos/nav/burger.svg" alt="menu burger">
            </li>
        </ul>
        <nav id="main-nav-open">
            <ul>
                <li><a href="#" class="menu-open-elem">Carte de prévisions</a></li>
                <li><a href="#" class="menu-open-elem">Prévisions massif des Vosges</a></li>
                <li><a href="#" class="menu-open-elem">Prévisions ville par ville</a></li>
                <li><a href="#" class="menu-open-elem">Risque météo en cours</a></li>
            </ul>            
        </nav>
    </nav>
    <main>
        <section id="weather-app" class="container-type-1">
            <div id="weather-forcast-map">
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
                <div><img src="" alt=""><img src="" alt=""><p></p><p></p></div>
            </div>
            <div id="nav-forcast">
                <nav>
                    <ul>
                        <li class="btn-nav-forcast">AUJOURD'HUI</li>
                        <li class="btn-nav-forcast">DEMAIN</li>
                        <li class="btn-nav-forcast">JEUDI</li>
                        <li class="btn-nav-forcast">VENDREDI</li>
                    </ul>
                    <ul>
                        <li class="btn-nav-elements"><img src="/style/images/weather_map/buttons/forcast.svg" alt=""></li>
                        <li class="btn-nav-elements"><img src="/style/images/weather_map/buttons/wind.svg" alt=""></li>

                    </ul>
                </nav>
                <aside>
                    <img src="/style/images/weather_map/elements/sunrise.png" alt="">
                    <div>8h17</div>
                    <img src="/style/images/weather_map/elements/sunset.png" alt="">
                    <div>18h15</div>
                    <img src="/style/images/weather_map/elements/sun.svg" alt="">
                    <div>19h10</div>
                    <img src="/style/images/weather_map/elements/moon.svg" alt="">
                    <div>7h34</div>
                    <img src="/style/images/weather_map/elements/beach.svg" alt="">
                    <div>5°C</div>
                    <img src="/style/images/weather_map/elements/smog.svg" alt="">
                    <div>faible</div>
                </aside>
            </div>
            <div id="logo-date-nav">
                <img src="/style/images/logo_topoclimat.png" alt="logo">
                <p>mardi 9 janvier 2024</p>
                <nav>
                    <ul>
                        <li>MATIN</li>
                        <li>APRÈS-MIDI</li>
                        <li>SOIRÉE</li>
                        <li>NUIT</li>
                    </ul>
                </nav>
            </div>
        </section>
        <section id="alerts-and-news" class="container-type-1">
            <div>
                <div id="vigilance" class="shadow-and-radius">
                    <img src="/style/images/pictos/buttons/warming.svg" alt="Pictogramme de vigilance">
                    <p>
                        VIGILANCE MÉTÉO-FRANCE
                    </p>
                </div>
                <div id="alerts" class="shadow-and-radius">
                    <img src="/style/images/pictos/buttons/storm.svg" alt="Pictogramme de vigilance">
                    <p>
                        RISQUE D'ORAGES FORTS
                    </p>
                </div>
            </div>
            <div id="news">
                <h3>DERNIÈRES ACTUALITÉS !</h3>
                <article id="art1">
                    <img src="/style/images/news/temp_r2.png" alt="températures" class="img-news">
                    <div id="nav-news">
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                    </div>
                    <section>
                        <div id="time-article">
                            <div>
                                <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime="2024-01-08">08.01.2024</time>
                            </div>
                            <div>
                                <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#">RÉGION</a>
                            </div>
                            <div class="tag cold">
                                <a href="#">FROID</a>
                            </div>
                        </div>
                        <div>
                            <h1>Gelées généralisées sur le Grand Est</h1>
                            <p>
                                Des températures allant de -1 à -7°C sont relevées ce matin sur l'ensemble du Grand Est
                            </p>
                        </div>
                    </section>
                    <a href="#" title="Lire l'article" class="button-type-1">LIRE</a>
                </article>
                <article id="art2">
                    <img src="/style/images/news/temp_r2.png" alt="températures" class="img-news">
                    <div id="nav-news">
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                    </div>
                    <section>
                        <div id="time-article">
                            <div>
                                <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime="2024-01-08">08.01.2024</time>
                            </div>
                            <div>
                                <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#">RÉGION</a>
                            </div>
                            <div class="tag cold">
                                <a href="#">FROID</a>
                            </div>
                        </div>
                        <div>
                            <h1>Gelées généralisées sur le Grand Est MIDDLE</h1>
                            <p>
                                Des températures allant de -1 à -7°C sont relevées ce matin sur l'ensemble du Grand Est
                            </p>
                        </div>
                    </section>
                    <a href="#" title="Lire l'article" class="button-type-1">LIRE</a>
                </article>
                <article id="art3">
                    <img src="/style/images/news/temp_r2.png" alt="températures" class="img-news">
                    <div id="nav-news">
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                    </div>
                    <section>
                        <div id="time-article">
                            <div>
                                <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime="2024-01-08">08.01.2024</time>
                            </div>
                            <div>
                                <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#">RÉGION</a>
                            </div>
                            <div class="tag cold">
                                <a href="#">FROID</a>
                            </div>
                        </div>
                        <div>
                            <h1>Gelées généralisées sur le Grand Est LAST</h1>
                            <p>
                                Des températures allant de -1 à -7°C sont relevées ce matin sur l'ensemble du Grand Est
                            </p>
                        </div>
                    </section>
                    <a href="#" title="Lire l'article" class="button-type-1">LIRE</a>
                </article>
            </div>
        </section>
        <div id="fast-link">
            <a href="#" title="Voir la météo du massif des Vosges" class="button-type-2"><img src="/style/images/pictos/buttons/mountain.svg" alt=""> MÉTÉO MASSIF DES VOSGES</a>
            <a href="#" title="Voir la galerie de photos" class="button-type-2"><img src="/style/images/pictos/buttons/image.svg" alt=""> GALERIE PHOTO</a>
        </div>
        <section id="forcast-city">
            <div id="search-city">
                <h4>Vous partez en Week-End ? Découvrez la météo à Gérardmer !</h4>
                <a href="#" title="Chercher une ville" class="button-type-2">CHERCHER UNE VILLE <img src="/style/images/pictos/buttons/glass.svg" alt=""></a>
            </div>
            <section>
                <div class="weather-card container-type-1">
                    <p>AUJOURD'HUI</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
                <div class="weather-card container-type-1">
                    <p>DEMAIN</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
                <div class="weather-card container-type-1">
                    <p>LUNDI 22</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
                <div class="weather-card container-type-1">
                    <p>MARDI 23</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
                <div class="weather-card container-type-1">
                    <p>MERCREDI 24</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
                <div class="weather-card container-type-1">
                    <p>JEUDI 25</p>
                    <div class="bloc-weather">
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                        <div></div>
                        <div>
                            <img src="/style/images/weather_map/weather_pictos/sun_clouds.gif" alt="mitigé">
                            <p>Mitigé</p>
                        </div>
                    </div>
                    <div class="bloc-wind">
                        <img src="/style/images/weather_map/buttons/wind.svg" alt="">
                        <p>23km/h (<span>44</span>)</p>
                    </div>
                    <div class="bloc-weet">
                        <img src="/style/images/weather_map/elements/humidity.svg" alt="">
                        <p>55%</p>
                    </div>
                    <div class="bloc-rain">
                        <img src="/style/images/weather_map/elements/rain.svg" alt="">
                        <p>faible</p>
                    </div>
                </div>
            </section>
        </section>
        <section id="resources">
            <h5 class="title-type-1">DÉCOUVREZ NOS RESSOURCES PÉDAGOGIQUES <img src="/style/images/pictos/nav/school.svg" alt=""></h5>
            <div>
                <a href="#" title="Section schémas explicatifs">
                    <p>
                        LES ORAGES
                    </p>
                    <img src="/style/images/other/Schéma_pluies_verglacantes.png" alt="schéma" class="shadow-and-radius">
                </a>
                <a href="#" title="Section schémas explicatifs">
                    <p>
                        LA NEIGE
                    </p>
                    <img src="/style/images/other/Schéma_pluies_verglacantes.png" alt="schéma" class="shadow-and-radius">
                </a>
                <a href="#" title="Section schémas explicatifs">
                    <p>
                        LES TEMPÊTES
                    </p>
                    <img src="/style/images/other/Schéma_pluies_verglacantes.png" alt="schéma" class="shadow-and-radius">
                </a>
            </div>
        </section>
        <section id="gallery">
            <h6 class="title-type-1">LES DERNIÈRES PHOTOS <img src="/style/images/pictos/nav/photo.svg" alt=""></h6>
            <div>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img1.jpg" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img2.jpg" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img2.jpg" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img1.jpg" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img3.png" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img1.jpg" alt="photographie">
                </a>
                <a href="#" class="shadow-and-radius">
                    <img src="style/images/tmp/img1.jpg" alt="photographie">
                </a>
            </div>
        </section>
    </main>
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
<script src="/script/nav/nav-open.js"></script>
<script src="/script/nav/nav-mini-articles.js"></script>
<script src="script/weather-app/weather-forcast-app.js"></script>
</body>
</html>