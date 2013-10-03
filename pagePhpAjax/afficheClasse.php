<?php
include("../pagePhpAjax/fonctionPhpAjax.inc.php");
//rÃ©cupÃ©ration des donnÃ©e envoyer par jQuery
if(isset($_GET['value'])){
    $chaine=$_GET['value'];
}

$data=afficheClasse($chaine);//apelle la fonction situÃ© dans fonctionAjax.inc.php
//dÃ©but de crÃ©ation du select
 echo'<label for="classe">Classe :</label>';
 echo'<select type="select" name="classe" id="classe">';
 foreach($data as $val ) { //boucle de remplissage du select 
                  echo'<option value='.$val.'>'.$val.'</option>';   
                 }
 echo'</select>'       
           
    
?>
