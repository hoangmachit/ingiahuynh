<form class="form-user validation-user" novalidate method="post" action="account/thong-tin" enctype="multipart/form-data">
    <div class="flex-user-information">
        <div class="cot1-user-information">
            <?php include TEMPLATE.ACCOUNT."left_user.php"; ?>
        </div>
        <div class="cot2-user-information">
            <div class="wrap-user">
                <div class="title-user">
                    <span>Thông tin tài khoản</span>
                </div>
                <div class="box-user">
                    <div class="mw-user">
                        <div class="flex-input-group">
                            <label for="basic-url">Họ tên <span>*</span></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=nhaphoten?>" value="<?=$row_detail['ten']?>" required>
                                <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"><?=taikhoan?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="username" name="username" placeholder="<?=nhaptaikhoan?>" value="<?=$row_detail['username']?>" readonly required>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url">Email <span>*</span></label>
                            <div class="input-group input-user">
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?=nhapemail?>" value="<?=$row_detail['email']?>" required>
                                <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url">Số điện thoại <span>*</span></label>
                            <div class="input-group input-user">
                                <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=nhapdienthoai?>" value="<?=$row_detail['dienthoai']?>" required>
                                <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"><?=diachi?></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=nhapdiachi?>" value="<?=$row_detail['diachi']?>">
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"><?=ngaysinh?> <span>*</span></label>
                            <div class="input-group input-user">
                                <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" placeholder="<?=nhapngaysinh?>" value="<?=date("d/m/Y",$row_detail['ngaysinh'])?>" required>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"><?=gioitinh?></label>
                            <div class="input-group input-user">
                                <div class="radio-user custom-control custom-radio">
                                    <input type="radio" id="nam" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==1)?'checked':''?> value="1" >
                                    <label class="custom-control-label" for="nam"><?=nam?></label>
                                </div>
                                <div class="radio-user custom-control custom-radio">
                                    <input type="radio" id="nu" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==2)?'checked':''?> value="2" >
                                    <label class="custom-control-label" for="nu"><?=nu?></label>
                                </div>
                                <div class="radio-user custom-control custom-radio">
                                    <input type="radio" id="unisex" name="gioitinh" class="custom-control-input" <?=($row_detail['gioitinh']==3)?'checked':''?> value="3" >
                                    <label class="custom-control-label" for="unisex">Khác</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"></label>
                            <div class="input-group input-user input-user-doimatkhau">
                                <input type="checkbox" id="doimatkhau">
                                <label for="doimatkhau">Thay đổi mật khẩu</label>
                            </div>
                        </div>
                        <div class="open-input-group">
                            <div class="flex-input-group">
                                <label for="basic-url"><?=matkhaucu?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="<?=nhapmatkhaucu?>">
                                </div>
                            </div>
                            <div class="flex-input-group">
                                <label for="basic-url"><?=matkhaumoi?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="new-password" name="new-password" placeholder="<?=nhapmatkhaumoi?>">
                                </div>
                            </div>
                            <div class="flex-input-group">
                                <label for="basic-url"><?=nhaplaimatkhaumoi?></label>
                                <div class="input-group input-user">
                                    <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="<?=nhaplaimatkhaumoi?>">
                                </div>
                            </div>
                        </div>
                        <div class="flex-input-group">
                            <label for="basic-url"></label>
                            <div class="button-user">
                                <input type="submit" class="btn btn-custom btn-block" name="capnhatthongtin" value="<?=capnhat?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function onFileSelected(event,root) {
        var time = Date.now();
        var selectedFile = event.target.files[0];
        $(".avatar-user-information span").html('<img style="display:block;margin:auto;max-height:100%" id="img_'+time+'">');
        if (root.files && root.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_'+time+'').attr('src', e.target.result);
            }
            reader.readAsDataURL(root.files[0]);
        }
    }
</script>