<?php
namespace App\Core;

const IMG_SIZE = ['M' =>['100','250'],'L' => ['500','1000'], 'XL' => ['1000','1500']];
const PHOTO_SIZE = ['M' =>['100','250'],'L' => ['500','1000'], 'XL' => ['1000','1500']];
class Image 
{

    /**
     * Créer le liens vers les images d'un article
     *
     * @param string $name Nom de l'image
     * @param string $size Taille de l'image
     * @param string $extension Nature de l'image
     * @return string Lien de l'image
     */
    protected function createLinkImg(string $name, string $size, string $extension): string
    {
        $linkFolder = 'style/images/download/img_articles/';
        $nameImg = str_replace(["'", " ", '.'], '-', $name);
        $link = $linkFolder . $size .'-'. $nameImg .'-'. date("m-d-y") .'.'. $extension;
        return $link;
    }
    protected function createLinkImgStorm(string $name, string $size, string $extension, string $linkAlbum): string
    {
        //$linkFolder = ROOT.$linkAlbum;
        $linkFolder = $linkAlbum;
        $nameImg = str_replace(["'", " ", '.'], '-', $name);
        $link = $linkFolder . $size .'-'. $nameImg .'-'. date("m-d-y") .'.jpg';
        return $link;
    }
        /**
     * Traite et créer une image et retourne le lien
     *
     * @param array $data Données de l'image envoyée $_FILES
     * @param string $nameImg Nom donné à l'image
     * @param string $nameSize Nom de la taille souhaité
     * @param array $size Dimension de l'image
     * @return string Lien vers l'image
     */
    public static function saveImageEdito($data,int $idImg,array $size):string
    {
        $image = new Image;
        $linkFolder = 'style/images/download/edito/';
        $nameImg = "IMG-EDITO".$idImg;
        $link = $linkFolder. $nameImg .'-'.date("m-d-y-H-i-s").'.'.'jpg';
        $newImage =$image->treatmentImage('jpg',$size[0],$size[1],$data,$link);
        $newLink = str_replace('/var/www/topoclimat/public','',$link);
        return $newLink;
    }
    protected function createLinkImgAlert(string $name, string $size, string $extension, string $linkAlbum): string
    {
        $linkFolder = $linkAlbum;
        $nameImg = str_replace(["'", " ", '.'], '-', $name);
        $link = $linkFolder . $size .'-ALERT'.'.jpg';
        return $link;
    }
    /**
     * Enregistre l'image sous plusieurs tailles
     *
     * @param array $data données de l'image $_FILES
     * @param string $nameImg Nom de m'image 
     * @return void
     */
    public static function saveImageArticleForSize(array $data, string $nameImg) {

        $listLink = [];

        foreach (IMG_SIZE as $size=> $value) {
            $listLink[$size] = Image::saveImageArticle($data, $nameImg,$size,$value);
        }
        return $listLink;
    }
    /**
     * Traite et créer une image et retourne le lien
     *
     * @param array $data Données de l'image envoyée $_FILES
     * @param string $nameImg Nom donné à l'image
     * @param string $nameSize Nom de la taille souhaité
     * @param array $size Dimension de l'image
     * @return string Lien vers l'image
     */
    public static function saveImageArticle(array $data, string $nameImg,string $nameSize,array $size):string
    {
        $image = new Image;
        $imageData = $data['tmp_name'];
        $imageName = $data['name'];
        $formatImage = new \SplFileInfo($imageName);
        $extension = ($formatImage->getExtension());
        $linkImage = $image->createLinkImg($nameImg,$nameSize,$extension);
        $newImage =$image->treatmentImage($extension,$size[0],$size[1],$imageData,$linkImage);
        $newLink = str_replace('/var/www/topoclimat/public','',$linkImage);
        return $newLink;
    }

    public static function saveImageAlbum($data, string $nameImg,string $nameSize,array $size,string $linkAlbum):string
    {
        $image = new Image;
        $imageData = $data;
        $imageName = $nameImg;
        $formatImage = new \SplFileInfo($imageName);
        $extension = ($formatImage->getExtension());
        $linkImage = $image->createLinkImgStorm($nameImg,$nameSize,$extension,$linkAlbum);
        $newImage =$image->treatmentImage($extension,$size[0],$size[1],$imageData,$linkImage);
        $newLink = str_replace('/var/www/topoclimat/public','',$linkImage);
        return $newLink;
    }

