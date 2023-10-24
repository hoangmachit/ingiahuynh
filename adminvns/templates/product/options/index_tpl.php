<link href="https://cdn.jsdelivr.net/npm/react-toastify@9.1.3/dist/ReactToastify.min.css" rel="stylesheet">
<style>
  .modal-full {
    max-width: 80% !important;
  }

  .sidebar-overload {
    position: fixed;
    top: 0px;
    width: 60%;
    height: 100vh;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.5);
    transition: all 0.5s;
    left: -100%;
  }

  .sidebar-option.show .sidebar-overload {
    left: 0% !important;
  }

  .sidebar-option {
    position: fixed;
    right: -100%;
    top: 0px;
    width: 40%;
    height: 100vh;
    overflow-y: scroll;
    overflow-x: hidden;
    z-index: 99999;
    background: #fff;
    transition: all 0.5s;
  }

  .sidebar-option.show {
    right: 0% !important;
  }

  .sidebar-header {
    padding: 15px;
    border-bottom: 1px solid #7b7b7b;
  }

  .sidebar-body {
    padding: 15px;
  }

  .sidebar-close {
    cursor: pointer;
  }

  .item__k {
    padding: 10px 0x;
    border-bottom: 1px solid #7b7b7b;
    margin-bottom: 10px;
  }

  .item__k:last-child {
    border-bottom: none;
  }
</style>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
        <li class="breadcrumb-item active">Quản lý options</li>
      </ol>
    </div>
  </div>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div id="root"></div>
    </div>
    <div class="col-md-4">
      <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
          <h3 class="card-title m-0">Thông tin sản phẩm</h3>
        </div>
        <div class="card-body pb-3 pt-3">
          <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" readonly class="form-control" value="<?= @$item['tenvi'] ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="text" readonly class="form-control" value="<?= @$item['tenkhongdauvi'] ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
<script>
  const API = '<?= $config_base ?>adminvns/ajax';
  const PRODUCT_ID = '<?= $id ?>';
</script>
<script type="text/babel" src="assets/js/product.js"></script>