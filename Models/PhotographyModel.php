<?php
namespace App\Models;

class PhotographyModel extends Model
{
    protected $id_photo;
    protected $name_photo;
    protected $description_photo;
    protected $alt_photo;
    protected $size_photo;
    protected $link_photo;
    protected $coords_photo;
    protected $is_active_photo;
    protected $id_gal;

    public function __construct()
    {
        $this->table = 'photography';
    }

    /**
     * Récupère toute les photos miniatures d'un album
     *
     * @param integer $id ID de l'album
     * @return array tableau d'objet contenant les infos des photos
     */
    public function getAllPhotosAlbum(int $id):array
    {
        $result = $this->requete("SELECT * FROM photography WHERE id_gal = $id AND size_photo = 'M';")->fetchAll();
        return $result;
    }

    /**
     * Retourne les ID d'une même photo mais pour chaque taille
     *
     * @param integer $id ID de la photo de base
     * @return array Tableau d'objets contenant les ID
     */
    public function updateInfosPhotos(int $id):array {
        $result = $this->requete("SELECT * FROM photography WHERE id_photo = $id;")->fetch();
        $name = $result->name_photo;
        $idGal = $result->id_gal;
        $allInfos  = $this->getIdphoto($idGal, $name);
        return $allInfos;
    }
    /**
     * Retourne les ID d'une même photo mais pour chaque taille
     *
     * @param integer $id_gal ID de la galerie des photos
     * @param string $name_photo Nom de la photo de base
     * @return array Tableau d'objets contenant les 3 ID
     */
    private function getIdPhoto(int $id_gal, string $name_photo):array
    {
       return $this->requete("SELECT id_photo,name_photo FROM photography INNER JOIN gallery ON gallery.id_gal = photography.id_gal WHERE name_photo LIKE '%$name_photo%' AND photography.id_gal = $id_gal")->fetchAll();
    }
    /**
     * Récupère une photo depuis son nom
     *
     * @param string $name Titre de la photo
     * @param string $size Taille de l'image
     * @return void
     */
    public function getPhotoByName(string $name, string $size)
    {
        $name = str_replace(['é','è','ê'],'e',$name);
        $name = str_replace(['à','â'],'a',$name);
        return $this->requete("SELECT link_photo FROM photography WHERE name_photo LIKE '%$name%' AND size_photo = 'L'")->fetch();
    }
    public function getInfosPhotoById(int $id):object
    {
        return $this->requete("SELECT * FROM photography WHERE id_photo =$id")->fetch();
    }

    /**
     * Déactive ou Active une photo 
     *
     * @param integer $id ID de la photo
     */
    public function activePhoto(int $id, bool $is_active_photo)
    {
        if($is_active_photo) {
            $this->requete("UPDATE photography  SET is_active_photo = 0 WHERE id_photo = $id");
        }else {
            $this->requete("UPDATE photography  SET is_active_photo = 1 WHERE id_photo = $id");
        }
    }

    /**
     * Récupère les informations d'une photo
     *
     * @param integer $id ID de la photo
     * @return object Objet contenant les infos
     */
    public function getPhotoById(int $id):object 
    {
        return $this->requete("SELECT * FROM photography WHERE id_photo = $id AND is_active_photo = 1")->fetch();
    }
    /**
     * Get the value of id_photo
     */ 
    public function getId_photo()
    {
        return $this->id_photo;
    }

    /**
     * Set the value of id_photo
     *
     * @return  self
     */ 
    public function setId_photo($id_photo)
    {
        $this->id_photo = $id_photo;

        return $this;
    }

    /**
     * Get the value of name_photo
     */ 
    public function getName_photo()
    {
        return $this->name_photo;
    }

    /**
     * Set the value of name_photo
     *
     * @return  self
     */ 
    public function setName_photo($name_photo)
    {
        $this->name_photo = $name_photo;

        return $this;
    }

    /**
     * Get the value of description_photo
     */ 
    public function getDescription_photo()
    {
        return $this->description_photo;
    }

    /**
     * Set the value of description_photo
     *
     * @return  self
     */ 
    public function setDescription_photo($description_photo)
    {
        $this->description_photo = $description_photo;

        return $this;
    }

    /**
     * Get the value of alt_photo
     */ 
    public function getAlt_photo()
    {
        return $this->alt_photo;
    }

    /**
     * Set the value of alt_photo
     *
     * @return  self
     */ 
    public function setAlt_photo($alt_photo)
    {
        $this->alt_photo = $alt_photo;

        return $this;
    }

    /**
     * Get the value of is_active_photo
     */ 
    public function getIs_active_photo()
    {
        return $this->is_active_photo;
    }

    /**
     * Set the value of is_active_photo
     *
     * @return  self
     */ 
    public function setIs_active_photo($is_active_photo)
    {
        $this->is_active_photo = $is_active_photo;
        return $this;
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
     * Get the value of coords_photo
     */ 
    public function getCoords_photo()
    {
        return $this->coords_photo;
    }

    /**
     * Set the value of coords_photo
     *
     * @return  self
     */ 
    public function setCoords_photo($coords_photo)
    {
        $this->coords_photo = $coords_photo;

        return $this;
    }

    /**
     * Get the value of link_photo
     */ 
    public function getLink_photo()
    {
        return $this->link_photo;
    }

    /**
     * Set the value of link_photo
     *
     * @return  self
     */ 
    public function setLink_photo($link_photo)
    {
        $this->link_photo = $link_photo;

        return $this;
    }

    /**
     * Get the value of size_photo
     */ 
    public function getSize_photo()
    {
        return $this->size_photo;
    }

    /**
     * Set the value of size_photo
     *
     * @return  self
     */ 
    public function setSize_photo($size_photo)
    {
        $this->size_photo = $size_photo;

        return $this;
    }
}