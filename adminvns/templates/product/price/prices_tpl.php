<?php
$linkView = $config_base;
$linkMan = $linkFilter = "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage;
$linkAdd = "index.php?com=product&act=add_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage;
$linkEdit = "index.php?com=product&act=edit_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage;
$linkDelete = "index.php?com=product&act=delete_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage;

?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý giá sản phẩm <?=$config['product'][$type]['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
    </div>

    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách giá sản phẩm <?=$config['product'][$type]['title_main']?></h3>
        </div>
        <?php if($idc){
            $product_detail = $d->rawQueryOne("select id_mau,id_size,gia,giamoi from #_product where id = ? limit 0,1",array($idc));
        } ?>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle text-center" width="10%">STT</th>

                        <th class="align-middle">Tiêu đề</th>
                        <th class="align-middle">Giá bán</th>
                        <?php if($product_detail['giamoi']) {?>
                            <th class="align-middle">Giá mới</th>
                        <?php }?>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) {
                            ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
                                        <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?=$items[$i]['stt']?>" data-id="<?=$items[$i]['id']?>" data-table="product_price">
                                </td>

                                <td class="align-middle">
                                    <?php $sizeDetail = $func->get_size_cart($items[$i]["id_$type2"]); ?>
                                    <?=$sizeDetail['tenvi']?>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$func->format_money($items[$i]['gia'])?></a>
                                </td>
                                <?php if($product_detail['giamoi']) {?>
                                    <td class="align-middle">
                                        <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$func->format_money($items[$i]['giamoi'])?></a>
                                    </td>
                                <?php }?>
                                <td class="align-middle text-center">
                                 <div class="custom-control custom-checkbox my-checkbox">
                                    <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$items[$i]['id']?>" data-table="product_price" data-id="<?=$items[$i]['id']?>" data-loai="hienthi" <?=($items[$i]['hienthi'])?'checked':''?>>
                                    <label for="show-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                </div>
                            </td>
                            <td class="align-middle text-center text-md text-nowrap">
                                <a class="text-primary mr-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php if($paging) { ?>
    <div class="card-footer text-sm pb-0">
        <?=$paging?>
    </div>
<?php } ?>
<div class="card-footer text-sm">
 <a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
 <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
</div>
</section>