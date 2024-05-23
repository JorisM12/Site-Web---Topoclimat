<?php
use App\Models\GalleryModel;
$gallery = new GalleryModel;
$listUrl = [];
?>
<h2>ANNÉE <?=$year?></h2>
<div id="bloc-link">
    <a href="/storm/albums" title="Retour à l'accueil" id="link-accueil">RETOUR</a>
    <a href="/storm/map/<?=$year?>" class="button-type-2" title="Retour à l'accueil" target="_blank">CARTE INTERACTIVE</a>
</div>
<section id="list-albums">
    <?php foreach($getGal as $photo =>$value):?>
        <div class="album-card">
            <a href="/storm/photo/<?=$value->id_photo?>/<?=$year?>">
                <img src="/<?=$value->link_photo?>" alt=<?=$value->alt_photo?>>
            </a>
        </div>
        <?php 
            $listUrl[$value->id_photo]="/storm/photo/$value->id_photo/$year" ;
        ?>
    <?php endforeach ?>
</section> 
<?php 
    $urls = [];
    foreach ($listUrl as $url => $value){
        $urls[$url] = "$value";
    }
    $_SESSION['nav-storm'] = $urls;
?>
