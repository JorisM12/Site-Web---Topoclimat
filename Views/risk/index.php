<section id="bloc-map" class="container-type-1">
    <h2 class="title-type-1">RISQUES MÉTÉOROLOGIQUE EN COURS</h2>
    <?php if($alert): ?>
    <div id="infos">
        <div id="risk-map">
            <a href="<?=$alert->link_img_alert?>/XL-ALERT.jpg" title="afficher en grand format" target="_blank"><img src="<?=$alert->link_img_alert?>/M-ALERT.jpg" alt="carte des riques météo"></a>
        </div>
        <div id="bloc-text" class="active">
            <h3><img src="<?=$alert->link_img_type?>" alt="" ><?=$alert->name_type?></h3>
            <div>
                <p>Début de l'évènement:</p>
                <p><time datetime="<?=$alert->start_alert?>"> <?=$alert->startDay?></time> à <time datetime="<?=$alert->startHour?>"> <?=$alert->startHour?></time></p>
            </div>
            <div>
                <p>Fin de l'évènement:</p>
                <p><time datetime="<?=$alert->end_alert?>"> <?=$alert->endDay?></time> à <time datetime="<?=$alert->endHour?>"> <?=$alert->endHour?></time></p>
            </div>
            <div>
                <p>Synthèse:</p>
                <p>
                    <?=$alert->description_alert?>
                </p>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?php if(!$alert): ?>
    <div id="infos">
        <div id="bloc-text">
            <h3>Pas de risque en cours</h3>
            <div>
                <p>Début de l'évènement:</p>
                <p><time datetime=""></time> <time datetime=""></time></p>
            </div>
            <div>
                <p>Fin de l'évènement:</p>
                <p><time datetime=""></time> <time datetime=""></time></p>
            </div>
            <div>
                <p>Synthèse:</p>
                <p>
                    
                </p>
            </div>
        </div>
    </div>
    <?php endif ?>
</section>