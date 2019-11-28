<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
    <div class="form-row mb-4">
        <div class="col">
          <input class="form-control" type="text" placeholder="Nom du produit" name="nomProduit" id="nomProduit_id" value="<?php echo htmlspecialchars($v->get("nomProduit"))?>" required/>
        </div>
        <div class="col">
          <select class="browser-default custom-select" name="categorieProduit" id="categorieProduit_id">
                <option value="" disabled selected>Sélectionner la catégorie</option>
                <?php
                foreach ($tab_cat as $va)
                  echo '<option value="'.htmlspecialchars($va->get("id")).'">'.htmlspecialchars($va->get("valeur")).'</option>';
                ?>
            </select>
        </div>
    </div>
    <div class="form-row mb-4">
      <input class="form-control" type="text" placeholder="Description" name="descriptionProduit" id="descriptionProduit_id" value="<?php echo htmlspecialchars($v->get("descriptionProduit"))?>" required/>
    </div>
    <div class="form-row mb-4">
        <select class="browser-default custom-select" name="idFournisseur" id="idFournisseur_id">
                <option value="" disabled selected>Sélectionner le fournisseur</option>
                <?php
                foreach ($tab_four as $val)
                  echo '<option value="'.htmlspecialchars($val->get("idFournisseur")).'">'.htmlspecialchars($val->get("nomFournisseur")).'</option>';
                ?>
        </select>
    </div>
    <div class="form-row mb-4">
        <div class="col">
          <input class="form-control" type="number" placeholder="Prix" min="0.00" max="10000.00" step="0.01" name="prixProduit" id="prixProduit_id" value="<?php echo htmlspecialchars($v->get("prixProduit"))?>" required/>
        </div>
        <div class="col">
          <input class="form-control" type="number" placeholder="Quantité" min="0" max="10000" step="1" name="quantite" id="quantite_id" value="<?php echo htmlspecialchars($v->get("quantite"))?>" required/>
        </div>
        <div class="col">
            <input class="form-control" type="number" placeholder="Promotion" min="0" max="1" step="0.01" name="promotion" id="promotion_id" value="<?php echo htmlspecialchars($v->get("promotion"))?>" required/>
        </div>
    </div>
    <input id="idProduit" name="idProduit" type="hidden" value="<?php echo $_GET['idProduit']; ?>">
    <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
</form>


</div>