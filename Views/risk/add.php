<section id="bloc-form" class="container-type-1">
    <h2 class="title-type-1">CRÉATION DU RISQUE</h2>

    <form action="#" method="post" enctype="multipart/form-data">
        <div>
            <label for="start_alert">Date et heure de début:</label>
            <input type="datetime-local" name="start_alert" id="start_alert" required >
        </div> 
        <div>
            <label for="end_alert">Date et heure de fin:</label>
            <input type="datetime-local" name="end_alert" id="end_alert" required >
        </div>
        <div>
            <label for="id_type">Type de risque</label>
            <select name="id_type" id="id_type" class="input-type-1">
                <option value="0" selected>Liste des types</option>
                <option value="1">ORAGES</option>
                <option value="2">PLUIE</option>
                <option value="3">VENT</option>
                <option value="4">CHALEUR</option>
            </select>
        </div>
        <div>
            <label for="description_alert">Synthèse:</label>
            <textarea name="description_alert" id="description_alert" cols="30" rows="10" required class="input-type-1"></textarea>
        </div>
        <div>
            <label for="img_alert">Carte:</label>
            <input type="file" name="img_alert" id="img_alert" accept="image/png, image/jpeg" class="input-type-1">
        </div>
        <div id="bloc-btns">
            <button type="submit" name="save" class="button-type-2" value="true">SAUVEGARDER</button>
            <button type="submit" name="send" class="button-type-2"" value="true">PUBLIER</button>
        </div>
    </form>
</section>