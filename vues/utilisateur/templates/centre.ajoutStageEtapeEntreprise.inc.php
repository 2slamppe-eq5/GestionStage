
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
    $(function() {
        $("#dateVisit").datepicker();
        $("#dateDebut").datepicker();
        $("#dateFin").datepicker();
    });
</script>

<form>
    <h1>Choisir l'entreprise prenant  </br><?php echo $this->leStagiaire->NOM . " " . $this->leStagiaire->PRENOM; ?> </h1>
    <fieldset>


        <label for="entreprise">Entreprise :</label>
        <select id ="entreprise">
            <?php
            foreach ($this->lesEntreprise as $LesEntreprise) { // boucle d'affichage de toute les entreprise
                echo"<option value='" . $LesEntreprise->IDORGANISATION . "'>" . $LesEntreprise->NOM_ORGANISATION . "</value>";
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
                echo"<option value='" . $LesProfesseurs->IDPERSONNE . "'>" . $LesProfesseurs->NOM . "</value>";
            }
            ?>    


        </select> 

        <label for="dateVisit">Date de visite:</label>
        <input type="text" id="dateVisit" />

    </fieldset>

</form>
