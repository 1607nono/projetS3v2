<?php
require_once File::build_path(array("model", "ModelCommande.php")); 
require_once File::build_path(array("model", "ModelProduit.php")); 
require_once File::build_path(array("model", "ModelFournisseur.php"));
require_once File::build_path(array("modules","fpdf", "fpdf.php"));

class ControllerCommande{
    protected static $object = 'commande';
    public static function readAll() {
        $tab_Commande = ModelCommande::selectAll(); 
        $view='list';
        $pagetitle='Liste des Commandes';
        require (File::build_path(array("view","view.php")));    
    }
    public static function created() {
        if (empty($_POST)) {
            $tab_Commande = ModelCommande::selectAll(); 
            $view='list';
            $pagetitle='Liste des Commandes';
        }else if (ModelCommande::save($_POST)===false) {
            $view='error';
            $pagetitle='Erreur insertion';
            $error='Erreur : le Commande existe déjà';
        } else {
            $tab_Commande = ModelCommande::selectAll();
            $view='created';
            $pagetitle='Liste des Commandes';
        }
        require (File::build_path(array("view","view.php")));
    }
    public static function delete() {
    	if (ModelCommande::delete($_GET['idCommande'])===false) {
            $view='error';
            $pagetitle='Erreur suppression';
            $error='Erreur : le Commande n existe pas';
    	} else {
	    	$tab_Commande = ModelCommande::selectAll();
            $view='deleted';
            $pagetitle='Liste des Commandes';
    	}
        require (File::build_path(array("view","view.php")));
    }
    public static function updated() {
        if (empty($_POST)) {
            $tab_Commande = ModelCommande::selectAll(); 
            $view='list';
            $pagetitle='Liste des Commandes';
        }else if (ModelCommande::update($_POST)===false) {
            $view='error';
            $pagetitle='Erreur mise à jour';
        } else {
            $tab_Commande = ModelCommande::selectAll();
            $view='updated';
            $pagetitle='Liste des voitures';
        }
        require (File::build_path(array("view","view.php")));
    }
    public static function received(){
        $produit=ModelProduit::select($_GET['idProduit']);
        $data['quantite']=$produit->get('quantite')+$_GET['quantite'];
        $data['idProduit']=$_GET['idProduit'];
        ModelProduit::update($data);
        ModelCommande::delete($_GET['idCommande']);
        $tab_Commande = ModelCommande::selectAll(); 
        $view='list';
        $pagetitle='Liste des Commandes';
        require (File::build_path(array("view","view.php")));
    }
    public static function createFournisseur() {
        $tab=ModelFournisseur::selectAll();
        $effect="createProduit";
        $view='updateFournisseur';
        $pagetitle='Création d un Commande';
        require (File::build_path(array("view","view.php")));
    }
    public static function createProduit(){
        $tab2=ModelProduit::selectFournisseur($_POST['idFournisseur']);
        $effect="create";
        $view='updateProduit';
        $pagetitle='Création d un Commande';
        require (File::build_path(array("view","view.php")));
    }
    public static function create(){
        $effect="created";
        $view='update';
        $pagetitle='Création d un Commande';
        $v = new ModelCommande();
        require (File::build_path(array("view","view.php")));
    }
    public static function update() {
        $effect="updated";
        $v = ModelCommande::select($_POST['idCommande']);
        $view='update';
        $pagetitle='Mise à jour';
        require (File::build_path(array("view","view.php")));
    }

    /*public static function toPDF(){

        $pag=ModelCommande::selectAll();
        $tmp=0;
        $total=0;
        foreach ($pag as $cle => $valeur) {
            $date=substr($valeur->get('date'),0,7);// On ne prend en compte que le mois en cours
            $mois=date('Y-m');

            if(!($date===$mois)){

                unset($pag[$tmp]);
            }else{
                $total+=$valeur->get('prixCommande');
            }
        $tmp++;
        }

        require (File::build_path(array("view","facture","affichage.php")));
    }*/
}
?>