    public static function saveAlertImage($data, string $nameImg,string $nameSize,array $size,string $linkAlbum)
    {
        $image = new Image;
        $imageData = $data;
        $imageName = $nameImg;
        $formatImage = new \SplFileInfo($imageName);
        $extension = ($formatImage->getExtension());
        $linkImage = $image->createLinkImgAlert($nameImg,$nameSize,$extension,$linkAlbum);
        $newImage =$image->treatmentImage($extension,$size[0],$size[1],$imageData,$linkImage);
        $newLink = str_replace('/var/www/topoclimat/public','',$linkImage);
        return $newLink;
    }
    /**
     * Vérifie la nature du fichier image
     *
     * @param  $img lien vers le fichier temporaire de l'image
     * @return bool
     */
    public static function mimeControl($img):bool
    {
        $type = mime_content_type($img);
        $result = false;
        switch ($type) {
            case 'image/png':
                $result = true;
                break;
            case 'image/jpeg':
                $result = true;
                break;
            default:
                $result = false;
                break;
        }
        return $result;
    }
    /**
     * Créer une image 
     *
     * @param string $extension EXtension de l'image envoyée
     * @param [type] $heightUser Hauteur saisie
     * @param [type] $widthUser Largeur saisie
     * @param [type] $imageSource Liens vers les données sources de l'image 
     * @param [type] $roadImage Future chemin où l'image sera enregsitrée
     * @return void
     */
    protected function treatmentImage(string $extension, $heightUser, $widthUser, $imageSource, $roadImage)
    {   
        $size = getimagesize($imageSource);
        list($width, $height) = $size;
        $ratio = $width / $height;
        if ($widthUser / $heightUser > $ratio) {
            $widthUser = $heightUser * $ratio;
        } else {
            $heightUser = $widthUser / $ratio;
        };
        $NewImageWhite = \imagecreatetruecolor(intval($widthUser),intval($heightUser));
        $image = imagecreatefromstring(file_get_contents($imageSource));
        imagecopyresampled($NewImageWhite, $image, 0, 0, 0, 0, intval($widthUser), intval($heightUser), $width, $height);
        switch ($extension) {
            case 'jpg':
                imagejpeg($NewImageWhite, $roadImage, 100);
                break;
            case 'jpeg':
                imagejpeg($NewImageWhite, $roadImage, 100);
                break;
            // case 'avif':
            //     imageavif($NewImageWhite, $roadImage, 75);
            //     break;
            case 'png':
                imagepng($NewImageWhite, $roadImage);
                break;
            // case 'gif':
            //     imagegif($NewImageWhite, $roadImage, 75);
            //     break;
            default:
                imagejpeg($NewImageWhite, $roadImage, 75);
                break;
        }
        imagedestroy($NewImageWhite);
        imagedestroy($image);
    }
    /**
     * Ecrit les zones de texte sur l'image
     *
     * @param \GdImage $image Image vierge
     * @param array $position Position du texte
     * @param integer $fontSize Taille de la police
     * @param string $texteData Texte à écrire
     * @param [type] $colorTxt Couleur du texte
     * @param [type] $font_path Chemin vers la police d'écriture
     * @return array
     */
    private function formatImage(\GdImage $image,array $position,int $fontSize, string $texteData, $colorTxt, $font_path):array
    {
        return imagettftext($image, $fontSize, 0, $position[0], $position[1], $colorTxt, $font_path, $texteData);
    }

    /**
     * Crée une infographie d'information météo
     *
     * @param string $source Infographie vierge
     * @param array $color Couleur du texte
     * @param array $colorIntro Couleur de l'intro
     * @param string $outputName Nom du fichier de sortie
     * @param array $textes Élements de textes: 1 = Secteur, 2 = Dates et 3 = Résumé
     * @return void
     */
    static function createInfographie(string $source,array $color = [ 255, 255, 255],array $colorIntro = [254, 190, 0], string $outputName = 'infographie.jpg',array $textes = ['ok','ok','ok']) {

        $image = imagecreatefromjpeg($source);
        $colorTxt = imagecolorallocate($image, $color[0], $color[1],  $color[2]);
        $colorTitle =  imagecolorallocate($image, $colorIntro[0], $colorIntro[1], $colorIntro[2]);
        $font_path = './Ubuntu-Regular.ttf';
        $texte = '';
        // Secteurs 
        $texte = $textes[0];
        $x = 350;
        $y = 1120; 
        $font_path = ROOT.'/style/css/font/Roboto/Roboto-Regular.ttf';
        imagettftext($image, 70, 0, $x, $y, $colorTitle, $font_path, $texte);
        // Dates
        $font_path = './Ubuntu-Bold.ttf';
        $texte = $textes[1];
        $this->formatImage($image,[350,1320],70,$texte,$colorTitle,$font_path);
        // Résumé
        $texte = $textes[2];
        $font_path = ROOT.'/style/css/font/Roboto/Roboto-Regular.ttf';
        $arrayWord = explode(' ',$texte);
        $newTxt = [];
        $txt = '';
        $indexWord = 0;
        $lngWords = [];
        foreach($arrayWord as $word) {
            $lngWords = imagettfbbox(55,0,$font_path,$txt);
            if($lngWords[2] > 2500) {
                $newTxt[$indexWord] = $txt;
                $txt = '';
                $indexWord++;
            }
            $txt = $txt.$word.' ';
        }
        $newTxt[$indexWord] = $txt;
        $h = 1520;
        foreach ($newTxt as $key) {
            $textWidth = imagettfbbox(55,0,$font_path,$key);
            $valueCenter = (3000 - $textWidth[2]) / 2;
            $x = round($valueCenter);
    
            $this->formatImage($image,[$x,$h],55,$key,$colorTxt,$font_path);
            $h += 100;
            $x = 450;
        }
        imagejpeg($image, $outputName);
        imagedestroy($image);
    }
}
