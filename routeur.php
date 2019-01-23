<?php
// Appel du contrôleur pour charger les fonctions
require('controller/frontoffice.php');

class Router {
    public function getPage()
    {
        $FOcontroller = new FOController();
        if(!isset($_GET['action'])) {
            $FOcontroller->getHome();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'romans')
        {
            $FOcontroller->listChapters();
        }
        else {
            header('Location: ./');
        }
    }
}

// 
