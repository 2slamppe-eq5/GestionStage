<script language="JavaScript" type="text/javascript" src="../includes/fonctionsJavascript.inc.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/jquery.js"> </script>
<script language="JavaScript" type="text/javascript" src="../includes/ajax.inc.js"> </script>
<form method="post"  name="afficher">
  <h1>Listing Stage</h1>
    <fieldset> 
    
        <legend>Choisir la classe à afficher</legend>
       
        
        <label for="etudes">Etudes :</label>
        
        <select  type="select" name="etudes" id="etudes"><!-- OnChange apelle la fonction de remplissage des formullaire classe et option -->
            <option value="" Selected></option>
        <?php 
                   $tab1=array();//variable de stockage des id filliÃ©re
                   $cpt1=0;
            // crÃ©ation du contenue du select :
            foreach ($this->lesFormations as $formations) { 
                   $tab1[$cpt1]=$formations->NUMFILIERE;     
                   echo'<option value="'.$tab1[$cpt1].'">'.$formations->LIBELLEFILIERE.'</option>';   
                   $cpt1=$cpt1+1;
                   
            }
            
        ?>
        </select>
	
        
        
            <div id="FormulaireClasse">
            <!-- div qui contiendra le select de classe en lien Ã  la fonction affichageClasse -->    
            </div>
        
        
            <div id="FormulaireOption">
            <!-- dic qui contiendra le selec d'option en lien Ã  la fonction affichageClasse -->   
            </div>
        
            <input id="boutonAffichageStage" type='button' value="Afficher les stages de cette classe" ></input>
            
</fieldset>
    
<fieldset>
    <table>
            <div id="FormulaireEtudiantClasseStage">
            <!-- div qui contiendra le tableau des eleve -->    
            </div>
             
        
        
        
        
    </table>
    
</fieldset>
</form>
      
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
