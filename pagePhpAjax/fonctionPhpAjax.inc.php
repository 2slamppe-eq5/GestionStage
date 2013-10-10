<?php

function afficheClasse($chaine){
   //connection Ã  la base de donnÃ©e 
        $db=mysql_connect('localhost','root','joliverie');
        mysql_select_db('GESTAGE2',$db);
        mysql_set_charset ('UTF8');
   $result=array(); 
 $requet="SELECT * FROM CLASSE WHERE NUMFILIERE='".$chaine."';";//crÃ©ation de la requet
 $requetExe=mysql_query($requet);//rÃ©cupÃ©ration du contenue de la requet
while($data=mysql_fetch_assoc($requetExe))
{
    $result[]=$data['NUMCLASSE'];
            }
return $result;
        
    }
?>
