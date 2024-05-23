<?php 
use App\Models\ArticlesModel;
?>
<section id="list-album" class="container-type-1">
    <h2 class="title-type-1">Liste des albums</h2>
    <a href="/storm/addAlbum" title="Créer un album" class="button-type-2" id="link-add">CRÉER UN ALBUM</a>
    <div id="bloc-list">
        <?php foreach ($allAlbum as $album => $value):?>
            <div class="card-album shadow-and-radius">
            <a href="#" target="_blank"><h3><?=$value->name_gal?></h3></a>
            <img src="/style/images/storm/photo_orages_accueil.webp" alt="Couverture de l'album">
            <p>
                <?=$value->description_gal?>
            </p>
            <time><?=ArticlesModel::frenchDateFormat($value->date_gal)?></time>
            <div class="bloc-btns">
                <a href="/admin/albumManage/<?=$value->id_gal?>" target="_blank" title="Modifier" class="button-type-2">MODIFIER</a>
                <?php if($value->is_active_gal):?>
                    <a href="/admin/activeAlbum/1/<?=$value->id_gal?>" title="Supprimer" class="button-type-2">DÉSACTIVER</a>
                <?php else: ?>
                    <a href="/admin/activeAlbum/0/<?=$value->id_gal?>" title="Supprimer" class="button-type-2 active">ACTIVER</a>
                <?php endif ?>

            </div>
        </div>
        <?php endforeach?>
    </div>
</section>