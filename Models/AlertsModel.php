<?php
namespace App\Models;

class AlertsModel extends Model
{
    protected $id_alerts;
    protected $start_alert;
    protected $end_alert;
    protected $published;
    protected $description_alert;
    protected $link_img_alert;
    protected $is_active_alert;
    protected $id_type;

    public function __construct()
    {
        $this->table = 'alerts';
        
    }

    /**
     * Recupère toute les infos concernant une alerte
     */
    public function getFullInfo()
    {
        $result = $this->requete("SELECT *, DATE_FORMAT(start_alert, '%d/%m/%Y') AS startDay, DATE_FORMAT(start_alert, '%H:%i') AS startHour, DATE_FORMAT(end_alert, '%d/%m/%Y') AS endDay, DATE_FORMAT(end_alert, '%H:%i') AS endHour FROM `alerts`INNER JOIN alert_types ON alert_types.id_type = alerts.id_type WHERE is_active_alert = 1 AND end_alert > NOW()");
        return $result->fetch();

    }

    /**
     * Déactive une alrte
     *
     * @param int $id ID de l'alerte
     * @return void
     */
    public function deleteAlert(int $id)
    {
        $this->requete("UPDATE alerts SET `is_active_alert` = 0 WHERE alerts.id_alerts = $id");
    }
    /**
     * Get the value of id_alerts
     */ 
    public function getId_alerts()
    {
        return $this->id_alerts;
    }
    /**
     * Set the value of id_alerts
     *
     * @return  self
     */ 
    public function setId_alerts($id_alerts)
    {
        $this->id_alerts = $id_alerts;

        return $this;
    }

    /**
     * Get the value of start_alert
     */ 
    public function getStart_alert()
    {
        return $this->start_alert;
    }

    /**
     * Set the value of start_alert
     *
     * @return  self
     */ 
    public function setStart_alert($start_alert)
    {
        $this->start_alert = $start_alert;

        return $this;
    }

    /**
     * Get the value of end_alert
     */ 
    public function getEnd_alert()
    {
        return $this->end_alert;
    }

    /**
     * Set the value of end_alert
     *
     * @return  self
     */ 
    public function setEnd_alert($end_alert)
    {
        $this->end_alert = $end_alert;

        return $this;
    }

    /**
     * Get the value of published
     */ 
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set the value of published
     *
     * @return  self
     */ 
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get the value of description_alert
     */ 
    public function getDescription_alert()
    {
        return $this->description_alert;
    }

    /**
     * Set the value of description_alert
     *
     * @return  self
     */ 
    public function setDescription_alert($description_alert)
    {
        $this->description_alert = $description_alert;

        return $this;
    }
    /**
     * Get the value of link_img_alert
     */ 
    public function getLink_img_alert()
    {
        return $this->link_img_alert;
    }
    /**
     * Set the value of link_img_alert
     *
     * @return  self
     */ 
    public function setLink_img_alert($link_img_alert)
    {
        $this->link_img_alert = $link_img_alert;

        return $this;
    }

    /**
     * Get the value of is_active_alert
     */ 
    public function getIs_active_alert()
    {
        return $this->is_active_alert;
    }

    /**
     * Set the value of is_active_alert
     *
     * @return  self
     */ 
    public function setIs_active_alert($is_active_alert)
    {
        $this->is_active_alert = $is_active_alert;

        return $this;
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
}
