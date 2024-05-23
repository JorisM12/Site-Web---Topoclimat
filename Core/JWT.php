<?php

namespace App\Core;

class JWT
{
    /**
     * Génère un token JWT
     *
     * @param array $header Alogo de chiffrement etc
     * @param array $payload Données du payload (id utilisateur, roles..)
     * @param string $secret Clés secrète
     * @param integer $validity Durée de validité du token
     * @return string Token JWT 
     */
    public function generate(array $header, array $payload, string $secret, int $validity = 86400): string
    {
        if($validity > 0) {
            $now = new \DateTime();
            $expiration = $now->getTimestamp() + $validity;
            $payload['iat'] = $now->getTimestamp();
            $payload['exp'] = $expiration;
        }
        $base64Header = base64_encode(json_encode($header));
        $base64Payload = base64_encode(json_encode($payload));
        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);
        $secret = base64_encode($secret);
        $signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret, true);
        $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        $jwt = $base64Header . '.' . $base64Payload . '.' . $signature;

        return $jwt;
    }
    /**
     * Vérifie si le token est valide
     *
     * @param string $token token de l'utilisateur
     * @param string $secret chaine secrète 
     * @return boolean
     */
    public function check(string $token, string $secret):bool
    {
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);
        $verifToken = $this->generate($header,$payload,$secret,0);
        return $token === $verifToken;
    }
    /**
     * Récupère le header du token
     *
     * @param string $token token de l'uutilisateur
     * @return array Tableau contenant les infos
     */
    private function getHeader(string $token):array
    {
        $array = explode('.',$token);
        $header = json_decode(base64_decode($array[0]),true);
        return $header;
    }
    /**
     * Récupère le payload du token
     *
     * @param string $token Token saisie par l'utilisateur
     * @return array Tableau contenant les infos
     */
    public function getPayload(string $token):array
    {
        $array = explode('.',$token);
        $payload = json_decode(base64_decode($array[1]),true);
        return $payload;
    }
    /**
     * Vérifie si un token est expiré
     *
     * @param string $token Token de l'utilisateur
     * @return boolean
     */
    public function isExpired(string $token):bool
    {
        $payload = $this->getPayload($token);

        $now = new \DateTime();
        
        return $payload['exp'] < $now->getTimestamp();
    }
    /**
     * Vérifie si le format du token est valide
     *
     * @param string $token Token de l'utilisateur
     * @return boolean
     */
    public function isValid(string $token):bool
    {
        return preg_match(
            '/^[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+$/',
            $token
        ) === 1;
    }
}
