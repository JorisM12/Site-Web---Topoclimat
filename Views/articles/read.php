<?php
use App\Models\ArticlesModel;
$index = 0;
?>
<section>
    <article class="container-type-1">
        <header>
            <h1 class="title-type-1"><?=$article->title_article?></h1>
            <div id="article-time">
                <div>
                    <img src="/style/images/pictos/elements/time.svg" alt=""><time datetime="<?=$article->date_article?>"><?= ArticlesModel::frenchDateFormat($article->date_article) ?></time>
                </div>
                <div>
                    <img src="/style/images/pictos/elements/folder.svg" alt=""> <a href="#"><?=$article->name_cat ?></a>
                </div>
                <?php foreach ($listTag['id'] as $val) { ?>
                    <div class="tag-article <?=$colorTag[$val]?>">
                        <a href="#"><?=$listTag['names'][$index]?></a>
                    </div>
                <?php $index++; } ;?>
            </div>
            <p>
                <?=$article->intro_article?>
            </p>
        </header>
        <section>
            <div>
                <figure data-num="1">
                    <div>
                        <div class="img-zoom">
                            <img src="/style/images/pictos/buttons/glass.svg" alt="zoom">
                        </div>
                        <img src="/<?=$list_figures['1']->link_figure ?>" alt="<?=$list_figures['1']->alt_figure ?>" data-num="1" class="img">
                    </div>
                    <figcaption><?=$list_figures['1']->legend_figure ?></figcaption>
                </figure>
                <p>
                    <?=$article->first_txt_article?>
                </p>
            </div>
            <div>
                <figure data-num="2">
                    <div>
                        <div class="img-zoom">
                            <img src="/style/images/pictos/buttons/glass.svg" alt="zoom">
                        </div>
                        <img src="/<?=$list_figures['2']->link_figure ?>" alt="<?=$list_figures['2']->alt_figure ?>" data-num="2" class="img">
                    </div>
                    <figcaption><?=$list_figures['2']->legend_figure ?></figcaption>
                </figure>
                <p>
                    <?=$article->second_txt_article?>
                </p>
            </div>
            <div>
                <figure data-num="3">
                    <div>
                        <div class="img-zoom">
                            <img src="/style/images/pictos/buttons/glass.svg" alt="zoom">
                        </div>
                        <img src="/<?=$list_figures['3']->link_figure ?>" alt="<?=$list_figures['1']->alt_figure ?>" data-num="3" class="img">
                    </div>
                    <figcaption><?=$list_figures['3']->legend_figure ?></figcaption>
                </figure>
                <p>
                    <?=$article->last_txt_article?>
                </p>
            </div>
        </section>
    </article>
</section>
<script>
    const id = <?=$article->id_article?>
</script>
<script src="/script/photo/zoom-img-article.js"></script>





