 
        <?php
        //connection Ã  la base de donnÃ©e 
        $db=mysql_connect('localhost','root','joliverie');
        mysql_select_db('GESTAGE2',$db);
        mysql_set_charset ('UTF8');
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
            
             $requet="SELECT per.NOM, per.PRENOM, org.NOM_ORGANISATION FROM PERSONNE per
                 INNER JOIN PROMOTION pro ON per.IDPERSONNE=pro.IDPERSONNE
                INNER JOIN STAGE st ON per.IDPERSONNE=st.IDETUDIANT
                INNER JOIN ORGANISATION org ON st.IDORGANISATION=org.IDORGANISATION
                 WHERE pro.ANNEESCOL='2013-2014'
                 AND pro.NUMCLASSE='".$classe."' ;"; // requete pour rÃ©cupÃ©rer le contenue  du tableaux
             $requetExe=mysql_query($requet);      
            // crÃ©ation du contenue du tableau :
               echo'<table border="1" >';
             echo'<tr><th>Nom</th><th>Prenom</th><th>Organisation</th></tr>';
            While ($data=mysql_fetch_assoc($requetExe))  { //boucle de ligne du tableau
                      
                   echo'<tr><th>'.$data['NOM'].'</th><th>'.$data['PRENOM'].'</th><th>'.$data['NOM_ORGANISATION'].'</th></tr>';   
                   
              
            
        }
        echo'</table>'
        ?>
