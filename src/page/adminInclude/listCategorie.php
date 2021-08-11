<?php
    $title = "Catégorie";
    $listeCategorie = dbListeCategorie();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
    {
        if(isset($_GET["deleteCat"]) && $_GET["deleteCat"] == true)
        {
            $secuCategorieId = htmlspecialchars($_GET["value"]);
            $categorieId = intval($secuCategorieId);
            deleteCategorie($categorieId);
            header("location: ../../src/page/admin.php?choix=listeCategorie");
            exit();
        }

        // condition pour addcategorie
    }
?>
    <table class="formulaire">
        <tr>
            <th><h4>Nom de la catégorie</h4></th>
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
            foreach($listeCategorie as $value)
            {
                ?>
                <tr>
                    <td><?=$value["nomCategorie"] ?></td>
                <?php
                    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
                    {
                        ?>
                        <td><a class="buttonsup "href="../../src/page/admin.php?choix=listeCategorie&deleteCat=true&value=<?=$value["categorieArticleId"]?>">supprimer</a></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin")
            {
                // formulaire pour add une catégorie
            }
        ?>
    </table>
