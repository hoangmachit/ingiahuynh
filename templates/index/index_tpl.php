
<?php if(count($anphamnb)) { ?>
	<div id="product-hot">
		<div class="center hidden-element wow animate__animated animate__fadeIn">
			<div id="image-gif" class="image-gif-1">
				<img onerror="this.src='<?= THUMBS ?>/87x61x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $gif1['photo'] ?>" alt="<?= $setting['ten'.$lang] ?>" title="<?= $setting['ten'.$lang] ?>" />
			</div>
			<div class="title">
				<div class="title-left">
					<h2>Danh mục sản phẩm</h2>
				</div>
				<?php if(count($danhmuc2sanphamnb) >16) {?>
					<div class="title-right">
						<div class="slick-product-hot-prev3">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#e5e5e5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<line x1="0" y1="5.5" x2="24" y2="5.5"></line>
								<line x1="7" y1="0" x2="0.2" y2="5.5"></line>
								<line x1="7" y1="11" x2="0.2" y2="5.5"></line>
							</svg>
						</div>
						<div class="slick-product-hot-next3">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#086285" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="0" y1="5.5" x2="24" y2="5.5"></line><line x1="17" y1="0" x2="24" y2="5.5"></line><line x1="17" y1="11" x2="24" y2="5.5"></line></svg>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="slick-product3 ">
				<?php foreach ($danhmuc2sanphamnb as $key =>$value) { ?>
					<div class="product3-slick-items">
						<div>
							<a href="<?=$value[$sluglang]?>">
								<img onerror="this.src='<?= THUMBS ?>/90x101x2/assets/images/noimage.png';" src="<?= THUMBS ?>/90x101x2/<?= UPLOAD_PRODUCT_L . $value['photo'] ?>" alt="<?= $value['ten'] ?>" title="<?= $value['ten'] ?>" />
								<span><?=$value['ten']?></span>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php if(count($quangcao)) { ?>
	<div id="advertisement">
		<div class="center2  hidden-element wow animate__animated animate__fadeIn">
			<div class="owl-page owl-carousel owl-theme" data-xsm-items="1:0" data-sm-items="1:0" data-md-items="1:0" data-lg-items="1:0" data-xlg-items="1:0" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="1" data-animations="" data-nav="0" data-navtext="" data-navcontainer="">
				<?php foreach ($quangcao as $v) { ?>
					<div class="advertisement-item" >
						<a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten'] ?>"><img onerror="this.src='<?= THUMBS ?>/1366x252x2/assets/images/noimage.png';" src="<?= THUMBS ?>/1366x252x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>" title="<?= $v['ten'] ?>" /></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php if(count($anphamnb)) { ?>
	<div id="product-hot">
		<div class="center">
			<div class="title">
				<div class="title-left">
					<h2>Ấn phẩm phổ biến</h2>
				</div>
				<?php if(count($anphamnb) > 8) {?>
					<div class="title-right">
						<div class="slick-product-hot-prev">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#e5e5e5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<line x1="0" y1="5.5" x2="24" y2="5.5"></line>
								<line x1="7" y1="0" x2="0.2" y2="5.5"></line>
								<line x1="7" y1="11" x2="0.2" y2="5.5"></line>
							</svg>
						</div>
						<div class="slick-product-hot-next">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#086285" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="0" y1="5.5" x2="24" y2="5.5"></line><line x1="17" y1="0" x2="24" y2="5.5"></line><line x1="17" y1="11" x2="24" y2="5.5"></line></svg>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="slick-product product-slick-margin hidden-element wow animate__animated animate__fadeIn">
				<?php foreach ($anphamnb as $key =>$value) { ?>
					<div class="product-slick-items">
						<?=$func->getTemplateProduct($value)?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php if(count($buoc)) { ?>
	<div id="step">
		<div class="center2">
			<div class="slick-step hidden-element wow animate__animated animate__fadeIn">
				<?php $maxbuoc = count($buoc); foreach ($buoc as $key => $value) { ?>
					<div class="step-items <?= ( $maxbuoc > 3) ? "step-items-db" :""?>">
						<div class="step-item">
							<p class="step-number">Bước <?=$key + 1?></p>
							<p class="step-name"><?=$value['ten']?></p>
							<div class="step-image">
							<img onerror="this.src='<?=THUMBS?>/154x154x2/assets/images/noimage.png';" src="<?=THUMBS?>/154x154x1/<?=UPLOAD_NEWS_L.$value['photo']?>"/>
							</div>
							<p class="step-info"><?=$value['mota']?></p>
							<p class="step-slick-next">Kế tiếp <img src="assets/img/icon-next.png" alt="Icon next"></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if(count($cuahangnb)) { ?>
	<div id="store-hot">
		<div class="center">
			<div class="title">
				<div class="title-left">
					<h2>Cửa hàng</h2>
				</div>
				<?php if(count($cuahangnb) > 8) {?>
					<div class="title-right">
						<div class="slick-product-hot-prev2">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#e5e5e5" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<line x1="0" y1="5.5" x2="24" y2="5.5"></line>
							<line x1="7" y1="0" x2="0.2" y2="5.5"></line>
							<line x1="7" y1="11" x2="0.2" y2="5.5"></line>
						</svg>
						</div>
						<div class="slick-product-hot-next2">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24" height="11" viewBox="0 0 25 11" stroke-width="1.5" stroke="#086285" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="0" y1="5.5" x2="24" y2="5.5"></line><line x1="17" y1="0" x2="24" y2="5.5"></line><line x1="17" y1="11" x2="24" y2="5.5"></line></svg>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="slick-product2 product-slick-margin hidden-element wow animate__animated animate__fadeIn">
				<?php foreach ($cuahangnb as $key =>$value) { ?>
					<div class="product-slick-items">
						<?=$func->getTemplateProduct($value)?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php if (count($visao2)) { ?>
	<div class="why">
		<div class="center2">
		<div class="owl-page owl-carousel owl-theme" data-xsm-items="1:0" data-sm-items="1:0" data-md-items="1:0" data-lg-items="1:0" data-xlg-items="1:0" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0" data-animations="" data-nav="0" data-navtext="" data-navcontainer="">
			<?php foreach ($visao2 as $v) { ?>
				<div class="visao2-item" >
					<a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten'] ?>"><img onerror="this.src='<?= THUMBS ?>/1366x600x2/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten'] ?>" title="<?= $v['ten'] ?>" /></a>
				</div>
			<?php } ?>
		</div>
		</div>
	</div>
<?php } ?>
<?php if(count($doitac)) { ?>
	<div id="partner">
		<div class="center">
			<div class="title">
				<div class="title-left">
				<h2>Đối tác & khách hàng</h2>
				<p>Cảm ơn vì đã luôn tin tưởng chúng tôi</p>
				</div>
			</div>
			<div class="owl-page owl-carousel owl-theme" data-xsm-items="2:10" data-sm-items="4:10" data-md-items="7:10" data-lg-items="9:10" data-xlg-items="12:25" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0" data-animations="" data-nav="0" data-navtext="" data-navcontainer="">
			<?php foreach ($doitac as $value) { ?>
				<div class="class-item" >
					<a href="<?=$value['link']?>">
					<img onerror="this.src='<?=THUMBS?>/175x95x2/assets/images/noimage.png';" src="<?=THUMBS?>/150x120x1/<?=UPLOAD_PHOTO_L.$value['photo']?>" alt="<?=$value['ten']?>"/>
					</a>	</div>
			<?php } ?>
		</div>
		</div>
	</div>
<?php } ?>