
        <?php
        //connection Ã  la base de donnÃ©e 
        $db=mysql_connect('localhost','root','');
        mysql_select_db('GESTAGE',$db);
        //instantiation des variable
        $classe='';
        $option='';
        //rÃ©cupÃ©ration des variable envoyer par jquery
        if(isset($_GET['value1'])){
        $classe=$_GET['value1'];
            }
        if(isset($_GET['value2'])){
        $option=$_GET['value2'];
            }
            
             $requet="SELECT * FROM PERSONNE WHERE ETUDES='".$classe."' AND IDSPECIALITE='".$option."' ;"; // requete pour rÃ©cupÃ©rer le contenue  du tableaux
             $requetExe=mysql_query($requet);      
            // crÃ©ation du contenue du select :
             echo"<label>choix Ã©lÃ¨ve</label>";
             echo'<select id="choixEleve">';
            While ($data=mysql_fetch_assoc($requetExe))  { //boucle de ligne du tableau
                      
                   echo'<option value="'.$data['IDPERSONNE'].'">'.$data['NOM'].' '.$data['PRENOM'].'</option>';   
                   
                   
            
        }
        echo"</select>";
        echo"<input type='submit' action='.?controleur=utilisateur&action=ajoutStageEtapeEntreprise' value='passer Ã  la 2eme Ã©tapes'></input>"
        
        ?>
