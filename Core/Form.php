<?php
namespace App\Core;

class Form 
{
    private $formCode = "";

    /**
     * Génère le formulaire HTML
     *
     * @return string
     */
    public function create():string
    {
        return $this->formCode;
    }

    /**
     * Valide si tous les champs sont remplis
     *
     * @param array $form tableau issu du formulaire 
     * @param array $champs à valider
     * @return bool
     */
    public  static function validate(array $form, array $champs):bool
    {
        foreach($champs as $champ){
            if(!isset($form[$champ]) || empty($form[$champ])){
                return false;
            }
        }
        return true;
    }

    /**
     * Ajoute les attributs envoyés
     *
     * @param array $attribut Tableau asscoiatif 
     * @return string 
     */
    private function ajoutAttribut(array $attributs):string
    {
        $str = '';
        $court = ['check', 'disabled', 'readonly', 'multiple','required','autofocus','novalidate','formnovalidate'];
        foreach($attributs as $attribut => $valeur){
            if(in_array($attribut, $court) && $valeur == true){
                $str .=" $attribut";            
            }else{
                $str .= " $attribut=\"$valeur\"";
            }
        }
        return $str;
    }
    /**
     * Balise d'ouverture du formulaire
     *
     * @param string $methode du formulaire
     * @param string $action du formulaire
     * @param array $attributs éventuels
     * @return Form
     */
    public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []):self
    {
        //On crée la balise form
        $this->formCode .= "<form action ='$action' method='$methode'";
        //On ajoute les attributs eventuels
        $this->formCode .= $attributs ? $this->ajoutAttribut($attributs).'>' : '>';
        return $this;
    }

    /**
     * Balise de fermeture du formulaire
     *
     * @return Form
     */
    public function finForm():self
    {
        $this->formCode .= "</form>";
        return $this;
    }
    /**
     * Ajout d'un label 
     *
     * @param string $for
     * @param string $texte
     * @param array $attributs
     * @return Form
     */
    public function ajoutLabelFor(string $for, string $texte, array $attributs = []):self
    {
        $this->formCode .="<label for='$for'";
        $this->formCode .= $attributs ? $this->ajoutAttribut($attributs) : '';
        $this->formCode .= ">$texte</label>";
        return $this;
    }
    public function ajoutInput(string $type, string $nom, array $attributs = []):self
    {
        $this->formCode .= "<input type='$type' name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttribut(($attributs)).'>' : '>';
        return $this;
    }

    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = []):self
    {
        $this->formCode .="<textarea name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttribut($attributs) : '';
        $this->formCode .= ">$valeur</textarea>";
        return $this;
    }
    /**
     * Créer un select
     *
     * @param string $nom du select
     * @param array $options dans le select
     * @param array $attributs 
     * @return self
     */
    public function ajoutSelect(string $nom, array $options, array $attributs = []):self
    {
        $this->formCode .="<select name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttribut($attributs).'>' : '>';

        foreach ($options as $valeur => $texte) {
            $this->formCode ="<option value=\"$valeur\"> $texte </option>";        
        }
        $this->formCode .= '</select>';
        return $this;
    }
    /**
     * Créer un bouton 
     *
     * @param string $texte dans le bouton
     * @param array $attributs du bouton
     * @return self
     */
    public function ajoutBouton(string $texte, array $attributs = []):self
    {
        $this->formCode .= "<button";

        $this->formCode .= $attributs ? $this->ajoutAttribut($attributs) : '';

        $this->formCode .= "> $texte </button>";

        return $this;
    }

    public function ajoutPersonalise(string $contenu):self
    {
        $this->formCode .= "$contenu";
        return $this;
    }
}