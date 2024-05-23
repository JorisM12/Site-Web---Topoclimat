<?php

namespace App\Models;

class ThemesModel extends Model
{
    protected $id_theme;
    protected $name_theme;
    protected $description_theme;
    protected $is_active_theme;

    public function __construct()
    {
        $this->table = 'themes';
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
     * Get the value of name_theme
     */ 
    public function getName_theme()
    {
        return $this->name_theme;
    }

    /**
     * Set the value of name_theme
     *
     * @return  self
     */ 
    public function setName_theme($name_theme)
    {
        $this->name_theme = $name_theme;
        return $this;
    }

    /**
     * Get the value of description_theme
     */ 
    public function getDescription_theme()
    {
        return $this->description_theme;
    }

    /**
     * Set the value of description_theme
     *
     * @return  self
     */ 
    public function setDescription_theme($description_theme)
    {
        $this->description_theme = $description_theme;
        return $this;
    }

    /**
     * Get the value of is_active_theme
     */ 
    public function getIs_active_theme()
    {
        return $this->is_active_theme;
    }

    /**
     * Set the value of is_active_theme
     *
     * @return  self
     */ 
    public function setIs_active_theme($is_active_theme)
    {
        $this->is_active_theme = $is_active_theme;

        return $this;
    }
}