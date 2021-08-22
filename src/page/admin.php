<?php
    $title = "admin";
    require "../../src/common/template.php";
    require "../../src/function/dbAdmin.php";
    require "../../src/function/dbAccess.php";
    require "../../src/function/dbCommentFunction.php";
?>

<body>

<section>
    <div class="formulaire">
        <a href="../../src/page/admin.php?choix=listeCategorie"><div class="button">Gérer les catégories</div></a> 
        <a href="../../src/page/admin.php?choix=listeArticle"><div class="button">Gérer les articles</div></a>  
        <a href="../../src/page/admin.php?choix=listeUser"><div class="button">Gérer les utilisateurs</div></a>      
        <a href="../../src/page/admin.php?choix=listeCommentaire"><div class="button">Gérer les commentaires</div></a>
    </div>
</section>
<section>
    <div>
        <?php
         if(isset($_GET["choix"]) && $_GET["choix"] == "listeCategorie")
         {
             require "../../src/page/adminInclude/listCategorie.php";
         }
        ?>
    </div>
    <div>
        <?php
        if(isset($_GET["choix"]) && $_GET["choix"] == "listeArticle")
         {
             require "../../src/page/adminInclude/listeArticle.php";
         }
         ?>
    </div>
    <div>
        <?php
         if(isset($_GET["choix"]) && $_GET["choix"] == "listeUser")
         {
             require "../../src/page/adminInclude/listeUser.php";
         }
        ?></div>
    <div>
        <?php
         if(isset($_GET["choix"]) && $_GET["choix"] == "listeCommentaire")
         {
             require "../../src/page/adminInclude/listeComment.php";
         }
        ?>
        </div>
    <div></div>
</section>
 <!--footer -->
<?php
    require "../../src/common/footer.php"
?>

</body>
</html>