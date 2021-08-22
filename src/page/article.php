<?php
    $title = "Article";
    require "../../src/common/template.php";
    require "../../src/function/dbAccess.php";
    require "../../src/function/dbArticles.php";
    require "../../src/function/dbCommentFunction.php";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        
        $id = intval($_GET['id']);
        // J'execute une requete pour récupérer mon contenu
        $contenuArticle = getArticleContent($id);
    }

?>

<section class="mainArticle">
    <!-- Les informations du jeu cité dans l'article -->
    <div class="titrenautre">
        <h2><?= $contenuArticle[0]['titre'] ?></h2>
        <p>
            Catégorie: <?= $contenuArticle[0]['nomCategorie'] ?>
        </p>
        <p>
            Auteur: <?= $contenuArticle[0]['auteurNom'] ?> <?= $contenuArticle[0]['auteurPrenom'] ?>
        </p>
    </div>

    <!-- Intégralité de mon article sur lequel le flex principal est appliqué -->
    <div> 
        <!-- Section qui contient l'image et le titre -->
        <div class="ImgArticleOut">
        <img src="<?=$contenuArticle[0]['imgUrl']?>" alt="<?=$contenuArticle[0]['titre']?>" class="imgArticleIn">
        </div>
        <!-- Le contenu de mon article -->
        <div id="contenuArticle">
            <?= $contenuArticle[0]['contenu'] ?>
        </div>

    </div>
    <!-- <div class="separatron"> </div> -->

   
    
</section>
<div class="commentaire" >
    
        <!-- J'injecterai les commentaires de mes users -->
            <?php 
                require '../../src/page/articleInclude/commentaire.php';
            ?>
    </div>
<?php
    require "../../src/common/footer.php"
?>
