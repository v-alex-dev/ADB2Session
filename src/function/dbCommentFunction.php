<?php
    function sendComment($articleId, $userId, $contenu)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("INSERT INTO commentaire(articleId, userId, contenu)
                                    VALUE(?, ?, ?)");
        $requete->execute(array($articleId, $userId, $contenu)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    function getComment()
    {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM commentaire c
                                INNER JOIN users u ON u.userId = c.userId") or die(print_r($requete->errorInfo(), TRUE));        
        while($données = $requete->fetch())
        {
            $commentaire[] = $données;
        }
        $requete->closeCursor();
        if(isset($commentaire))
        {
            return $commentaire;
        }
    }

    function deleteComment($commentaireId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM commentaire WHERE commentaireId = ?");
        $requete->execute(array($commentaireId)) or die (print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }
?>