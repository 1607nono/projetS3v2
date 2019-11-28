<?php
require_once File::build_path(array("model", "ModelProduit.php")); 
require_once File::build_path(array("model", "ModelCategorie.php")); 
require_once File::build_path(array("model", "ModelFournisseur.php")); 

class ControllerProduit{
    protected static $object = 'produit';
    public static function readAll() {
        $tab_Produit = ModelProduit::selectAll(); 
        $view='list';
        $pagetitle='Liste des Produits';
        require (File::build_path(array("view","view.php")));    
    }
    public static function read() {
    	$Produit = ModelProduit::select($_GET['idProduit']);   
    	if ($Produit==false) {
    		$view='error'; 
            $pagetitle='Erreur de recherche';
            $error='Erreur : le Produit n existe pas';
    	} else {
    		$view='detail'; 
            $pagetitle='Produit '.$Produit->get("nomProduit");  
    	}
        require (File::build_path(array("view","view.php"))); 
    }

    public static function create() {
        if (Session::is_admin()) {
            $effect="created";
            $view='update';
            $pagetitle='Création d un Produit';
            $v = new ModelProduit();
            $tab_cat = ModelCategorie::selectAll();
            $tab_four = ModelFournisseur::selectAll();
            require (File::build_path(array("view","view.php")));
        } else {
            header('Location: ./');
            exit();
        }
        
    }
    public static function created() {
        if (Session::is_admin()) {
            if (ModelProduit::save($_POST)===false) {
                $view='error';
                $pagetitle='Erreur insertion';
                $error='Erreur : le Produit existe déjà';
            } else {
                $tab_Produit = ModelProduit::selectAll();
                $view='created';
                $pagetitle='Liste des Produits';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            header('Location: ./');
            exit();
        }
        
    }
    public static function delete() {
        if (Session::is_admin()) {
            if (ModelProduit::delete($_GET['idProduit'])===false) {
                $view='error';
                $pagetitle='Erreur suppression';
                $error='Erreur : le Produit n existe pas';
            } else {
                $tab_Produit = ModelProduit::selectAll();
                $view='deleted';
                $pagetitle='Liste des Produits';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            header('Location: ./');
            exit();
        }
    }
    public static function update() {
        if (Session::is_admin()) {
            $effect="updated";
            $v = ModelProduit::select($_GET['idProduit']);
            $tab_cat = ModelCategorie::selectAll();
            $tab_four = ModelFournisseur::selectAll();
            $view='update';
            $pagetitle='Mise à jour';
            require (File::build_path(array("view","view.php")));
        } else {
            header('Location: ./');
            exit();
        }
        
    }
    public static function updated() {
        if (Session::is_admin()) {
            if (ModelProduit::update($_POST)===false) {
                $view='error';
                $pagetitle='Erreur mise à jour';
            } else {
                $tab_Produit = ModelProduit::selectAll();
                $view='updated';
                $pagetitle='Liste des produits';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            header('Location: ./');
            exit();
        }
        
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