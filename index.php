<?php
    $title = "Accueil";
    require "./src/function/newsFonctions.php";
    require "./src/function/dbAccess.php";
    require "./src/function/dbLogin.php";
    require "./src/common/template.php";
    require "./src/common/topNews.php";

    if(isset($_GET["error"]) && $_GET["error"] == true)
    {
        echo"<h3>".$_GET["message"]. "</h3>";
    }

    require "./src/common/news.php";
    require "./src/common/footer.php";
    

   

?>
