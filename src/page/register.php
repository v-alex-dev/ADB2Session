<?php
    $title = "Register";
    require "../../src/common/template.php";
    require "../../src/function/Function.php";
    require "../../src/function/dbAccess.php";
    require "../../src/function/dbLogin.php";

    if(isset($_SESSION["mdpFalse"]) && $_SESSION["mdpFalse"] == true){
        $mdpFalse = $_SESSION["mdpFalse"];
         $_SESSION["mdpFalse"] = false;
    } else {
        $mdpFalse = false;
    }

    if(isset($_POST["nom"]) && !empty($_POST["nom"]) 
                            && !empty($_POST["prenom"]) 
                            && !empty($_POST["pseudo"])
                            && !empty($_POST["email"])
                            && !empty($_POST["mdp"])
                            && !empty($_POST["mdp2"]))
    {
        $option = array(
            "nom"   =>  FILTER_SANITIZE_STRING,
            "prenom"   =>  FILTER_SANITIZE_STRING,
            "pseudo"   =>  FILTER_SANITIZE_STRING,
            "email"   =>  FILTER_VALIDATE_EMAIL,
            "mdp"   =>  FILTER_SANITIZE_STRING,
            "mdp2"   =>  FILTER_SANITIZE_STRING
        );

        $result = filter_input_array(INPUT_POST, $option);

        $nom = $result["nom"];
        $prenom = $result["prenom"];
        $login = $result["pseudo"];
        $email = $result["email"];
        $mdp = $result["mdp"];
        $mdp2 = $result["mdp2"];
        $roleId = 3;
        $cle = 0;

        if( $mdp == $mdp2)
        {
            // hash du mot de passe
            $mdpHash = md5($mdp);
            // générer grain de sel
            $sel = grainDeSel(rand(5,20));
            // mot de passe à envoyer
            $mdpToSend = $mdpHash . $sel;
            $mdpFalse = false;
            
        }
        else
        {
            // booleen de controle
            $mdpFalse = true;
            // J'active une session pour dire que les mdp sont pas correct
            $_SESSION["mdpFalse"] = true;
            // recharger ma page
            header("location: ../../src/page/register.php");
            exit();
        }

        dbCheckRegister($email, $login);
       
        dbRegister ($nom, $prenom, $login, $email, $mdpToSend, $cle, $roleId, $sel);
        header("location: ../../src/page/login.php");
        exit();
    }
    else
    {
?>

<body>

<section class="formulaire">
    <form action="" method="post" class="login" enctype="multipart/form-data">
    <?php
        if($mdpFalse == true)
        {
            echo "<h2>Les mots de passe ne sont pas identique</h2>";
            $mdpFalse = false;
        }
        if(isset($_GET["errorAccount"]) && $_GET["errorAccount"] == true)
        {
            echo "<h2>".$_GET["msg"]."</h2>";
        }
    ?>
        <table>
            <thead>
                <tr>
                    <th>Enregistrez-vous</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prénom: </td>
                    <td><input type="text" name="prenom" require placeholder="Ex: Joseph"></td>
                </tr>
                <tr>
                    <td>Nom: </td>
                    <td><input type="text" name="nom" require placeholder="Ex: Joestar"></td>
                </tr>
                <tr>
                    <td>Pseudo: </td>
                    <td><input type="text" name="pseudo" require placeholder="Ex: JoJo234"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" require placeholder="Exemple@gmail.com"></td>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="mdp" require placeholder="Ex: dsFedsQA21fE515DrgDF"></td>
                </tr>
                <tr>
                    <td>Confirmation mot de passe: </td>
                    <td><input type="password" name="mdp2" require placeholder="Confirmez votre mot de passe"></td>
                </tr>
                <!--    A travailler plus tard si on a le temps.
                <tr>
                    <td>Uploader un avatar</td>
                    <td><input type="file" name="avatar"></td>
                
                </tr> -->
                <tr>
                    <td><input type="submit" value="Création du compte"></td>
                </tr>       
            </tbody>
        </table>
    </form>
</section>

 <!-- footer -->
<?php
    }
    require "../../src/common/footer.php"
?>

</body>
</html>