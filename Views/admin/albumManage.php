<section id="infos-album" class="container-type-1">
    <h2 class="title-type-1">Gestion de l'album</h2>

    <form action="/admin/albumManage/<?=$infosAlbum->id_gal?>" method="post" class="shadow-and-radius">
        <div>
            <label for="name_gal">Titre de l'album</label>
            <input type="text" name="name_gal" id="name_gal" class="input-type-1" value="<?=$infosAlbum->name_gal?>" required>
        </div>
        <div>
            <label for="description_gal">DESCRIPTION</label>
            <textarea name="description_gal" id="description_gal" class="input-type-1" cols="30" rows="10" required><?=$infosAlbum->description_gal?></textarea>
        </div>
        <div>
            <label for="localisation_gal">LOCALISATION</label>
            <input type="text" name="localisation_gal" id="localisation_gal" class="input-type-1" value="<?=$infosAlbum->localisation_gal?>" required>
        </div>
        <div>
            <label for="date_gal">DATE</label>
            <input type="date" name="date_gal" id="date_gal" class="input-type-1" value="<?=$infosAlbum->date_gal?>" required>
        </div>
        <input type="hidden" name="form" id="form" value="send">
        <a href="" class="button-type-2">AJOUTER DES PHOTOS</a>
        <button type="submit" class="button-type-2">VALIDER</button>
    </form>
    <div id="bloc-photos">
        <?php foreach ($allPhotos as $photo => $value): ?>

            <div class="card-photo shadow-and-radius">
                <img src="/<?=$value->link_photo?>" alt="<?=$value->alt_photo?>">
                <div class="bloc-btns">
                    <a href="/admin/photoManage/<?=$value->id_photo?>" class="button-type-2">MODIFIER</a>
                    <a href="#" class="button-type-2">SUPPRIMER</a>
                </div>

            </div>
        <?php endforeach?>
    </div>
</section>


