<?php
    $linkMan = "index.php?com=newsletter&act=man&type=".$type."&p=".$curPage;
    $linkSave = "index.php?com=newsletter&act=save&type=".$type."&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item"><a href="<?=$linkMan?>" title="Quản lý <?=$config['newsletter'][$type]['title_main']?>">Quản lý <?=$config['newsletter'][$type]['title_main']?></a></li>
                <li class="breadcrumb-item active"><?=($act=="edit")?"Cập nhật":"Thêm mới";?> <?=$config['newsletter'][$type]['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết <?=$config['newsletter'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if(isset($config['newsletter'][$type]['file']) && $config['newsletter'][$type]['file'] == true) { ?>
                    <div class="form-group">
                        <label class="change-file mb-1 mr-2" for="file-taptin">
                            <p>Upload tập tin:</p>
                            <strong class="ml-2">
                                <span class="btn btn-sm bg-gradient-success"><i class="fas fa-file-upload mr-2"></i>Chọn tập tin</span>
                                <div><b class="text-sm text-split"></b></div>
                            </strong>
                        </label>
                        <strong class="d-block mt-2 mb-2 text-sm"><?php echo $config['newsletter'][$type]['file_type'] ?></strong>
                        <div class="custom-file my-custom-file d-none">
                            <input type="file" class="custom-file-input" name="file-taptin" id="file-taptin">
                            <label class="custom-file-label" for="file-taptin">Chọn file</label>
                        </div>
                        <?php if(isset($item['taptin']) && ($item['taptin'] != '')) { ?>
                            <a class="btn btn-sm bg-gradient-primary text-white d-inline-block align-middle p-2 rounded mb-1" href="<?=UPLOAD_FILE.@$item['taptin']?>" title="Download tập tin hiện tại"><i class="fas fa-download mr-2"></i>Download tập tin hiện tại</a>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="form-group-category row">
                    <?php if(isset($config['newsletter'][$type]['ten']) && $config['newsletter'][$type]['ten'] == true) { ?>
                        <div class="form-group col-md-4">
                            <label for="ten">Họ tên:</label>
                            <input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Họ tên" value="<?=@$item['ten']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['dienthoai']) && $config['newsletter'][$type]['dienthoai'] == true) { ?>
                        <div class="form-group col-md-4">
                            <label for="dienthoai">Điện thoại:</label>
                            <input type="text" class="form-control" name="data[dienthoai]" id="dienthoai" placeholder="Điện thoại" value="<?=@$item['dienthoai']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['email']) && $config['newsletter'][$type]['email'] == true) { ?>
                        <div class="form-group col-md-4">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="data[email]" id="email" placeholder="Email" value="<?=@$item['email']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['diachi']) && $config['newsletter'][$type]['diachi'] == true) { ?>
                        <div class="form-group col-md-4">
                            <label for="diachi">Địa chỉ:</label>
                            <input type="text" class="form-control" name="data[diachi]" id="diachi" placeholder="Địa chỉ" value="<?=@$item['diachi']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['chude']) && $config['newsletter'][$type]['chude'] == true) { ?>
                        <div class="form-group col-md-4">
                            <label for="chude">Chủ đề:</label>
                            <input type="text" class="form-control" name="data[chude]" id="chude" placeholder="Chủ đề" value="<?=@$item['chude']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['tinhtrang']) && count($config['newsletter'][$type]['tinhtrang']) > 0) { ?>
                        <div class="form-group col-md-4">
                            <label for="tinhtrang">Tình trạng:</label>
                            <select id="tinhtrang" name="data[tinhtrang]" class="form-control select2">
                                <option value="0">Cập nhật tình trạng</option>
                                <?php foreach($config['newsletter'][$type]['tinhtrang'] as $key => $value) { ?>
                                    <option <?=(isset($item['tinhtrang']) && ($item['tinhtrang'] == $key)) ? "selected" : ""?> value="<?=$key?>"><?=$value?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['sanpham']) && $config['newsletter'][$type]['sanpham'] == true) {
                        $row_detail = $d->rawQueryOne("select tenvi as ten,gia from #_product where id = ? and hienthi > 0 limit 0,1",array($item['id_product'] ));

                        ?>
                        <div class="form-group col-md-4">
                            <label for="sanpham">Sản phẩm:</label>
                            <input type="text" class="form-control"  id="sanpham" placeholder="Sản phẩm" value="<?=$row_detail['ten']?>" readonly>
                            <input type="hidden" name="data[id_product]" value="<?=@$item['id_product']?>">
                        </div>
                    <?php } ?>

                    <?php if(isset($config['newsletter'][$type]['kichthuoc']) && $config['newsletter'][$type]['kichthuoc'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="kichthuoc">Kích thước:</label>
                            <input type="text" class="form-control"  id="kichthuoc" placeholder="Kích thước" value="<?=$func->get_name_cart(@$item['id_size'])?>" readonly>
                            <input type="hidden" name="data[id_size]" value="<?=@$item['id_size']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['chatlieu']) && $config['newsletter'][$type]['chatlieu'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="chatlieu">Chất liệu:</label>
                            <input type="text" class="form-control"  id="chatlieu" value="<?=$func->get_name_cart(@$item['id_chatlieu'])?>" readonly>
                            <input type="hidden" name="data[id_chatlieu]" value="<?=@$item['id_chatlieu']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['somat']) && $config['newsletter'][$type]['somat'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="somat">Số mặt:</label>
                            <input type="text" class="form-control"  id="somat" value="<?=$func->get_name_cart(@$item['id_somat'])?>" readonly>
                            <input type="hidden" name="data[id_somat]" value="<?=@$item['id_somat']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['canmang']) && $config['newsletter'][$type]['canmang'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="canmang">Cán màng:</label>
                            <input type="text" class="form-control"  id="canmang" value="<?=$func->get_name_cart(@$item['id_canmang'])?>" readonly>
                            <input type="hidden" name="data[id_canmang]" value="<?=@$item['id_canmang']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['khoanlo']) && $config['newsletter'][$type]['khoanlo'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="khoanlo">Khoan lỗ:</label>
                            <input type="text" class="form-control"  id="khoanlo" value="<?=$func->get_name_cart(@$item['id_khoanlo'])?>" readonly>
                            <input type="hidden" name="data[id_khoanlo]" value="<?=@$item['id_khoanlo']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['soduongcung']) && $config['newsletter'][$type]['soduongcung'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="soduongcung">Số đường cứng:</label>
                            <input type="text" class="form-control"  id="soduongcung" value="<?=$func->get_name_cart(@$item['id_soduongcung'])?>" readonly>
                            <input type="hidden" name="data[id_soduongcung]" value="<?=@$item['id_soduongcung']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['hinhdang']) && $config['newsletter'][$type]['hinhdang'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="hinhdang">Hình dạng:</label>
                            <input type="text" class="form-control"  id="hinhdang" value="<?=$func->get_name_cart(@$item['id_hinhdang'])?>" readonly>
                            <input type="hidden" name="data[id_hinhdang]" value="<?=@$item['id_hinhdang']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['cachthuc']) && $config['newsletter'][$type]['cachthuc'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="cachthuc">Cách thức:</label>
                            <input type="text" class="form-control"  id="cachthuc" value="<?=$func->get_name_cart(@$item['id_cachthuc'])?>" readonly>
                            <input type="hidden" name="data[id_cachthuc]" value="<?=@$item['id_cachthuc']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['kieube']) && $config['newsletter'][$type]['kieube'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="kieube">Kiểu bế:</label>
                            <input type="text" class="form-control"  id="kieube" value="<?=$func->get_name_cart(@$item['id_kieube'])?>" readonly>
                            <input type="hidden" name="data[id_kieube]" value="<?=@$item['id_kieube']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['newsletter'][$type]['soluong']) && $config['newsletter'][$type]['soluong'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="soluong">Số lượng:</label>
                            <input type="text" class="form-control"  id="soluong" value="<?=$func->get_name_cart(@$item['id_soluong'])?>" readonly>
                            <input type="hidden" name="data[id_soluong]" value="<?=@$item['id_soluong']?>">
                        </div>
                    <?php } ?>

                    <?php if(isset($config['newsletter'][$type]['gia']) && $config['newsletter'][$type]['gia'] == true) {?>
                        <div class="form-group col-md-4">
                            <label for="gia">Giá:</label>
                            <input type="text" class="form-control"  id="gia" value="<?=$func->format_money(@$item['gia'])?>" readonly>
                            <input type="hidden" name="data[gia]" value="<?=@$item['id_gia']?>">
                        </div>
                    <?php } ?>
                </div>
                <?php if(isset($config['newsletter'][$type]['noidung']) && $config['newsletter'][$type]['noidung'] = true) { ?>
                    <div class="form-group">
                        <label for="noidung">Nội dung:</label>
                        <textarea class="form-control" name="data[noidung]" id="noidung" rows="5" placeholder="Nội dung"><?=@$item['noidung']?></textarea>
                    </div>
                <?php } ?>
                <?php if(isset($config['newsletter'][$type]['ghichu']) && $config['newsletter'][$type]['ghichu'] = true) { ?>
                    <div class="form-group">
                        <label for="ghichu">Ghi chú:</label>
                        <textarea class="form-control" name="data[ghichu]" id="ghichu" rows="5" placeholder="Ghi chú"><?=@$item['ghichu']?></textarea>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                    <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>