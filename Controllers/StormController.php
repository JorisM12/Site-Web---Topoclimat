<?php 
namespace App\Controllers;
use App\Core\Form;
use App\Core\Image;
use App\Models\EditoModel;
use App\Models\GalleryModel;
use App\Controllers\Controller;
use App\Models\PhotographyModel;
use App\Controllers\AdminController;
class StormController extends Controller
{
    public function index()
    {   
        $galleryModel = new GalleryModel;
        $getNbrGal = $galleryModel->getNbrGal();
        $getMiniPhoto = $galleryModel->getMiniPhoto();
        $listMiniPhoto = [];
        foreach ($getMiniPhoto as $miniPhoto => $value) {
            $listMiniPhoto[] = $value->link_photo;
        }
        $photoModel = new PhotographyModel;
        $photoL = $photoModel->requete("SELECT * FROM `photography` INNER JOIN gallery ON gallery.id_gal = photography.id_gal  WHERE size_photo = 'L'  AND  is_active_photo = 1 AND gallery.is_storm = 1 AND gallery.is_active_gal = 1  GROUP BY id_photo DESC LIMIT 4;")->fetchAll();
        $lastPhotos = [];
        foreach ($photoL as $photo => $value) {
            $lastPhotos[] = '/'.$value->link_photo;
        }
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'storm';
        $titlePage = "Chasseur d'orages";
        $this->render('storm/index',compact('nameCSS','titlePage','logo','lastPhotos','getNbrGal','listMiniPhoto'),"template");
    }

    public function albums(string $year = '0')
    {
        $logo = '/style/images/logo_chasseur_orages.png';
        if( $year == '0') {
            $nameCSS = 'stormAlbums';
            $titlePage = "Albums";
            $imageModel = new Image;
            $galleryModel = new GalleryModel;
            $getNbrGal = $galleryModel->getYearAlbumStorm();
            $this->render('storm/albums',compact('nameCSS','titlePage','logo','getNbrGal'),"template");
        }else {
            $year = strip_tags($year);
            $imageModel = new Image;
            $galleryModel = new GalleryModel;
            $getGal = $galleryModel->getAllPhotoAlbumStorm($year);
            $nameCSS = 'stormAlbums';
            $titlePage = "Année $year";
            $this->render('storm/gallery',compact('nameCSS','titlePage','logo','getGal','year'),"template");
        }
    }
    /**
     * Retourne le lien vers une photo XL
     *
     * @param integer $year Année de la prise de vue
     * @param integer $id_gal Galerie mère
     * @param string $name_photo Nom de la photo
     * @return void JSON contenant le lien 
     */
    public function viewPhoto(int $year,int $id_gal,string $name_photo):void
    {
        $galleryModel = new GalleryModel;
        $photo = $galleryModel->getXLPhotoStorm($year,$name_photo,$id_gal);
        echo json_encode($photo->link_photo);
    }
    
