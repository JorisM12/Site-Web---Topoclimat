
<section id="all-photo" class="container-type-1">
    <h2 class="title-type-1"><?=$mainTitle?></h2>
    <div>
        <?php foreach ($allPhotos as $photo => $value): ?>
            <img src="/<?=$value->link_photo ?>" alt="<?=$value->alt_photo ?>" class="shadow-and-radius" data-name="<?=$value->name_photo?>">
        <?php endforeach ?>
    </div>
</section>

<script>
    const id = <?=$id_gal?>
</script>
<script src="/script/photo/zoom-album.js"></script>