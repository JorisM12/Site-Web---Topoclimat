<?php 
namespace App\Models;

class ArticlesModel extends Model
{
    protected $id_article;
    protected $created_at_article;
    protected $date_article;
    protected $modified_article;
    protected $title_article;
    protected $intro_article;
    protected $first_txt_article;
    protected $second_txt_article;
    protected $last_txt_article;
    protected $is_active_article;
    protected $id_cat;
    protected $id_user;
    protected $is_simple_article;
    
    public function __construct()
    {
        $this->table = 'articles';
    }

    /**
     * Retourne le dernier id inséré dans la table article
     *
     * @return int ID de l'article
     */
    public function findLastId():int
    {
        $result = $this->requete('SELECT id_article FROM articles ORDER BY id_article DESC LIMIT 1');
        $id = $result->fetch();
        return $id->id_article;
    }

    /**
     * Retourne toute les informations d'un article
     *
     * @param integer $id_article id de l'article
     * @return void
     */
    public function getFullInfoArticle(int $id_article)
    {
        $result = $this->requete("SELECT *, GROUP_CONCAT(tag.name_tag) AS tags FROM articles INNER JOIN articleXtag ON articleXtag.id_article = articles.id_article INNER JOIN tag ON tag.id_tag = articleXtag.id_tag INNER JOIN categories_articles ON categories_articles.id_cat = articles.id_cat WHERE articles.id_article = $id_article GROUP BY articles.id_article");
        $infos = $result->fetch();
        return $infos;
    }
    /**
     * Retourne la liste des articles avec les infos associés (nom des tags etc)
     *
     * @return void
     */
    public function getFullInfoListArticles($limite = 0, int $idCat = 0)
    {
        $filter ='';
        if($idCat != 0) {
            $filter = " articles.id_cat= $idCat AND";
        }
        if ($limite == 0) {
            $result = $this->requete("SELECT * FROM articles INNER JOIN articleXtag ON articleXtag.id_article = articles.id_article INNER JOIN tag ON tag.id_tag = articleXtag.id_tag INNER JOIN categories_articles ON categories_articles.id_cat = articles.id_cat WHERE $filter is_active_article = 1 ORDER BY articles.id_article DESC");
            $infos = $result->fetchAll();
            return $infos;
        } else {
            $result = $this->requete("SELECT * FROM articles INNER JOIN articleXtag ON articleXtag.id_article = articles.id_article INNER JOIN tag ON tag.id_tag = articleXtag.id_tag INNER JOIN categories_articles ON categories_articles.id_cat = articles.id_cat  WHERE is_active_article = 1 ORDER BY articles.id_article DESC LIMIT $limite");
            $infos = $result->fetchAll();
            return $infos;
        }
    }
    public function getFullInfoListArticlesMain()
    {
        $result = $this->requete("SELECT * FROM articles INNER JOIN categories_articles ON categories_articles.id_cat = articles.id_cat WHERE  is_active_article = 1 ORDER BY articles.id_article DESC LIMIT 3");
        $infos = $result->fetchAll();
        return $infos; 
    }

    /**
     * Retourne les données prinicipales pour créer un tableau de gestion des articles
     *
     * @param integer $limite Nombre d'éléments à retourner
     * @param string $keyWord Mot clés à rechercher dans les titres
     * @param integer $year Années de publication
     * @param integer $month Mois de publication
     * @return void
     */
    public function getFullInfoListArticlesAdmin($limite = 0,string $keyWord = '', int $year = 0, int $month = 0)
    {
        $filter = "WHERE 1 = 1";
        if ($keyWord !== '') {
           $filter .= " AND title_article LIKE '%$keyWord%'";
        }
        if ($year !== 0) {
            $filter .= " AND DATE_FORMAT(date_article,'%Y') = $year";
        }
        if ($month !== 0) {
            $filter .= " AND DATE_FORMAT(date_article,'%m') = $month";
        }
        if ($limite == 0) {
            $result = $this->requete("SELECT * FROM articles INNER JOIN articleXtag ON articleXtag.id_article = articles.id_article INNER JOIN tag ON tag.id_tag = articleXtag.id_tag INNER JOIN categories_articles ON categories_articles.id_cat = articles.id_cat INNER JOIN users ON users.id_user = articles.id_user ".$filter." ORDER BY articles.id_article DESC");
            $infos = $result->fetchAll();
            return $infos;
        }
    }

