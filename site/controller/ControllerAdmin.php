<?php
require_once File::build_path(array("model", "ModelProduit.php")); 
require_once File::build_path(array("model", "ModelFournisseur.php")); 
require_once File::build_path(array("model", "ModelCategorie.php")); 

class ControllerAdmin{
    protected static $object = 'admin';
    public static function readAll() {
        $tab = ModelProduit::getEmpty(); 
        $view='list';
        $pagetitle='Administration';
        require (File::build_path(array("view","view.php")));    
    }
}
?>