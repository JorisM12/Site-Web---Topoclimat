<?php
use App\Models\ArticlesModel;
?>
<h2>Tableau de Bord</h2>
<section>
    <a href="articles/add" title="écrire un article" class="button-type-2"><img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt=""> ÉCRIRE UN ARTICLE</a>
    <a href="riskMap/add" title="Créer un risque" class="button-type-2"><img src="/style/images/pictos/nav/weather.svg" alt=""> CRÉER UN RISQUE</a>
    <a href="admin/stormManage" title="Gestion des photos d'orages" class="button-type-2"><img src="/style/images/pictos/buttons/storm.svg" alt=""> CHASSEUR D'ORAGES</a>
    <section class="container-type-1">
        <h3>DERNIERS ARTICLES</h3>
        <ul>
            <?php foreach ($listArticles as $article): ?>
                <li><a href="articles/read/<?=$article->id_article ?>"><span><?=ArticlesModel::frenchDateFormat($article->date_article) ?></span> <?=$article->title_article ?> </a><a href="articles/modified/<?=$article->id_article?>" class="picto-modified" target="_blank"><img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt=""></a></li>
            <?php endforeach ?>
            
        </ul>
    </section>
    <section class="container-type-1">
        <h3>RISQUE EN COURS</h3>

        <?php if($alert):?>
            <div id="div-section" class="active">
                <img src="<?=$alert->link_img_alert?>/M-ALERT.jpg" alt="" id="img-alert">
                <div id="bloc-info">
                    <img  src="<?=$alert->link_img_type?>"  alt="">
                    <p><?=$alert->name_type?></p>
                </div>
                <p id="time-alert"><?=$alert->startDay?> <?=$alert->startHour?> au <?=$alert->endDay?> <?=$alert->endHour?></p>

                <a href="#" class="button-type-2" title="Éditer"><img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt=""> ÉDITER</a>
            </div>
        <?php else: ?>
            <div id="div-section">
                <h4>AUCUN RISQUE EN COURS</h4>
            </div>
        <?php endif ?>

    </section>
    <section class="container-type-1">
        <h3>INFOS RAPIDES</h3>
        <ul>
            <li>Dernière mise à jour prévisions: 11/01/2024</li>
            <li>Nombre d'articles ce mois-ci</li>
            <li>Nombre d'articles cette année</li>
        </ul>
    </section>
</section>
<div id="mobile-view">
    <section>
        <a href="#">ÉCRIRE UN ARTICLE</a>
        <a href="#">NOUVEAU RISQUE</a>
        <a href="#">RISQUE EN COURS</a>
        <a href="#">INFOS RAPIDES</a>
    </section>

</div>