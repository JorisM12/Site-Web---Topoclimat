<?php

namespace App\Core;

class Mail
{
    /**
     * Envoie un mail de confirmation de compte
     *
     * @param string $token JWT généré 
     * @param string $to Mail de l'utilisateur
     * @return bool
     */
    public function confirmRegister(string $token,string $to):bool
    {
        $link = "topoclimat.com/users/confirmUser?".$token;
        $subject = "Confirmation de création du compte";
        $message = "Voici le lien pour valider votre compte (valide durant 24h):".$link;
        $headers = "From: noreply@topoclimat.fr\r\n";
        $headers .= "Reply-To: noreply@topoclimat.fr\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        try {
            mail($to, $subject, $message, $headers);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
}