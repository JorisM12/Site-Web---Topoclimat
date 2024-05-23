<?php
namespace App\Models;

class AlertTypeModel extends Model
{
    protected $id_type;
    protected $name_type;
    protected $link_img_type;

    public function __construct()
    {
        $this->table = 'alert_types';
        
    }
    /**
     * Get the value of id_type
     */ 
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * Set the value of id_type
     *
     * @return  self
     */ 
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        return $this;
    }

    /**
     * Get the value of name_type
     */ 
    public function getName_type()
    {
        return $this->name_type;
    }

    /**
     * Set the value of name_type
     *
     * @return  self
     */ 
    public function setName_type($name_type)
    {
        $this->name_type = $name_type;

        return $this;
    }

    /**
     * Get the value of link_img_type
     */ 
    public function getLink_img_type()
    {
        return $this->link_img_type;
    }

    /**
     * Set the value of link_img_type
     *
     * @return  self
     */ 
    public function setLink_img_type($link_img_type)
    {
        $this->link_img_type = $link_img_type;

        return $this;
    }
}