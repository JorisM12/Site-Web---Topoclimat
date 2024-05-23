<?php 

namespace App\Models;

use App\Models\Model;

class UsersModel extends Model
{
    protected $id_user;
    protected $name_user;
    protected $first_name_user;
    protected $mail_user;
    protected $password_user;
    protected $status_user;
    protected $token_user;
    protected $confirm_user;

    public function __construct()
    {
        $this->table = "users";   
    }

    /**
     * Créer la session de l'utilisateur 
     *
     * @return void
     */
    public function setSession():void
    {
        $_SESSION['user'] = [
            'name' => $this->name_user,
            'first_name' => $this->first_name_user,
            'id' => $this->id_user,
            'roles' => $this->status_user,
        ];

    }
    /**
     * Recupère un utilisateur à partir de son e-mail
     *
     * @param string $email de l'utilisateur
     * @return void
     */
    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM $this->table WHERE mail_user = ?", [$email])->fetch();
    }
    /**
     * Vérifie si le mail appartient déjà à un utilisateur et si le compte est confirmé
     *
     * @param string $email email de l'utilisateur
     * @return bool
     */
    public function verifyMail(string $email):bool
    {
       $mail =  $this->requete("SELECT * FROM $this->table WHERE mail_user = ?", [$email])->fetch();
       if($mail) {
            return $mail->confirm_user == 1 ? true : false;

       }else{
            return false;
       }
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
     * Get the value of name_user
     */ 
    public function getName_user()
    {
        return $this->name_user;
    }

    /**
     * Set the value of name_user
     *
     * @return  self
     */ 
    public function setName_user($name_user)
    {
        $this->name_user = $name_user;

        return $this;
    }

    /**
     * Get the value of first_name_user
     */ 
    public function getFirst_name_user()
    {
        return $this->first_name_user;
    }

    /**
     * Set the value of first_name_user
     *
     * @return  self
     */ 
    public function setFirst_name_user($first_name_user)
    {
        $this->first_name_user = $first_name_user;

        return $this;
    }

    /**
     * Get the value of mail_user
     */ 
    public function getMail_user()
    {
        return $this->mail_user;
    }

    /**
     * Set the value of mail_user
     *
     * @return  self
     */ 
    public function setMail_user($mail_user)
    {
        $this->mail_user = $mail_user;

        return $this;
    }

    /**
     * Get the value of password_user
     */ 
    public function getPassword_user()
    {
        return $this->password_user;
    }

    /**
     * Set the value of password_user
     *
     * @return  self
     */ 
    public function setPassword_user($password_user)
    {
        $this->password_user = $password_user;

        return $this;
    }

    /**
     * Get the value of status_user
     */ 
    public function getStatus_user()
    {
        return $this->status_user;
    }

    /**
     * Set the value of status_user
     *
     * @return  self
     */ 
    public function setStatus_user($status_user)
    {
        $this->status_user = $status_user;

        return $this;
    }

    /**
     * Get the value of token_user
     */ 
    public function getToken_user()
    {
        return $this->token_user;
    }

    /**
     * Set the value of token_user
     *
     * @return  self
     */ 
    public function setToken_user($token_user)
    {
        $this->token_user = $token_user;

        return $this;
    }

    /**
     * Get the value of confirm_user
     */ 
    public function getConfirm_user()
    {
        return $this->confirm_user;
    }

    /**
     * Set the value of confirm_user
     *
     * @return  self
     */ 
    public function setConfirm_user($confirm_user)
    {
        $this->confirm_user = $confirm_user;

        return $this;
    }
}