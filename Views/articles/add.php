<?php 
$listTags = [];

foreach($tags as $oneTag) {
    $listTags[] = $oneTag->id_tag;
}
//$link = "/articles/modified/".$id_article;

?>
<h2 class="title-type-1">ÉCRIRE UN ARTICLE</h2>

<section class="container-type-1">
    <form method="post" action="/articles/add" enctype="multipart/form-data">
        <div>
            <label for="title_article">TITRE DE L'ARTICLE</label>
            <input type="text" id="title_article" name="title_article" class="input-type-1" value="<?=$title_article;?>">
        </div>
        <div id="check-bloc">
            <label for="tags">TAGS</label>
            <?php foreach ($tags as $tag) : ?>
                <div>
                    <input type="checkbox" id="<?= $tag->name_tag ?>" name="tags[]" value="<?= $tag->id_tag ?>">
                    <label for="<?= $tag->name_tag ?>"><?= $tag->name_tag ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="bloc-file">
            <label for="first_figure">IMAGE 1</label>
            <input type="file" id="first_figure" name="first_figure" accept="image/png, image/jpeg">
        </div>
        <div class="alt-bloc" id="title-img-1">
            <label for="title_first_figure" class="mini-label">Titre de l'image</label>
            <input type="text" id="title_first_figure" name="title_first_figure" class="input-type-1 mini-input" value="<?=$title_first_figure;?>">
            <label for="alt_first_figure" class="mini-label">Alt de l'image</label>
            <input type="text" id="alt_first_figure" name="alt_first_figure" class="input-type-1 mini-input" value="<?=$alt_first_figure;?>">
        </div>
        <div id="file-img-2">
            <label for="second_figure">IMAGE 2</label>
            <input type="file" id="second_figure" name="second_figure" accept="image/png, image/jpeg">
        </div>
        <div class="alt-bloc" id="title-img-2">
            <label for="title_second_figure" class="mini-label">Titre de l'image</label>
            <input type="text" id="title_second_figure" name="title_second_figure" class="input-type-1 mini-input" value="<?=$title_second_figure;?>">
            <div class="alt-bloc">
                <label for="alt_second_figure" class="mini-label">Alt de l'image</label>
                <input type="text" id="alt_second_figure" name="alt_second_figure" class="input-type-1 mini-input" value="<?=$alt_second_figure;?>">
            </div>
        </div>
        <div id="file-img-3">
            <label for="last_figure">IMAGE 3</label>
            <input type="file" id="last_figure" name="last_figure" accept="image/png, image/jpeg">
        </div>
        <div class="alt-bloc" id="title-img-3">
            <label for="title_last_figure" class="mini-label">Titre de l'image</label>
            <input type="text" id="title_last_figure" name="title_last_figure" class="input-type-1 mini-input" value="<?=$title_last_figure;?>">
            <div class="alt-bloc">
                <label for="alt_last_figure" class="mini-label">Alt de l'image</label>
                <input type="text" id="alt_last_figure" name="alt_last_figure" class="input-type-1 mini-input" value="<?=$alt_last_figure;?>">
            </div>
        </div>
        <div>
            <label for="id_cat">CATÉGORIES</label>
            <select id="id_cat" name="id_cat" class="input-type-1">
            <?php foreach ($allCat as $cat) : ?>
                <option value="<?= $cat->id_cat ?>"><?= $cat->name_cat ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="intro_article">INTRODUCTION</label>
            <textarea id="intro_article" name="intro_article" class="input-type-1"><?=$intro_article;?></textarea>
        </div>
        <div>
            <label for="first_txt_article">TEXTE 1</label>
            <textarea id="first_txt_article" name="first_txt_article" class="input-type-1"><?=$first_txt_article;?></textarea>
        </div>
        <div>
            <label for="second_txt_article">TEXTE 2</label>
            <textarea id="second_txt_article" name="second_txt_article" class="input-type-1"><?=$last_txt_article;?></textarea>
        </div>
        <div>
            <label for="last_txt_article">TEXTE 3</label>
            <textarea id="last_txt_article" name="last_txt_article" class="input-type-1"><?=$last_txt_article;?></textarea>
        </div>
        <div id="bloc-btn">
            <button class="button-type-2" type="submit" name="save" value="1"><img src="/style/images/pictos/buttons/floppy-disk-solid.svg" alt="">SAUVEGARDER</button>
            <button type="submit" class="button-type-2" name="send" value="1"><img src="/style/images/pictos/buttons/paper-plane-solid.svg" alt="">PUBLIER</button>
        </div>
    </form>
</section>

