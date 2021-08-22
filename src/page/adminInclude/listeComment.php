<?php
    $titre = "Liste Commentaire";
    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin" || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "modérateur")
    {
        if(isset($_GET["deleteCom"]) && $_GET["deleteCom"] == true)
        {
            $secuGetCom = htmlspecialchars($_GET["value"]);
            $commentaireId = intval($secuGetCom);
            deleteComment($commentaireId);
            header("location: ../../src/page/admin.php?choix=listeCommentaire#ancre");
            exit();
        }
    }

    $listeCommentaire = getComment();
?>

<section class="formulaire">
    <table border "2">
        <tr>
            <th><h3>Pseudo</h3></th>
            <th><h3>Contenu</h3></th>
            <th><h3>Supprimer</h3></th>
        </tr>
        <?php
            if(isset($listeCommentaire))
            {
                foreach($listeCommentaire as $listeComment)
                {
            ?>
                <tr>
                    <td><?=$listeComment["login"]?></td>
                    <td><?=$listeComment["contenu"]?></td>
                    <td><a href="../../src/page/admin.php?choix=listeCommentaire&deleteCom=true&value=<?=$listeComment["commentaireId"]?>" id="ancre">Supprimer</a></td>
                </tr>
            <?php
                }
            }
        ?>
    </table>
</section>