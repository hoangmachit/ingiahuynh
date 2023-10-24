<div class="center-1030">
    <div class="flex-user <?=($config['account']['facebookgoogle'] == false) ? "flex-user1" :""?>">
        <div class="cot1-user">
           <div class="wrap-user">
            <div class="title-user">
                <span>Thông tin đăng ký tài khoản</span>
            </div>
            <form class="form-user validation-user" novalidate method="post" action="account/dang-ky" enctype="multipart/form-data">
                <label for="basic-url">Họ và tên <span>*</span></label>
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="ten" name="ten" required>
                    <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                </div>
                <label for="basic-url">Email <span>*</span></label>
                <div class="input-group input-user">
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                </div>
                <label for="basic-url"><?=dienthoai?> <span>*</span></label>
                <div class="input-group input-user">
                    <input type="number" class="form-control" id="dienthoai" name="dienthoai" required>
                    <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                </div>
                <label for="basic-url">Tên tài khoản <span>*</span></label>
                <div class="input-group input-user">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nickname..." required>
                    <div class="invalid-feedback"><?=vuilongnhaptaikhoan?></div>
                </div>
                <label for="basic-url"><?=matkhau?> <span>*</span></label>
                <div class="input-group input-user">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-feedback"><?=vuilongnhapmatkhau?></div>
                </div>
                <div class="button-user">
                    <input type="submit" class="btn btn-primary btn-account" name="dangky" value="<?=dangky?>" disabled>
                </div>
                <p>Bạn đã có tài khoản? <a href="account/dang-nhap">Đăng nhập</a></p>
            </form>
        </div>
    </div>
    <?php if($config['account']['facebookgoogle'] == true){ ?>
        <div class="cot2-user">
            <div class="title-cot2-user">
                <h3>Hoặc đăng nhập bằng</h3>
            </div>
            <div class="fb-gg-user">
                <a href="<?=$authUrl?>"><svg class="form-icon" height="48" viewBox="0 0 479.87 479.86" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M425.65,86.35A239.9,239.9,0,1,0,495.93,256,239,239,0,0,0,425.65,86.35ZM405.16,405.28A211,211,0,1,1,467,256,210.22,210.22,0,0,1,405.16,405.28Z" fill="#262626" transform="translate(-16.07 -16.07)"></path><path d="M220,166v36H184v54h36V400h54l.34-144.56L310,256l18-54H274V184c0-12.72-.27-18,18-18h36V112H274C227.11,112,220,126.22,220,166Z" fill="#1d1d1b" transform="translate(-16.07 -16.07)"></path></svg></a>
                <a href="<?=$loginUrl?>"><svg class="form-icon" height="48" viewBox="0 0 479.87 479.86" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M425.65,86.35A239.9,239.9,0,1,0,495.93,256,239,239,0,0,0,425.65,86.35ZM405.16,405.28A211,211,0,1,1,467,256,210.22,210.22,0,0,1,405.16,405.28Z" fill="#262626" transform="translate(-16.07 -16.07)"></path><path d="M374.52,228.52c-29,.44-57.93.44-86.89.44-8.27,0-16.76-.44-24.84,0-1.73,0-4.34.75-4.34,1.84-.22,16.77-.22,35-.22,49.75H329c-.65,0-1.3,7.3-2.39,9.71-10.68,32.23-44,48.74-79.94,42.86-44.43-7.41-71.86-48.05-63.81-92.48.88-6.32,3-12.26,5.23-17.93,14.8-32.23,51.17-51.76,87.12-43.7a71.91,71.91,0,0,1,33.31,17.24c13.07-13.07,25.49-25.46,39-39a19.08,19.08,0,0,1-3.25-2.82q-47.06-39.54-107.6-29.4c-58.16,9.36-100,55.1-108.88,108.45a131,131,0,0,0,6.54,70.36,134,134,0,0,0,140,84.28c29.84-3.26,56.42-13.94,76.89-35.93C381.92,319.56,390,280.36,385,237,384.1,229.83,381.28,228.52,374.52,228.52Z" fill="#262626" transform="translate(-16.07 -16.07)"></path></svg></a>
            </div>
            <div class="dacquyen-user">
                <p class="title-dacquyen-user">Các đặc quyền khi đăng ký tài khoản</p>
                <div class="content-user">
                    <?=htmlspecialchars_decode($dacquyendangky['noidung'])?>
                </div>
            </div>
            <div class="dichvu-user">
                <p class="title-dacquyen-user">Dịch vụ khách hàng</p>
                <p class="support-user">Bạn cần giúp đỡ? Xin hãy gọi điện đến Hotline: <a href="tel:<?=preg_replace('/[^0-9]/','',$optsetting['hotline'])?>"><?=$optsetting['hotline']?></a></p>
            </div>
        </div>
    <?php } ?>
</div>
</div>