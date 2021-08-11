<?php
    function dbListeCategorie() {

        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM categoriearticle") or die (print_r($requete->errorInfo(), true));
        while ($donnée = $requete->fetch()) 
        {

            $listeCategorie[] = $donnée;

        }
        return $listeCategorie;
        $requete->closeCursor();

    }
    // Function dbListeArticle()
    // {
        
    // }
    // Function dbListeUser()
    // {
        
    // }
    // Function dbListeCommentaire()
    // {
        
    // }

    function deleteCategorie($categorieId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM categoriearticle WHERE 	categorieArticleId = ?");
        $requete->execute(array($categorieId)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }
?>