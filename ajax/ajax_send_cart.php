<?php
include "ajax_config.php";

$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$type = (isset($_POST['type']) && $_POST['type'] != '') ? htmlspecialchars($_POST['type']) : '';
$kichthuoc = (isset($_POST['kichthuoc']) && $_POST['kichthuoc'] > 0) ? htmlspecialchars($_POST['kichthuoc']) : 0;
$chatlieu = (isset($_POST['chatlieu']) && $_POST['chatlieu'] > 0) ? htmlspecialchars($_POST['chatlieu']) : 0;
$somat = (isset($_POST['somat']) && $_POST['somat'] > 0) ? htmlspecialchars($_POST['somat']) : 0;
$canmang = (isset($_POST['canmang']) && $_POST['canmang'] > 0) ? htmlspecialchars($_POST['canmang']) : 0;
$khoanlo = (isset($_POST['khoanlo']) && $_POST['khoanlo'] > 0) ? htmlspecialchars($_POST['khoanlo']) : 0;
$soduongcung = (isset($_POST['soduongcung']) && $_POST['soduongcung'] > 0) ? htmlspecialchars($_POST['soduongcung']) : 0;
$hinhdang = (isset($_POST['hinhdang']) && $_POST['hinhdang'] > 0) ? htmlspecialchars($_POST['hinhdang']) : 0;
$cachthuc = (isset($_POST['cachthuc']) && $_POST['cachthuc'] > 0) ? htmlspecialchars($_POST['cachthuc']) : 0;
$kieube = (isset($_POST['kieube']) && $_POST['kieube'] > 0) ? htmlspecialchars($_POST['kieube']) : 0;
$soluong = (isset($_POST['soluong']) && $_POST['soluong'] > 0) ? htmlspecialchars($_POST['soluong']) : 0;
$total = (isset($_POST['total']) && $_POST['total'] > 0) ? htmlspecialchars($_POST['total']) : 0;

$havefile = (isset($_POST['havefile']) && $_POST['havefile'] > 0) ? htmlspecialchars($_POST['havefile']) : 0;
$row_detail = $d->rawQueryOne("select ten$lang as ten,gia from #_product where id = ? and type = ? and hienthi > 0 limit 0,1",array($id,$type));


$cofile = "Tôi cần hỗ trợ thiết kế";
if($havefile){
    $cofile = "Có";
}



?>


<div class="row">
    <div class="col-md-8 col-12">
        <form class="form-newsletter validation-newsletter"  method="post" action="dat-in" enctype="multipart/form-data">
            <div class="row my-2">
                <div class="input-newsletter col-sm-6 col-12 mb-2 ">
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>*" required />
                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                </div>
                <div class="input-newsletter col-sm-6 col-12 mb-2 ">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?> *" required />
                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                </div>
            </div>
            <div class="row my-2">
                <div class="input-newsletter col-sm-6 col-12 mb-2 ">
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
                    <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                </div>
                <div class="input-newsletter col-sm-6 col-12 mb-2 ">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail*" required />
                    <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                </div>
            </div>
            <div class="row my-2">
                <div class="input-newsletter col-sm-12">
                    <textarea class="form-control" id="noidung" name="noidung" placeholder="Nội dung cần tư vấn..." required /></textarea>
                    <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                </div>
            </div>
            <input type="submit" class=" btn-contact-modal" name="submit-newsletter" value="Đặt in" />
            <input type="hidden" name="kichthuoc" value="<?=$kichthuoc?>">
            <input type="hidden" name="chatlieu" value="<?=$chatlieu?>">
            <input type="hidden" name="somat" value="<?=$somat?>">
            <input type="hidden" name="canmang" value="<?=$canmang?>">
            <input type="hidden" name="khoanlo" value="<?=$khoanlo?>">
            <input type="hidden" name="soduongcung" value="<?=$soduongcung?>">
            <input type="hidden" name="hinhdang" value="<?=$hinhdang?>">
            <input type="hidden" name="cachthuc" value="<?=$cachthuc?>">
            <input type="hidden" name="kieube" value="<?=$kieube?>">
            <input type="hidden" name="soluong" value="<?=$soluong?>">
            <input type="hidden" name="cofile" value="<?=$havefile?>">
            <input type="hidden" name="sanpham" value="<?=$id?>">
            <input type="hidden" name="gia" value="<?=$total?>">
        </form>
    </div>
    <div class="col-md-4 col-12">
        <p class="info-name"><b><?=$row_detail['ten']?></b></p>
        <?php if($kichthuoc) { ?>
        <p class="info-pro-detail"><b>Kích thước:</b> <span><?=$func->get_name_cart($kichthuoc)?></span></p>
        <?php } ?>
        <?php if($chatlieu) { ?>
        <p class="info-pro-detail"><b>Chất liệu:</b> <span><?=$func->get_name_cart($chatlieu)?></span></p>
        <?php } ?>
        <?php if($somat) { ?>
        <p class="info-pro-detail"><b>Số mặt:</b> <span><?=$func->get_name_cart($somat)?></span></p>
        <?php } ?>
        <?php if($canmang) { ?>
        <p class="info-pro-detail"><b>Cán màng:</b> <span><?=$func->get_name_cart($canmang)?></span></p>
        <?php } ?>
        <?php if($khoanlo) { ?>
        <p class="info-pro-detail"><b>Khoan lỗ:</b> <span><?=$func->get_name_cart($khoanlo)?></span></p>
        <?php } ?>
        <?php if($soduongcung) { ?>
        <p class="info-pro-detail"><b>Số đường cứng:</b> <span><?=$func->get_name_cart($soduongcung)?></span></p>
        <?php } ?>
        <?php if($hinhdang) { ?>
        <p class="info-pro-detail"><b>Hình dạng:</b> <span><?=$func->get_name_cart($hinhdang)?></span></p>
        <?php } ?>
        <?php if($cachthuc) { ?>
        <p class="info-pro-detail"><b>Cách thức:</b> <span><?=$func->get_name_cart($cachthuc)?></span></p>
        <?php } ?>
        <?php if($kieube) { ?>
        <p class="info-pro-detail"><b>Kiểu bế:</b> <span><?=$func->get_name_cart($kieube)?></span></p>
        <?php } ?>
        <?php if($soluong) { ?>
        <p class="info-pro-detail"><b>Số lượng:</b> <span><?=$func->get_name_cart($soluong)?></span></p>
        <?php } ?>
        <?php if($havefile){ ?>
            <p class="info-file"><b>Đã có file thiết kế:</b> <span><?=$cofile?></span></p>
        <?php }else{ ?>
            <p class="info-file"><b><?=$cofile?></b></p>
        <?php } ?>
        <?php if($total) { ?>
            <p class="info-pro-detail"><b>Tổng:</b> <span><?=$func->format_money($total)?></span></p>
        <?php } ?>
    </div>
</div>