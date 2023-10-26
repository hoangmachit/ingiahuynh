<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
  .mainLoading{
    position: absolute;
    top:0;
    left:0;
    width: 100%;
    height:100%;
    z-index: 999;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
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
  .toastify.success{
    background: #a3cfbb;
    color: #000;
  }
  .toastify.error{
    background: #f8d7da;
    color: #000;
  }
  .lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #fff;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
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
            <input type="text" readonly class="form-control" value="<?=@$item['tenvi']?>">
          </div>
          <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="text" readonly class="form-control" value="<?=@$item['tenkhongdauvi']?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
<script>
  const API = '<?=$config_base?>adminvns/ajax';
  const PRODUCT_ID = '<?=$id?>';
</script>
<script type="text/babel" src="assets/js/product.js"></script>