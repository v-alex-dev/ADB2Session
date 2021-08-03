<?php
    $title = "article";
    require "../../src/common/template.php";
    
?>

<body>   
<section>
    <div class="headarticle">
        <div>
            <p>image</p>
        </div>
        <div>
            <p>Titre de l'article</p>
        </div>
    </div>
    <div class="mainarticle">
        <p>Ceci n'est pas un article.</p>
    </div>
    <div class="commentaire">
        <p>Ceci n'est pas un commentaire.</p>
    </div>
</section>

 <!-- footer -->
<?php
    require "../../src/common/footer.php"
?>

</body>
</html>