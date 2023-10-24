<div id="footer">
    <div class="footer-top">
        <div class="center d-flex flex-wrap justify-content-between">
            <div class="footer-1">
                <p class="footer-tit"><?=$footer['ten']?></p>
                <div class="footer-content"><?=htmlspecialchars_decode($footer['noidung'])?></div>
                <?php if(count($mxh)>0){ ?>
                    <ul class="mxh footer-mxh">
                        <span>Follow us:</span>
                        <?php foreach ($mxh as $key => $value) { ?>
                            <li>
                                <a href="<?=$value['link']?>" target="_blank">
                                    <img onerror="this.src='<?=THUMBS?>/16x16x2/assets/images/noimage.png';" src="<?=THUMBS?>/16x16x1/<?=UPLOAD_PHOTO_L.$value['photo']?>" alt="<?=$value['ten']?>">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="footer-bottom">
        <div class=" d-flex flex-wrap align-items-center justify-content-between">
            <p class="copyright">Copyright@2023 <span><?=$setting["ten$lang"]?></span>. Design by <a href="https://vinasoftware.com.vn/">VinaSoftware (VNS)</a></p>

        </div>
    </div>
            </div>
            <div class="footer-2">

                <p class="footer-tit"><?=thongtinlienhe?></p>
                <div class="footer-content"><?=htmlspecialchars_decode($footer2['noidung'])?></div>


            </div>
            <div class="footer-3">
                <?php if(count($dvlistmenu)){ ?>
                    <p class="footer-tit"><?=dichvu?></p>
                    <ul class="footer-list">
                        <?php foreach ($dvlistmenu as $key => $value) { ?>
                            <li><a class="text-decoration-none" href="<?=$value[$sluglang]?>" title="<?=$value['ten']?>"><?=$value['ten']?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php if(count($chinhsach)){ ?>
                    <p class="footer-tit"><?=chinhsach?></p>
                    <ul class="footer-list">
                        <?php foreach ($chinhsach as $key => $value) { ?>
                            <li><a class="text-decoration-none" href="<?=$value[$sluglang]?>" title="<?=$value['ten']?>"><?=$value['ten']?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php /*
    <div class="footer-map">
        <div class="center">
            <div class="title-map">
                <?php foreach ($chinhanh as $q => $w): ?>
                    <h2 class="click-map <?php if($q==0) echo 'active';?>" data-id='<?=$w['id']?>' ><?=$w['ten']?></h2>
                <?php endforeach ?>
            </div>
        </div>
        <div class="load-map"></div>
    </div>
    */ ?>
    <?php /* if($source=='index'){
        <?=$addons->setAddons('footer-map', 'footer-map', 10);?>
    } */ ?>
</div>