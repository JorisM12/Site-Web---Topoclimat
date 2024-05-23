<?php
namespace App\Models;

class GalleryModel extends Model
{
    protected $id_gal;
    protected $name_gal;
    protected $description_gal;
    protected $localisation_gal;
    protected $created_at_gal;
    protected $date_gal;
    protected $is_active_gal;
    protected $id_theme;
    protected $author_gal;
    protected $id_user;
    protected $is_storm;
    protected $is_completed;


    public function __construct()
    {
        $this->table = 'gallery';
    }


    /**
     * Récupère l'ID d'une galerie non complétée.
     *
     * @return
     */
    public function isCompletedGal()
    {
        return $this->requete('SELECT id_gal FROM gallery WHERE is_completed = 0')->fetch();
    }

    /**
     * Récupère toute les photos d'une galerie en version miniature
     *
     * @param integer $id_gal id de la galerie 
     * @return mixed
     */
    public function getAllPhotoMin(int $id_theme):mixed
    {
        $allPhotos = $this->requete("SELECT * FROM photography
        INNER JOIN gallery ON gallery.id_gal = photography.id_gal
        WHERE gallery.id_theme = $id_theme AND size_photo = 'L' ORDER BY gallery.date_gal DESC")->fetchAll();
        return $allPhotos;
    }

    /**
     * Récupère le lien vers la version HD d'une photo
     *
     * @param integer $id_gal Id du thème de la galerie concernée
     * @param string $name_photo nom de l'image
     * @return object
     */
    public function getXlPhoto(int $id_gal,string $name_photo):object
    {
        $name_photo = str_replace('-',' ',$name_photo);
        $photo = $this->requete("SELECT link_photo FROM photography
        INNER JOIN gallery ON gallery.id_gal = photography.id_gal
        WHERE gallery.id_theme = $id_gal AND size_photo = 'XL' AND name_photo LIKE '%$name_photo%'")->fetch();
        return $photo;
        
    }

    public function verifyAlbum()
    {
        return $this->requete("SELECT * FROM gallery WHERE is_storm = 1 AND is_completed = 0")->fetch();
    }

    /**
     * Retourne l'ID de la photo en format L
     *
     * @param integer $year Année de prise de vue 
     * @param string $name_photo Nom de la photo
     * @return integer ID de la photo
     */
    public function getLPhotoStorm(int $year,string $name_photo):int
    {
        //$name_photo = str_replace('-',' ',$name_photo);
        $name_photo = str_replace(['é','è','ê'],'e',$name_photo);
        $name_photo = str_replace(['à','â'],'a',$name_photo);
        $photo = $this->requete("SELECT id_photo FROM photography
        INNER JOIN gallery ON gallery.id_gal = photography.id_gal
        WHERE YEAR(gallery.date_gal) = $year AND size_photo = 'L' AND gallery.is_storm = 1 AND name_photo LIKE '%$name_photo%'")->fetch();
        return $photo->id_photo;
    }

    /**
     * Retourne le lien vers la photo en format XL
     *
     * @param integer $year Année de prise de vue de la photo
     * @param string $name_photo Nom de la photo
     * @param integer $id_gal ID de la galerie mère
     * @return object Objet contenant les infos
     */
    public function getXLPhotoStorm(int $year,string $name_photo, int $id_gal):object
    {
        $name_photo = str_replace('-',' ',$name_photo);
        $photo = $this->requete("SELECT link_photo FROM photography
        INNER JOIN gallery ON gallery.id_gal = photography.id_gal
        WHERE YEAR(gallery.date_gal) = $year AND size_photo = 'XL' AND gallery.is_storm = 1 AND name_photo LIKE '%$name_photo%' AND photography.id_gal = $id_gal")->fetch();
        return $photo;
    }

    /**
     * Retourne toutes les photos en version miniature de l'ensemble des albums d'une année
     *
     * @param integer $year année des albums contenant les photos
     * @return array Liste d'objet contenant les informations des photos
     */
    public function getAllPhotoAlbumStorm(int $year):array
    {
        $result = $this->requete("SELECT * FROM photography
            INNER JOIN gallery ON gallery.id_gal = photography.id_gal
            WHERE YEAR(gallery.date_gal) = $year AND size_photo = 'XL' AND photography.is_active_photo = 1 AND gallery.is_storm = 1 AND gallery.is_active_gal = 1")->fetchAll();
        return $result;
    }

     /**
     * Retourne tout les ID des photos pour une année donnée dans la section chasseur d'orages
     *
     * @param integer $year année des albums contenant les photos
     * @return array Liste d'objet contenant les id des photos
     */
    public function getAllIdPhotoAlbumStorm(int $year):array
    {
        $result = $this->requete("SELECT id_photo FROM photography
            INNER JOIN gallery ON gallery.id_gal = photography.id_gal
            WHERE YEAR(gallery.date_gal) = $year AND size_photo = 'XL' AND photography.is_active_photo = 1 AND gallery.is_storm = 1 AND gallery.is_active_gal = 1")->fetchAll();
        return $result;
    }
    
    /**
     * Retourne la liste des années des albums
     * 
     * @return array 
     */
    public function getYearAlbumStorm():array
    {
        $result = $this->requete("SELECT YEAR(gallery.date_gal) as date FROM gallery   WHERE gallery.is_storm = 1  GROUP BY YEAR(gallery.date_gal) DESC")->fetchAll();
        return $result;
    }


    /**
     * Retourne un tableau d'objet contenant tout les albums de chasse à l'orage
     *
     * @return array Tableau d'objets
     */ 
    public function getInfosAlbumsForManage():array
    {
        $result = $this->requete("SELECT * FROM gallery WHERE is_storm = 1;")->fetchAll();
        return $result;

    }

    /**
     * Retourne les information d'un album
     *
     * @param integer $id ID de l'album
     * @return object Objet contenant les infos
     */
    public function getInfosAlbum(int $id):object
    {
        $result = $this->requete("SELECT * FROM gallery WHERE id_gal = $id")->fetch();
        return $result;
    }

    /**
     * Déactive un album
     *
     * @param integer $id ID de l'album
     */
    public function desactiveAlbum(int $id)
    {
        $this->requete("UPDATE gallery SET is_active_gal = 0 WHERE id_gal = $id");
    }
    public function activeAlbum(int $id)
    {
        $this->requete("UPDATE gallery SET is_active_gal = 1 WHERE id_gal = $id");
    }

    /**
     * Retourne la date de toutes les années représentées
     *
     * @return array Contenant un objet avec une date
     */
    public function getNbrGal():array
    {
        return $this->requete("SELECT YEAR(gallery.date_gal) as date FROM `photography` INNER JOIN gallery ON gallery.id_gal = photography.id_gal  AND gallery.is_storm = 1 GROUP BY YEAR(gallery.date_gal) DESC LIMIT 3")->fetchAll();
    }

    /**
     * Retourne les miniature pour les galeries
     *
     * @return array Contenant un objet avec un lien
     */
    public function getMiniPhoto():array
    {
        return $this->requete("SELECT photography.link_photo FROM `photography` INNER JOIN gallery ON gallery.id_gal = photography.id_gal AND gallery.is_storm = 1  GROUP BY YEAR(gallery.date_gal) DESC")->fetchAll();
    }

    /**
     * Méthode qui fournit les ID des photos suivantes et précédentes d'un album annuelle de chasse à l'orage
     *
     * @param integer $id ID de la photo actuelle
     * @return array Tableau d'actions
     */
    public function navPhotoInStrom(int $id,int $year):array
    {
        $allId = $this->getAllIdPhotoAlbumStorm($year);
        $tabAllId = [];
        $actions = [];
        foreach ($allId as $ids => $value) {
            $tabAllId[] = $value->id_photo;
        }
        $pos = array_search($id,$tabAllId);
        if($pos == 0) {
            $actions['prev'] = false;
            $actions['next'] = $tabAllId[$pos+1];
        }elseif($pos == count($tabAllId) - 1) {
            $actions['next'] = false;
            $actions['prev'] = $tabAllId[$pos-1];
        }else{
            $actions['next'] = $tabAllId[$pos+1];
            $actions['prev'] = $tabAllId[$pos-1];
        }
        return $actions;
    }

    /**
     * Get the value of id_gal
     */ 
    public function getId_gal()
    {
        return $this->id_gal;
    }

    /**
     * Set the value of id_gal
     *
     * @return  self
     */ 
    public function setId_gal($id_gal)
    {
        $this->id_gal = $id_gal;

        return $this;
    }

    /**
     * Get the value of name_gal
     */ 
    public function getName_gal()
    {
        return $this->name_gal;
    }

    /**
     * Set the value of name_gal
     *
     * @return  self
     */ 
    public function setName_gal($name_gal)
    {
        $this->name_gal = $name_gal;

        return $this;
    }

    /**
     * Get the value of description_gal
     */ 
    public function getDescription_gal()
    {
        return $this->description_gal;
    }

    /**
     * Set the value of description_gal
     *
     * @return  self
     */ 
    public function setDescription_gal($description_gal)
    {
        $this->description_gal = $description_gal;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at_gal()
    {
        return $this->created_at_gal;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at_gal($created_at_gal)
    {
        $this->created_at_gal = $created_at_gal;

        return $this;
    }

    /**
     * Get the value of date_gal
     */ 
    public function getDate_gal()
    {
        return $this->date_gal;
    }

    /**
     * Set the value of date_gal
     *
     * @return  self
     */ 
    public function setDate_gal($date_gal)
    {
        $this->date_gal = $date_gal;

        return $this;
    }

    /**
     * Get the value of is_active_gal
     */ 
    public function getIs_active_gal()
    {
        return $this->is_active_gal;
    }

    /**
     * Set the value of is_active_gal
     *
     * @return  self
     */ 
    public function setIs_active_gal($is_active_gal)
    {
        $this->is_active_gal = $is_active_gal;

        return $this;
    }

    /**
     * Get the value of id_theme
     */ 
    public function getId_theme()
    {
        return $this->id_theme;
    }

    /**
     * Set the value of id_theme
     *
     * @return  self
     */ 
    public function setId_theme($id_theme)
    {
        $this->id_theme = $id_theme;

        return $this;
    }

    /**
     * Get the value of author_gal
     */ 
    public function getAuthor_gal()
    {
        return $this->author_gal;
    }

    /**
     * Set the value of author_gal
     *
     * @return  self
     */ 
    public function setAuthor_gal($author_gal)
    {
        $this->author_gal = $author_gal;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
    /**
     * Get the value of is_storm
     */ 
    public function getIs_storm()
    {
        return $this->is_storm;
    }

    /**
     * Set the value of is_storm
     *
     * @return  self
     */ 
    public function setIs_storm($is_storm)
    {
        $this->is_storm = $is_storm;

        return $this;
    }

    /**
     * Get the value of localisation_gal
     */ 
    public function getLocalisation_gal()
    {
        return $this->localisation_gal;
    }

    /**
     * Set the value of localisation_gal
     *
     * @return  self
     */ 
    public function setLocalisation_gal($localisation_gal)
    {
        $this->localisation_gal = $localisation_gal;

        return $this;
    }

    /**
     * Get the value of is_completed
     */ 
    public function getIs_completed()
    {
        return $this->is_completed;
    }

    /**
     * Set the value of is_completed
     *
     * @return  self
     */ 
    public function setIs_completed($is_completed)
    {
        $this->is_completed = $is_completed;

        return $this;
    }
}