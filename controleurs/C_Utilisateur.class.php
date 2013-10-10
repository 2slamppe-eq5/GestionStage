<?php

class C_Utilisateur extends Controleur {

    // affichage des coordonnÃ©e de l'utilisateur 
    function coordonees() {

        $this->vue->titreVue = 'Vos informations';

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $lesInformations = new M_Utilisateurs();

        $this->vue->lesInformations = $lesInformations->getFromLogin(MaSession::get('login'));

        $this->vue->loginAuthentification = MaSession::get('login');

        $this->vue->centre = "../vues/utilisateur/templates/centre.affichermesInformations.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    // midification des coordonnÃ©e de l'utilisateur 
    function modifierCoordonees() {

        $this->vue->titreVue = 'Modification de vos informations';

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $lesInformations = new M_Utilisateurs();

        $this->vue->lesInformations = $lesInformations->getFromLogin(MaSession::get('login'));

        $this->vue->loginAuthentification = MaSession::get('login');

        $this->vue->centre = "../vues/utilisateur/templates/centre.modifierMesInformations.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //validation de modification des donnÃ©e personelle Ã  l'utilisateur
    function validerModifierCoordonees() {

        $this->vue->titreVue = "Modification de mes informations";
        $utilisateur = new M_LesDonneesCreationUtilisateur();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        // rÃ©cupÃ©rer les donnÃ©es du formulaire
        $lesParametres["CIVILITE"] = $_POST["civilite"];
        $lesParametres["NOM"] = $_POST["nom"];
        $lesParametres["PRENOM"] = $_POST["prenom"];
        $lesParametres["NUM_TEL"] = $_POST["tel"];
        $lesParametres["ADRESSE_MAIL"] = $_POST["mail"];
        $lesParametres["ETUDES"] = $_POST["etudes"];
        $lesParametres["FORMATION"] = $_POST["formation"];

        $ok = $utilisateur->update($_GET["id"], $lesParametres);
        if ($ok) {
            $this->vue->message = "Modifications enregistr&eacute;es";
        } else {
            $this->vue->message = "Echec des modifications";
        }
        $this->vue->afficher();
    }

    // affichage du choix de l'affichage des entrepris
    function afficherEntreprise() {
        $this->vue->titreVue = 'Entreprise ayant dÃ©jÃ  pris des stagiaires';

        $this->vue->loginAuthentification = MaSession::get('login');

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntreprise.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //affichÃ© toute les entreprises sans critÃ©re 
    function afficherEntrepriseALL() {
        $this->vue->titreVue = 'Entreprise ayant pris dÃ©jÃ  pris des stagiaires';

        $this->vue->loginAuthentification = MaSession::get('login');

        $lesEntreprise = new M_ListeEntreprise();

        $this->vue->lesEntreprise = $lesEntreprise->getAll();

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntrepriseALL.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //affichÃ© les entreprises triÃ©es par critÃ©res    
    function afficherEntrepriseSpec() {
        $this->vue->titreVue = 'Entreprise ayant pris dÃ©jÃ  pris des stagiaires';

        $this->vue->loginAuthentification = MaSession::get('login');

        $lesVille = new M_ListeEntrepriseCritere();
        $this->vue->lesVilles = $lesVille->getSpeci('VILLE_ORGANISATION');

        $formJuri = new M_ListeEntrepriseCritere();
        $this->vue->formJuri = $formJuri->getSpeci('FORMEJURIDIQUE');

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.afficheEntrepriseSpec.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //formulaire de crÃ©ation d'entreprise 
    function creerEntreprise() {
        $this->vue->titreVue = 'Creer Entreprise ';

        $this->vue->loginAuthentification = MaSession::get('login');

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.creerEntreprise.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //validation de crÃ©ation d'entreprise   
    function validationcreerentreprise() {
        $this->vue->titreVue = "Validation cr&eacute;ation de l'entreprise";
        $entreprise = new M_LesDonneesCreationEntreprise();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        $lesEntreprise = new M_ListeEntreprise();
        $countEnt = "";
        $countEnt = $lesEntreprise->getCount($_POST["nom"]);

        $msg = '';
        //vÃ©rifie si le login est prÃ©sent dans la base de donnÃ©e si l'entreprise n'est pas dÃ©jÃ  crÃ©Ã©

        if ($countEnt->NB == "0") {
            //mise en majuscule de la ville et de la forme juridique pour unifiÃ© ces 2 critÃ©re


            $lesParametres[0] = $_POST["nom"];
            $lesParametres[1] = strtoupper($_POST["ville"]);
            $lesParametres[2] = $_POST["ads"];
            $lesParametres[3] = $_POST["cp"];
            $lesParametres[4] = $_POST["tel"];
            $lesParametres[5] = $_POST["fax"];
            $lesParametres[6] = strtoupper($_POST["fj"]);
            $lesParametres[7] = $_POST["type"];

            $ok = $entreprise->insert($lesParametres);
        } else {
            $msg = ' Entreprise DÃ©jÃ  enregistrÃ©';
            $ok = 0;
        }

        if ($ok) {
            $this->vue->message = "Entreprise cr&eacute;&eacute;";
        } else {
            $this->vue->message = "Echec de l'ajout de l'entreprise." . $msg;
        }
        $this->vue->afficher();
    }

    //mettre a jours les information d'une entreprise
    function majEntreprise() {
        $this->vue->titreVue = 'Mise Ã  jour Entreprise ';

        $this->vue->loginAuthentification = MaSession::get('login');

        $lesEntreprise = new M_ListeEntreprise();
        $this->vue->lesEntreprise = $lesEntreprise->getAll();


        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.majEntreprise.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //validation des modification de l'entreprise
    function validerModifierEntreprise() {

        $this->vue->titreVue = "Modification information entreprise";
        $entreprise = new M_LesDonneesCreationEntreprise();
        // prÃ©parer la liste des paramÃ¨tres
        $lesParametres = array();
        // rÃ©cupÃ©rer les donnÃ©es du formulaire
        $lesParametres["NOM_ORGANISATION"] = $_POST["nom"];
        $lesParametres["VILLE_ORGANISATION"] = $_POST["ville"];
        $lesParametres["ADRESSE_ORGANISATION"] = $_POST["ads"];
        $lesParametres["CP_ORGANISATION"] = $_POST["cp"];
        $lesParametres["TEL_ORGANISATION"] = $_POST["tel"];
        $lesParametres["FAX_ORGANISATION"] = $_POST["fax"];
        $lesParametres["FORMEJURIDIQUE"] = $_POST["fj"];
        $lesParametres["ACTIVITE"] = $_POST["stage"];

        $ok = $entreprise->updateE($_POST["id"], $lesParametres);

        if ($ok) {
            $this->vue->message = "Modifications enregistr&eacute;es";
        } else {
            $this->vue->message = "Echec des modifications";
        }
        $this->vue->afficher();
    }

    // affiche la premiere page d'ajout d'un stage      
    function ajoutStage() {
        $this->vue->titreVue = 'Ajouter un stage';

        $this->vue->loginAuthentification = MaSession::get('login');

        $lesFormations = new M_ListeFormations();
        $this->vue->lesFormations = $lesFormations->getAll();
        //   $lesClasses = new M_ListeClasses();
        //  $this->vue->lesClasses = $lesClasses->getAll(); 
        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.ajoutStage.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

    //deuxiÃ©me pages d'ajout d'un stage 
    function ajoutStageEtapeEntreprise() {
        $this->vue->titreVue = 'Ajouter un stage Etape 2';

        $this->vue->loginAuthentification = MaSession::get('login');

        $lesEntreprise = new M_ListeEntreprise();
        $this->vue->lesEntreprise = $lesEntreprise->getAll();
        //$leStagiaire = $_POST['choixEleve'];
        $leStagiaire = new M_ListeEtudiant();
        $this->vue->leStagiaire = $leStagiaire->get($_POST['choixEleve']);
        
       $lesProfesseurs = new M_ListeProfesseur();
        $this->vue->lesProfesseurs = $lesProfesseurs->getAllProf();

        $this->vue->entete = "../vues/templates/entete.inc.php";

        $this->vue->gauche = "../vues/templates/gauche.inc.php";

        $this->vue->centre = "../vues/utilisateur/templates/centre.ajoutStageEtapeEntreprise.inc.php";

        $this->vue->pied = "../vues/templates/pied.inc.php";

        $this->vue->afficher();
    }

}
?>
