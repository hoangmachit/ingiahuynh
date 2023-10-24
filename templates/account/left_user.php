<div class="avatar-user-information">
    <div class="img-avatar">
        <?php if(!empty($row_detail['avatar'])) {?>
            <span><img onerror="this.src='<?=THUMBS?>/40x40x1/assets/images/noimage.png';" src="<?=THUMBS?>/40x40x1/<?=UPLOAD_USER_L.$row_detail['avatar']?>" alt="Hình ảnh <?=$row_detail['ten']?>"/></span>
        <?php }else {?>
            <span class="img-box"><?=$row_detail['ten'][0]?></span>
        <?php }?> </div>
    <div class="text-avatar">
        <span><?=$_SESSION[$login_member]['ten']?></span>
    </div>
</div>
<div class="list-item-information">
    <ul>
        <li class="<?php if($action=='thong-tin') echo 'active'?>"><a href="account/thong-tin"><img src="assets/images/icon-account.png" alt="Thông tin tài khoản" width="24" height="24"> Thông tin tài khoản</a></li>
        <li class="<?php if($action=='lich-su-mua-hang') echo 'active'?>"><a href="account/lich-su-mua-hang"><img src="assets/images/icon-order.png" alt="Thông tin đơn hàng" width="24" height="24"> Thông tin đơn hàng</a></li>
        <li class=""><a href=""><img src="assets/images/icon-home.png" alt="Quay về trang chủ" width="24" height="24"> Quay về trang chủ</a></li>
        <li class=""><a href="account/dang-xuat"><img src="assets/images/icon-back.png" alt="Đăng xuất" width="24" height="24"> Đăng xuất</a></li>
    </ul>
</div>