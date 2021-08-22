<?php
    $listeUser = listUser();

    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin" || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "modérateur")
    {
        if(isset($_GET["deleteUser"]) && $_GET["deleteUser"] == true)
        {
            $secuGetUserId = htmlspecialchars($_GET["value"]);
            $deleteUserId = intval($secuGetUserId);
            deleteUser($deleteUserId);
            header("location: ../../src/page/admin.php?choix=listeUser");
            exit();
        }
    }
?>

<div class="formulaire">
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php
            foreach($listeUser as $liste)
            {
            ?>
                <tr>
                    <td><?=$liste["nom"]?></td>
                    <td><?=$liste["prenom"]?></td>
                    <td><?=$liste["login"]?></td>
                    <td><?=$liste["email"]?></td>
                    <td><?=$liste["nomRole"]?></td>
                    <?php
                    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin" || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "modérateur")
                    {
                        if($liste["nomRole"] == "Admin")
                        {
                            ?>
                                <td>C'est un Admin. Pas touche</td>
                            <?php
                        }
                        else{
                        ?>
                            <td><a class="buttonsup "href="../../src/page/admin.php?choix=listeUser&deleteUser=true&value=<?=$liste["userId"]?>">Supprimer ce compte</a></td>
                        <?php
                        }
                    }    
            ?>
                </tr>
            <?php
            }
            
        ?>    
    </table>
</div>