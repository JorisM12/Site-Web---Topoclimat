<h2>ALBUMS</h2>
<a href="/storm" title="Retour à l'accueil" id="link-accueil">ACCUEIL</a>
<section id="list-albums">
    <?php foreach ($getNbrGal as $gal =>$value): ?>
        <a href="albums/<?=$value->date?>">
            <div class="album-card">
                <img src="/style/images/storm/couvertures/<?=$value->date?>.png" alt="photo d'orages">
                <a href="albums/<?=$value->date?>" title="Album <?=$value->date?> ">ANNÉE <?=$value->date?></a>
            </div>
        </a>
    <?php endforeach ?> 
</section>



