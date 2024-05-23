<?php

namespace App\Models;

class ArticleXTagModel extends Model
{
    protected $id_tag;
    protected $id_article;
    public function __construct()
    {
        $this->table = 'articleXtag';
    }

    /**
     * Retourne la liste des tag associés à l'article
     *
     * @param integer $id_article ID de l'article 
     * @return array Tableau des tags 
     */
    public function listTag(int $id_article):array
    {
        $result = $this->requete("SELECT * FROM articleXtag INNER JOIN tag ON tag.id_tag = articleXtag.id_tag WHERE id_article = $id_article");
        $tags = $result->fetchAll();
        return $tags;
    }

    /**
     * Get the value of id_tag
     */ 
    public function getId_tag()
    {
        return $this->id_tag;
    }

    /**
     * Set the value of id_tag
     *
     * @return  self
     */ 
    public function setId_tag($id_tag)
    {
        $this->id_tag = $id_tag;

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
}