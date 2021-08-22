<?php

    // Fonction pour retrouver la liste de toute les catégories

    function dbListeCategorie() {

        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM categoriearticle") or die (print_r($requete->errorInfo(), true));
        while ($données = $requete->fetch()) 
        {

            $listeCategorie[] = $données;

        }
        return $listeCategorie;
        $requete->closeCursor();

    }

    // Fonction pour envoyez une catégorie dans la DB
    
    function sendCategorie($categorie)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("INSERT INTO categoriearticle(nomCategorie) value(?)");
        $requete->execute(array($categorie)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }
     Function dbListeArticle()
     {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM articles a
                                INNER JOIN categoriearticle c ON c.categorieArticleId = a.categorieArticleId
                                INNER JOIN users u ON u.userId = a.auteurId") or die (print_r($requete->errorInfo(), true));
        while($données = $requete->fetch())
        {
            $listeArticle[] = $données;
        }
        $requete->closeCursor();
        return $listeArticle;
     }
     function deleteArticle($articleId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM articles WHERE 	articleId = ?");
        $requete->execute(array($articleId)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }
 
    function deleteCategorie($categorieId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM categoriearticle WHERE 	categorieArticleId = ?");
        $requete->execute(array($categorieId)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }

    // fonction pour rechercher les info des comptes dans la DB

    function listUser()
    {
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT *
                                FROM users u
                                INNER JOIN role r ON r.roleId = u.roleId;");
        while($donnees = $requete->fetch())
        { 
            $listeUser[] = $donnees;
        }
        return $listeUser;
    }

    // Fonction pour surpprimer un compte
    function deleteUser($userId)
    {
        $bdd = dbAccess();
        $requete = $bdd->prepare("DELETE FROM users WHERE 	userId = ?");
        $requete->execute(array($userId)) or die (print_r($requete->errorInfo(), true));
        $requete->closeCursor();
    }


?>