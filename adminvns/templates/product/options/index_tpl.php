<style>
    .modal-full{
        max-width: 80% !important;
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
                Product detail
        </div>
    </div>
</section>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
<script crossorigin
    src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
<script>
    const API = '<?=$linkView?>/adminvns/ajax';
    const PRODUCT_ID = '<?=$id?>';
</script>
<script type="text/babel" src="assets/js/product.js"></script>
