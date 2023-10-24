<div class="w-clear">
    <div class="row">
        <div class="col-md-6 col-12 ">
            <h2 class="contact-title"><?= guithacmacchochungtoi ?></h2>
            <form class="form-contact validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-contact col-sm-6">
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>*" required />
                        <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                    </div>
                    <div class="input-contact col-sm-6">
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?> *" required />
                        <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-contact col-sm-6">
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
                        <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                    </div>
                    <div class="input-contact col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail*" required />
                        <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-contact col-sm-12">
                        <textarea class="form-control" id="noidung" name="noidung" placeholder="Nội dung cần tư vấn..." required /></textarea>
                        <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                    </div>
                </div>
                <input type="submit" class="btn btn-contact" name="submit-contact" value="Gửi thông tin" disabled />
                <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
            </form>
        </div>
        <div class="col-md-6 col-12 mb-4">
            <h2 class="contact-title"><?= thongtinve ?> <?= $setting['ten' . $lang] ?></h2>
            <div class="contact-info">
                <?= htmlspecialchars_decode($lienhe['noidung']) ?>
            </div>
        </div>

    </div>
</div>

<style>
.contact-map{position: relative;border: 10px solid #fff;box-shadow: 0px 0px 8px rgb(0 0 0 / 10%);}
.contact-map iframe{max-height:313px;width: 100%;}
.contact-title{font-size:20px; font-weight:700; text-transform:uppercase;margin-bottom:25px;}
.form-contact .input-contact{padding:10px 5px;}
.form-contact .row{margin:-10px -5px;}
.input-contact input,.input-contact textarea{background-color:#fafafa;}
.input-contact input{background-repeat:no-repeat; background-position:95% 50%;background-image:url("./assets/img/icon-c1.png");}
.form-contact .row:nth-child(1) .input-contact:nth-child(2) input{background-image:url("./assets/img/icon-c2.png");}
.form-contact .row:nth-child(2) .input-contact:nth-child(1) input{background-image:url("./assets/img/icon-c3.png");}
.form-contact .row:nth-child(2) .input-contact:nth-child(2) input{background-image:url("./assets/img/icon-c4.png");}
.input-contact textarea{min-height:133px;}
.btn-contact{background-color:var(--color-main); border: 1px solid var(--color-main);color:#fff; text-transform:uppercase; padding:9px 16px;margin-top:14px;}
.btn-contact:hover{color:var(--color-main);background-color:#fff}
.input-contact textarea::-webkit-input-placeholder ,.input-contact input::-webkit-input-placeholder { color: #929292;font-size:14.02px; }
.input-contact textarea:-moz-placeholder,.input-contact input:-moz-placeholder { color: #929292;font-size:14.02px; }
.input-contact textarea::-moz-placeholder,.input-contact input::-moz-placeholder { color: #929292;font-size:14.02px; }
.input-contact textarea:-ms-input-placeholder,.input-contact input:-ms-input-placeholder { color: #929292;font-size:14.02px; }

</style>