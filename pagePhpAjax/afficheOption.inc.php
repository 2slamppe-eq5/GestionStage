<?php
    // connection Ã  la base de donÃ©es
    $db=mysql_connect('localhost','root','joliverie');
    mysql_select_db('GESTAGE2',$db);
    mysql_set_charset ('UTF8');
    //instentiation des donnÃ©e
    $chaine='';
    //rÃ©cupÃ©ration des donnÃ©e envoyer par jQuery
    if(isset($_GET['value'])){
        $chaine=$_GET['value'];
    }
    //si la valeur rÃ©cupÃ©rer est Ã©gale a 4 (Ã©tudiant SIO) les option sont crÃ©Ã©
    if($chaine=='4'){
    //dÃ©but de la crÃ©ation du select
        echo'<label for="option">option :</label>';
        echo'<select type="select" name="option" id="option">';
 
        $requet="SELECT * FROM SPECIALITE ;"; // requette pour rÃ©cupÃ©rer les donnÃ©e option
        $requetExe=mysql_query($requet);
    //$lesClasses = new M_ListeClasses();
    //$classe=$lesClasses->get($chaine);
       While ($data=mysql_fetch_assoc($requetExe)) { // boucle de remplissage
                  echo'<option value='.$data['IDSPECIALITE'].'>'.$data['LIBELLECOURTSPECIALITE'].'</option>';   
                 }
       echo'</select>' ;      
    }           
    
?>
