<?php

interface ISession {

    // mettre fin Ã  la session authentifiÃ©e
    static function fermer() ;

    /** ouvrir une nouvelle session authentifiÃ©e :
     *   - gÃ©nÃ©rer un nouvel identifiant de session
     *   - enregistrer la ou les donnÃ©e(s) de session fournies en paramÃ¨tre
     * @param array() $lesDonneesSession : tableau associatif contenant les donnÃ©es Ã  inscrire en session
     */    
    static function nouvelle($lesDonneesSession);
    
    /**
     * VÃ©rifie qu'une session est en cours
     * @param array() $lesDonneesSession : tableau contenant la liste des noms de donnÃ©es Ã  vÃ©rifier
     * @return boolean =true si la session est bien en cours ; =false sinon
     */
    static function estAuthentifie($lesDonneesSession);

}

?>
