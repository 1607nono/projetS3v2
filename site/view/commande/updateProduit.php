<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
	<div class="form-row mb-4">
		<select class="browser-default custom-select" name="idProduit" id="idProduit_id">
                <option value="" disabled selected>Choisir un produit</option>
                <?php
                foreach ($tab2 as $val2){
                  echo '<option value="'.htmlspecialchars($val2->get("idProduit")).'">'.htmlspecialchars($val2->get("nomProduit")).'</option>';
                }
                ?>
            </select>
   	</div>
      <input type="hidden" name="idFournisseur" id="idFournisseur_id" value="<?php echo $_POST['idFournisseur']; ?>">
      	<div class="text-center">
      		<button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
      	</div>
</form>
</div>

