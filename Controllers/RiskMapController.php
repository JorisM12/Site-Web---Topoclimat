<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Image;
use App\Models\AlertsModel;
class RiskMapController extends Controller
{
    public function index()
    {   
        $alertModel = new AlertsModel();
        $alert = $alertModel->getFullInfo();
        $nameCSS = 'risk';
        $titlePage = 'Carte de risque';
        $this->render('risk/index',compact('nameCSS','titlePage','alert'),"template");
    }
    public function add()
    {
        if(AdminController::isAdmin())
        {
            if (Form::validate($_POST, ['start_alert', 'end_alert', 'id_type', 'description_alert'])) {
                $alertModel = new AlertsModel;
                if($_FILES['img_alert']['error'] != 0) {
                    $_SESSION['error'] = "Erreur dans l'envoi de l'image";
                    header('location: /riskMap/add');
                    exit;
                }
                if(Image::mimeControl($_FILES['img_alert']['tmp_name']) == false)
                {
                    $_SESSION['error'] = "Erreur dans l'envoi de l'image";
                    header('location: /riskMap/add');
                    exit;
                }
                if($alertModel->getFullInfo()) {
                    $alertInfo = $alertModel->getFullInfo();
                    $id = $alertInfo->id_alerts;
                    $alertModel->deleteAlert($id);
                };
                $start_alert = strip_tags($_POST['start_alert']);
                $end_alert = strip_tags($_POST['end_alert']);
                $id_type = strip_tags($_POST['id_type']);
                $description_alert = strip_tags($_POST['description_alert']);
                $alertModel->setStart_alert($start_alert);
                $alertModel->setEnd_alert($end_alert);
                $alertModel->setId_type($id_type);
                $alertModel->setDescription_alert($description_alert);
                $date = date('Y-m-d');
                if(file_exists("style/images/download/alerts/$date"))
                {
                    $delImgs = glob("style/images/download/alerts/$date/*.{jpg,png,gif}", GLOB_BRACE);
                    foreach ($delImgs as $delImg) {
                        unlink($delImg);
                    }
                   rmdir("style/images/download/alerts/$date");
                }
                mkdir("style/images/download/alerts/$date",0777);
                $folder = "style/images/download/alerts/$date";
                Image::saveAlertImage($_FILES['img_alert']['tmp_name'],'ALERT','XL',[2000,3000],$folder.'/');
                Image::saveAlertImage($_FILES['img_alert']['tmp_name'],'ALERT','M',[1000,1500],$folder.'/');
                $alertModel->setLink_img_alert($folder);
                if($_POST['send'] == true) {
                    $alertModel->setIs_active_alert(1);
                }elseif($_POST['save'] == true) {
                    $alertModel->setIs_active_alert(0);
                }
                $alertModel->create();
                $_SESSION['message'] = "Risque créé avec succès !";
                header('location: /riskMap');
            }
        }
        $nameCSS = 'riskForm';
        $titlePage = "Création d'un risque";
        $this->render('risk/add',compact('nameCSS','titlePage'),"template_admin");
    }
}