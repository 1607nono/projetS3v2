<?php
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelCategorie.php"));
require_once File::build_path(array("model", "ModelFournisseur.php"));

class ControllerAccueil{
    protected static $object = 'accueil';

    public static function readAll() {
        $tab_Produit = ModelProduit::selectPromotion();
        $view='listPromotion';
        $pagetitle='Promotion du jour';
        require (File::build_path(array("view","view.php")));
    }

    public static function json(){
        $tab = ModelProduit::selectAll();
        echo "[";
        $var = "";
        foreach ($tab as $cle ){
            $var = $var . $cle->toJSON() . ",";

        }
        $var = rtrim($var, ",");
        echo $var;
        echo "]";
    }
}
?>