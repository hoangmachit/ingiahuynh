<div class="grid-pro-detail w-clear">
    <div class="grid-pro-info-top">
        <div class="left-pro-detail w-clear">
            <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: on; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten']?>"><img onerror="this.src='<?=THUMBS?>/458x393x2/assets/images/noimage.png';" src="<?=THUMBS?>/458x393x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten']?>"></a>
            <?php if(isset($hinhanhsp) && count($hinhanhsp) > 0) { ?>
                <div class="gallery-thumb-pro">
                    <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
                    <div class="owl-carousel owl-theme owl-thumb-pro">
                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten']?>"><img onerror="this.src='<?=THUMBS?>/458x393x2/assets/images/noimage.png';" src="<?=THUMBS?>/458x393x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten']?>"></a>
                        <?php for($i=0,$count=count($hinhanhsp); $i < $count; $i++) { ?>
                            <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>" title="<?=$row_detail['ten']?>">
                                <img onerror="this.src='<?=THUMBS?>/458x393x2/assets/images/noimage.png';" src="<?=THUMBS?>/458x393x1/<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>" alt="<?=$row_detail['ten']?>">
                            </a>
                        <?php } ?>
                    </div>
                    <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
                </div>
            <?php } ?>

            <?php if(!empty($gif2)) {?>
            <div id="image-gif2" class="image-gif-2">
                <a href="javascript:void(0)" class="btn-baogia" data-toggle="modal" data-target=".baogia">
				<img onerror="this.src='<?= THUMBS ?>/457x117x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $gif2['photo'] ?>" alt="<?= $setting['ten'.$lang] ?>" title="<?= $setting['ten'.$lang] ?>" />
                </a>
			</div>
            <?php } ?>
        </div>
        <div class="right-pro-detail w-clear">
            <div class="right-pro-detail-left">
                <h1 class="title-pro-detail"><?=$row_detail['ten']?></h1>
                <p class="info-pro-short"><?=nl2br($row_detail['motangan'])?></p>
                <div class="desc-pro-detail">
                    <p class="pro-detail-title">Thông số cơ bản</p>
                    <?=(isset($row_detail['mota']) && $row_detail['mota'] != '') ? htmlspecialchars_decode($row_detail['mota']) : ''?>
                </div>
                <div class="attr-pro-detail" data-type="<?=$type?>">

                    <p class="pro-detail-title">Yêu cầu của bạn</p>
                    <?php if(isset($size) && count($size)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-size">- Kích thước</label>
                            <select name="pro-detail-size" id="pro-detail-size" class="form-pro-detail">
                                <option value=""> - Chọn kích thước</option>
                                <?php foreach ($size as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($chatlieu) && count($chatlieu)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-chatlieu">- Chất liệu giấy</label>
                            <select name="pro-detail-chatlieu" id="pro-detail-chatlieu" class="form-pro-detail">
                                <option value=""> - Chọn Chất liệu giấy</option>
                                <?php foreach ($chatlieu as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($somat) && count($somat)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-somat">- Số mặt in</label>
                            <select name="pro-detail-somat" id="pro-detail-somat" class="form-pro-detail">
                                <option value=""> - Chọn Số mặt in</option>
                                <?php foreach ($somat as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($canmang) && count($canmang)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-canmang">- Loại cán màng</label>
                            <select name="pro-detail-canmang" id="pro-detail-canmang" class="form-pro-detail">
                                <option value=""> - Chọn Loại cán màng</option>
                                <?php foreach ($canmang as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($khoanlo) && count($khoanlo)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-khoanlo">- Đóng số nhảy</label>
                            <select name="pro-detail-khoanlo" id="pro-detail-khoanlo" class="form-pro-detail">
                                <option value=""> - Chọn Đóng số nhảy</option>
                                <?php foreach ($khoanlo as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($soduongcung) && count($soduongcung)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-soduongcung">- Qui cách</label>
                            <select name="pro-detail-soduongcung" id="pro-detail-soduongcung" class="form-pro-detail">
                                <option value=""> - Chọn Qui cách</option>
                                <?php foreach ($soduongcung as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($cachthuc) && count($cachthuc)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-cachthuc">- Số lượng trang ruột</label>
                            <select name="pro-detail-cachthuc" id="pro-detail-cachthuc" class="form-pro-detail">
                                <option value=""> - Chọn Số lượng trang ruột</option>
                                <?php foreach ($cachthuc as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($soluong) && count($soluong)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-soluong">- Số lượng</label>
                            <select name="pro-detail-soluong" id="pro-detail-soluong" class="form-pro-detail">
                                <option value=""> - Chọn Số lượng</option>
                                <?php foreach ($soluong as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    
                    <?php if(isset($hinhdang) && count($hinhdang)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-hinhdang">- Thời gian</label>
                            <select name="pro-detail-hinhdang" id="pro-detail-hinhdang" class="form-pro-detail">
                                <option value=""> - Chọn Thời gian</option>
                                <?php foreach ($hinhdang as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($kieube) && count($kieube)>0){ ?>
                        <div class="pro-detail-group">
                            <label for="pro-detail-kieube">- Số đường cấn</label>
                            <select name="pro-detail-kieube" id="pro-detail-kieube" class="form-pro-detail">
                                <option value=""> - Chọn Số đường cấn</option>
                                <?php foreach ($kieube as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="pro-detail-id" id="pro-detail-id" value="<?=$row_detail['id']?>">
                </div>
                <div class="pro-detail-file">
                    <p>Thiết kế sẵn sàng in của bạn sẽ được cung cấp như thế nào?</p>
                    <a href="javascript:void(0)" data-file=1>Tôi đã có file thiết kế</a>
                    <a href="javascript:void(0)" data-file=0>Tôi cần hỗ trợ thiết kế </a>
                    <p>( Tham khảo dịch vụ thiết kế )</p>
                </div>
                <div class="pro-detail-total-price">
                    <p>Thành tiền: <span><?=($row_detail['gia'] > 0 ? $func->format_money($row_detail['gia']) : 0 )?></span></p>
                    <input type="hidden" name="total-price" id="total-price" value="<?=($row_detail['gia'] > 0 ? $row_detail['gia'] : 0 )?>">
                    <input type="hidden" name="have-file" id="have-file" value="0">
                    <?php if(!empty($gif4)) {?>
                    <div id="image-gif4" class="image-gif-4">
                    <img onerror="this.src='<?= THUMBS ?>/73x78x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $gif4['photo'] ?>" alt="<?= $setting['ten'.$lang] ?>" title="<?= $setting['ten'.$lang] ?>" />
                    <?php } ?>
                </div>
                </div>

                <p class="pro-detail-book">
                    <input type="submit" value="Đặt in ngay" name="send-cart" id="send-cart" data-toggle="modal" data-target=".newsletter">
                </p>
                <div class="pro-detail-info2"><?=nl2br($row_detail['motangan2'])?></div>
                <?php if(isset($config['cart']['active']) && $config['cart']['active']==true) { ?>
                    <div class="cart-pro-detail">
                        <a class="transition addnow addcart text-decoration-none" data-id="<?=$row_detail['id']?>" data-action="addnow"><i class="fas fa-shopping-bag"></i><span>Thêm vào giỏ hàng</span></a>
                        <a class="transition buynow addcart text-decoration-none" data-id="<?=$row_detail['id']?>" data-action="buynow"><i class="fas fa-shopping-bag"></i><span>Đặt hàng</span></a>
                    </div>
                <?php } ?>
            </div>
            <div class="right-pro-detail-right">
            <?php if(!empty($gif3)) {?>
                <div id="image-gif3" class="image-gif-3">
                    <a href="javascript:void(0)" class="btn-baogia" data-toggle="modal" data-target=".baogia">
                    <img onerror="this.src='<?= THUMBS ?>/457x117x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $gif3['photo'] ?>" alt="<?= $setting['ten'.$lang] ?>" title="<?= $setting['ten'.$lang] ?>" /></a>
                </div>
                <?php } ?>
                <div class="right-pro-policy">
                    <?php foreach ($chinhsachsanpham as $key => $value) {  ?>
                        <div class="policy-items">
                            <img onerror="this.src='<?= THUMBS ?>/36x36x2/assets/images/noimage.png';" src="<?= THUMBS ?>/36x36x2/<?= UPLOAD_NEWS_L . $value['photo'] ?>" alt="<?= $value['ten'] ?>" title="<?= $value['ten'] ?>" />
                            <div class="policy-info">
                                <p><?=$value['ten']?></p>
                                <p><?=$value['mota']?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="right-pro-policy right-pro-policy2">
                    <p class="pro-policy-title">Tư vấn đặt hàng</p>
                    <?php foreach ($tuvan as $key => $value) {
                        $stt = $key + 1;
                        ?>
                        <div class="pro-policy2-items">
                            <p class="pro-policy2-number"><?=($stt > 9) ? $stt : "0".$stt?></p>
                            <p class="pro-policy2-info">
                                <span><?=$value['ten']?></span>
                                <span><?=$value['mota']?></span>
                            </p>
                        </div>
                    <?php } ?>
                    <p class="pro-policy-title">Thời gian làm việc</p>
                    <div class="pro-policy-time"><?=htmlspecialchars_decode($thoigianlamviec['noidung'])?></div>
                </div>
            </div>

        </div>
    </div>
    <div class="tags-pro-detail w-clear">
        <?php if(isset($pro_tags) && count($pro_tags) > 0) { ?>
            <?php for($i=0,$count=count($pro_tags); $i < $count; $i++) { ?>
                <a class="transition text-decoration-none w-clear" href="<?=$pro_tags[$i][$sluglang]?>" title="<?=$pro_tags[$i]['ten']?>"><i class="fas fa-tags"></i><?=$pro_tags[$i]['ten']?></a>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="clear"></div>

    <div class="tabs-pro-detail">
        <ul class="ul-tabs-pro-detail w-clear">
            <li class="activeht transition" data-tabs="info-pro-detail">Giới thiệu sản phẩm</li>
            <li class=" transition" data-tabs="info2-pro-detail">Lưu ý đặt hàng</li>
            <li class=" transition" data-tabs="info3-pro-detail">Quy trình thiết kế</li>
        </ul>
        <div class="content-tabs-pro-detail info-pro-detail activeht"><?=(isset($row_detail['noidung']) && $row_detail['noidung'] != '') ? htmlspecialchars_decode($row_detail['noidung']) : ''?></div>
        <div class="content-tabs-pro-detail info2-pro-detail "><?=(isset($luuydathang['noidung']) && $luuydathang['noidung'] != '') ? htmlspecialchars_decode($luuydathang['noidung']) : ''?></div>
        <div class="content-tabs-pro-detail info3-pro-detail "><?=(isset($quytrinhtk['noidung']) && $quytrinhtk['noidung'] != '') ? htmlspecialchars_decode($quytrinhtk['noidung']) : ''?></div>

        <div class="content-tabs-pro-detail commentfb-pro-detail"><div class="fb-comments" data-href="<?=$func->getCurrentPageURL()?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div></div>
<?php /*        <a class="pro-detail-btn-container d-none" data-tab="info-pro-detail" href="javascript:void(0)">Xem thêm</a>
*/ ?>

    </div>
</div>

<?php if(isset($product) && count($product) > 0) { ?>
    <div class="title-main"><span><?=sanphamcungloai?></span></div>
    <?= $func->getTemplateProductAll($product,'product-items') ;?>
    <div class="pagination-home mgt-25"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>

<?php }  ?>
