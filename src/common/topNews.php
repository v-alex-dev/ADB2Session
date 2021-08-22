<?php
    $topNews = firstNews();
?>
<section class="news">
    <div>
        <div> <h2>News à ne pas manquer</h2></div>
        <div>
            <div class="firstnews">
                <a href="../../src/page/article.php?id=<?=$topNews[0]["articleId"]?>">
                    <img src="<?=$topNews[0]["imgUrl"]?>" alt="">
                    <!-- <h3><?=$topNews[0]["titre"]?></h3> -->
                </a>
            </div>
            <div>
                <div class="secondnews">
                    <a href="../../src/page/article.php?id=<?=$topNews[1]["articleId"]?>">
                        <img src="<?=$topNews[1]["imgUrl"]?>" alt="">
                        <!-- <h4><?=$topNews[1]["titre"]?></h4> -->
                    
                    </a>
                </div>
                    <div class="thirdnews">
                        <a href="../../src/page/article.php?id=<?=$topNews[2]["articleId"]?>">
                            <img src="<?=$topNews[2]["imgUrl"]?>" alt="">
                            <!-- <h4><?=$topNews[2]["titre"]?></h4> -->
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>