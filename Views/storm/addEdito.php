<?php 
if(isset($_SESSION['numEdito'])) {
    $num = $_SESSION['numEdito'];
}else{
    $num = 0;
}
var_dump($num);
?>
<section id="bloc-form">
    <h2>Créer un édito</h2>
    <form action="/storm/addEdito/<?=$num?>" method="post" enctype="multipart/form-data">
        <?php if($num == 0):?>
        <div>
            <label for="title_edito">Titre de l'édito</label>
            <input type="text" id="title_edito" name="title_edito" class="input-type-1" required>
        </div>
        <div>
            <label for="date_edito">Date de l'édito</label>
            <input type="date" id="date_edito" name="date_edito"  class="input-type-1" required>
        </div>
        <?php endif?>
        <div>
            <label for="description_edito">Description du jour</label>
            <textarea name="description_edito" id="description_edito" cols="30" rows="10"  class="input-type-1" required></textarea>
        </div>
        <div>
            <label for="loc_edito">Localisation</label>
            <input type="text" id="loc_edito" name="loc_edito"  class="input-type-1" required>
        </div>
        <div>
            <label for="photo_edito">Photo de l'édito</label>
            <input type="file" id="photo_edito" name="photo_edito"  class="input-type-1" accept="image/png, image/jpeg" required>
        </div>
        <input type="hidden" name="form" value="send">
        <button  class="button-type-2" name="addSection" value=true>Ajouter une autre section</button>
        <button type="submit" class="button-type-2" name="valid" value="valid">VALIDER</button>
    </form>
</section>

<div id="map" style="height: 500px; width: 500px; color: black; margin-left: auto;margin-right: auto;"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
const mymap = L.map('map').setView([37.7749, -122.4194], 10); 
const inputLoc = document.querySelector('#loc_edito');
let geocoder = L.Control.geocoder({
  defaultMarkGeocode: false,
  placeholder: "Rechercher une ville",
  collapsed: false,
  geocoder: L.Control.Geocoder.nominatim({
    geocodingQueryParams: {
      countrycodes: 'us' 
    }
  })
}).addTo(mymap);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(mymap);
geocoder.on('markgeocode', function(event) {
  let result = event.geocode;
  let coordonnees = result.center; 
  console.log("Coordonnées de la ville sélectionnée :", coordonnees.lng);
  inputLoc.setAttribute('value',[coordonnees.lat,coordonnees.lng]);
  mymap.setView(coordonnees, 10); 
});
</script>