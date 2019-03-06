<?php 

class Controller {
    protected function composeView($viewPath, $variables) {
        
        extract($variables);

        ob_start();
        require($viewPath);
        $mainContent = ob_get_clean();
        require('layout.php');
    } 
}