<?php

$chitietdonhang = $d->rawQuery("select id_product, photo, ten, mau, size, gia, giamoi, soluong from #_order_detail where id_order = ? order by id desc",array($_REQUEST['id']));

$lichsumuahang = $d->rawQueryOne("select id, madonhang, tamtinh, tonggia, tinhtrang from #_order where id = ? order by id desc",array($_REQUEST['id']));

?>

<div class="flex-user-information">

    <div class="cot1-user-information">

        <?php include TEMPLATE.ACCOUNT."left_user.php"; ?>

    </div>

    <div class="cot2-user-information">

        <div class="title-user">

            <span>Chi tiết đơn hàng</span>

        </div>

        <div class="box-user">

            <div class="list-procart">

                <div class="procart procart-label d-flex align-items-start justify-content-between">

                    <div class="pic-procart"><?=hinhanh?></div>

                    <div class="info-procart"><?=tensanpham?></div>

                    <div class="quantity-procart">

                        <p><?=soluong?></p>

                        <p><?=thanhtien?></p>

                    </div>

                    <div class="price-procart"><?=thanhtien?></div>

                </div>

                <?php foreach ($chitietdonhang as $j => $k): ?>

                    <div class="procart d-flex align-items-start justify-content-between">

                        <div class="pic-procart">

                            <a class="text-decoration-none" href="<?=$k[$sluglang]?>" target="_blank" title="<?=$k['ten']?>"><img onerror="this.src='<?=THUMBS?>/90x90x2/assets/images/noimage.png';" src="<?=THUMBS?>/90x90x1/<?=UPLOAD_PRODUCT_L.$k['photo']?>" alt="<?=$k['ten']?>"></a>

                        </div>

                        <div class="info-procart">

                            <h3 class="name-procart"><a class="text-decoration-none" href="<?=$k[$sluglang]?>" target="_blank" title="<?=$k['ten']?>"><?=$k['ten']?></a></h3>

                            <div class="properties-procart">

                                <?php if($k['mau']) {?>

                                    <p>Màu: <strong><?=$k['mau']?></strong></p>

                                <?php }?>

                                <?php if($k['size']) {?>

                                    <p>Size: <strong><?=$k['size']?></strong></p>

                                <?php }?>

                            </div>

                        </div>

                        <div class="quantity-procart">

                           <p><?=$k['soluong']?></p>

                       </div>

                       <div class="price-procart">

                        <?php if($k['giamoi']) { ?>

                            <p class="price-new-cart">

                                <?=$func->format_money($k['giamoi'])?>

                            </p>

                            <p class="price-old-cart">

                                <?=$func->format_money($k['gia'])?>

                            </p>

                        <?php } else { ?>

                            <p class="price-new-cart">

                                <?=$func->format_money($k['gia'])?>

                            </p>

                        <?php } ?>

                    </div>

                </div>

            <?php endforeach ?>

            <div class="money-procart">

                <?php if($lichsumuahang['giamgia']) {?>

                    <div class="total-procart d-flex align-items-center justify-content-between">

                        <p>Tạm tính:</p>

                        <p class="total-price load-price-temp"><?=$func->format_money($lichsumuahang['tamtinh'])?></p>

                    </div>

                    <div class="total-procart d-flex align-items-center justify-content-between">

                        <p>Ưu đãi:</p>

                        <p class="total-price load-discounts-temp">-<?=$func->format_money($lichsumuahang['giamgia'])?></p>

                    </div>

                <?php }?>

                <div class="total-procart d-flex align-items-center justify-content-between">

                    <p><?=tongtien?>:</p>

                    <p class="total-price load-price-total load-money-discounts"><?=$func->format_money($lichsumuahang['tonggia'])?></p>

                </div>

            </div>

        </div>

    </div>

</div>