<?php if(isset($popup) && $popup['hienthi'] == 1) { ?>
	<!-- Modal popup -->
	<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<a href="<?=$popup['link']?>"><img src="<?=THUMBS?>/800x530x1/<?=UPLOAD_PHOTO_L.$popup['photo']?>" alt="Popup"></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<!-- Modal notify -->
<div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="popup-notify-label"><?=thongbao?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?=thoat?></button>
			</div>
		</div>
	</div>
</div>

<?php if(isset($config['cart'])){ ?>
<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="popup-cart-label"><?=giohangcuaban?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>
<?php } ?>
<!-- Modal cart loading -->
<div class="modal modal-custom fade" id="cart-notify" tabindex="-1" role="dialog" aria-labelledby="cart-notify-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="popup-notify-label2"><?=thongbao?></h6>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> -->
			</div>
			<div class="modal-body modal-body-cart">
				<img src="assets/images/giphy.gif" alt="Loading">
				<h6 class="modal-title" id="popup-cart-label">Thông tin đơn hàng đang được gửi đi. Quý khách vui lòng chờ trong giây lát. Xin cảm ơn!</h6>
			</div>
			<!-- <div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?=thoat?></button>
			</div> -->
		</div>
	</div>
</div>

<div class="modal fade baogia" tabindex="-1" role="dialog" aria-labelledby="baogiaLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="baogiaLabel">Báo giá</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-6 col-12 my-2">
						<img onerror="this.src='<?= THUMBS ?>/620x350x2/assets/images/noimage.png';" src="<?= THUMBS ?>/620x350x1/<?= UPLOAD_PHOTO_L . $bannerbaogia['photo'] ?>" alt="<?= $setting['ten'.$lang] ?>" title="<?= $setting['ten'.$lang] ?>" />
					</div>
					<div class="col-md-6 col-12 my-2">
					<form class="form-contact validation-contact" novalidate method="post" action="lien-he" enctype="multipart/form-data">
					<div class="row my-2">
						<div class="input-contact col-sm-6 col-12 mb-2 ">
							<input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>*" required />
							<div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
						</div>
						<div class="input-contact col-sm-6 col-12 mb-2 ">
							<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
							<div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
						</div>
					</div>
					<div class="row my-2">
						<div class="input-contact col-sm-6 col-12 mb-2 ">
							<input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
							<div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
						</div>
						<div class="input-contact col-sm-6 col-12 mb-2 ">
							<input type="email" class="form-control" id="email" name="email" placeholder="E-mail*" required />
							<div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
						</div>
					</div>
					<div class="row my-2">
						<div class="input-contact col-sm-12">
							<textarea class="form-control" id="noidung" name="noidung" placeholder="Nội dung cần tư vấn..." required /></textarea>
							<div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
						</div>
					</div>
					<input type="submit" class=" btn-contact-modal" name="submit-contact" value="Gửi thông tin" disabled />
					<input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
				</form>
					</div>

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade newsletter" tabindex="-1" role="dialog" aria-labelledby="newsletterLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="newsletterLabel">Đặt in</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<?php /*
<!-- Modal prototype -->
<button type="button" class="btn btn-primary open-modal-cart" data-toggle="modal" data-target=".exampleModal">
	Open Modal
</button>
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Modal title</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
*/ ?>