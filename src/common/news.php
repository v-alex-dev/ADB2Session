<?php
    $listeNews = listeNews();
?>


<section class="corp">
    <div class="listecategorie">
        <a href="#">Vlog</a>
        <a href="#">Actualités</a>
        <a href="#">Cinéma</a>
        <a href="#">Event</a>
        <a href="#">Gaming</a>
    </div>
    <div class="allart">
        <?php
            foreach($listeNews as $news)
            {
            ?>
                <div class="article" >
                    <a href="./src/page/article.php?id=<?=$news["articleId"]?>">
                        <img src="<?=$news["imgUrl"]?>" alt="">
                        <h4><?=$news["titre"]?></h4>
                        
                    </a>
                </div>
            <?php
            }
        ?>
        
    </div>
</section>