<section class="container-type-1">
    <h1 class="title-type-1">Ajout de nouvelles photos</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            <label for="files">ENVOIE DES IMAGES</label>
            <input type="file" name="files[]" multiple id="files" required>
        </div>
        <input type="hidden" name="form" id="form" value="send">
        <button type="submit" class="button-type-2">SUIVANT</button>
    </form>
</section>