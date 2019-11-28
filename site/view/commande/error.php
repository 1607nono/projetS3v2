<p>
<?php
if (isset($error)){
	echo $error;
} else {
	echo "Erreur inconnu";
}  ?>
</p>
<div class="center" style="padding-top:40px;">
	  	<a class="waves-effect waves-light btn blue grey-text text-lighten-4 effet" href="?action=readAll&controller=Commande">Retourner à la gestion</a>
</div>