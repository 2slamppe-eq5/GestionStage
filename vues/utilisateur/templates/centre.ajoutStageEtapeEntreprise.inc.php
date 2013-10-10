
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
﻿<script language="JavaScript" type="text/javascript" src="../includes/fonctionsJavascript.inc.js"> </script>
<link rel="stylesheet" href="/resources/demos/style.css" />

<script>
    $(function() {
        $("#dateVisit").datepicker();
        $("#dateDebut").datepicker();
        $("#dateFin").datepicker();
    });
</script>

<form method="post" action=".?controleur=utilisateur&action=validationajoutstage" >
    <h1>Choisir l'entreprise prenant  </br><?php echo $this->leStagiaire->NOM . " " . $this->leStagiaire->PRENOM; ?> </h1>
    <fieldset>
           <input type='hidden' id ="stagiaire" value='<?php echo $this->leStagiaire->IDPERSONNE ; ?>'>

        <label for="entreprise">Entreprise :</label>
        <select id ="entreprise">
            <?php
            foreach ($this->lesEntreprise as $LesEntreprise) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesEntreprise->IDORGANISATION . "'>" . $LesEntreprise->NOM_ORGANISATION . "</value>";
            }
            ?>   
            


        </select> 
        
        <label for="maitre">Maître de stage :</label>
        <select id ="maitre">
            <?php
            foreach ($this->lesMaitres as $LesMaitres) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesMaitres->IDPERSONNE . "'>" . $LesMaitres->CIVILITE." ".$LesMaitres->PRENOM." ".$LesMaitres->NOM. "</value>";
            }
            ?>    


        </select> 

        <label for="dateDebut">Date de début:</label>
        <input type="text" id="dateDebut" />
        <label for="dateFin ">Date de fin:</label>
        <input type="text" id="dateFin" />


    </fieldset>
    
        <fieldset>


        <label for="professeur">Professeur :</label>
        <select id ="professeur">
            <?php
            foreach ($this->lesProfesseurs as $LesProfesseurs) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesProfesseurs->IDPERSONNE . "'>" .  $LesProfesseurs->CIVILITE." ".$LesProfesseurs->PRENOM." ". $LesProfesseurs->NOM . "</value>";
            }
            ?>    


        </select> 

        <label for="dateVisit">Date de visite:</label>
        <input type="text" id="dateVisit" />

    </fieldset>
         <fieldset>
     <input type="submit" value="Ajout du stage" onclick="return validerS()"></input>
    
   
               </fieldset>
</form>
