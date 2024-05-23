<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Form;
use App\Core\Image;
use App\Models\GalleryModel;
use App\Models\PhotographyModel;
use App\Models\ThemesModel;

class GalleryController extends Controller{
    public function index()
    {
        $nameCSS = 'gallery';
        $titlePage = 'Galerie photo';
        $this->render('gallery/index',compact('nameCSS','titlePage'),'template');
    }
    public function album($id_gal = 2)
    {
        $galleryModel = new GalleryModel;
        $allPhotos = $galleryModel->getAllPhotoMin($id_gal);
        $nameCSS = 'album';
        switch ($id_gal) {
            case 2:
                $titlePage = 'Vosges';
                $mainTitle = 'VOSGES';
                break;
            case 3:
                $titlePage = 'Région';
                $mainTitle = 'RÉGION';
                break;
            case 4:
                $titlePage = 'Vos Photos';
                $mainTitle = 'VOS PHOTOS';
                break;
            case 5:
                $titlePage = 'Météo';
                $mainTitle = 'MÉTÉO';
                break;
        }
        $titlePage = 'Vosges';
        $this->render('gallery/album',compact('nameCSS','titlePage','allPhotos','id_gal','mainTitle'),'template');
    }

    public function viewPhoto(int $id_gal,string $name_photo)
    {
        $galleryModel = new GalleryModel;
        $photo = $galleryModel->getXlPhoto($id_gal,$name_photo);
        echo json_encode($photo->link_photo);
    }
    public function add()
    {
        $galleryModel = new GalleryModel;
        if (Form::validate($_POST, ['name_gal','description_gal','localisation_gal','date_gal'])) {
            $name_gal = strip_tags($_POST['name_gal']);
            $description_gal = strip_tags($_POST['description_gal']);
            $localisation_gal = strip_tags($_POST['localisation_gal']);
            $created_at_gal = date('Y-m-d H:i:s'); 
            $date_gal = strip_tags($_POST['date_gal']);
            $is_active_gal = true; 
            $id_user = strip_tags($_POST['id_user']); 
            $is_storm = 0; 
            $id_theme = strip_tags($_POST['id_theme']);
            $galleryModel->setName_gal($name_gal);
            $galleryModel->setDescription_gal($description_gal);
            $galleryModel->setLocalisation_gal($localisation_gal);
            $galleryModel->setCreated_at_gal($created_at_gal);
            $galleryModel->setDate_gal($date_gal);
            $galleryModel->setIs_active_gal($is_active_gal);
            $galleryModel->setId_user($id_user);
            $galleryModel->setIs_storm($is_storm);
            $galleryModel->setId_theme($id_theme);
            $galleryModel->create();

            $index = 1; 

            foreach ($_FILES['files']['tmp_name'] as $photo => $value) {
                if (Image::mimeControl($value) == false) {
                    header('location: /gallery/add');
                    exit;
                }
                move_uploaded_file($value, 'style/images/download/gallery/tmp/IMG-' . $index.'.jpg');
                $index++;
            }
            header('location: /gallery/createAlbum');
            exit();
        }
        $themesModel = new ThemesModel;
        $allThemes = $themesModel->findAll();
        $nameCSS = 'addAlbum';
        $titlePage = 'Ajouter des photos';
        $this->render('gallery/add',compact('nameCSS','titlePage','allThemes'),'template_admin');
    }


