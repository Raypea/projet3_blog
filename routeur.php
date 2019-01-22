<?php
// Appel du contrôleur pour charger les fonctions
require('controller/frontoffice.php');

class Router {
    public function AskController {
        // Test du paramètre action pour renvoyer vers le bon contrôleur
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listChapters') {
                listChapters();
            }
            elseif ($_GET['action'] == 'chapter') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    chapter();
                }
                else {
                    echo 'Erreur : Aucun identifiant de chapitre envoyé';
                }
            }
            elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        echo 'Erreur : Certains champs sont vides!';
                    }
                }
                else {
                    echo 'Erreur : Aucun identifiant de chapitre envoyé';
                }
            }
        }
    }
    else {
        listChapters();
    }
}
