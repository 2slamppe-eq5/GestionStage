 
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
            // crÃ©ation du contenue du tableau :
             echo'<tr><th>Nom</th><th>Prenom</th></tr>';
            While ($data=mysql_fetch_assoc($requetExe))  { //boucle de ligne du tableau
                      
                   echo'<tr><th>'.$data['NOM'].'</th><th>'.$data['PRENOM'].'</th></tr>';   
                   
                   
            
        }
        ?>
