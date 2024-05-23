<?php
namespace App\Controllers;
use App\Core\Image;
use App\Controllers\AdminController;
use App\Models\CategoriesModel;
use App\Models\FiguresModel;
use App\Models\TagModel;
use App\Core\Form;
use App\Models\ArticlesModel;
use App\Models\ArticleXTagModel;

class ArticlesController extends Controller
{
    public function index()
    {
        $valueURL = 0;
        $colorTag = [3 => 'red-tag', 4 => 'cold-tag', 1 => 'storm-tag', 6 => 'weather-tag', 2 =>'rain-tag', 5 =>'snow-tag', 7 =>'wind-tag'];
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,'?')) {
            $url = explode('?',$uri);
            $valueURL = explode('=',$url[1]);
            $valueURL = $valueURL[1];
        }
        $categoriesModel = new CategoriesModel;
        $articleModel = new ArticlesModel;
        $allCat = $categoriesModel->findAll();
        $listArticles = $articleModel->getFullInfoListArticles(0,$valueURL);
        $figureModel = new FiguresModel;
        $imgs = $figureModel->getImgForListArticle();
        $list = [];
        $listTagAllArticles = [];


        $tagModel = new ArticleXTagModel;

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
        $nameCSS = 'news';
        $titlePage = 'Actualités';
        $this->render('articles/index',compact('nameCSS','titlePage','allCat','listArticles','list','value','valueURL','listTagAllArticles','colorTag'),'template');
    }

    /**
     * Créer un article
     *
     * @return void
     */
    public function add()
    {
        if(AdminController::isAdmin())
        {
            //On vérifie si le formulaire est complet 
            if (Form::validate($_POST, ['title_article', 'title_first_figure', 'alt_first_figure', 'title_second_figure', 'alt_second_figure', 'title_last_figure', 'alt_last_figure', 'id_cat', 'intro_article', 'first_txt_article', 'second_txt_article', 'last_txt_article'])) {
                //Si le formulaire est complet
                //On se protège contre les failles XSS
                $title_article = strip_tags($_POST['title_article']);
                $intro_article = strip_tags($_POST['intro_article']);
                $title_first_figure = strip_tags($_POST['title_first_figure']);
                $alt_first_figure = strip_tags($_POST['alt_first_figure']);
                $title_second_figure = strip_tags($_POST['title_second_figure']);
                $alt_second_figure = strip_tags($_POST['alt_second_figure']);
                $title_last_figure = strip_tags($_POST['title_last_figure']);
                $alt_last_figure = strip_tags($_POST['alt_last_figure']);
                $id_cat = strip_tags($_POST['id_cat']);
                $first_txt_article = strip_tags($_POST['first_txt_article']);
                $second_txt_article = strip_tags($_POST['second_txt_article']);
                $last_txt_article = strip_tags($_POST['last_txt_article']);
        
                //On instancie notre modèle 
                $articles = new ArticlesModel;
                //On hydrate 
                $articles->setTitle_article($title_article);
                $articles->setIntro_article($intro_article);
                $articles->setId_cat($id_cat);
                $articles->setFirst_txt_article($first_txt_article);
                $articles->setSecond_txt_article($second_txt_article);
                $articles->setLast_txt_article($last_txt_article);
                $articles->setId_user($_SESSION['user']['id']);
                if(isset($_POST['save']) && $_POST['save'] == '1') {
                    $articles->setIs_active_article(0);
                }elseif(isset($_POST['send']) && $_POST['send'] == '1') {
                    $articles->setIs_active_article(1);
                }else{
                    $_SESSION['error'] = "Erreur dans la création de l'article";
                    header('location: articles/add');
                    exit;
                }
                //On enregistre 
                $articles->create();
                $id_article = $articles->findLastId();

                foreach ($_POST['tags'] as $tag => $value) {
                    $tag =  new ArticleXTagModel;
                    $tag->setId_article($id_article);
                    $tag->setId_tag(strip_tags($value));
                    $tag->create();
                }
                //Enregistrement des trois tailles des images de l'article
                $figureModel = new FiguresModel;
                $ImgSizes = ['M' =>['500','750'],'L' => ['1000','1500'], 'XL' => ['2000','3000']];
                //Première figure

                foreach ($ImgSizes as $size => $sizeValue) {
                    $link = Image::saveImageArticle($_FILES['first_figure'],$title_first_figure,$size,$sizeValue);
                    $figureModel->setNum_figure(1);
                    $figureModel->setTitle_figure($title_first_figure);
                    $figureModel->setLegend_figure($alt_first_figure);
                    $figureModel->setSize_figure($size);
                    $figureModel->setLink_figure($link);
                    $figureModel->setId_article($id_article);
                    $figureModel->create();
                }
                //2e figure 
                foreach ($ImgSizes as $size => $sizeValue) {
                    $link = Image::saveImageArticle($_FILES['second_figure'],$title_second_figure,$size,$sizeValue);
                    $figureModel->setNum_figure(2);
                    $figureModel->setTitle_figure($title_second_figure);
                    $figureModel->setLegend_figure($alt_second_figure);
                    $figureModel->setSize_figure($size);
                    $figureModel->setLink_figure($link);
                    $figureModel->setId_article($id_article);
                    $figureModel->create();
                }
                //3e figure 

                foreach ($ImgSizes as $size => $sizeValue) {
                    $link = Image::saveImageArticle($_FILES['last_figure'],$title_last_figure,$size,$sizeValue);
                    $figureModel->setNum_figure(3);
                    $figureModel->setTitle_figure($title_last_figure);
                    $figureModel->setLegend_figure($alt_last_figure);
                    $figureModel->setSize_figure($size);
                    $figureModel->setLink_figure($link);
                    $figureModel->setId_article($id_article);
                    $figureModel->create();
                }
                //On redirige 
                $_SESSION['message'] = "Votre article a été enregistré avec succès";
                header('Location: /articles');
                exit;
                }else{
                    //Incomplet , permet de garder les champs déjà remplis
                    $description = isset($_POST['description']) ? strip_tags($_POST['description']) : '';
                    $title_article = isset($_POST['title_article']) ? strip_tags($_POST['title_article']) : '';
                    $intro_article = isset($_POST['intro_article']) ? strip_tags($_POST['intro_article']) : '';
                    $title_first_figure = isset($_POST['title_first_figure']) ? strip_tags($_POST['title_first_figure']) : '';
                    $alt_first_figure = isset($_POST['alt_first_figure']) ? strip_tags($_POST['alt_first_figure']) : '';
                    $title_second_figure = isset($_POST['title_second_figure']) ? strip_tags($_POST['title_second_figure']) : '';
                    $alt_second_figure = isset($_POST['alt_second_figure']) ? strip_tags($_POST['alt_second_figure']) : '';
                    $title_last_figure = isset($_POST['title_last_figure']) ? strip_tags($_POST['title_last_figure']) : '';
                    $alt_last_figure = isset($_POST['alt_last_figure']) ? strip_tags($_POST['alt_last_figure']) : '';
                    $id_cat = isset($_POST['id_cat']) ? strip_tags($_POST['id_cat']) : '';
                    $first_txt_article = isset($_POST['first_txt_article']) ? strip_tags($_POST['first_txt_article']) : '';
                    $second_txt_article = isset($_POST['second_txt_article']) ? strip_tags($_POST['second_txt_article']) : '';
                    $last_txt_article = isset($_POST['last_txt_article']) ? strip_tags($_POST['last_txt_article']) : '';
                }
                $nameCSS = 'addArticle';
                $titlePage = 'Ajouter un article';

                $tagModel= new TagModel();
                $catModel = new CategoriesModel();
                $allCat = $catModel->findAll();
                $tags = $tagModel->findAll();
                $this->render('articles/add', compact('tags','allCat','titlePage','nameCSS', 'description', 'title_article', 'intro_article', 'title_first_figure', 'alt_first_figure', 'title_second_figure', 'alt_second_figure', 'title_last_figure', 'alt_last_figure', 'id_cat', 'first_txt_article', 'second_txt_article', 'last_txt_article'), 'template_admin');
        }else{
            $_SESSION['error'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /');
            exit;
        }
    }

    public function addSimple()
    {
        if(AdminController::isAdmin())
        {
            //On vérifie si le formulaire est complet 
            if (Form::validate($_POST, ['title_article', 'title_first_figure', 'alt_first_figure', 'id_cat', 'intro_article', 'first_txt_article'])) {
                //Si le formulaire est complet
                //On se protège contre les failles XSS
                $title_article = strip_tags($_POST['title_article']);
                $intro_article = strip_tags($_POST['intro_article']);
                $title_first_figure = strip_tags($_POST['title_first_figure']);
                $alt_first_figure = strip_tags($_POST['alt_first_figure']);
                $id_cat = strip_tags($_POST['id_cat']);
                $first_txt_article = strip_tags($_POST['first_txt_article']);

                $articles = new ArticlesModel;

                $articles->setTitle_article($title_article);
                $articles->setIntro_article($intro_article);
                $articles->setId_cat($id_cat);
                $articles->setFirst_txt_article($first_txt_article);
                $articles->setId_user($_SESSION['user']['id']);
                $articles->setIs_simple_article(1);
                if(isset($_POST['save']) && $_POST['save'] == '1') {
                    $articles->setIs_active_article(0);
                }elseif(isset($_POST['send']) && $_POST['send'] == '1') {
                    $articles->setIs_active_article(1);
                }else{
                    $_SESSION['error'] = "Erreur dans la création de l'article";
                    header('location: articles/add');
                    exit;
                }
                //On enregistre 
                $articles->create();
                $id_article = $articles->findLastId();

                foreach ($_POST['tags'] as $tag => $value) {
                    $tag =  new ArticleXTagModel;
                    $tag->setId_article($id_article);
                    $tag->setId_tag(strip_tags($value));
                    $tag->create();
                }

                $figureModel = new FiguresModel;
                $ImgSizes = ['M' =>['500','750'],'L' => ['1000','1500'], 'XL' => ['2000','3000']];


                foreach ($ImgSizes as $size => $sizeValue) {
                    $link = Image::saveImageArticle($_FILES['first_figure'],$title_first_figure,$size,$sizeValue);
                    $figureModel->setNum_figure(1);
                    $figureModel->setTitle_figure($title_first_figure);
                    $figureModel->setLegend_figure($alt_first_figure);
                    $figureModel->setSize_figure($size);
                    $figureModel->setLink_figure($link);
                    $figureModel->setId_article($id_article);
                    $figureModel->create();
                }
                $_SESSION['message'] = "Votre article a été enregistré avec succès";
                header('Location: /articles');
                exit;
                } else{
                    //Incomplet , permet de garder les champs déjà remplis
                    $description = isset($_POST['description']) ? strip_tags($_POST['description']) : '';
                    $title_article = isset($_POST['title_article']) ? strip_tags($_POST['title_article']) : '';
                    $intro_article = isset($_POST['intro_article']) ? strip_tags($_POST['intro_article']) : '';
                    $title_first_figure = isset($_POST['title_first_figure']) ? strip_tags($_POST['title_first_figure']) : '';
                    $alt_first_figure = isset($_POST['alt_first_figure']) ? strip_tags($_POST['alt_first_figure']) : '';
                    $id_cat = isset($_POST['id_cat']) ? strip_tags($_POST['id_cat']) : '';
                    $first_txt_article = isset($_POST['first_txt_article']) ? strip_tags($_POST['first_txt_article']) : '';
                }
            $nameCSS = 'addArticle';
            $titlePage = 'Ajouter un article';
            $tagModel= new TagModel();
            $catModel = new CategoriesModel();
            $allCat = $catModel->findAll();
            $tags = $tagModel->findAll();
            $this->render('articles/addSimple', compact('tags','allCat','titlePage','nameCSS', 'description', 'title_article', 'intro_article', 'title_first_figure', 'alt_first_figure', 'id_cat','first_txt_article'), 'template_admin');
        }
    }

    /**
     * Affiche un article
     *
     * @param integer $id_article Id de l'article à afficher
     * @return void
     */
    public function read(int $id_article)
    {
        $articleModel =  new ArticlesModel;
        $article= $articleModel->getFullInfoArticle($id_article);
        $colorTag = [3 => 'red-tag', 4 => 'cold-tag', 1 => 'storm-tag', 6 => 'weather-tag', 2 =>'rain-tag', 5 =>'snow-tag', 7 =>'wind-tag'];
        if($article->is_simple_article == true) {
            $figureModel = new FiguresModel;
            $list_figures = [];
            $list_figures['1'] = $figureModel->getFigureForArticle($id_article,1)->fetch();
            $tagModel = new ArticleXTagModel;
            $tags = $tagModel->listTag($id_article);
            $listTag = [];
            $listIdTag = [];
            $listNameTag = [];
            foreach ($tags as $tag => $value) {
                $listNameTag[$tag] = $value->name_tag;
                $listIdTag[] = $value->id_tag;
            }
            $listTag['names'] = $listNameTag;
            $listTag['id'] = $listIdTag;
            $nameCSS = 'articleSimple';
            $titlePage = 'Article du jour';


            $this->render('articles/readSimple', compact('titlePage','nameCSS','article','list_figures','tags','listTag','colorTag'), 'template');
            exit;
        }
        $figureModel = new FiguresModel;
        $firstFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 1 AND size_figure = 'L' ");
        $secondFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 2 AND size_figure = 'L' ");
        $lastFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 3 AND size_figure = 'L' ");
        $list_figures = [];
        $list_figures['1'] = $figureModel->getFigureForArticle($id_article,1)->fetch();
        $list_figures['2'] = $figureModel->getFigureForArticle($id_article,2)->fetch();
        $list_figures['3'] = $figureModel->getFigureForArticle($id_article,3)->fetch();
        $tagModel = new ArticleXTagModel;
        $tags = $tagModel->listTag($id_article);
        $listTag = [];
        $listIdTag = [];
        $listNameTag = [];
        foreach ($tags as $tag => $value) {
            $listNameTag[$tag] = $value->name_tag;
            $listIdTag[] = $value->id_tag;
        }
        $listTag['names'] = $listNameTag;
        $listTag['id'] = $listIdTag;
        $nameCSS = 'article';
        $titlePage = 'Article du jour';
        $this->render('articles/read', compact('titlePage','nameCSS','article','list_figures','tags','listTag','colorTag'), 'template');
    }

    public function zoomImg(int $id, int $num)
    {
        $articleModel = new ArticlesModel;
        $link = $articleModel->getZoomImg($num,$id);
        echo json_encode($link);
    }

    public function modified(int $id_article)
    {
        if(AdminController::isAdmin())
        {
            $articleModel =  new ArticlesModel;
            $article= $articleModel->getFullInfoArticle($id_article);
            $figureModel = new FiguresModel;
            $firstFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 1 AND size_figure = 'M' ");
            $secondFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 2 AND size_figure = 'M' ");
            $lastFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $article->id_article AND num_figure = 3 AND size_figure = 'M' ");
            $list_figures = [];
            $list_figures['1'] = $firstFigure->fetch();
            $list_figures['2'] = $secondFigure->fetch();
            $list_figures['3'] = $lastFigure->fetch();
            $figure = [];
            $figures['1']['id'] = $list_figures['1']->id_figure;
            $figures['1']['link'] = $list_figures['1']->link_figure;
            $figures['2']['id'] = $list_figures['2']->id_figure;
            $figures['2']['link'] = $list_figures['2']->link_figure;
            $figures['3']['id'] = $list_figures['3']->link_figure;
            $figures['3']['link'] = $list_figures['3']->link_figure;
        
        if (Form::validate($_POST, ['title_article', 'title_first_figure', 'alt_first_figure', 'title_second_figure', 'alt_second_figure', 'title_last_figure', 'alt_last_figure', 'id_cat', 'intro_article', 'first_txt_article', 'second_txt_article', 'last_txt_article'])) {
                $title_article = strip_tags($_POST['title_article']);
                $intro_article = strip_tags($_POST['intro_article']);
                $title_first_figure = strip_tags($_POST['title_first_figure']);
                $alt_first_figure = strip_tags($_POST['alt_first_figure']);
                $title_second_figure = strip_tags($_POST['title_second_figure']);
                $alt_second_figure = strip_tags($_POST['alt_second_figure']);
                $title_last_figure = strip_tags($_POST['title_last_figure']);
                $alt_last_figure = strip_tags($_POST['alt_last_figure']);
                $id_cat = strip_tags($_POST['id_cat']);
                $first_txt_article = strip_tags($_POST['first_txt_article']);
                $second_txt_article = strip_tags($_POST['second_txt_article']);
                $last_txt_article = strip_tags($_POST['last_txt_article']);
        

                $articles = new ArticlesModel;

                $articles->setTitle_article($title_article);
                $articles->setIntro_article($intro_article);
                $articles->setId_cat($id_cat);
                $articles->setFirst_txt_article($first_txt_article);
                $articles->setSecond_txt_article($second_txt_article);
                $articles->setLast_txt_article($last_txt_article);
                $articles->setId_user($_SESSION['user']['id']);
                $articles->update($id_article,'id_article');
                $figureModel = new FiguresModel;

                $ImgSizes = ['M' =>['100','250'],'L' => ['500','1000'], 'XL' => ['1000','1500']];
                //Première figure
                if($_FILES['first_figure']['name'] && $_FILES['first_figure']['error'] == 0 ) {
                    $figureModel->deleteFigures($id_article,1);
                    $figureModel->requete("DELETE FROM figures WHERE id_article = $id_article AND num_figure = 1");

                    foreach ($ImgSizes as $size => $sizeValue) {
                        $link = Image::saveImageArticle($_FILES['first_figure'],$title_first_figure,$size,$sizeValue);
                        $figureModel->setNum_figure(1);
                        $figureModel->setTitle_figure($title_first_figure);
                        $figureModel->setLegend_figure($alt_first_figure);
                        $figureModel->setSize_figure($size);
                        $figureModel->setLink_figure($link);
                        $figureModel->setId_article($id_article);
                        $figureModel->create();
                    }
                }
                //2e figure 
                if($_FILES['second_figure']['name'] && $_FILES['second_figure']['error'] == 0 ) {
                    $figureModel->deleteFigures($id_article,2);
                    $figureModel->requete("DELETE FROM figures WHERE id_article = $id_article AND num_figure = 2");

                    foreach ($ImgSizes as $size => $sizeValue) {
                        $link = Image::saveImageArticle($_FILES['second_figure'],$title_second_figure,$size,$sizeValue);
                        $figureModel->setNum_figure(2);
                        $figureModel->setTitle_figure($title_second_figure);
                        $figureModel->setLegend_figure($alt_second_figure);
                        $figureModel->setSize_figure($size);
                        $figureModel->setLink_figure($link);
                        $figureModel->setId_article($id_article);
                        $figureModel->create();
                    }
                }
                //3e figure 
                if($_FILES['last_figure']['name'] && $_FILES['last_figure']['error'] == 0 ) {
                    $figureModel->deleteFigures($id_article,3);
                    $figureModel->requete("DELETE FROM figures WHERE id_article = $id_article AND num_figure = 3");
                    foreach ($ImgSizes as $size => $sizeValue) {
                        $link = Image::saveImageArticle($_FILES['last_figure'],$title_last_figure,$size,$sizeValue);
                        $figureModel->setNum_figure(3);
                        $figureModel->setTitle_figure($title_last_figure);
                        $figureModel->setLegend_figure($alt_last_figure);
                        $figureModel->setSize_figure($size);
                        $figureModel->setLink_figure($link);
                        $figureModel->setId_article($id_article);
                        $figureModel->create();
                    }
                }
                $_SESSION['message'] = "Votre article a été modifié avec succès";
                 header('Location: /articles');
                exit;
                } else {
                    //Incomplet , permet de garder les champs déjà remplis
                    $title_article= isset($_POST['titre']) ? strip_tags($_POST['titre']) : '';
                    $description = isset($_POST['description']) ? strip_tags($_POST['description']) : '';
                    $title_article = isset($_POST['title_article']) ? strip_tags($_POST['title_article']) : '';
                    $intro_article = isset($_POST['intro_article']) ? strip_tags($_POST['intro_article']) : '';
                    $title_first_figure = isset($_POST['title_first_figure']) ? strip_tags($_POST['title_first_figure']) : '';
                    $alt_first_figure = isset($_POST['alt_first_figure']) ? strip_tags($_POST['alt_first_figure']) : '';
                    $title_second_figure = isset($_POST['title_second_figure']) ? strip_tags($_POST['title_second_figure']) : '';
                    $alt_second_figure = isset($_POST['alt_second_figure']) ? strip_tags($_POST['alt_second_figure']) : '';
                    $title_last_figure = isset($_POST['title_last_figure']) ? strip_tags($_POST['title_last_figure']) : '';
                    $alt_last_figure = isset($_POST['alt_last_figure']) ? strip_tags($_POST['alt_last_figure']) : '';
                    $legend_first_figure = isset($_POST['legend_first_figure']) ? strip_tags($_POST['legend_first_figure']) : '';
                    $legend_second_figure = isset($_POST['legend_second_figure']) ? strip_tags($_POST['legend_second_figure']) : '';
                    $legend_last_figure = isset($_POST['legend_last_figure']) ? strip_tags($_POST['legend_last_figure']) : '';
                    $id_cat = isset($_POST['id_cat']) ? strip_tags($_POST['id_cat']) : '';
                    $first_txt_article = isset($_POST['first_txt_article']) ? strip_tags($_POST['first_txt_article']) : '';
                    $second_txt_article = isset($_POST['second_txt_article']) ? strip_tags($_POST['second_txt_article']) : '';
                    $last_txt_article = isset($_POST['last_txt_article']) ? strip_tags($_POST['last_txt_article']) : '';
                }

                $nameCSS = 'addArticle';
                $titlePage = 'Modifier un article';
                $tagModel= new TagModel();
                $catModel = new CategoriesModel();
                $allCat = $catModel->findAll();
                $tags = $tagModel->findAll();
                $articleModel = new ArticlesModel;
                $figureModel = new FiguresModel;
                $tagModel = new ArticleXTagModel;
                $tagArticle = $tagModel->listTag($id_article);
                
                $articleContent = $articleModel->getFullInfoArticle($id_article);

                $listTags = [];
                foreach ($tagArticle as $tag => $value) {
                   $listTags[] = $value->id_tag;
                }
                $firstFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $articleContent->id_article AND num_figure = 1 AND size_figure = 'L' ")->fetch();
                $secondFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $articleContent->id_article AND num_figure = 2 AND size_figure = 'L' ")->fetch();
                $lastFigure = $figureModel->requete("SELECT * FROM figures WHERE id_article = $articleContent->id_article AND num_figure = 3 AND size_figure = 'L' ")->fetch();
                $title_article = $articleContent->title_article;
                $intro_article = $articleContent->intro_article;
                $title_first_figure = $firstFigure->title_figure;
                $title_second_figure = $secondFigure->title_figure;
                $title_last_figure = $lastFigure->title_figure;
                $alt_first_figure = $firstFigure->alt_figure;
                $alt_second_figure = $secondFigure->alt_figure;
                $alt_last_figure = $lastFigure->alt_figure;

                $legend_first_figure = $firstFigure->legend_figure;
                $legend_second_figure = $secondFigure->legend_figure;
                $legend_last_figure = $lastFigure->legend_figure;

                $id_cat = $articleContent->id_cat;
                $first_txt_article = $articleContent->first_txt_article;
                $second_txt_article = $articleContent->second_txt_article;
                $last_txt_article = $articleContent->last_txt_article;
                $this->render('articles/modified', compact('id_article','tags','allCat','titlePage','nameCSS','title_article','intro_article','title_first_figure','title_second_figure','title_last_figure','alt_first_figure','alt_second_figure','alt_last_figure','legend_first_figure','legend_second_figure','legend_last_figure','id_cat','first_txt_article','second_txt_article','last_txt_article','listTags','figures'), 'template_admin');
                
            } else {
                $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
                header('Location: /');
                exit;
            }
    

        }
    /**
     * Archive un article
     *
     * @param int $id_article ID de l'article à supprimer
     * @return void
     */
    public function deleteArticle($id_article)
    {
        $articleModel = new ArticlesModel;
        $articleModel->deleteArticle($id_article);
    }
}
