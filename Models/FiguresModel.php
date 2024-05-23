<?php
namespace App\Models;

class FiguresModel extends Model
{
    protected $id_figure;
    protected $created_at_figure;
    protected $num_figure;
    protected $size_figure;
    protected $title_figure;
    protected $legend_figure;
    protected $alt_figure;
    protected $link_figure;
    protected $id_article;

    public function __construct()
    {
        $this->table = 'figures';
    }
    /**
     * Supprime les 3 fichiers images correspondant à une figure donnée
     *
     * @param integer $id_article ID de l'article dans lequel se trouve la figure
     * @param integer $numFig   Numéro de la figure
     * @return void
     */
    public function deleteFigures(int $id_article,int $numFig)
    {
        $allFig = $this->requete("SELECT * FROM figures WHERE id_article = $id_article AND num_figure = $numFig");
        $deleteFigs = $allFig->fetchAll();
        foreach ($deleteFigs as $fig => $value) {
            unlink($value->link_figure);
        }
    }

    /**
     * Récupère les image pour la liste des articles
     *
     * @return array
     */
    public function getImgForListArticle():array
    {
        $list = $this->requete("SELECT * FROM figures WHERE num_figure = 1 AND size_figure = 'L' ORDER BY id_article ASC");
        return $list->fetchAll();
    }
    /**
     * Récupère les figures d'un article
     *
     * @param integer $id_article ID de l'article
     * @param integer $num_figure Numéro de la figure (1 à 3)
     * @return object
     */
    public function getFigureForArticle(int $id_article, int $num_figure):object
    {
       return $this->requete("SELECT * FROM figures WHERE id_article = $id_article AND num_figure = $num_figure AND size_figure = 'L'");
    }

    /**
     * Get the value of id_figure
     */ 
    public function getId_figure()
    {
        return $this->id_figure;
    }

    /**
     * Set the value of id_figure
     *
     * @return  self
     */ 
    public function setId_figure($id_figure)
    {
        $this->id_figure = $id_figure;

        return $this;
    }

    /**
     * Get the value of created_at_figure
     */ 
    public function getCreated_at_figure()
    {
        return $this->created_at_figure;
    }

    /**
     * Set the value of created_at_figure
     *
     * @return  self
     */ 
    public function setCreated_at_figure($created_at_figure)
    {
        $this->created_at_figure = $created_at_figure;

        return $this;
    }

    /**
     * Get the value of num_figure
     */ 
    public function getNum_figure()
    {
        return $this->num_figure;
    }

    /**
     * Set the value of num_figure
     *
     * @return  self
     */ 
    public function setNum_figure($num_figure)
    {
        $this->num_figure = $num_figure;

        return $this;
    }

    /**
     * Get the value of title_figure
     */ 
    public function getTitle_figure()
    {
        return $this->title_figure;
    }

    /**
     * Set the value of title_figure
     *
     * @return  self
     */ 
    public function setTitle_figure($title_figure)
    {
        $this->title_figure = $title_figure;

        return $this;
    }

    /**
     * Get the value of legend_figure
     */ 
    public function getLegend_figure()
    {
        return $this->legend_figure;
    }

    /**
     * Set the value of legend_figure
     *
     * @return  self
     */ 
    public function setLegend_figure($legend_figure)
    {
        $this->legend_figure = $legend_figure;

        return $this;
    }

    /**
     * Get the value of alt_figure
     */ 
    public function getAlt_figure()
    {
        return $this->alt_figure;
    }

    /**
     * Set the value of alt_figure
     *
     * @return  self
     */ 
    public function setAlt_figure($alt_figure)
    {
        $this->alt_figure = $alt_figure;

        return $this;
    }


    /**
     * Get the value of link_figure
     */ 
    public function getLink_figure()
    {
        return $this->link_figure;
    }

    /**
     * Set the value of link_figure
     *
     * @return  self
     */ 
    public function setLink_figure($link_figure)
    {
        $this->link_figure = $link_figure;

        return $this;
    }

    /**
     * Get the value of id_article
     */ 
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */ 
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }

    /**
     * Get the value of size_figure
     */ 
    public function getSize_figure()
    {
        return $this->size_figure;
    }

    /**
     * Set the value of size_figure
     *
     * @return  self
     */ 
    public function setSize_figure($size_figure)
    {
        $this->size_figure = $size_figure;

        return $this;
    }
}