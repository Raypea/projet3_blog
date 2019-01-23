<?php

class Manager
{
    // Fonction de connexion à la BDD
    protected function dbConnect()
    {
        // Connexion à la base de données
        try
        {
            $db = new PDO('mysql:host=blogecrivain;dbname=bdd_blog;charset=utf8', 'root', '4aR6e8bq3');
            return $db;
        }
        // Si échec de connexion, affichage de l'erreur
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}