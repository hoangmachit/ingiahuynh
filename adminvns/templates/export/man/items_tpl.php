<?php
$linkExportExcel = "index.php?com=export&act=exportExcel&type=" . $type;
$linkExportExcelOptions = "index.php?com=export&act=exportExcelOptions&type=" . $type;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Export Excel</li>
            </ol>
        </div>
    </div>
</section>
<?php
$arrayselect = array(
    "size" => "Kích thước",
    "chatlieu" => "Chất liệu giấy",
    "somat" => "Số mặt in",
    "canmang" => "Loại cán màng",
    "khoanlo" => "Đóng số nhảy",
    "soduongcung" => "Qui cách",
    "soluong" => "Số lượng",
    "hinhdang" => "Thời gian",
    "cachthuc" => "Số lượng trang ruột",
    "kieube" => "Số đường cấn",
);

?>
<!-- Main content -->
<section class="content">
    <form method="post" class="mb-3" action="<?= $linkExportExcel ?>" enctype="multipart/form-data">
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h3 class="card-title">Export danh sách dữ liệu</h3>
            </div>
            <div class="card-body">
                <div class="alert my-alert alert-info mb-0" role="alert">Xuất danh sách sản phẩm thành tập tin excel</div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-success" name="exportExcel"><i class="fas fa-file-export mr-2"></i>Export thông tin cơ bản</button>
        </div>
    </form>
    <form method="post" action="<?= $linkExportExcelOptions ?>" enctype="multipart/form-data">
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h3 class="card-title">Export danh sách dữ liệu có options</h3>
            </div>
            <div class="card-body">
                <div class="alert my-alert alert-info mb-0" role="alert">Xuất danh sách sản phẩm thành tập tin excel</div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-danger" name="exportExcel"><i class="fas fa-file-export mr-2"></i>Export với các options</button>
        </div>
    </form>
</section>