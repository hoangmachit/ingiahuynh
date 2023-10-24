<?php
$linkMan = "index.php?com=product&act=man_price&type=".$type."&type2=".$_REQUEST["type2"]."&idc=".$idc."&p=".$curPage;
$linkSave = "index.php?com=product&act=save_price&type=".$type."&type2=".$_REQUEST["type2"]."&idc=".$idc."&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết giá sản phẩm <?=$config['product'][$type]['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit_price")?"Cập nhật":"Thêm mới";?> giá sản phẩm <?=$config['product'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if($idc){
                    $product_detail = $d->rawQueryOne("select id_mau,id_size,id_chatlieu,id_somat,id_canmang,id_khoanlo,id_soduongcung,id_hinhdang,id_cachthuc,id_kieube,id_soluong,gia,giamoi from #_product where id = ? limit 0,1",array($idc));

                    if($product_detail['id_size']!=''){
                        $size = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_size'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_chatlieu']!=''){
                        $chatlieu = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_chatlieu'].") order by stt,id desc",array($type));
                    }

                    if($product_detail['id_somat']!=''){
                        $somat = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_somat'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_canmang']!=''){
                        $canmang = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_canmang'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_khoanlo']!=''){
                        $khoanlo = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_khoanlo'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_soduongcung']!=''){
                        $soduongcung = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_soduongcung'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_hinhdang']!=''){
                        $hinhdang = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_hinhdang'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_cachthuc']!=''){
                        $cachthuc = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_cachthuc'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_kieube']!=''){
                        $kieube = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_kieube'].") order by stt,id desc",array($type));
                    }
                    if($product_detail['id_soluong']!=''){
                        $soluong = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_soluong'].") order by stt,id desc",array($type));
                    }
                    $name =  '';
                    if($_REQUEST['type2'] =='size') $name = 'Kích thước';
                    if($_REQUEST['type2'] =='chatlieu') $name = 'Chất liệu';
                    if($_REQUEST['type2'] =='somat') $name = 'Số mặt';
                    if($_REQUEST['type2'] =='canmang') $name = 'Cán màng';
                    if($_REQUEST['type2'] =='khoanlo') $name = 'Khoan lỗ';
                    if($_REQUEST['type2'] =='soduongcung') $name = 'Số đường cứng';
                    if($_REQUEST['type2'] =='hinhdang') $name = 'Hình dạng';
                    if($_REQUEST['type2'] =='cachthuc') $name = 'Cách thức';
                    if($_REQUEST['type2'] =='kieube') $name = 'Kiểu bế';
                    if($_REQUEST['type2'] =='soluong') $name = 'Số lượng';

                } ?>
                <div class="row">
                    <?php  if(isset($size) && count($size)>0 && $_REQUEST['type2'] =='size'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_size"><?=$name?></label>
                            <select class="form-control" name="data[id_size]" id="id_size" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($size as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_size'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($chatlieu) && count($chatlieu)>0  && $_REQUEST['type2'] =='chatlieu'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_chatlieu"><?=$name?>:</label>
                            <select class="form-control" name="data[id_chatlieu]" id="id_chatlieu" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($chatlieu as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_chatlieu'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($somat) && count($somat)>0  && $_REQUEST['type2'] =='somat'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_somat"><?=$name?>:</label>
                            <select class="form-control" name="data[id_somat]" id="id_somat" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($somat as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_somat'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($canmang) && count($canmang)>0  && $_REQUEST['type2'] =='canmang'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_canmang"><?=$name?>:</label>
                            <select class="form-control" name="data[id_canmang]" id="id_canmang" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($canmang as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_canmang'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($khoanlo) && count($khoanlo)>0  && $_REQUEST['type2'] =='khoanlo'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_khoanlo"><?=$name?>:</label>
                            <select class="form-control" name="data[id_khoanlo]" id="id_khoanlo" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($khoanlo as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_khoanlo'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($soduongcung) && count($soduongcung)>0  && $_REQUEST['type2'] =='soduongcung'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_soduongcung"><?=$name?>:</label>
                            <select class="form-control" name="data[id_soduongcung]" id="id_soduongcung" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($soduongcung as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_soduongcung'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($hinhdang) && count($hinhdang)>0  && $_REQUEST['type2'] =='hinhdang'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_hinhdang"><?=$name?>:</label>
                            <select class="form-control" name="data[id_hinhdang]" id="id_hinhdang" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($hinhdang as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_hinhdang'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($cachthuc) && count($cachthuc)>0  && $_REQUEST['type2'] =='cachthuc'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_cachthuc"><?=$name?>:</label>
                            <select class="form-control" name="data[id_cachthuc]" id="id_cachthuc" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($cachthuc as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_cachthuc'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($kieube) && count($kieube)>0  && $_REQUEST['type2'] =='kieube'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_kieube"><?=$name?>:</label>
                            <select class="form-control" name="data[id_kieube]" id="id_kieube" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($kieube as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_kieube'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if(isset($soluong) && count($soluong)>0  && $_REQUEST['type2'] =='soluong'){ ?>
                        <div class="form-group col-md-3 col-sm-4">
                            <label for="id_soluong"><?=$name?>:</label>
                            <select class="form-control" name="data[id_soluong]" id="id_soluong" required>
                                <option value="">Chọn <?=$name?></option>
                                <?php foreach ($soluong as $key => $value) {?>
                                    <option value="<?=$value['id']?>" <?php if($value['id'] == $_REQUEST['id']) echo 'selected';?> <?php if($item['id_soluong'] == $value['id']){ echo "selected"; } ?>><?=$value['ten']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="d-block" for="gia">Giá bán:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><strong>VND</strong></div>
                        </div>
                        <input type="text" class="form-control format-price gia_ban" name="data[gia]" id="gia" placeholder="Giá bán" value="<?=$func->format_money($item['gia'])?>">
                    </div>
                </div>
                <?php if($product_detail['giamoi']) {?>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="gia">Giá mới:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><strong>VND</strong></div>
                            </div>
                            <input type="text" class="form-control format-price gia_moi" name="data[giamoi]" id="giamoi" placeholder="Giá mới" value="<?=$func->format_money($item['giamoi'])?>">
                        </div>
                    </div>

            <?php }?>
            </div>
            <div class="form-group">
                <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                    <label for="hienthi-checkbox" class="custom-control-label"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
            </div>
        </div>
    </div>
    <div class="card-footer text-sm">
        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
    </div>
</form>
</section>