<?php
    if(isset($_GET["deconnect"]) && $_GET["deconnect"] == true)
    {
        $_SESSION["connecté"] = false;
        session_destroy();
        header("location: ./index.php");
        exit();
    }
?>



<nav>
    <div id="acceuil">
        <a href="../../index.php">Accueil</a>
    </div>
    <div class="menu">
        <ul>
            <?php
                if(!isset($_SESSION["connecté"]) || $_SESSION["connecté"] == false)
                {
                ?>                   
                        <li><a href="../../src/page/login.php">Login</a></li>
                        
                <?php
                }

                if(isset($_SESSION["connecté"]) && $_SESSION["connecté"] == true)
                {
                    ?>
                        <li><a href="../../src/page/account.php">Mon compte</a></li>
                        <li><a href="../../index.php?deconnect=true">déconnection</a></li>
                    <?php
                }
                        
                if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "modérateur"  || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin" )
                {
                    ?>
                        <li><a href="../../src/page/redactionArticle.php">Rédiger</a></li>
                    <?php
                }

                if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "modérateur"  || isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "Admin" )
                {
                    ?>
                        <li><a href="../../src/page/admin.php">Administration</a></li>
                    <?php
                }
            ?>
        </ul>
    </div>
    
</nav>