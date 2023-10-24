<div class="center-1030">
    <div class="flex-user align-items-center flex-user-login">
        <div class="cot1-user">
            <div class="wrap-user">
                <div class="title-user">
                    <span>Đăng nhập </span>
                </div>

                 <?php if($config['account']['facebookgoogle'] == true){ ?>
                    <div class="fb-gg-user">
                        <a href="<?=$authUrl?>"><svg class="form-icon" height="48" viewBox="0 0 479.87 479.86" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M425.65,86.35A239.9,239.9,0,1,0,495.93,256,239,239,0,0,0,425.65,86.35ZM405.16,405.28A211,211,0,1,1,467,256,210.22,210.22,0,0,1,405.16,405.28Z" fill="#262626" transform="translate(-16.07 -16.07)"></path><path d="M220,166v36H184v54h36V400h54l.34-144.56L310,256l18-54H274V184c0-12.72-.27-18,18-18h36V112H274C227.11,112,220,126.22,220,166Z" fill="#1d1d1b" transform="translate(-16.07 -16.07)"></path></svg></a>
                        <a href="<?=$loginUrl?>"><svg class="form-icon" height="48" viewBox="0 0 479.87 479.86" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M425.65,86.35A239.9,239.9,0,1,0,495.93,256,239,239,0,0,0,425.65,86.35ZM405.16,405.28A211,211,0,1,1,467,256,210.22,210.22,0,0,1,405.16,405.28Z" fill="#262626" transform="translate(-16.07 -16.07)"></path><path d="M374.52,228.52c-29,.44-57.93.44-86.89.44-8.27,0-16.76-.44-24.84,0-1.73,0-4.34.75-4.34,1.84-.22,16.77-.22,35-.22,49.75H329c-.65,0-1.3,7.3-2.39,9.71-10.68,32.23-44,48.74-79.94,42.86-44.43-7.41-71.86-48.05-63.81-92.48.88-6.32,3-12.26,5.23-17.93,14.8-32.23,51.17-51.76,87.12-43.7a71.91,71.91,0,0,1,33.31,17.24c13.07-13.07,25.49-25.46,39-39a19.08,19.08,0,0,1-3.25-2.82q-47.06-39.54-107.6-29.4c-58.16,9.36-100,55.1-108.88,108.45a131,131,0,0,0,6.54,70.36,134,134,0,0,0,140,84.28c29.84-3.26,56.42-13.94,76.89-35.93C381.92,319.56,390,280.36,385,237,384.1,229.83,381.28,228.52,374.52,228.52Z" fill="#262626" transform="translate(-16.07 -16.07)"></path></svg></a>
                    </div>
                <p class="text-user">hoặc đăng nhập bằng email</p>
                <?php } ?>
                <form class="form-user validation-user" novalidate method="post" action="account/dang-nhap" enctype="multipart/form-data">
                    <label for="basic-url">Tài khoản <span>*</span></label>
                    <div class="input-group input-user">
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback"><?=vuilongnhaptaikhoan?></div>
                    </div>
                    <label for="basic-url">Mật khẩu <span>*</span></label>
                    <div class="input-group input-user">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback"><?=vuilongnhapmatkhau?></div>
                    </div>
                    <div class="button-user-edit d-flex align-items-center justify-content-between">
                        <div class="checkbox-user custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember-user" id="remember-user" value="1">
                            <label class="custom-control-label" for="remember-user"><?=nhomatkhau?></label>
                        </div>
                        <a href="account/quen-mat-khau" title="<?=quenmatkhau?>"><?=quenmatkhau?>?</a>
                    </div>
                    <div class="button-user">
                        <input type="submit" class="btn btn-primary btn-account" name="dangnhap" value="<?=dangnhap?>" disabled>
                    </div>
                </form>
            </div>
        </div>
        <div class="cot2-user">
            <div class="title-user">
                <span>Khách hàng đăng ký mới</span>
            </div>
            <div class="content-user">
                <?=htmlspecialchars_decode($khachhangdangkymoi['noidung'])?>
            </div>
            <a href="account/dang-ky" class="dangky-user">Đăng ký ngay</a>
        </div>
    </div>
</div>