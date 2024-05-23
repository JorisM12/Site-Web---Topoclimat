<?php

namespace App\Controllers;

use App\Models\AlertsModel;
use App\Models\ArticlesModel;
use App\Models\ArticleXTagModel;
use App\Models\CategoriesModel;
use App\Models\FiguresModel;
use App\Models\GalleryModel;

class MainController extends Controller
{
    public function index()
    {
        $alertModel = new AlertsModel;
        $categoriesModel = new CategoriesModel;
        $articleModel = new ArticlesModel;
        $allCat = $categoriesModel->findAll();
        $colorTag = [3 => 'red-tag', 4 => 'cold-tag', 1 => 'storm-tag', 6 => 'weather-tag', 2 =>'rain-tag', 5 =>'snow-tag', 7 =>'wind-tag'];
        $listArticles = $articleModel->getFullInfoListArticlesMain();
        $figureModel = new FiguresModel;
        $tagModel = new ArticleXTagModel;
        $img = $figureModel->requete("SELECT * FROM figures WHERE num_figure = 1 AND size_figure = 'L' ORDER BY id_article DESC");
        $imgs = $img->fetchAll();
        $list = [];
        foreach ($listArticles as $article) {
            foreach ($imgs as $pic) {
                if($pic->id_article === $article->id_article)
                {
                    $list[$article->id_article] = ['data' => $article,'img' =>$pic];
                }
            }
            $tags = $tagModel->listTag($article->id_article);
            $listTag = [];
            $listIdTag = [];
            $listNameTag = [];
            foreach ($tags as $tag => $value) {
                $listNameTag[$tag] = $value->name_tag;
                $listIdTag[$value->name_tag] = $value->id_tag;
            }
            $listTag['names'] = $listNameTag;
            $listTag['id'] = $listIdTag;
            $listTagAllArticles[$article->id_article] = $listTag;
        }
        $galleryModel = new GalleryModel;
        $allPhotos = $galleryModel->requete("SELECT * FROM photography
        INNER JOIN gallery ON gallery.id_gal = photography.id_gal
        WHERE is_storm = 0 AND size_photo = 'XL' ORDER BY gallery.date_gal DESC LIMIT 7")->fetchAll();
        $alert = $alertModel->getFullInfo();
        $nameCSS = 'home';
        $titlePage = 'Accueil';
        $this->render('main/index',compact('nameCSS','titlePage','list','allPhotos','alert','listTagAllArticles','colorTag'),"template");
    }
    public function forcastCity()
    {
        $nameCSS = 'forcast';
        $titlePage = 'Rechercher une ville';
        $this->render('main/forcastCity',compact('nameCSS','titlePage'),"template");

    }
    public function stop()
    {
        $nameCSS = 'stop';
        $titlePage = 'Site en construction';
        phpinfo();
        exit;
        $this->render('main/stop',compact('nameCSS','titlePage'),"template");
    }
    public function prototype()
    {
        $_SESSION['secret'] = true;
        header('Location: /');
    }
}



