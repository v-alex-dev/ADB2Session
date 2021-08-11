<?php
    $title = "admin";
    require "../../src/common/template.php";
    require "../../src/function/dbAdmin.php";
    require "../../src/function/dbAccess.php";
?>

<body>

<section>
    <div class="formulaire">
        <a href="../../src/page/admin.php?choix=listeCategorie"><div class="button">Gérer les catégories</div></a> 
        <a href="#"><div class="button">Gérer les articles</div></a>  
        <a href="#"><div class="button">Gérer les utilisateurs</div></a>      
       <a href="#"><div class="button">Gérer les commentaires</div></a>
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
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</section>
 <!--footer -->
<?php
    require "../../src/common/footer.php"
?>

</body>
</html>