<?php
$lichsumuahang = $d->rawQuery("select id, madonhang, tamtinh, tonggia, tinhtrang from #_order where id_user = ? order by id desc",array($_SESSION[$login_member]['id']));
?>
<div class="flex-user-information">
    <div class="cot1-user-information">
        <?php include TEMPLATE.ACCOUNT."left_user.php"; ?>
    </div>
    <div class="cot2-user-information">
        <div class="title-user">
            <span>Lịch sử mua hàng</span>
        </div>
        <div class="box-user">
            <div class="flex-lichsumuahang head-box-lichsumuahang">
                <div class="madonhang-lichsumuahang">Mã đơn hàng</div>
                <div class="tongtien-lichsumuahang">Tổng giá trị đơn hàng</div>
                <div class="tinhtrang-lichsumuahang">Tình trạng</div>
                <div class="xemchitiet-lichsumuahang">Hiển thị</div>
            </div>
            <?php if($lichsumuahang) {?>
                <?php foreach ($lichsumuahang as $q => $w): ?>
                    <?php
                    $tinhtrang = $d->rawQueryOne("select trangthai from #_status where id = ?",array($w['tinhtrang']));
                    ?>
                    <div class="box-lichsumuahang">
                        <div class="flex-lichsumuahang item-box-lichsumuahang">
                            <div class="madonhang-lichsumuahang"><?=$w['madonhang']?></div>
                            <div class="tongtien-lichsumuahang"><?=$func->format_money($w['tonggia'])?></div>
                            <div class="tinhtrang-lichsumuahang"><?=$tinhtrang['trangthai']?></div>
                            <div class="xemchitiet-lichsumuahang"><a href="account/chi-tiet-don-hang?id=<?=$w['id']?>">Xem chi tiết</a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php }else {?>
                <div class="alert alert-danger" role="alert">
                    <strong>Bạn chưa có đơn hàng</strong>
                </div>
            <?php }?>
        </div>
    </div>