<section class="container-type-1">
    <h2 class="title-type-1">Générer une infographie</h2>

    <form action="#" method="get">
        <div>
            <label for="type_info">Type</label>
            <select name="type_info" id="type_info">
                <option value="0" selected>Selectionnez un type</option>
                <option value="1">Orage</option>
                <option value="2">Pluie</option>
                <option value="3">Vent</option>
            </select>
        </div>
        <div>
            <label for="sector_info">Secteurs</label>
            <input type="text" id="sector_info" name="sector_info" class="input-type-1" required>
        </div>
        <div>
            <label for="date_info">Dates</label>
            <input type="text" id="date_info" name="date_info" class="input-type-1" required>
        </div>
        <div>
            <label for="description_info">Resumé</label>
            <textarea name="sector_info" id="sector_info"  class="input-type-1" required ></textarea>
        </div>
        <button type="submit" class="button-type-2">GÉNERER</button>
    </form>
</section>