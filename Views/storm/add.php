<div id="loader">
    <p>Traitement en cours ...</p>
</div>
<section class="container-type-1">
    <h2>NOUVEL ALBUM DE CHASSE</h2>
    <form action="/storm/addAlbum" method="post" enctype="multipart/form-data">
        <div>
            <label for="name_gal">TITRE DE L'ALBUM</label>
            <input type="text" name="name_gal" id="name_gal" class="input-type-1" required>
        </div>
        <div>
            <label for="description_gal">DESCRIPTION</label>
            <textarea name="description_gal" id="description_gal" class="input-type-1" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <label for="localisation_gal">LOCALISATION</label>
            <input type="text" name="localisation_gal" id="localisation_gal" class="input-type-1" required>
        </div>
        <div>
            <label for="date_gal">DATE</label>
            <input type="date" name="date_gal" id="date_gal" class="input-type-1" required>
        </div>
        <div>
            <label for="files">ENVOI DES IMAGES (10 photos max dont 10Mo par photo)</label>
            <input type="file" name="files[]" multiple id="files" required>
        </div>
        <input type="hidden" name="id_user" id="id_user" value=<?=$_SESSION['user']['id'];?>>
        <input type="hidden" name="form" id="form" value="send">
        <button type="submit" class="button-type-2">SUIVANT</button>
    </form>
</section>
<script src="/script/admin/loader.js"></script>