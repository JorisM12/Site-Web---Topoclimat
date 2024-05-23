<?php
namespace App\Models;

use App\Core\Db;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de connexion
    private $db;
    /**
     * Méthode qui exécutera les requêtes
     * @param string $sql Requête SQL à exécuter
     * @param array $attributes Attributs à ajouter à la requête 
     * @return PDOStatement|false 
     */
    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if($attributs !== null){
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            // Requête simple
            return $this->db->query($sql);
        }
    }
    /**
     * Sélection de tous les enregistrements d'une table
     * @return array Tableau des enregistrements trouvés
     */
    public function findAll()
    {
        $query = $this->requete('SELECT * FROM '.$this->table);
        return $query->fetchAll();
    }


    /**
     * Retourne une date en format français
     *
     * @param [type] $date 
     * @return string date modifiée
     */
    public static function frenchDateFormat($date):string
    {
        $date = date('d-m-Y',strtotime($date));
        return $date;
    }

    /**
     * Sélection de plusieurs enregistrements suivant un tableau de critères
     * @param array $criteres Tableau de critères
     * @return array Tableau des enregistrements trouvés
     */
    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour "éclater le tableau"
        foreach($criteres as $champ => $valeur){
            $champs[] = "$champ = ?";
            $valeurs[]= $valeur;
        }

        // On transforme le tableau en chaîne de caractères séparée par des AND
        $liste_champs = implode(' AND ', $champs);

        // On exécute la requête
        return $this->requete("SELECT * FROM {$this->table} WHERE $liste_champs", $valeurs)->fetchAll();
    }
    public function find(int $id, string $table)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE id_$table = $id")->fetch();
    }

    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];
        foreach ($this as $champ => $valeur) {
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        return $this->requete("INSERT INTO " . $this->table . " ($liste_champs) VALUES ($liste_inter)", $valeurs);
    }

    /**
     * Hydrate une table en données
     *
     * @param array $donnees saisie
     * @return self
     */
    public function hydrate($donnees):self
    {
        foreach ($donnees as $key => $value) {
            //On récupère le nom du setteur correspondant à la clés 
            // titre -> setTitre
            $setter = 'set'.ucfirst($key);

            //On vérifie si le setteur existe 
            if(method_exists($this,$setter)){
                //On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }

    /**
     * Met à jour une table 
     * @return void
     */
    public function update($id,$nameId)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour "éclater le tableau"
        foreach ($this as $champ => $valeur) {
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;
        $liste_champs = implode(', ', $champs);
        return $this->requete('UPDATE '.$this->table.' SET '.$liste_champs.' WHERE '.$nameId.' = ?', $valeurs);

    }
    /**
     * Supprime un élément via son ID
     *
     * @param integer $id de l'élément
     * @return void
     */
    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?",[$id]);
    }

}

