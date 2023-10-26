<?php
$linkUploadExcel = "index.php?com=import&act=uploadExcel&type=" . $type;
$linkUploadExcelOptions = "index.php?com=import&act=uploadExcelOptions&type=" . $type;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Import Excel</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form method="post" action="<?=$linkUploadExcel?>" enctype="multipart/form-data">
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h3 class="card-title">Import danh sách dữ liệu</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="d-inline-block align-middle mb-1 mr-2">Upload tập tin:</label>
                    <strong class="d-block mt-2 mb-2 text-sm">Loại : .xls|.xlsx (Ms.Excel 2003 - 2007)</strong>
                    <div class="custom-file my-custom-file">
                        <input type="file" class="custom-file-input" name="file-excel" id="file-excel">
                        <label class="custom-file-label" for="file-excel">Chọn file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-success" name="importExcel"><i class="fas fa-upload mr-2"></i>Import với thông tin cơ bản</button>
        </div>
    </form>
	<form method="post" action="<?=$linkUploadExcelOptions?>" enctype="multipart/form-data">
        <div class="card card-primary card-outline text-sm mb-0">
            <div class="card-header">
                <h3 class="card-title">Import danh sách dữ liệu</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="d-inline-block align-middle mb-1 mr-2">Upload tập tin:</label>
                    <strong class="d-block mt-2 mb-2 text-sm">Loại : .xls|.xlsx (Ms.Excel 2003 - 2007)</strong>
                    <div class="custom-file my-custom-file">
                        <input type="file" class="custom-file-input" name="file-excel" id="file-excel">
                        <label class="custom-file-label" for="file-excel">Chọn file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-danger" name="importExcel"><i class="fas fa-upload mr-2"></i>Import với options</button>
        </div>
    </form>
</section>

<?php if (isset($config['import']['images']) && $config['import']['images'] == true) {?>
	<!-- Import js -->
	<script type="text/javascript">
		$('.copy-excel').click(function(){
			var text = $(this).data("text");
			var dummy = document.createElement("input");

		    document.body.appendChild(dummy);
		    dummy.value = text;
		    dummy.select();
		    document.execCommand("copy");
		    document.body.removeChild(dummy);

		    if(!$(this).hasClass("active"))
		    {
		    	$(this).addClass("active");
		    	$(this).html("Copied");
		    }
		});
	</script>
<?php }?>