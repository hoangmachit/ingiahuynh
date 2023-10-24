<div id="menu-mobile">
    <div class="menu-bar-res">
        <a id="hamburger" href="#mmenu" title="Menu"><span></span></a>
    </div>
    <div class="search_mobi">
        <input type="text" id="keyword2" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword2');" value="">
        <i class="fa fa-search" aria-hidden="true" onclick="onSearch('keyword2');"></i>
    </div>
    <nav id="mmenu">
        <ul>

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

        </ul>
    </nav>
</div>