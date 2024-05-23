<?php
use App\Models\ArticlesModel;
?>
<h2 class="title-type-1">ACTUALITÉS</h2>
<form action="" method="get">
    <select name="cat" id="cat" class="select-type-1">
        <option value="0">Liste des catégories</option>
        <?php foreach($allCat as $cat) : ?>
            <option value="<?=$cat->id_cat?>" <?= $cat->id_cat == $valueURL ? 'selected': ''?> ><?=$cat->name_cat?></option> 
        <?php endforeach ?>
    </select> 
    <button type="submit" class="button-type-2">OK</button>
</form>
<section id="list-article">

    <?php foreach($list as $article):?>
    <article>
        <img src="<?=$article['img']->link_figure?>" alt="températures" class="img-news">
        <section>
            <div id="time-article">
                <div>
                    <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime="<?=$article['data']->date_article?>"><?=ArticlesModel::frenchDateFormat($article['data']->date_article)?></time>
                </div>
                <div>
                    <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#"><?=$article['data']->name_cat?></a>
                </div>
                <?php 
                    foreach ($listTagAllArticles[$article['data']->id_article]['names'] as $val) {  ?>
                    <div class="tag-article <?=$colorTag[$listTagAllArticles[$article['data']->id_article]['id'][$val]]?>">
                        <a href="#"><?=$val?></a>
                    </div>
                <?php } ;?>
            </div>
            </div>
            <div>
                <h1><?=$article['data']->title_article?></h1>
                <p>
                    <?=$article['data']->intro_article?>
                </p>
            </div>
        </section>
        <a href="/articles/read/<?=$article['data']->id_article?>" title="Lire l'article" class="button-type-1">LIRE</a>
    </article>
    <?php endforeach ?>
</section>


