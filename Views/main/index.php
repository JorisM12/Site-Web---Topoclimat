<?php 
use App\Models\ArticlesModel;
$id = 1;
?>
<main>
    <section id="weather-app" class="container-type-1">
        <div id="weather-forcast-map-dep" class="moselle">
        </div>
        <div id="weather-forcast-map">
        </div>
        <img src="/style/images/weather_map/buttons/arrow-left-solid.svg" alt="boutton de retour" id="return">
        <nav id="nav-forcast-mobile">
            <div id="bloc-day">
                <div class="selected-nav-forcast-mobile" data-day="0">AUJOURD'HUI <img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></div>
                <div id="list-day" class="shadow-and-radius">
                    <div data-day="1"></div>
                    <div data-day="2"></div>
                    <div data-day="3"></div>
                    <div data-day="4"></div>
                </div>
            </div>
            <div id="bloc-period">
                <div class="selected-nav-forcast-mobile" data-period="1">MATIN <img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></div>
                <div id="list-period">
                    <div data-period="2">MATIN</div>
                    <div data-period="2">APRÈS-MIDI</div>
                    <div data-period="3">SOIRÉE</div>
                    <div data-period="4">NUIT</div>
                </div>
            </div>
            <ul>
                <li class="btn-nav-elements"><img src="/style/images/weather_map/buttons/forcast.svg" alt=""></li>
                <li class="btn-nav-elements"><img src="/style/images/weather_map/buttons/wind.svg" alt=""></li>
            </ul>
            <div id="bloc-dep">
                <div class="selected-nav-forcast-mobile">REGION<img src="/style/images/pictos/nav/chevron-right-solid.svg" alt=""></div>
                <div id="list-dep">
                    <div data-city="REGION">REGION</div>
                    <div data-city="MOSELLE">MOSELLE</div>
                    <div data-city="MEURTHE-ET-MOSELLE">MEURTHE ET MOSELLE</div>
                    <div data-city="MEUSE">MEUSE</div>
                    <div data-city="VOSGES">VOSGES</div>
                    <div data-city="HAUT-RHIN">HAUT-RHIN</div>
                    <div data-city="BAS-RHIN">BAS-RHIN</div>
                    <div data-city="AUBE">AUBE</div>
                    <div data-city="HAUTE-MARNE">HAUTE-MARNE</div>
                    <div data-city="MARNE">MARNE</div>
                    <div data-city="ARDENNES">ARDENNES</div>
                </div>
            </div>
        </nav>
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
                <img src="/style/images/weather_map/elements/sun.png" alt="">
                <div>19h10</div>
                <img src="/style/images/weather_map/elements/moon.png" alt="">
                <div>7h34</div>
                <img src="/style/images/weather_map/elements/uv.opti.png" alt="">
                <div></div>
                <img src="/style/images/weather_map/elements/smog.png" alt="">
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
            <?php if($alert):    ?>  
                <a href="/riskMap">
                    <div id="alerts" class="shadow-and-radius alert-active">
                        <img src="<?=$alert->link_img_type?>" alt="Pictogramme de vigilance">
                        <p>
                            <?=$alert->name_type?>
                        </p>
                    </div>
                </a>
            <?php endif ?>
            <?php if(!$alert):    ?>   
                <div id="alerts" class="shadow-and-radius">
                    <img src="/style/images/pictos/nav/weather.svg" alt="Pictogramme de vigilance">
                    <p>
                        AUCUN RISQUE MÉTÉO
                    </p>
                </div>
            <?php endif ?>
        </div>
        <div id="news">
            <h3>DERNIÈRES ACTUALITÉS !</h3>
            <?php foreach ($list as $elem => $value): ?>
                <article id="art<?=$id?>">
                    <img src="<?=$list[$elem]['img']->link_figure?>" alt="<?=$list[$elem]['img']->alt_figure?>" class="img-news">
                    <div id="nav-news">
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                        <div><img src="/style/images/pictos/elements/arrow.svg" alt=""></div>
                    </div>
                    <section>
                        <div id="time-article">
                            <div>
                                <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime=" <?=$list[$elem]['data']->date_article?>"><?=ArticlesModel::frenchDateFormat($list[$elem]['data']->date_article)?></time>
                            </div>
                            <div>
                                <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#"><?=$list[$elem]['data']->name_cat?></a>
                            </div>
                            <?php 
                                foreach ($listTagAllArticles[$list[$elem]['data']->id_article]['names'] as $val) {  ?>
                                    <div class="tag-article <?=$colorTag[$listTagAllArticles[$list[$elem]['data']->id_article]['id'][$val]]?>">
                                        <a href="#"><?=$val?></a>
                                    </div>
                            <?php } ;?>
                        </div>
                        <div>
                            <h1><?=$list[$elem]['data']->title_article?></h1>
                            <p>
                                <?=$list[$elem]['data']->intro_article?>
                            </p>
                        </div>
                    </section>
                    <a href="/articles/read/<?=$list[$elem]['data']->id_article?>" title="Lire l'article" class="button-type-1">LIRE</a>
                </article>
                <?php 
                    $id++;
                ?>
            <?php endforeach ?>
        </div>
    </section>
    <div id="alerts-mobile" class="shadow-and-radius">
        <div><img src="/style/images/pictos/buttons/mountain.svg" alt="">Météo Vosges</div>
        <div><img src="/style/images/pictos/buttons/glass.svg" alt="">Météo dans votre ville</div>
        <div><img src="/style/images/pictos/buttons/warming.svg" alt="">Vigilance MF</div>
    </div>
    <div id="fast-link">
        <a href="#" title="Voir la météo du massif des Vosges" class="button-type-2"><img src="/style/images/pictos/buttons/mountain.svg" alt=""> MÉTÉO MASSIF DES VOSGES (à venir)</a>
        <a href="/gallery" title="Voir la galerie de photos" class="button-type-2"><img src="/style/images/pictos/buttons/image.svg" alt=""> GALERIE PHOTO</a>
    </div>
    <section id="forcast-city">
        <div id="search-city">
            <h4>Vous partez en Week-End ? Découvrez la météo à Gérardmer !</h4>
            <a href="main/forcastCity" title="Chercher une ville" class="button-type-2">CHERCHER UNE VILLE <img src="/style/images/pictos/buttons/glass.svg" alt=""></a>
        </div>
        <section>
        </section>
    </section>
    <section id="resources">
        <h5 class="title-type-1">DÉCOUVREZ NOS RESSOURCES PÉDAGOGIQUES <img src="/style/images/pictos/nav/school.svg" alt=""></h5>
        <div>
            <a href="/schema/typesFoudre" title="Section schémas explicatifs">
                <p>
                    LES ORAGES
                </p>
                <img src="/style/images/schemas/storm/types_foudre/L_type_foudre.webp" alt="schéma" class="shadow-and-radius">
            </a>
            <a href="/schema/pluieVerglas" title="Section schémas explicatifs">
                <p>
                    LA PLUIE VERGLAÇANTE
                </p>
                <img src="/style/images/schemas/snow/neige_oceanique/L_neige_oceanique.webp" alt="schéma" class="shadow-and-radius">
            </a>
            <a href="/schema/grele" title="Section schémas explicatifs">
                <p>
                    LA GRÊLE
                </p>
                <img src="/style/images/other/grele.jpg" alt="schéma" class="shadow-and-radius">
            </a>
        </div>
    </section>
    <section id="gallery">
        <h6 class="title-type-1">LES DERNIÈRES PHOTOS <img src="/style/images/pictos/nav/photo.svg" alt=""></h6>
        <div>
            <?php foreach ($allPhotos as $photo => $value): ?>
                <a href="gallery" class="shadow-and-radius">
                    <img  src="/<?=$value->link_photo ?>" alt="<?=$value->alt_photo ?>">
                </a>
            <?php endforeach ?>
        </div>
    </section>
</main>
<script src="/script/nav/nav-mini-articles.js"></script>
<script src="/script/weather-app/constants.js"></script>
<script src="script/weather-app/weather-forcast-app.js"></script>
<script src="/script/weather-app/cityForcastSearchB.js"></script>
<script src="/script/weather-app/vigilance.js"></script>
<script>
     localStorage.setItem('section','home');
    const listBtnAlertsMobile = document.querySelectorAll('#alerts-mobile div');
    listBtnAlertsMobile[0].addEventListener('click',()=>{
        window.location.href = '#';
    })
    listBtnAlertsMobile[1].addEventListener('click',()=>{
        window.location.href = '/main/forcastCity';
    })
    listBtnAlertsMobile[2].addEventListener('click',()=>{
        window.open('https://vigilance.meteofrance.fr/fr');
    })
</script>