    /**
     * Archive un article
     *
     * @param int $id_article ID de l'article à supprimer
     * @return void
     */
    public function deleteArticle(int $id_article)
    {
        $articleModel = new ArticlesModel;
        $articleModel->requete("UPDATE `articles` SET `is_active_article` = '0' WHERE `articles`.`id_article` = $id_article");
    }

    /**
     * Récupère le lien vers la version HD d'une image d'article
     *
     * @param integer $num Numéro de la figure
     * @param integer $id id de l'article
     * @return mixed
     */
    public function getZoomImg(int $num, int $id):mixed
    {
        $result = $this->requete("SELECT link_figure FROM figures WHERE id_article = $id AND size_figure = 'XL' AND num_figure = $num");
        $link = $result->fetch();
        return $link->link_figure;
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
     * Get the value of created_at_article
     */ 
    public function getCreated_at_article()
    {
        return $this->created_at_article;
    }

    /**
     * Set the value of created_at_article
     *
     * @return  self
     */ 
    public function setCreated_at_article($created_at_article)
    {
        $this->created_at_article = $created_at_article;

        return $this;
    }

    /**
     * Get the value of date_article
     */ 
    public function getDate_article()
    {
        return $this->date_article;
    }

    /**
     * Set the value of date_article
     *
     * @return  self
     */ 
    public function setDate_article($date_article)
    {
        $this->date_article = $date_article;

        return $this;
    }

    /**
     * Get the value of modified_article
     */ 
    public function getModified_article()
    {
        return $this->modified_article;
    }

    /**
     * Set the value of modified_article
     *
     * @return  self
     */ 
    public function setModified_article($modified_article)
    {
        $this->modified_article = $modified_article;

        return $this;
    }

    /**
     * Get the value of title_article
     */ 
    public function getTitle_article()
    {
        return $this->title_article;
    }

    /**
     * Set the value of title_article
     *
     * @return  self
     */ 
    public function setTitle_article($title_article)
    {
        $this->title_article = $title_article;

        return $this;
    }

    /**
     * Get the value of intro_article
     */ 
    public function getIntro_article()
    {
        return $this->intro_article;
    }

    /**
     * Set the value of intro_article
     *
     * @return  self
     */ 
    public function setIntro_article($intro_article)
    {
        $this->intro_article = $intro_article;

        return $this;
    }

    /**
     * Get the value of first_txt_article
     */ 
    public function getFirst_txt_article()
    {
        return $this->first_txt_article;
    }

    /**
     * Set the value of first_txt_article
     *
     * @return  self
     */ 
    public function setFirst_txt_article($first_txt_article)
    {
        $this->first_txt_article = $first_txt_article;

        return $this;
    }

    /**
     * Get the value of second_txt_article
     */ 
    public function getSecond_txt_article()
    {
        return $this->second_txt_article;
    }

    /**
     * Set the value of second_txt_article
     *
     * @return  self
     */ 
    public function setSecond_txt_article($second_txt_article)
    {
        $this->second_txt_article = $second_txt_article;

        return $this;
    }

    /**
     * Get the value of last_txt_article
     */ 
    public function getLast_txt_article()
    {
        return $this->last_txt_article;
    }

    /**
     * Set the value of last_txt_article
     *
     * @return  self
     */ 
    public function setLast_txt_article($last_txt_article)
    {
        $this->last_txt_article = $last_txt_article;

        return $this;
    }

    /**
     * Get the value of is_active_article
     */ 
    public function getIs_active_article()
    {
        return $this->is_active_article;
    }

    /**
     * Set the value of is_active_article
     *
     * @return  self
     */ 
    public function setIs_active_article($is_active_article)
    {
        $this->is_active_article = $is_active_article;

        return $this;
    }
    /**
     * Get the value of id_cat
     */ 
    public function getId_cat()
    {
        return $this->id_cat;
    }

    /**
     * Set the value of id_cat
     *
     * @return  self
     */ 
    public function setId_cat($id_cat)
    {
        $this->id_cat = $id_cat;

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
     * Get the value of is_simple_article
     */ 
    public function getIs_simple_article()
    {
        return $this->is_simple_article;
    }

    /**
     * Set the value of is_simple_article
     *
     * @return  self
     */ 
    public function setIs_simple_article($is_simple_article)
    {
        $this->is_simple_article = $is_simple_article;

        return $this;
    }
}

