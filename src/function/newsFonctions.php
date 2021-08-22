<?php
    function listeNews()
    {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT titre, imgUrl, contenu, articleId
                                FROM articles
                                ORDER BY articleId DESC
                                LIMIT 12") or die (print_r($requete->errorInfo(), true));
        while($données = $requete->fetch())
        {
            $listeNews[] = $données; 
        }
        $requete->closeCursor();
        return $listeNews;
    }

    function firstNews()
    {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT titre, imgUrl, contenu, articleId
                                FROM articles
                                WHERE onTop = 1
                                ORDER BY articleId DESC LIMIT 3") or die (print_r($requete->errorInfo(), true));
        while($données = $requete->fetch())
        {
            $firstNews[] = $données;
        }
        $requete->closeCursor();
        return $firstNews;
    }
?>