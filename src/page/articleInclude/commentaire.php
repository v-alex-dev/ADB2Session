<?php
    if(isset($_POST["comment"]) && !empty($_POST["comment"]))
    {
        $user = intval($_SESSION["user"]["id"]);
        $articleId = $_GET["id"];
        $contenu = htmlspecialchars($_POST["comment"]);

        sendComment($articleId, $user, $contenu);
    }
    
    $commentaire = getComment();

?>

    <div >
        <?php
            // Vérification si la personnes est connecté et qui est dans la base de donnée.
            if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "paysan" || 
            isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] =="modérateur"||
            isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] =="Admin")
            {
             ?>
                <form action="" method="post" class="sendComment">
                    <h3>Vous avez un avis?</h3>
                    <textarea name="comment" cols="100" rows="10" placeholder="Inscrivez votre commentaire"></textarea>
                    <input type="submit" value="Envoyez le commentaire">
                </form>
            <?php
            }
            // Sinon je l'invite gentillement a se connecter
            else
            {
            ?>
                <a href="../../src/page/login.php"><div class="btnRegister">Pour raler, veuillez vous connectez!</div></a>
                <a href="../../src/page/register.php"><div class="btnRegister">Si vous n'avez pas de compte. Inscrivez vous!</div></a>
                
            <?php     
            }
            // Vérifie si il existe des commentaire si oui il l'affiche
            if(isset($commentaire))
            {
                foreach($commentaire as $infoComment)
                { 
                    if(isset($_GET["id"]) && $_GET["id"] == $infoComment["articleId"])
                    {                 
                    ?>
                        <div class="comment">
                            <div class="loginCom"><h4><?= $infoComment["login"]?></h5></div>
                            <div class="contenuCom"><p><?= $infoComment["contenu"]?></p></div>
                        </div>
                    <?php
                    }
                }
            }
        ?>
    </div>