    public function addAlbum()
    {
        $galleryModel = new GalleryModel;
        if(!AdminController::isAdmin()) {
            $_SESSION['error'] = 'Vous devez être connecté pour accéder à cette page';
            header('Location: /admin');
            exit;
        }
        if($galleryModel->verifyAlbum() !== false) 
        {
            $_SESSION['form'] = 'send';
            header('Location: /gallery/createAlbum');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(Form::validate($_POST, ['name_gal','description_gal','localisation_gal','date_gal'])) {
                $index = 1;
                foreach ($_FILES['files']['tmp_name'] as $photo => $value) {
                    if (Image::mimeControl($value) == false) {
                        $_SESSION['error'] = 'Erreur dans le format des images';
                        header('location: /gallery/add');
                        exit;
                    }
                    move_uploaded_file($value, 'style/images/download/gallery/albums/tmp/IMG-' . $index.'.jpg');
                    $index++;
                }
                $name_gal = strip_tags($_POST['name_gal']);
                $description_gal = strip_tags($_POST['description_gal']);
                $localisation_gal = strip_tags($_POST['localisation_gal']);
                $created_at_gal = date('Y-m-d H:i:s'); 
                $date_gal = strip_tags($_POST['date_gal']);
                $is_active_gal = true; 
                $id_user = strip_tags($_POST['id_user']); 
                $id_theme = strip_tags($_POST['id_theme']); 
                $is_storm = 0; 
                $galleryModel->setName_gal($name_gal);
                $galleryModel->setDescription_gal($description_gal);
                $galleryModel->setLocalisation_gal($localisation_gal);
                $galleryModel->setCreated_at_gal($created_at_gal);
                $galleryModel->setDate_gal($date_gal);
                $galleryModel->setIs_active_gal($is_active_gal);
                $galleryModel->setId_user($id_user);
                $galleryModel->setIs_storm($is_storm);
                $galleryModel->setId_theme($id_theme);

                $galleryModel->create();
                $_SESSION['form'] = 'send';
                header('Location: /gallery/createAlbum');
                exit;
            }else{
                $_SESSION['error'] = 'Formulaire invalide';
            }
        }

        $themesModel = new ThemesModel;
        $allThemes = $themesModel->findAll();
        $nameCSS = 'stormAddAlbum';
        $titlePage = "Créer un album";
        $this->render('gallery/add',compact('nameCSS','titlePage','logo','allThemes'),"template");
    }
    public function createAlbums()
        {
            $galleryModel = new GalleryModel;
            if(AdminController::isAdmin())
            {
                if($_POST) {
                    $idGallery = $galleryModel->isCompletedGal();
                    $idGallery = $idGallery->id_gal;
                    $galleryModel = new GalleryModel;
                    $nameGal = $galleryModel->requete("SELECT name_gal FROM gallery WHERE id_gal = $idGallery")->fetch();
                    $nameGal = $nameGal->name_gal;
                    $nameGal = str_replace(' ','-',$nameGal);
                    $index = 0;
                    $result = $_POST['photo'];
                    if(!file_exists("style/images/download/gallery/albums/$nameGal"))
                    {
                        mkdir("style/images/download/gallery/albums/$nameGal",0777);
                    }
                    $linkGal = "style/images/download/gallery/albums/$nameGal";
                    $PHOTO_SIZE = ['M' =>['500','750'],'L' => ['1000','1500'], 'XL' => ['2000','3000']];
                    foreach ($PHOTO_SIZE as $size => $sizeValue) {
                        foreach ($result as $photo => $value) {
                            if(!file_exists("style/images/download/gallery/albums/$nameGal/$size"))
                            {
                                mkdir("style/images/download/gallery/albums/$nameGal/$size",0777);
                            }
                            $linkGal = "style/images/download/gallery/albums/$nameGal/$size";
                            $photoModel = new PhotographyModel;
                            $name_photo = strip_tags($value['title_photo']);
                            $description_photo = strip_tags($value['description_photo']);
                            $alt_photo = strip_tags($value['alt-photo']);
                            $is_active_photo = $value['is_active_photo'] == 'on' ? 1 : 0 ;
                            $id_gal = $idGallery;
                            $lat = strip_tags($value['lat-photo']);
                            $lon = strip_tags($value['lon-photo']);
                            $coords_photo = "[$lat,$lon]";
                            $photoModel->setName_photo($name_photo);
                            $photoModel->setDescription_photo($description_photo);
                            $photoModel->setAlt_photo($alt_photo);
                            $photoModel->setIs_active_photo($is_active_photo);
                            $photoModel->setId_gal($id_gal);
                            $photoModel->setCoords_photo($coords_photo);
                            $name_photo = str_replace(' ','-',$name_photo);
                            $imageModel = new Image;
                            $firstValue = $value["'data'"];
                            $firstValue[0] = ' ';
                            $firstValue = str_replace(' ','',$firstValue);
                            $link_photo = $imageModel::saveImageAlbum($firstValue,$name_photo,$size,[$sizeValue[0],$sizeValue[1]],$linkGal.'/');
                            $link_photo2 = str_replace($linkGal.'/','',$link_photo);
                            $photoModel->setLink_photo($link_photo);
                            $photoModel->setSize_photo($size);
                            $photoModel->create();
                        }
                    }
                    $delImgs = glob("style/images/download/gallery/tmp/*.{jpg,png,gif}", GLOB_BRACE);
                    foreach ($delImgs as $delImg) {
                        unlink($delImg);
                    }
                    $galleryModel->requete("UPDATE gallery SET is_completed = 1 WHERE id_gal = $idGallery ");
                    $_SESSION['message'] = "Album créé avec succés !";
                    header('location: /gallery');
                }else {
                    $_SESSION['error'] = "Une erreur est survenue";
                    //header('location: /storm');
                }
                $idGallery = $galleryModel->isCompletedGal();
                $idGallery = $idGallery->id_gal;
                $listImgs = [];
                if($idGallery) {
                    $imgs = glob("style/images/download/gallery/tmp/*.{jpg,png,gif}", GLOB_BRACE);
                    foreach ($imgs as $img) {
                        $img = str_replace('style/images/download/gallery/tmp/','',$img);
                        $listImgs[] = $img;
                    }
                }
            $nameCSS = 'createAlbum';
            $titlePage = 'Ajouter des photos';
            $this->render('storm/createAlbum',compact('nameCSS','titlePage','listImgs'),'template_admin');
        }
    }

