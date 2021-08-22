<?php
    $buttonSelect = getSelectCategorie();
    if(isset($_POST["titre"]) && !empty($_POST["titre"]) 
                            && isset($_FILES["fichier"]) 
                            && isset($_POST["nomCategorie"]) 
                            && isset($_POST["contenu"]) 
                            && !empty($_POST["contenu"]))
    {
        $titre = htmlspecialchars($_POST["titre"]);
        $imgUrl = $_FILES["fichier"];
        $contenu = $_POST["contenu"];
        $auteurId = intval($_SESSION["user"]["id"]);
        $categorieArticleId = $_POST["nomCategorie"];

        if(isset($_POST["onTop"]) && $_POST["onTop"] == true)
        {
            $onTop = 1;
        }
        else
        {
            $onTop = 0;
        }
        
        addArticle($titre, $imgUrl, $contenu, $auteurId, $categorieArticleId, $onTop);
       
    }
?>
<section class="formulaire">

<form action="" method="post" enctype="multipart/form-data">

    <p>Titre de votre article:</p>

    <input type="text" name="titre" required>

    <p>Image de référence:</p>

    <input type="file" name="fichier" required>

    <table>

        <tr>

            <td>Type d'article</td>

            <td>A la une ?</td>

        </tr>

        <tr>

            <td>

                <select name="nomCategorie">
                <?php 

                    foreach ($buttonSelect as $selectCategorie) { 

                    ?>

                        <option value="<?=$selectCategorie["nomCategorie"]?>"><?=$selectCategorie["nomCategorie"]?></option>

                    <?php

                    }

                ?>

                </select>

            </td>

            <td><input type="checkbox" name="onTop"></td>



        </tr>

    </table>

    <p>Composer votre article</p>

    <textarea name="contenu" id="contenu"></textarea>

    <input class="" type="submit" value="Envoyez votre article">

</form>

</section>
<!-- Ajout du script tinymce et activer options -->
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>