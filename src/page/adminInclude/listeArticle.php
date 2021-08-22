<?php
 $titre = "Liste Article";
    $listeArticle = dbListeArticle();
    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
    {
        if(isset($_GET["deleteArt"]) && $_GET["deleteArt"] == true)
        {
            $secuCategorieId = htmlspecialchars($_GET["value"]);
            $categorieId = intval($secuCategorieId);
            deleteArticle($categorieId);
            header("location: ../../src/page/admin.php?choix=listeArticle#liste");
            exit();
        }
    }
?>


<section class="formulaire">
    <table border "2">
        <tr>
            <th>Titre</th>
            <th>Image de référence</th>
            <th>Auteur</th>
            <th>Catégorie de l'article</th>
            <th>contenu</th>
            <?php
                if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
                {
                    ?>
                    <th>Supprimer</th>
                    <?php
                }
            ?>

        </tr>
            <?php
                foreach($listeArticle as $listeArticleInTable)
                {
                ?>
                    <tr>
                        <td><?= $listeArticleInTable["titre"]?></td>
                        <td><img src="<?=$listeArticleInTable['imgUrl']?>" alt="" height="25px" width="25px"></td>
                        <td><?=$listeArticleInTable["login"]?></td>
                        <td><?=$listeArticleInTable["nomCategorie"]?></td>
                        <td><div class="contenu"><?=$listeArticleInTable["contenu"]?></div></td>
                    <?php

                        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
                        {
                        ?>
                        <td><a class="buttonsup" id="liste" href="../../src/page/admin.php?choix=listeArticle&deleteArt=true&value=<?=$listeArticleInTable["articleId"]?>">supprimer</a></td>
                        <?php
                        }
                    ?>
                    </tr>
                <?php
                }
            ?>
        </tr>
    </table>
</section>