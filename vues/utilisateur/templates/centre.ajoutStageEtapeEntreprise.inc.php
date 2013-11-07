


<?php require '../includes/calendar.php'; ?>
﻿<script language="JavaScript" type="text/javascript" src="../includes/fonctionsJavascript.inc.js"> </script>
<link rel="stylesheet" href="/resources/demos/style.css" />



<form method="post" action=".?controleur=utilisateur&action=validationajoutstage" >
    <h1>Choisir l'entreprise prenant  </br><?php echo $this->leStagiaire->NOM . " " . $this->leStagiaire->PRENOM; ?> </h1>
    <fieldset>
           <input type='hidden' id ="stagiaire" name ='stagiaire' value='<?php echo $this->leStagiaire->IDPERSONNE ; ?>'>

        <label for="entreprise">Entreprise :</label>
        <select id ="entreprise" name='entreprise'>
            <?php
            foreach ($this->lesEntreprise as $LesEntreprise) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesEntreprise->IDORGANISATION . "'>" . $LesEntreprise->NOM_ORGANISATION . "</value>";
            }
            ?>   
            


        </select> 
        
        <label for="maitre">Maître de stage :</label>
        <select id ="maitre" name='maitre'>
            <?php
            foreach ($this->lesMaitres as $LesMaitres) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesMaitres->IDPERSONNE . "'>" . $LesMaitres->CIVILITE." ".$LesMaitres->PRENOM." ".$LesMaitres->NOM. "</value>";
            }
            ?>    


        </select> 

        <label for="dateDebut">Date de début:</label>
        <input type="text" id="dateDebut" name='dateDebut'onclick="var toto = new calendar(this);"/>
        <label for="dateFin ">Date de fin:</label>
        <input type="text" id="dateFin" name='dateFin' onclick="var toto = new calendar(this);"/>


    </fieldset>
    
        <fieldset>


        <label for="professeur">Professeur :</label>
        <select id ="professeur" name='professeur'>
            <?php
            foreach ($this->lesProfesseurs as $LesProfesseurs) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesProfesseurs->IDPERSONNE . "'>" .  $LesProfesseurs->CIVILITE." ".$LesProfesseurs->PRENOM." ". $LesProfesseurs->NOM . "</value>";
            }
            ?>    


        </select> 

        <label for="dateVisit">Date de visite:</label>
        <input type="text" id="dateVisit" name='dateVisit' onclick="var toto = new calendar(this);"/>

    </fieldset>
         <fieldset>
     <input type="submit" value="Ajout du stage" onclick="return validerS()"></input>
    
   
               </fieldset>
</form>
