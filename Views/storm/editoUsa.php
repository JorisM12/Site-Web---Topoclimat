<?php 
$idMap = 0;
$topElem = 0;
$indexElem = 1;
$actualPosition = array_search($date,$listDateEdito);
if($actualPosition == 0) {
    $prevDate = $listDateEdito[$actualPosition];
}else{
    $prevDate = $listDateEdito[$actualPosition - 1];
}
if($actualPosition == count($listDateEdito) -1) {
    $nextDate =  $listDateEdito[$actualPosition];
}else{
    $nextDate =  $listDateEdito[$actualPosition + 1];
}
if($team == 7) {
    $nameTeam = 'Jordan';
}else{
    $nameTeam = 'Loic';
}
?>
<div id="banners">
    <h2>USA 2024</h2>
    <h3>Suivi de l'équipe de <?=$nameTeam?></h3>
</div>
<nav id="nav-mobile">
    <a href="/storm/editoUsa/<?=$team?>/<?=$prevDate?>">
        <img src="/style/images/pictos/elements/arrow.svg" alt="">
    </a>
    <a href="/storm/editoUsa/<?=$team?>/<?=$nextDate?>">
        <img src="/style/images/pictos/elements/arrow.svg" alt="">
    </a>
</nav>
<section id="edito">
    <nav id="nav-day">
        <div id="bloc-rows">
            <?php foreach ($listEdito as $elem):  ?>
                <div class="circle circle-1"></div>
                <?php if($indexElem !== count($listEdito)):?>
                    <div class="rows row-1"></div>
                    <?php 
                        $indexElem++;
                    ?>
                <?php endif?>
            <?php endforeach ?>
        </div>
            <div id="bloc-txt">
            <?php foreach ($listEdito as $elem => $value):  ?>
            <a href="/storm/editoUsa/<?=$team?>/<?=$value->date_edito?>" class="txt-1 <?= $date == $value->date_edito ? 'selected' : ''?>" style="top:<?=$topElem?>px;"><?=$value->date_form?> <?=$value->title?></a>
            <?php 
                $topElem = $topElem + 120;
            ?>
            <?php endforeach ?>
        </div>
    </nav>
    <section>
        <?php foreach ($sectionsEdito as $section => $value): $idMap++; ?>
            <?php if($section == 'first-bloc'):?>
                <div>
                <h4>Journée du <?=$dateFormat?></h4>
                <h5><?=$value->title_edito?></h5>
                </div>
            <?php else:?>
        <p>
            <?=$value->description_edito?>
        </p>
        <div class="bloc-img-map">
            <figure>
                <img src="/<?=$value->photo_edito?>" alt="Photo du jour" />
                <figcaption>Photo du jour</figcaption>
            </figure>
            <div class="bloc-map">
                <div id="map-<?=$idMap?>" class="zone-map"></div>
                <p>Secteur du jour</p>
            </div>
        </div>
        <script>
            let map<?=$idMap?> = L.map("map-<?=$idMap?>").setView([<?=$value->loc_edito?>], 14);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map<?=$idMap?>);
        </script>
        <?php   
            $idMap++;
        ?>
        <?php endif ?>
        <?php endforeach ?>
    </section>
</section>
