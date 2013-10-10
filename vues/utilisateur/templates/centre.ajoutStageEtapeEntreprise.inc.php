
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<form>
     <h1>Choisir l'entreprise prenant  </br><?php echo $this->leStagiaire->NOM." ".$this->leStagiaire->PRENOM; ?> </h1>
<fieldset>
    
        
        <select id ="entreprise">
      <?php 
            foreach ($this->lesEntreprise as $LesEntreprise) { // boucle d'affichage de toute les entreprise
                   echo"<option value='".$LesEntreprise->IDORGANISATION ."'>".$LesEntreprise->NOM_ORGANISATION."</value>" ;
            }
        ?>    
            <option value="creation">Non présente</option>
        
        </select> 
        
        <p>Date: <input type="text" id="datepicker" /></p>
   
    
</fieldset>
   
</form>