    public function map(int $year)
    {
        $galleryModel = new GalleryModel;
        $photoModel = new PhotographyModel;
        $getGal = $galleryModel->requete("SELECT * FROM photography
            INNER JOIN gallery ON gallery.id_gal = photography.id_gal
            WHERE YEAR(gallery.date_gal) = $year AND size_photo = 'L'  AND is_storm = 1")->fetchAll();
        $linksMap = [];
        $index = 1;
        foreach ($getGal as $link => $value) {
           $linksMap[$index]['link'] = "$value->link_photo";
           $linksMap[$index]['coords_photo'] = $value->coords_photo;
           $linksMap[$index]['id_photo'] = $value->id_photo;
           $linksMap[$index]['year'] = $year;
           $index++;
        }
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'mapStormPhoto';
        $titlePage = 'Carte interactive';
        $this->render('storm/map',compact('nameCSS','titlePage','logo','year','linksMap'),"template_photo");
    }
    public function photo(string $id, string $year)
    {
        $photoModel = new PhotographyModel;
        $galleryModel = new GalleryModel;
        $photoL = $photoModel->getPhotoById($id);
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'stormPhoto';
        $titlePage = $photoL->name_photo;
        $id = intval($id);
        $actions = $galleryModel->navPhotoInStrom($id,$year);
        $this->render('storm/photo',compact('nameCSS','titlePage','logo','photoL','year','actions'),"template_photo");
    }
    public function addAlbum()
    {
        $galleryModel = new GalleryModel;
        if(!AdminController::isAdmin()) {
            $_SESSION['error'] = 'Vous devez être connecté pour accéder à cette page';
            header('Location: /storm');
            exit;
        }
        if($galleryModel->verifyAlbum() !== false) 
        {
            $_SESSION['form'] = 'send';
            header('Location: /storm/createStormAlbum');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(Form::validate($_POST, ['name_gal','description_gal','localisation_gal','date_gal'])) {
                $index = 1;
                foreach ($_FILES['files']['tmp_name'] as $photo => $value) {
                    if (Image::mimeControl($value) == false) {
                        $_SESSION['error'] = 'Erreur dans le format des images';
                        header('location: /storm/addAlbum');
                        exit;
                    }
                    move_uploaded_file($value, 'style/images/download/storm/albums/tmp/IMG-' . $index.'.jpg');
                    $index++;
                }
                // Si le formulaire est complet
                $name_gal = strip_tags($_POST['name_gal']);
                $description_gal = strip_tags($_POST['description_gal']);
                $localisation_gal = strip_tags($_POST['localisation_gal']);
                $created_at_gal = date('Y-m-d H:i:s'); 
                $date_gal = strip_tags($_POST['date_gal']);
                $is_active_gal = true; 
                $id_user = strip_tags($_POST['id_user']); 
                $is_storm = 1; 
                $galleryModel->setName_gal($name_gal);
                $galleryModel->setDescription_gal($description_gal);
                $galleryModel->setLocalisation_gal($localisation_gal);
                $galleryModel->setCreated_at_gal($created_at_gal);
                $galleryModel->setDate_gal($date_gal);
                $galleryModel->setIs_active_gal($is_active_gal);
                $galleryModel->setId_user($id_user);
                $galleryModel->setIs_storm($is_storm);
                $galleryModel->create();
                $_SESSION['form'] = 'send';
                header('location: /storm/createStormAlbum');
                exit;
            }else{
                $_SESSION['error'] = 'Formulaire invalide';
            }
        }
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'stormAddAlbum';
        $titlePage = "Créer un album";
        $this->render('storm/add',compact('nameCSS','titlePage','logo'),"template");
    }
    public function createStormAlbum()
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
                    if(!file_exists("style/images/download/storm/albums/$nameGal"))
                    {
                        mkdir("style/images/download/storm/albums/$nameGal",0777);
                    }
                    $linkGal = "style/images/download/storm/albums/$nameGal";
                    $PHOTO_SIZE = ['M' =>['500','750'],'L' => ['1000','1500'], 'XL' => ['2000','3000']];
                    foreach ($PHOTO_SIZE as $size => $sizeValue) {
                        foreach ($result as $photo => $value) {
                            if(!file_exists("style/images/download/storm/albums/$nameGal/$size"))
                            {
                                mkdir("style/images/download/storm/albums/$nameGal/$size",0777);
                            }
                            $linkGal = "style/images/download/storm/albums/$nameGal/$size";
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
                    $delImgs = glob("style/images/download/storm/albums/tmp/*.{jpg,png,gif}", GLOB_BRACE);
                    foreach ($delImgs as $delImg) {
                        unlink($delImg);
                    }
                    $galleryModel->requete("UPDATE gallery SET is_completed = 1 WHERE id_gal = $id_gal ");
                    $_SESSION['message'] = "Album créé avec succés !";
                    header('location: /storm');
                }else{
                    $_SESSION['error'] = "Une erreur est survenue";
                }
            }
        }
        $idGallery = $galleryModel->isCompletedGal();
        $idGallery = $idGallery->id_gal;
        $listImgs = [];
        if($idGallery) {
            $imgs = glob("style/images/download/storm/albums/tmp/*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($imgs as $img) {
                $img = str_replace('style/images/download/storm/albums/tmp/','',$img);
                $listImgs[] = $img;
            }
        }
        $listPost = [];
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'createStormAlbum';
        $titlePage = "Détails de l'album";
        $this->render('storm/createAlbum', compact('nameCSS', 'titlePage', 'logo', 'listImgs'), "template_photo");
        exit; 
    } 
    public function USA2024()
    {   
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'usa2024';
        $titlePage = "USA 2024";
        $this->render('storm/usa',compact('nameCSS','titlePage','logo'),"template");
    }
    public function editoUsa(int $team = 5, $date ='1970-01-01')
    {   
        $editoModel = new EditoModel;
        $listEdito = $editoModel->getDateAndTitleEdito($team,date('Y-m-d'));
        $edito =  $editoModel->getEdito($team,$date);

        $sectionsEdito = [];
        foreach ($edito as $section => $value) {
            if($value->rank_edito == 1) {
                $sectionsEdito['first-bloc'] = $value;
            }
            $sectionsEdito[] = $value;
        }

        $listDateEdito = [];
        foreach ($listEdito as $dateElem => $value) {
            $listDateEdito[] = $value->date_edito;
        }
        $dateBrut = \DateTimeImmutable::createFromFormat('Y-m-d', "$date");
        $dateFormat = $dateBrut->format('d F Y');
        $dateFormat = str_replace(['April','May','Jun'],['avril','mai','juin'],$dateFormat);
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'editoUsa';
        $titlePage = "Carnet de route";
        $this->render('storm/editoUsa',compact('nameCSS','titlePage','logo','team','listEdito','sectionsEdito','dateFormat','date','listDateEdito'),"template_edito");
    }
    public function addEdito(int $num=0)
    {
       
        if(!AdminController::isAdmin()) {
            $_SESSION['error'] = "Vous devez être connecter pour accéder a cette section";
            header('Location: /');
        }
        if(isset($_POST['form']) && $_POST['form'] == 'send' && isset($_POST['addSection']) && $_POST['addSection'] == true) {
            if(Image::mimeControl($_FILES['photo_edito']['tmp_name']) !== true) {
                $_SESSION['error'] = "Problème dans le format de l'image !";
                var_dump('ok');
                header('Location: /storm/addEdito');
                exit;
            }
            $prevEdito = [];
            if(isset( $_POST['title_edito']) && isset($_POST['date_edito'])) {
                $prevEdito['title_edito'] = $_POST['title_edito'];
                $prevEdito['date_edito'] = $_POST['date_edito'];
            }
            $prevEdito['description_edito'] = $_POST['description_edito'];
            $prevEdito['loc_edito'] = $_POST['loc_edito'];
            $prevEdito['rank'] = $num;
            $prevEdito['photo_edito'] = $_FILES;
            move_uploaded_file($_FILES['photo_edito']['tmp_name'], 'style/images/download/edito/tmp/IMG-'. $num.'.jpg');
            $_SESSION['edito'][$num] =  $prevEdito;
            $num+=1;
            $_SESSION['numEdito'] = $num;
        }elseif(isset($_POST['form']) && $_POST['form'] == 'send' && isset($_POST['valid']) && $_POST['valid'] == 'valid') {
            if(Image::mimeControl($_FILES['photo_edito']['tmp_name']) !== true) {
                $_SESSION['error'] = "Problème dans le format de l'image !";
                header('Location: /storm/addEdito');
                exit;
            }
            $prevEdito = [];
            if(isset( $_POST['title_edito']) && isset($_POST['date_edito'])) {
                $prevEdito['title_edito'] = $_POST['title_edito'];
                $prevEdito['date_edito'] = $_POST['date_edito'];
            }
            $prevEdito['description_edito'] = $_POST['description_edito'];
            $prevEdito['loc_edito'] = $_POST['loc_edito'];
            $prevEdito['photo_edito'] = $_FILES;
            move_uploaded_file($_FILES['photo_edito']['tmp_name'], 'style/images/download/edito/tmp/IMG-'. $num.'.jpg');
            $_SESSION['edito'][$num] =  $prevEdito;
            $editoModel = new EditoModel;
            $listImgs = [];
            $imgs = glob("style/images/download/edito/tmp/*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($imgs as $img) {
                $listImgs[] = $img;
            }
            $indexImg = 0;
            $rank = 1;
            foreach ($_SESSION['edito'] as  $edito => $value) {
                if(isset($value['title_edito']) && isset($value['date_edito'])) {
                    $editoModel->setTitle_edito(strip_tags($value['title_edito']));
                    $editoModel->setDate_edito(strip_tags($value['date_edito']));
                }
                $editoModel->setDescription_edito(strip_tags($value['description_edito']));
                $editoModel->setLoc_edito(strip_tags($value['loc_edito']));
                $link = Image::saveImageEdito($listImgs[$indexImg],$indexImg,[1000,2000]);
                $editoModel->setPhoto_edito($link);
                $editoModel->setId_user($_SESSION['user']['id']);
                $editoModel->setRank_edito($rank);
                $editoModel->create();
                $indexImg++;
                $rank++;
            }
            $delImgs = $imgs;
            foreach ($delImgs as $delImg) {
                unlink($delImg);
            }
            $_SESSION['message'] = 'Édito ajouté !';
            unset($_SESSION['edito']);
            unset($_SESSION['numEdito']);
            header('Location: /storm/USA2024');
            exit;
        }
        $logo = '/style/images/logo_chasseur_orages.png';
        $nameCSS = 'addEditoUsa';
        $titlePage = "Ajouter un édito";
        $this->render('storm/addEdito',compact('nameCSS','titlePage','logo'),"template_add_edito");
    }

}
