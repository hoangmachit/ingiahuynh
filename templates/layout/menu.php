    <div id="menu">
    <div class="center menu-top d-flex align-items-center justify-content-between">

        <div class="menu-left">
            <?php if($logo) {?>
				<div class="logo d-flex align-items-center">
					<a class="peShiner" href=""><img onerror="this.src='<?=THUMBS?>/137x93x2/assets/images/noimage.png';" src="<?=THUMBS?>/137x93x2/<?=UPLOAD_PHOTO_L.$logo['photo']?>"/></a>
				</div>
			<?php }?>
        </div>
        <div class="menu-right">
            <div class="menu-right-top">
                <p>
                <img src="assets/img/icon-h.png" alt="Icon header">
                <?=$optsetting['diachi']?>
                </p>
                <div class="menu-right-btn">
                    <a href="tuyen-dung">Tuyển dụng</a>
                    <a href="javascript:void(0)" class="btn-call-price" data-toggle="modal" data-target=".baogia">Báo giá nhanh <img src="assets/img/icon-h2.png" alt="Icon header"></a>
                    <div id="google_language_translator" class="google_language_translator "></div>
                </div>
            </div>
            <div class="menu-right-bottom">
                <ul >
                    <?php if(count($splistmenu)) { ?>
                        <?php foreach ($splistmenu as $key => $value) {
                            $spcatmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_product_cat where id_list = ? and hienthi > 0 order by stt,id desc",array($value['id'])); ?>
                            <li>
                                <a class="transition" title="<?=$value['ten']?>" href="<?=$value[$sluglang]?>"><span><?=$value['ten']?></span></a>
                                <?php if(count($spcatmenu)>0) { ?>
                                    <ul>
                                        <?php foreach ($spcatmenu as $key2 => $value2) {
                                            $spitemmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_product_item where id_cat = ? and hienthi > 0 order by stt,id desc",array($value2['id'])); ?>
                                            <li>
                                                <a class="transition" title="<?=$value2['ten']?>" href="<?=$value2[$sluglang]?>"><span><?=$value2['ten']?></span></a>
                                                <?php if(count($spitemmenu)) { ?>
                                                    <ul>
                                                        <?php foreach ($spitemmenu as $key3 => $value3) {?>
                                                            <li>
                                                                <a class="transition" title="<?=$value3['ten']?>" href="<?=$value3[$sluglang]?>"><span><?=$value3['ten']?></span></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                  
                    <li>
                        <a class="transition <?php if($com=='cua-hang') echo 'active'; ?>" href="cua-hang" title="<?=cuahang?>"><?=cuahang?></a>
                        <?php if(count($chlistmenu)) { ?>
                            <ul>
                                <?php foreach ($chlistmenu as $key => $value) {
                                $chcatmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_product_cat where id_list = ? and hienthi > 0 order by stt,id desc",array($value['id'])); ?>
                                    <li>
                                        <a class="transition" title="<?=$value['ten']?>" href="<?=$value[$sluglang]?>"><span><?=$value['ten']?></span></a>
                                        <?php if(count($chcatmenu)>0) { ?>
                                            <ul>
                                                <?php foreach ($chcatmenu as $key2 => $value2) { ?>
                                                    <li>
                                                        <a class="transition" title="<?=$value2['ten']?>" href="<?=$value2[$sluglang]?>"><span><?=$value2['ten']?></span></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>

                    <li>
                        <a class="transition <?php if($com=='lien-he') echo 'active'; ?>" href="lien-he" title="<?=lienhe?>"><?=lienhe?></a>
                    </li>

                    <li class="btn-search">
                        <a class="search search_open" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        <div class="search_box_hide">
                            <div class="box_input_search" data-role="none">
                                <input type="text" id="keyword" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword');"/>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>