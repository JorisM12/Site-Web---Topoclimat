<h2>Carte intéractive des photographies de chasse de l'année <?=$year?></h2>
<div id="map">
</div>
<script>
  const links = new Object;
  let photo = [];
  let index = 0;
  <?php foreach ($linksMap as $link => $value):?>
    photo.push("<?=$value['link']?>");
    photo.push(<?=$value['coords_photo']?>);
    photo.push(<?=$value['id_photo']?>);
    photo.push(<?=$value['year']?>);
    links[index]  = photo;
    photo = [];
    index++;
  <?php endforeach ?>
</script>
<script src="/script/photo/map-all-photos.js"></script>