<?php

namespace App\Models;

class TagModel extends Model
{
    protected $id_tag;
    protected $name_tag;

    public function __construct()
    {
        $this->table = 'tag'; 
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
     * Get the value of name_tag
     */ 
    public function getName_tag()
    {
        return $this->name_tag;
    }

    /**
     * Set the value of name_tag
     *
     * @return  self
     */ 
    public function setName_tag($name_tag)
    {
        $this->name_tag = $name_tag;

        return $this;
    }
}