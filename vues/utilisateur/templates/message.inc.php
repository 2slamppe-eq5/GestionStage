<!DOCTYPE html >


<html>
    <head>
        <meta  content="text/html;charset=UTF-8" />
        <title><?php echo $this->titreVue; ?></title>
    </head>
    <body>
        <h1><?php echo $this->message ?></h1>
        <input type="button" value="Retour" onclick="history.go(-1)">
        <form action=".?controleur=utilisateur&action=index">
          <input type="submit" value="Retour Accueil" >
        </form>
    </body>
</html>


<!DOCTYPE html >
