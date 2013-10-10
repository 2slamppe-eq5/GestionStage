<?php

class M_ListeMaitreDeStage extends Modele {

    protected $table = 'PERSONNE';
    protected $clePrimaire = 'IDPERSONNE';
    
    function getAllMaitre() {
        $pdo = $this->connecter();
        // RequÃªte textuelle
        $query = "SELECT * FROM PERSONNE WHERE IDROLE='5';";
        // ExÃ©cuter la requÃªte
        $resultSet = $pdo->query($query);
        // FETCH_CLASS permet de retourner des enregistrements sous forme d'objets de la classe spÃ©cifiÃ©e
        // ici : $this->nomClasseMetier contient "Enregistrement"
        // La classe Enregistrement est une classe gÃ©nÃ©rique vide qui sera automatiquement affublÃ©e d'autant
        // d'attributs publics qu'il y a de colonnes dans le jeu d'enregistrements
        $retour = $resultSet->fetchAll(PDO::FETCH_CLASS, $this->nomClasseMetier);
        $this->deconnecter();
        return $retour;
    }

}
?>