    public function createAlbum()
    {
        if(!isset($_SESSION['form']) && $_SESSION['form'] !== 'send') {
        header('Location: /storm');
        }
        $galleryModel = new GalleryModel;
        if(AdminController::isAdmin())
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if($_POST) {
                    
                    $idGallery = $galleryModel->isCompletedGal();
                    $idGallery = $idGallery->id_gal;
                    $galleryModel = new GalleryModel;
                    $nameGal = $galleryModel->requete("SELECT name_gal FROM gallery WHERE id_gal = $idGallery")->fetch();
                    $nameGal = $nameGal->name_gal;
                    $nameGal = str_replace(' ','-',$nameGal);
                    $nameGal = str_replace("'",'-',$nameGal);
                    $nameGal = str_replace(".",'-',$nameGal);
                    $index = 0;
                    $result = $_POST['photo'];
                    if(!file_exists("style/images/download/gallery/albums/$nameGal"))
                    {
                        mkdir("style/images/download/gallery/albums/$nameGal",0777);
                    }
                    $linkGal = "style/images/download/gallery/albums/$nameGal";
                    $PHOTO_SIZE = ['M' =>['500','750'],'L' => ['1000','1500'], 'XL' => ['2000','3000']];
                    foreach ($PHOTO_SIZE as $size => $sizeValue) {
                        foreach ($result as $photo => $value) {
                            if(!file_exists("style/images/download/gallery/albums/$nameGal/$size"))
                            {
                                mkdir("style/images/download/gallery/albums/$nameGal/$size",0777);
                            }
                            $linkGal = "style/images/download/gallery/albums/$nameGal/$size";
                            $photoModel = new PhotographyModel;
                            $name_photo = strip_tags($value['title_photo']);
                            $name_photo = str_replace(".",'',$name_photo);
                            $description_photo = strip_tags($value['description_photo']);
                            $alt_photo = strip_tags($value['alt-photo']);
                            if(isset($value['is_active_photo']) && $value['is_active_photo'] == 'on') {
                                $is_active_photo = 1;
                            }else{
                                $is_active_photo = 0;
                            }
                            $id_gal = $idGallery;
                            $lat = strip_tags($value['lat-photo']);
                            $lon = strip_tags($value['lon-photo']);
                            $coords_photo = "[$lat,$lon]";
                            $photoModel->setName_photo($name_photo);
                            $photoModel->setDescription_photo($description_photo);
                            $photoModel->setAlt_photo($alt_photo);
                            $photoModel->setIs_active_photo($is_active_photo);
                            $photoModel->setId_gal($id_gal);
                            $photoModel->setCoords_photo($coords_photo);
                            $name_photo = str_replace(' ','-',$name_photo);
                            $imageModel = new Image;
                            $firstValue = $value["'data'"];
                            $firstValue[0] = ' ';
                            $firstValue = str_replace(' ','',$firstValue);
                            $link_photo = $imageModel::saveImageAlbum($firstValue,$name_photo,$size,[$sizeValue[0],$sizeValue[1]],$linkGal.'/');
                            $link_photo2 = str_replace($linkGal.'/','',$link_photo);
                            $photoModel->setLink_photo($link_photo);
                            $photoModel->setSize_photo($size);
                            $photoModel->create();
                        }
                    }
                    $delImgs = glob("style/images/download/gallery/albums/tmp/*.{jpg,png,gif}", GLOB_BRACE);
                    foreach ($delImgs as $delImg) {
                        unlink($delImg);
                    }
                    $galleryModel->requete("UPDATE gallery SET is_completed = 1 WHERE id_gal = $id_gal ");
                    $_SESSION['message'] = "Album créé avec succés !";
                    header('location: /gallery');
                }else{
                    $_SESSION['error'] = "Une erreur est survenue";
                }
            }
        }
        $idGallery = $galleryModel->isCompletedGal();
        $idGallery = $idGallery->id_gal;
        $listImgs = [];
        if($idGallery) {
            $imgs = glob("style/images/download/gallery/albums/tmp/*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($imgs as $img) {
                $img = str_replace('style/images/download/gallery/albums/tmp/','',$img);
                $listImgs[] = $img;
            }
        }
        $listPost = [];
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'createStormAlbum';
        $titlePage = "Détails de l'album";
        $this->render('gallery/create', compact('nameCSS', 'titlePage', 'logo', 'listImgs'), "template_photo");
        exit; 
    } 
}





