<div class="mx-5 py-3">
    <?php
    // vérification si le pannier est vide
    if (!isset($_COOKIE['panier'])) {
        echo '<p>Votre pannier est vide</p>';
    } else {
        //entête du pannier
        echo '<table class="table product-table">
          <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <th class="font-weight-bold">
                  <strong>Nom</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Quantité</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Prix</strong>
                </th>
                <th class="font-weight-bold">
                </th>
              </tr>
            </thead>
            <!-- /.Table head -->
            <tbody>';
        // récupération de la liste des produits dans le $_COOKIE
        $data=unserialize($_COOKIE['panier']);
        foreach ($data as $cle => $valeur){
            // si le produit n'existe plus dans la base de données
            if (ModelProduit::select($cle)==false) {
                // supression de la case dans le pannier dont le produit est inexistant
                unset($data[$cle]);
            } else {
                echo '<tr><th scope="row">'.ModelProduit::select($cle)->get("nomProduit").'</th>';
                echo '<td>'.$valeur.'</td>';
                $prixPromotion = ModelProduit::select($cle)->get("prixProduit") * (1 - ModelProduit::select($cle)->get("promotion"));
                echo '<td>'.$valeur*$prixPromotion.'</td>';
                echo '<td><a href="?action=delete&controller=panier&idProduit='.$cle.'">Supprimer</a></td></tr>';
            }
        }
        // fin du panier
        echo '</tbody>
</table>';
        // ajout du pannier dans la session
        $_SESSION['panier'] = $data;
        // calcul du prix du panier
        $resultat=0;
        foreach ($_SESSION['panier'] as $cle => $valeur){
            if (!(ModelProduit::select($cle)==false)) {
                $prixPromotion = ModelProduit::select($cle)->get("prixProduit") * (1 - ModelProduit::select($cle)->get("promotion"));
                $resultat=$resultat+($prixPromotion*$valeur);
            }
        }
        // ajout du prix du pannier dans la session.
        $_SESSION['prix']=$resultat;
        echo "Prix à payer : " . $_SESSION['prix'];
    }
    ?>
</div>
<div class="text-center py-3">

    <?php
    if (isset($_COOKIE['panier'])) {
        echo '<a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=deleteAll&controller=Panier">Vider le panier</a><a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="">Procéder au paiement</a>';
    }
    ?>
</div>