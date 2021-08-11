<?php
    $title = "account";
    require "../../src/common/template.php";
?>

<div class="formulaire">
        <ul>
            <li>Nom: <?=$_SESSION["user"]["nom"]?></li>
            <li>Prenom: <?=$_SESSION["user"]["prenom"] ?></li>
            <li>Login: <?=$_SESSION["user"]["login"] ?></li>
            <li>Email:<?= $_SESSION["user"]["email"]?></li>
        </ul>
</div>

<?php
    require "../../src/common/footer.php";
?>