<?php
    $title = "article";
    $tinymce = true;
    require "../../src/common/template.php";
    require "../../src/function/dbAccess.php";
    require "../../src/function/dbArticles.php";
    
?>

<body>   
    <section class="formulaireButton">
        <div class="buttonTampon">
                <a href="../../src/page/redactionArticle.php?choix=uploaderPhoto">Uploader photo</a> 
        </div>
        <div class="buttonTampon">
                <a href="../../src/page/redactionArticle.php?choix=redigerArticle&liens=memoireTampon">Afficher le tampon</a>
        </div>
        <?php
        if(isset($_GET["choix"]) && $_GET["choix"] == "redigerArticle")
        {
            ?>
            <div class="formulaire">
            <?php
            require "../../src/page/articleInclude/imgTampon.php";
            ?>
            </div>
        <?php
        }
        if(isset($_GET["choix"]) && $_GET["choix"] == "uploaderPhoto")
        {
            
            require "../../src/page/articleInclude/moduleUploadFichier.php";
        }
        ?>
    </section>

    <?php
            require "../../src/page/articleInclude/redigerArticle.php";
        ?>
</body>
 <!-- footer -->
    <?php
        require "../../src/common/footer.php"
    ?>


</html>