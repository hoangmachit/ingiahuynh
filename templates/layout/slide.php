<?php if (count($slider)) { ?>
    <div class="slideshow">
        <div class="center2">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($slider as $v) { ?>
                            <div class="swiper-slide">
                                <div class="slideshow-content">
                                    <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten'] ?>"><img onerror="this.src='<?= THUMBS ?>/1021x457x2/assets/images/noimage.png';" src="<?= THUMBS ?>/1021x457x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>" title="<?= $v['ten'] ?>" /></a>
                                </div>
                                <div class="slider-desc">
                                    <p class="slider-name"><?=$v['ten']?></p>
                                    <p class="slider-info"><?=nl2br($v['mota'])?></p>
                                    <a href="<?=$v['link']?>">Xem chi tiết</a>
                                </div>
                            </div>
                        <?php } ?>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>