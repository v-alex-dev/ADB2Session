<?php
    function getSelectCategorie()
    {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM categoriearticle") or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch())
        {
            $categorie[] = $données;
        }
        $requete->closeCursor();
        return $categorie;
    }

     function getAllCategorie($categorieArticleId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT categorieArticleId FROM categoriearticle 
                                WHERE nomCategorie = ?");
        $requete->execute(array($categorieArticleId)) or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch())
        {
            $categorieId[] = $données;

        } 
        $requete->closeCursor();
        return $categorieId;
    }

    function sendImg($photo,$destination){
            if ($destination == "article") {
                $dossier = "../../src/img/article/" . time();
            }

            // Créer un tableau avec les extensions autorisée
            $extensionArray = ["png","jpg","jpeg","jfif","PNG","JPG","JPEG","JFIF"];
            // Récupérer toutes les infos du fichier envoyé
            $infoFichier = pathinfo($photo["name"]);
            // Je récupère l'extension du fichier envoyé
            $extensionImage = $infoFichier["extension"];

            // Extension autorisée ?
            if (in_array($extensionImage, $extensionArray)) {
                // Préparer le chemin répertoire + nom fichier
                $dossier.=basename($photo["name"]);
                // Envoyer mon fichier
                move_uploaded_file($photo["tmp_name"], $dossier);
            }
            return $dossier;
        }

        function aLaUne($valeur){
            $bdd = dbAccess();
            $requete = $bdd->prepare('SELECT articleId FROM articles WHERE titre = ?');
            $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));
            
            while ($données = $requete->fetch()) {
                $articleId = $données[0];
                $intArticleId = intval($articleId);
            }
            
            $requete = $bdd->prepare('INSERT INTO misenavant(articleId) VALUES(?)');
            $requete->execute(array($intArticleId)) or die(print_r($requete->errorInfo(), TRUE));
            $requete->closeCursor();
        }

    function addArticle($titre, $imgUrl, $contenu, $auteurId, $categorieArticleId, $onTop){
        //Traitement de l'image envoyée
        $traiterImage = sendImg($imgUrl, "article");

        //Récuperer l'id de la catégorie d'article
        $arraycategorieArticleId = getAllCategorie($categorieArticleId);
        //J'envoie l'index récupéré dans une nouvelle variable
        $categorieId = intval($arraycategorieArticleId[0]["categorieArticleId"]);
        
        $bdd = dbAccess();
        $requete = $bdd->prepare('INSERT INTO articles(titre, imgUrl, contenu, auteurId, categorieArticleId, onTop)
                                  VALUES(?, ?, ?, ?, ?, ?)');
        $requete->execute(array($titre, $traiterImage, $contenu, $auteurId, $categorieId, $onTop)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        
        if ($onTop == 1) {
            // Envoyer l'article à la une dans la table star
            aLaUne($titre);
        }
    }

    function getArticleContent($id){
        $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT a.titre, a.imgUrl, a.contenu, c.nomCategorie, u.nom AS auteurNom, u.prenom AS auteurPrenom
                                  FROM articles a
                                  INNER JOIN categoriearticle c ON c.categorieArticleId = a.categorieArticleId
                                  INNER JOIN users u ON u.userId = a.auteurId
                                  WHERE a.articleId = ?");
        $requete->execute(array($id))or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch()){
            $contenuArticle[] = $données;
        }
        $requete->closeCursor();
        // si il y a une erreur. Afficher un message indique que l'article n'existe pas.
        if (isset($contenuArticle)) {
            return $contenuArticle;
        } else {
            header('location: ../../index.php?error=true&message=Article Inexistant');
        }
    }

?>