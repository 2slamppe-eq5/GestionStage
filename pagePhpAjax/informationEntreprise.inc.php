﻿<?php
//connection Ã  la base de donnÃ©e 
$db=mysql_connect('localhost','root','joliverie');
mysql_select_db('GESTAGE2',$db);
mysql_set_charset ('UTF8');
//instantiation des variable
$requet='';
$chaine='';
//rÃ©cupÃ©ration des donnÃ©e envoyer par jQuery
if(isset($_GET['value'])){
    $chaine=$_GET['value'];
}
//dÃ©but de crÃ©ation des information dÃ©jÃ  connue


 
 $requet="SELECT * FROM ORGANISATION WHERE IDORGANISATION='".$chaine."';";//crÃ©ation de la requet
 $requetExe=mysql_query($requet);//rÃ©cupÃ©ration du contenue de la requet
 $data=mysql_fetch_assoc($requetExe);
 //crÃ©ation des informatio nde l'entreprise
 echo '<label>Id entreprise</label><input type="text"  readonly="readonly" name="id" id="id" value="'.$data['IDORGANISATION'].'" ></input><br/>';
 echo '<label>Nom entreprise</label><input type="text"  name="nom" id="nom" value="'.$data['NOM_ORGANISATION'].'" ></input><br/>';
 echo '<label>Ville entreprise</label><input type="text"  name="ville" id="ville" value="'.$data['VILLE_ORGANISATION'].'" ></input><br/>';          
 echo '<label>Adresse entreprise</label><input type="text"  name="ads" id="ads" value="'.$data['ADRESSE_ORGANISATION'].'" ></input><br/>';
 echo '<label>Code postal entreprise</label><input type="text"  name="cp" id="cp" value="'.$data['CP_ORGANISATION'].'" ></input><br/>';     
 echo '<label>TÃ©lÃ©phone entreprise</label><input type="text"  name="tel" id="tel" value="'.$data['TEL_ORGANISATION'].'" ></input><br/>';
 echo '<label>Fax entreprise</label><input type="text"  name="fax" id="fax" value="'.$data['FAX_ORGANISATION'].'" ></input><br/>';
 echo '<label>Forme juridique</label><input type="text"  name="fj" id="fj" value="'.$data['FORMEJURIDIQUE'].'" ></input><br/>';
 echo '<label>type de stage</label><input type="text"  name="stage" id="stage" value="'.$data['ACTIVITE'].'" ></input><br/>';
 echo '<input type="submit" value="Sauvegarder" OnClick="javascript:validerE()"/><br/>';
 ?>
