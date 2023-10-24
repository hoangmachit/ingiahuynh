<div id="header">
	<div class="center d-flex align-items-center justify-content-between">
		<div class="header-left">
			<span><?=$slogan['ten']?></span>
			<span><i class="fas fa-phone-square-alt"></i>Hotline: <?=$optsetting['hotline']?></span>
		</div>
		<div class="header-right">
			<?php if(count($mxh1)>0){ ?>
				<ul class="mxh header-mxh">
					<?php foreach ($mxh1 as $key => $value) {?>
						<li>
							<a href="<?=$value['link']?>" target="_blank">
								<img onerror="this.src='<?=THUMBS?>/25x25x2/assets/images/noimage.png';" src="<?=THUMBS?>/25x25x1/<?=UPLOAD_PHOTO_L.$value['photo']?>" alt="<?=$value['ten']?>">
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>