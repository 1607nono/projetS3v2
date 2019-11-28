<div class="mx-5 py-4">
<div class="row">
<div class="col-sm-8">
    <table class="table table-sm">
          <!-- Table head -->
            <thead class="mdb-color lighten-5">
              <tr>
                <th class="font-weight-bold">
                  <strong>Nom</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Catégorie</strong>
                </th>
                <th class="font-weight-bold">
                  <strong>Description</strong>
                </th>
                <?php
                  if (!$Produit->get("promotion") == 0) {
                      echo '<th class="font-weight-bold">
                                <strong>Prix</strong>
                            </th>
                            <th class="font-weight-bold">
                                <strong>Prix de loffre</strong>
                            </th>
                            <th class="font-weight-bold">
                                <strong>Economisez</strong>
                            </th> ';
                  }
                  else {
                      echo '<th class="font-weight-bold">
                                <strong>Prix</strong>
                            </th> ';
                  }
                ?>
                <th class="font-weight-bold">
                  <strong>Stock</strong>
                </th>
              </tr>
            </thead>
            <!-- /.Table head -->

            <tbody>
                <tr>
                  <?php
                  echo '<th scope="row">' . htmlspecialchars($Produit->get("nomProduit")) . '</th>';
                  echo '<td>' . htmlspecialchars(ModelCategorie::select($Produit->get("categorieProduit"))->get("valeur")) . '</td>';
                  echo '<td>' . htmlspecialchars($Produit->get("descriptionProduit")) . '</td>';
                  if (!$Produit->get("promotion") == 0) {
                      echo '<td><strike>' . htmlspecialchars($Produit->get("prixProduit")) . '</strike></td>';
                      $prixPromotion = $Produit->get("prixProduit") * (1 - $Produit->get("promotion"));
                      echo '<td>' . htmlspecialchars($prixPromotion) . ' <i class="fas fa-euro-sign"></i></td>';
                      echo '<td>' . htmlspecialchars(($Produit->get("prixProduit")) - $prixPromotion) .
                          ' <i class="fas fa-euro-sign"></i> (' . htmlspecialchars($Produit->get("promotion") * 100) . '%)</td>';
                  }
                  else {
                      echo '<td>' . htmlspecialchars($Produit->get("prixProduit")) .
                          ' <i class="fas fa-euro-sign"></i></td>';
                  }
                  echo '<td>' . htmlspecialchars($Produit->get("quantite")) . '</td>';
              ?>
                </tr>
              </tbody>
            </table>

</div>
<div class="col-sm-4">
      <form method="post" action="?action=add&controller=Panier">
      <input class="form-control" type="number" placeholder="Quantité" min="0" max="<?php echo $Produit->get('quantite'); ?>" name="quantite" id="quantite_id" value="" required/>
      <input type="hidden" name="idProduit" id="idProduit" value="<?php echo $Produit->get("idProduit") ?>" />
        <div class="center">
          <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">
            Ajouter au panier
          </button>
        </div>
       </form>
</div>
</div>
</div>
 <?php
if (Session::is_admin()) {
echo '
<div class="text-center py-3">
      <a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=update&controller=Produit&idProduit=<?php echo rawurlencode($Produit->get("idProduit")) ?>">Modifier</a>
</div>';
                  }
                
        ?>






        
