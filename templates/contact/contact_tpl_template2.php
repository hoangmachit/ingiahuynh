<div class="title-main">
    <h1><?= $title_crumb ?></h1>
    <p><?= $slogan['ten'] ?></p>
</div>
<div class="w-clear">
    <div class="top-contact">
        <form class="form-contact validation-contact" novalidate="" method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="input-contact col-sm-6">
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Họ tên" required="">
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                </div>
                <div class="input-contact col-sm-6">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                </div>
            </div>
            <div class="row">
                <div class="input-contact col-sm-6">
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" required="">
                    <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                </div>
                <div class="input-contact col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                    <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                </div>
            </div>
            <div class="input-contact">
                <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Chủ đề" required="">
                <div class="invalid-feedback">Vui lòng nhập chủ đề</div>
            </div>
            <div class="input-contact">
                <textarea class="form-control" id="noidung" name="noidung" placeholder="Nội dung" required=""></textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung</div>
            </div>
            <input type="submit" class="btn btn-primary btn-primary-edit" name="submit-contact" value="Gửi thông tin">
            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
        </form>
    </div>
    <div class="address-contact">
        <div class="item-address-contact">
            <div class="img-address-contact">
                <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
            </div>
            <div class="text-address-contact">
                <span>Địa chỉ</span>
                <p><?= $optsetting['diachi'] ?></p>
            </div>
        </div>
        <div class="item-address-contact">
            <div class="img-address-contact">
                <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
            <div class="text-address-contact">
                <span>Gọi chúng tôi</span>
                <p><?= $optsetting['hotline'] ?></p>
            </div>
        </div>
        <div class="item-address-contact">
            <div class="img-address-contact">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="text-address-contact">
                <span>Email</span>
                <p><?= $optsetting['email'] ?></p>
            </div>
        </div>
    </div>
</div>


<style>
    .top-contact {
        display: flex;
        flex-flow: wrap;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .top-contact .article-contact {
        width: 48%;
    }

    .form-contact {
        width: 100%;
        padding: 35px;
        border-radius: 10px;
        box-shadow: 0 0 6px rgb(0 0 0 / 20%);
        text-align: center;
    }

    .input-contact {
        position: relative;
        margin-bottom: 15px;
    }

    .input-contact input,
    .input-contact textarea {
        width: 100%;
        padding: 0px;
        outline: none;
        font-size: 14px;
    }

    .input-contact input {
        padding: 5px 10px;
        background: #f2f2f2;
        border: 1px solid #f4f4f4;
        height: 45px !important;
    }

    .input-contact textarea {
        resize: none;
        height: 133px !important;
        padding: 5px 10px;
        background: #f2f2f2;
        border: 1px solid #f4f4f4;
    }

    .btn-primary-edit {
        width: 144px;
        background: var(--color-black);
        border: none;
        text-transform: uppercase;
        font-weight: 700;
        height: 45px !important;
        margin: 0 auto;
    }

    .input-contact .custom-file-label::after {
        content: attr(title);
    }

    .bottom-contact {
        position: relative;
        height: 500px;
    }

    .bottom-contact iframe {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100% !important;
        height: 100% !important;
        border-radius: 10px;
        box-shadow: 0 0 6px rgb(0 0 0 / 20%);
    }

    .address-contact {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-flow: wrap;
        width: 100%;
        margin-top: 20px;
    }

    .item-address-contact {
        width: calc(100% / 3);
        padding: 10px 15px;
        display: flex;
        align-items: center;
    }

    .img-address-contact i {
        color: var(--color-black);
        font-size: 30px;
    }

    .text-address-contact {
        margin-left: 10px;
        line-height: 22px;
    }

    .text-address-contact span {
        color: #9b9b9b;
        font-size: 14px;
    }

    .text-address-contact p {
        color: var(--color-black);
        font-size: 15px;
        font-weight: 700;
    }

    @media (max-width:767px) {
        .item-address-contact {
            width: 100%;
        }
    }
</style>