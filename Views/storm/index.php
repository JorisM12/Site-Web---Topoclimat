<?php 
$index = 0;
?>
<section>
    <div>
        <!-- <h2>CHASSEUR D'ORAGES</h2>
        <h3>DÉCOUVREZ NOS CHASSES AUX ORAGES EN FRANCES ET DANS D'AUTRES PAYS</h3> -->
        <img src="/style/images/storm/photo_orages_accueil.webp" alt="Photographie d'un arcus" >
    </div>
    <blockquote cite="#">
        <p>Partir à la chasse aux orages est une aventure palpitante où l'humain défie les caprices du ciel. Il traque la foudre et les tornades dans une quête d'adrénaline et de fascination pour les puissances de la nature. La chasse aux orages est comme un jeu perpétuel du chat et de la souris.</p>
    </blockquote>
</section>
<section id="last-photos">
    <h4>DERNIÈRES PHOTOS</h4>
    <div class="bloc-photo">
        <div id="bloc-nav">
            <div class="circle selected"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div id="bloc-arrow">
            <img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" class="nav-img">
            <img src="/style/images/pictos/nav/chevron-right-solid.svg" alt="" class="nav-img">
        </div>
        <img src="<?=$lastPhotos[0];?>" alt="" class="main-img">
    </div>
</section>
<section id="albums">
    <a href="/storm/albums" title="Aller vers la galerie"><h5>ALBUMS</h5></a>
    <div id="list-album">
        <?php foreach ($getNbrGal as $gal =>$value): ?>
            <div class="album-card">
                <img src="<?=$listMiniPhoto[$index]?>" alt="photo d'orages">
                <a href="storm/albums/<?=$value->date?>" title="Album <?=$value->date?> ">ANNÉE <?=$value->date?></a>
            </div>
            <?= $index++?>
        <?php endforeach ?> 
        <div class="album-card">
            <img src="/style/images/storm/photo_orages_accueil.webp" alt="photo d'orages">
            <a href="storm/albums" title="Voir les albums ">VOIR PLUS</a>
        </div>
    </div>
</section>
<section id="albums-mobile">
    <h5>ALBUMS</h5>
    <a href="/storm/albums">ACCÉDER À LA GALERIE PHOTO</a>
</section>
<script>
    let listLink = [];
    <?php foreach ($lastPhotos as $photo => $value): ?>
            listLink.push("<?=$value?>");
    <?php endforeach ?>
</script>
<script src="/script/nav/nav-last-photos.js"></script>
<script>
   localStorage.setItem('section','');
</script>

