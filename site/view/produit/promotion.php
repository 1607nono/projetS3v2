<div class="mx-5 py-4">
    <table class="table product-table">

        <!--             <thead class="mdb-color lighten-5">
                      <tr>
                        <th class="font-weight-bold">
                          <strong></strong>
                        </th>
                        <th class="font-weight-bold">
                          <strong></strong>
                        </th>
                      </tr>
                    </thead> -->

        <tbody>
        <?php
        foreach ($tab_Produit as $Produit) {
            echo '<tr> <th> <a href="?action=read&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit">'.htmlspecialchars($Produit->get("nomProduit")).'</a></th>';

            $prixPromotion = $Produit->get("prixProduit") * (1 - $Produit->get("promotion"));

            echo '<td> Prix conseillé : <strike>'.$Produit->get("prixProduit").'</strike> <i class="fas fa-euro-sign"></i>
                 Promotion du jour : '. $prixPromotion . ' <i class="fas fa-euro-sign"></i>';
            if (Session::is_admin()) {
                echo '<a href="?action=delete&idProduit='.rawurlencode($Produit->get("idProduit")).'&controller=Produit"><i class="material-icons">delete</i></a>';
                echo '<a href="?action=update&controller=Produit&idProduit='.rawurlencode($Produit->get("idProduit")).'"><i class="material-icons">edit</i></a>' . '</td>';
            }
        }

        ?>
        </tbody>
    </table>
</div>
<?php
if (Session::is_admin()) {
    echo '<div class="text-center py-3" style="padding-top:40px;">
	  	<a class="waves-effect waves-light btn orange accent-4 white-text text-lighten-4 effet" href="?action=create&controller=Produit">Créer un Produit</a>
</div>';
}

?>