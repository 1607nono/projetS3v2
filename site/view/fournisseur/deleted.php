<div class="alert alert-success mx-5" role="alert">
<?php
echo 'Le fournisseur a bien été supprimé !</p>';
?>
</div>
   <?php
     require_once (File::build_path(array("view","fournisseur","list.php")));
   ?>