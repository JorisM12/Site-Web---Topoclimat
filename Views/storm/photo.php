<h2><?=$photoL->name_photo;?></h2>
<ul id="bloc-links">
    <li><a href="/storm" title="Retour à la page d'accueil">ACCUEIL</a></li>
    <li>-</li>
    <li><a href="/storm/albums" title="Liste des albums">ALBUMS</a></li>
    <li>-</li>
    <li><a href="/storm/albums/<?=$year?>" title="Retour à la galerie">ANNÉE <?=$year?></a></li>
</ul>
<section id="photo">
    <div id="bloc-nav-photo">
        <?php if($actions['prev'] !== false):?>
            <a href="/storm/photo/<?=$actions['prev']?>/<?=$year?>"><img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" id="btn-prev"></a>
        <?php else:?>
            <a href="#"><img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" id="btn-prev"></a>
        <?php endif?>
        <?php if($actions['next'] !== false):?>
            <a href="/storm/photo/<?=$actions['next']?>/<?=$year?>"><img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" id="btn-next"></a>
        <?php else:?>
            <a href="#"><img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" id="btn-next"></a>
        <?php endif?>
    </div>
    <img src="/<?=$photoL->link_photo;?>" alt="<?=$photoL->alt_photo;?>" data-name="<?=$photoL->name_photo;?>" id="photo-elem">
    <p>
        <?=$photoL->description_photo;?>
    </p>
</section>
<aside>
    <h3>POSITION À LA PRISE DE VUE</h3>
    <div id="map"></div>
</aside>
<script>
    const idGal = <?=$photoL->id_gal?>;
    const year = <?=$year?>;
    const linkImg ="<?=$photoL->link_photo?>";
    const coords = <?=$photoL->coords_photo?>;
</script>
<script src="/script/photo/map.js"></script>
