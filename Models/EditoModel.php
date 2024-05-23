<?php
namespace App\Models;

use App\Models\Model;

class EditoModel extends Model
{
    protected $id_edito;
    protected $rank_edito;
    protected $title_edito;
    protected $date_edito;
    protected $description_edito;
    protected $loc_edito;
    protected $photo_edito;
    protected $id_user;

    public function __construct()
    {
        $this->table = 'edito';
    }

    /**
     * Récupère la date et le titre d'un édito pour alimenter la barre de navigation
     *
     * @param integer $id_user ID de l'équipe 
     * @return array Tableau contenant les données
     */
    public function getDateAndTitleEdito(int $id_user):array
    {
        return $this->requete("SELECT date_edito,DATE_FORMAT(date_edito ,'%d/%m') as date_form, title_edito as title FROM `edito` WHERE `id_user`= $id_user GROUP BY `date_edito`")->fetchAll();
    }

    public function getEdito(int $id_user, string $date)
    {
        return $this->requete("SELECT * FROM `edito` WHERE `id_user`= $id_user AND date_edito = '$date' ORDER BY rank_edito ASC")->fetchAll();
    }

    /**
     * Get the value of id_edito
     */ 
    public function getId_edito()
    {
        return $this->id_edito;
    }

    /**
     * Set the value of id_edito
     *
     * @return  self
     */ 
    public function setId_edito($id_edito)
    {
        $this->id_edito = $id_edito;

        return $this;
    }

    /**
     * Get the value of title_edito
     */ 
    public function getTitle_edito()
    {
        return $this->title_edito;
    }

    /**
     * Set the value of title_edito
     *
     * @return  self
     */ 
    public function setTitle_edito($title_edito)
    {
        $this->title_edito = $title_edito;

        return $this;
    }

    /**
     * Get the value of date_edito
     */ 
    public function getDate_edito()
    {
        return $this->date_edito;
    }

    /**
     * Set the value of date_edito
     *
     * @return  self
     */ 
    public function setDate_edito($date_edito)
    {
        $this->date_edito = $date_edito;

        return $this;
    }

    /**
     * Get the value of description_edito
     */ 
    public function getDescription_edito()
    {
        return $this->description_edito;
    }

    /**
     * Set the value of description_edito
     *
     * @return  self
     */ 
    public function setDescription_edito($description_edito)
    {
        $this->description_edito = $description_edito;

        return $this;
    }

    /**
     * Get the value of loc_edito
     */ 
    public function getLoc_edito()
    {
        return $this->loc_edito;
    }

    /**
     * Set the value of loc_edito
     *
     * @return  self
     */ 
    public function setLoc_edito($loc_edito)
    {
        $this->loc_edito = $loc_edito;

        return $this;
    }

    /**
     * Get the value of photo_edito
     */ 
    public function getPhoto_edito()
    {
        return $this->photo_edito;
    }

    /**
     * Set the value of photo_edito
     *
     * @return  self
     */ 
    public function setPhoto_edito($photo_edito)
    {
        $this->photo_edito = $photo_edito;

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
     * Get the value of rank_edito
     */ 
    public function getRank_edito()
    {
        return $this->rank_edito;
    }

    /**
     * Set the value of rank_edito
     *
     * @return  self
     */ 
    public function setRank_edito($rank_edito)
    {
        $this->rank_edito = $rank_edito;

        return $this;
    }
}