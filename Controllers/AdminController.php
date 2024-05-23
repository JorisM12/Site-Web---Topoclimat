<?php
namespace App\Controllers;
use App\Core\Form;
use App\Core\Image;
use App\Models\AlertsModel;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\FiguresModel;
use App\Models\GalleryModel;
use App\Models\PhotographyModel;
class AdminController extends Controller
{
    public function index()
    {
        $articleModel =  new ArticlesModel;
        $listArticles  = $articleModel->findAll();
        $alertModel = new AlertsModel;
        $alert = $alertModel->getFullInfo();
        $nameCSS = 'homeAdmin';
        $titlePage = 'Tableau de Bord';
        if($this->isAdmin() === true) {
            $this->render('admin/index',compact('nameCSS','titlePage','listArticles','alert'),'template_admin');
        }else{
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
    /**
     * Vérifie le statut admin
     *
     * @return boolean
     */
    public static function isAdmin()
    {
        if(isset($_SESSION['user']) && in_array(1,json_decode($_SESSION['user']['roles']))){
            return true;
        }
    } 
    public function manageArticles()
    {
        $listParam = [];

        $value = 0;
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,'?')) {
            $url = explode('?',$uri);
            $value = $url[1];
            $valueB = explode('&',$value);

            foreach ($valueB as $val => $value) {
               $elem = explode('=',$value);
               $listParam[$elem[0]] = $elem[1];
            }
        }
        $articleModel = new ArticlesModel;
        $figureModel = new FiguresModel;
        if($listParam) {
            $listArticles = $articleModel->getFullInfoListArticlesAdmin(0,$listParam['key-word'],$listParam['year'],$listParam['month']);
        }else{
            $listArticles = $articleModel->getFullInfoListArticlesAdmin();
        }
        $imgs = $figureModel->getImgForListArticle();
        $list = [];
        foreach ($listArticles as $article) {
            foreach ($imgs as $pic) {
                if($pic->id_article === $article->id_article)
                {
                    $list[$article->id_article] = ['data' => $article,'img' =>$pic];
                }
            }
        }
        $nameCSS = 'manageArticles';
        $titlePage = 'Liste des articles';
        $this->render('admin/manageArticles',compact('nameCSS','titlePage','list','listParam'),'template_admin');
    }
    public function stormManage()
    {
        $galleryModel = new GalleryModel;
        $allAlbum = $galleryModel->getInfosAlbumsForManage();
        $nameCSS = 'stormManage';
        $titlePage = 'Gestion des photos de chasse';
        if($this->isAdmin() === true) {
            $this->render('admin/stormManage',compact('nameCSS','titlePage','allAlbum'),'template_admin');
        }else {
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
    public function albumManage(int $id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(Form::validate($_POST, ['name_gal','description_gal','localisation_gal','date_gal']) && isset($_POST['form']) && $_POST['form'] == 'send') {

                $name_gal = strip_tags($_POST['name_gal']);
                $description_gal = strip_tags($_POST['description_gal']);
                $localisation_gal = strip_tags($_POST['localisation_gal']);
                $date_gal = strip_tags($_POST['date_gal']);
                $galleryModel = new GalleryModel;
                $galleryModel->setName_gal($name_gal);
                $galleryModel->setDescription_gal($description_gal);
                $galleryModel->setLocalisation_gal($localisation_gal);
                $galleryModel->setDate_gal($date_gal);
                $galleryModel->update($id,'id_gal');
                $_SESSION['message'] = 'Modifications enregistrées !';
            }else {
                $_SESSION['error'] = 'Une erreur est survenue, vérifiez votre formulaire';
            }
        }
        $photoModel = new PhotographyModel;
        $galleryModel = new GalleryModel;
        $allPhotos = $photoModel->getAllPhotosAlbum($id);
        $infosAlbum = $galleryModel->getInfosAlbum($id);

        $nameCSS = 'albumManage';
        $titlePage = 'Gestion de l\'album : ';
        if($this->isAdmin() === true) {
            $this->render('admin/albumManage',compact('nameCSS','titlePage','allPhotos','infosAlbum'),'template_admin');
        }else {
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
    public function photoManage(int $id)
    {
        $photoModel = new PhotographyModel;
        $infosPhoto = $photoModel->getInfosPhotoById($id);
        $idPhotos = $photoModel->updateInfosPhotos($id);
        if(Form::validate($_POST, ['name_photo','lat-photo','lon-photo','alt-photo','description_photo']) && isset($_POST['form']) && $_POST['form'] == 'send') {

            $name_photo = strip_tags($_POST['name_photo']);
            $description_photo = strip_tags($_POST['description_photo']);
            $alt_photo = strip_tags($_POST['alt-photo']);
            $coords_photo = [];
            $coords_photo[] = strip_tags($_POST['lat-photo']);
            $coords_photo[] = strip_tags($_POST['lon-photo']);
            if(isset($_POST['is_active_photo']) && $_POST['is_active_photo'] == 'on' ) {
                $photoModel->activePhoto($idPhotos[0]->id_photo,0);
                $photoModel->activePhoto($idPhotos[1]->id_photo,0);
                $photoModel->activePhoto($idPhotos[2]->id_photo,0);

            }else {
                $photoModel->activePhoto($idPhotos[0]->id_photo,1);
                $photoModel->activePhoto($idPhotos[1]->id_photo,1);
                $photoModel->activePhoto($idPhotos[2]->id_photo,1);
            }
            $photoModel->setName_photo($name_photo);
            $photoModel->setAlt_photo($alt_photo);
            $photoModel->setCoords_photo(json_encode($coords_photo));
            $photoModel->setDescription_photo($description_photo);
            $photoModel->update($idPhotos[0]->id_photo,'id_photo');
            $photoModel->update($idPhotos[1]->id_photo,'id_photo');
            $photoModel->update($idPhotos[2]->id_photo,'id_photo');
            $_SESSION['message'] = 'Modifications enregistrées !';
            header("Location: /admin/albumManage/$infosPhoto->id_gal");
        }
        $galleryModel = new GalleryModel;
        $linkImg = $photoModel->getPhotoByName($idPhotos[1]->name_photo,'L');
        $coords = json_decode($infosPhoto->coords_photo);
        

        $nameCSS = 'photoManage';
        $titlePage = 'Gestion de la photo';
        if($this->isAdmin() === true) {
            $this->render('admin/photoManage',compact('nameCSS','titlePage','linkImg','infosPhoto','coords'),'template_photo');
        }else {
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
    public function addNewPhotos()
    {
        $nameCSS = 'photoManage';
        $titlePage = 'Ajouter des photos';
        if($this->isAdmin() === true) {
            $this->render('admin/addNewPhoto',compact('nameCSS','titlePage'),'template_photo');
        }else {
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
    public function activeAlbum(bool $isActive,int $id):void
    {
        if($this->isAdmin() === true) {

            $galleryModel = new GalleryModel;
            if($isActive){
                $galleryModel->desactiveAlbum($id);
            }else{
                $galleryModel->activeAlbum($id);
            }
            $_SESSION['message'] = 'Modifications enregistrées !';
            header('Location: /admin/stormManage');
        }else {
            $_SESSION['error'] = 'Vous devez être connecté !';
            header('Location: /');
        }
    }
}