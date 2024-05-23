<?php
use App\Models\ArticlesModel;
if(!isset($listParam['key-word'])) {
    $listParam['key-word'] = '';
}
?>
<section id="filter">
    <form action="/admin/manageArticles" method="get">
        <input type="text" name="key-word" id="key-word" placeholder="Rechercher un article" class="input-type-1" value="<?=$listParam['key-word'] != '' ?  $listParam['key-word'] : ''?>">
        <select name="year" id="year" class="input-type-1">
            <option value="0" selected>ANNÉE</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
        </select>
        <select name="month" id="month" class="input-type-1">
            <option value="0" selected>MOIS</option>
            <option value="1">JANVIER</option>
            <option value="2">FÉVRIER</option>
            <option value="3">MARS</option>
        </select>
        <button type="submit" class="button-type-2">OK</button>
    </form>
    <a href="../articles/add" class="button-type-2"><img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt="">ÉCRIRE UN ARTICLE</a>
</section>
<section id="list-articles" class="container-type-1">
    <h2>LISTE DES ARTICLES</h2>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>N°</th>
                <th>Date</th>
                <th>Catégorie</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Actions</th>
                <th>État</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($list as $article):?>
            <tr>
                <td>
                    <img src="<?=$article['img']->link_figure?>" alt="miniature" class="min">
                </td>
                <td>
                    <?=$article['data']->id_article?>
                </td>
                <td>
                    <?=ArticlesModel::frenchDateFormat($article['data']->date_article)?>
                </td>
                <td>
                    <?=$article['data']->name_cat?>
                </td>
                <td>
                    <a href="/articles/read/<?=$article['data']->id_article?>"><?=$article['data']->title_article?></a>
                </td>
                <td>
                    <?=$article['data']->first_name_user?>
                </td>
                <td>
                    <a href="/articles/modified/<?=$article['data']->id_article?>" title="modifier"><img src="/style/images/pictos/nav/pen-to-square-solid.svg" alt=""></a>
                    <img src="/style/images/pictos/buttons/trash-solid.svg" alt="" class="delete" data-link="/articles/deleteArticle/<?=$article['data']->id_article?>">
                </td>
                <td>
                    <?php if($article['data']->is_active_article): ?>
                        <div class="circle green"></div>
                    <?php else: ?>
                        <div class="circle red"></div>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</section>
<script src="/script/admin/delete.js"></script>