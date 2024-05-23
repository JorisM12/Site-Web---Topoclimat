<div id="loader">
    <p>Traitement en cours ...</p>
</div>
<section class="container-type-1">
    <h2>AJOUT DE PHOTO SUPPLÉMENTAIRES</h2>
    <form action="/storm/otherPhotosInAlbum" method="post" enctype="multipart/form-data">
        <div>
            <label for="files">ENVOI DES IMAGES (10 photos max dont 10Mo par photo)</label>
            <input type="file" name="files[]" multiple id="files" required>
        </div>
        <input type="hidden" name="id_user" id="id_user" value=<?=$_SESSION['user']['id'];?>>
        <input type="hidden" name="form" id="form" value="send">
        <button type="submit" class="button-type-2" style="margin: 15px; height: 40px; width: 100px;">ENVOYER</button>

        <a href="/storm/createStormAlbum" class="button-type-2" style="margin: 15px; width: 150px; height: 50px; margin-left: auto; margin-right: auto;">TERMINER L'ALBUM</a>
        
    </form>
</section>
<script src="/script/admin/loader.js"></script>