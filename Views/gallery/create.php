<?php
    $index = 0;
?>
<div id="loader">
    <p>Traitement en cours ...</p>
</div>
<section class="container-type-1">
    <h2>CRÉATION DE L'ALBUM</h2>
    <form action="createAlbum" method="post">
    <?php foreach ($listImgs as $img => $value): ?>
        <div class="card-photo">
            <img src=<?='/style/images/download/gallery/albums/tmp/'.$value?> alt="">
            <div class="details-photo">
                <div class="title">
                    <label for="title_photo-<?=$img?>">TITRE</label>
                    <input type="text" id="title_photo-<?=$img?>" name="photo[<?=$img?>][title_photo]" class="input-type-1" required>
                </div>
                <div class="coords" data-bloc="<?=$img?>">
                    <div>
                        <label for="lat-photo-<?=$img?>">Latitude</label>
                        <input type="text" name="photo[<?=$img?>][lat-photo]" id="lat-photo-<?=$img?>"  value="" class="input-type-1" required>
                    </div>
                    <div>
                        <label for="lon-photo-<?=$img?>">Longitude</label>
                        <input type="text" name="photo[<?=$img?>][lon-photo]" id="lon-photo-<?=$img?>" value="" class="input-type-1" required> 
                    </div>
                    <div class="location">
                        <img src="/style/images/pictos/elements/location.png" alt="" srcset="" data-loc="<?=$img?>"">
                    </div>
                </div>
                <div>
                    <label for="alt-photo-<?=$img?>">Alt de la photo</label>
                    <input type="text" id="alt-photo-<?=$img?>" name="photo[<?=$img?>][alt-photo]" class="input-type-1" required>
                </div>
                <div class="description">
                    <label for="description_photo-<?=$img?>">Description</label>
                    <textarea name="photo[<?=$img?>][description_photo]" id="description_photo-<?=$img?>" cols="30" rows="10" class="input-type-1" required></textarea> 
                </div>
                <div class="check">
                    <input type="checkbox" id="is_active_photo-<?=$img?>" name="photo[<?=$img?>][is_active_photo]" checked />
                    <label for="is_active_photo-<?=$img?>">Photo visible</label>
                </div>
                <div class="check">
                    <input type="checkbox" id="is_delete_photo-<?=$img?>" name="photo[<?=$img?>][is_delete_photo]" />
                    <label for="is_active_photo-<?=$img?>">Supprimer la photo</label>
                </div>
                <input type="hidden" name="photo[<?=$img?>]['data']" value="<?='/style/images/download/gallery/albums/tmp/'.$value?>">
            </div>
        </div>
        <?php
        $index++;
        ?>
    <?php endforeach ?>
        <button type="submit" class="button-type-2">PUBLIER</button>
    </form>
</section>
<script src="/script/admin/loader.js"></script>
<script src="/script/photo/mini-map.js"></script>