<section class="posts">
    <div class="container">
    	<?include('filters.php')?>
        <main>
            <div id="posts" class="universities gap-4 mt-3 mb-5">
                <?foreach($posts as $post):?>
              		<?
                        $postId = $post['id'];
                        $price_l = intval($post['price_l']);
                        $price_l >= 1000000 ? $price = intval($price_l / $rate) : $price = $price_l;
                        $priceFormatted = number_format($price, 0, '.', ' ');

                        $updatePrice = $dbh -> prepare("UPDATE universities SET price=$price WHERE id=$postId");
                        $updatePrice -> execute();
                        $priceAvg = $updatePrice -> fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="university">
                        <div class="uni__info">
                            <div class="rate__block d-flex flex-column align-items-center">
                                <img src="assets/images/<?=$post['id']?>.jpg" alt="<?=$post['title']?>" class="unImg">
                                <div class="rating">
                                    <i class="star fa-star far"></i> 
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <span><?$avgRating = sprintf("%.1f", $post['rating']); echo "$avgRating"?> / 5.0</span>
                                    <span name="stars-filled" value=<?=$avgRating?>></span>
                                </div>
                              	<span class="price m-3"><?='$ ', $priceFormatted, ' / year'?></span>
                            </div>
                          	<a href="<?=$post['link']?>">
                              	<h2>
                              		<?=$post['title']?>
                          		</h2>
                            </a>
                            <p class="over__hidden-5">
                                <?=$post['content']?>
                            </p>
                            <a href="?id=<?=$post['id']?>">
                                <div class="btn-static view">
                                    View more
                                </div>
                            </a>
                        </div>
                    </div>
                <? endforeach;?>
            </div>
        </main>
    </div>
</section>