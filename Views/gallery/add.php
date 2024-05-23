
<section class="container-type-1">
    <h2>AJOUTER DES PHOTOS</h2>
    <form action="/gallery/addAlbum" method="post" enctype="multipart/form-data">
        <div>
            <label for="name_gal">TITRE DE L'ALBUM</label>
            <input type="text" name="name_gal" id="name_gal">
        </div>
        <div>
            <label for="description_gal">DESCRIPTION</label>
            <input type="text" name="description_gal" id="description_gal">
        </div>
        <div>
            <label for="localisation_gal">LOCALISATION</label>
            <input type="text" name="localisation_gal" id="localisation_gal">
        </div>
        <div>
            <label for="date_gal">DATE</label>
            <input type="date" name="date_gal" id="date_gal">
        </div>
        <div>
            <label for="id_theme">THÈME</label>
            <select name="id_theme" id="id_theme">
                <option value="0" selected>SÉLÉCTIONNER UN THÈME</option>
                <?php foreach ($allThemes as $theme => $value): ?>
                    <option value="<?=$value->id_theme?>"><?=$value->name_theme?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="files">ENVOIE DES IMAGES</label>
            <input type="file" name="files[]" multiple id="files">
        </div>
        <input type="hidden" name="id_user" id="id_user" value=<?=$_SESSION['user']['id'];?>>
        <button type="submit" class="button-type-2">SUIVANT</button>
    </form>
</section>