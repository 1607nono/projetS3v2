<div class="mx-5 py-4">
<form class="text-center" method="post" action="?action=<?php echo $effect ?>&controller=<?php echo static::$object ?>">
  <div class="form-row mb-4">
    <input class="form-control" type="text" placeholder="Nom" name="nomFournisseur" id="nomFournisseur_id" value="<?php echo htmlspecialchars($v->get("nomFournisseur"))?>" required/>
  </div>
  <div class="form-row mb-4">
    <input class="form-control" type="number" placeholder="Numéro" name="telephoneFournisseur" id="telephoneFournisseur_id" value="<?php echo htmlspecialchars($v->get("telephoneFournisseur"))?>" required/>
  </div>
  <div class="form-row mb-4">
    <input class="form-control" type="text" placeholder="Adresse" name="adresseFournisseur" id="adresseFournisseur_id" value="<?php echo htmlspecialchars($v->get("adresseFournisseur"))?>" required/>
  </div>
  <input id="idProduit" name="idFournisseur" type="hidden" value="<?php echo $_GET['idFournisseur']; ?>">
  <button class="btn btn-info my-4 btn-block orange accent-4" type="submit">Envoyer</button>
  </form>
</div>