<div class="product-total">
    <div class="product-total-left">
        <h2>CATEGORY</h2>
        <ul>
            <?php
            $splistmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_product_list where type = ?  and hienthi > 0 order by stt,id desc",array($type));
            foreach ($splistmenu as $key => $value) {
                $spcatmenu2 = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen,photo, id from #_product_cat where id_list = ? and hienthi > 0 order by stt,id desc", array($value['id']));
            ?>
                <li>
                    <a href="<?= $value[$sluglang] ?>" class="has-child"><?= $value['ten'] ?><span></span></a>
                    <?php if (count($spcatmenu2)) { ?>
                        <ul>
                            <?php foreach ($spcatmenu2 as $key2 => $value2) {
                                $spitemmenu2 = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen,photo, id from #_product_item where id_cat = ? and hienthi > 0 order by stt,id desc", array($value2['id']));

                                ?>
                                <li>
                                    <a href="<?= $value2[$sluglang] ?>"><?= $value2['ten'] ?></a>
                                    <?php if (count($spitemmenu2)) { ?>
                                        <ul class="menu-sub2">
                                            <?php foreach ($spitemmenu2 as $key3 => $value3) { ?>
                                                <li>
                                                    <a href="<?= $value3[$sluglang] ?>"><?= $value3['ten'] ?></a>
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
        </ul>
    </div>
    <div class="product-total-right">
    <?php  if (!empty($idl) || !empty($idc) && !empty($productshowlist)) { 
            
        ?>
         <div class="title-main">
            <h1 class="d-none"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h1>
            <p><?= $slogan['ten'] ?></p>
        </div>
        <?php 
        
  
        
        foreach ($productshowlist as $key => $value) {
            if($idl){
                $splist = $d->rawQuery("select id from #_product where type='$type' and id_cat =". $value['id']." and hienthi > 0 order by stt,id desc"); 

            }
            

            if($idc){

                $splist = $d->rawQuery("select id from #_product where type='$type' and id_item =". $value['id']." and hienthi > 0 order by stt,id desc"); 
            }
                if(count($splist) > 0){
            ?>
            <div>
            <div class="title-main">
                <h2 ><?=$value['ten']?></h2>
            </div>
            <div class="paging-product-category paging-product-category-<?=$value['id']?>" data-type="<?=$type?>" data-cat="<?=(!empty($idl)) ? "".$value['id'] : ""?>" data-item="<?=(!empty($idc)) ? "".$value['id'] : ""?>"></div>
            </div> 
        <?php }}?>
    <?php }else{ ?>
        <?php if (isset($product) && count($product) > 0) { ?>
            <div class="title-main">
                <h1><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h1>
                <p><?= $slogan['ten'] ?></p>
            </div>
            <?= $func->getTemplateProductAll($product, 'product-items') ?>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <strong><?= khongtimthayketqua ?></strong>
            </div>
        <?php } ?>
        <div class="pagination-home mgt-25"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
    <?php } ?>
    </div>
</div>



<style>
 

    @media (max-width:600px) {

        .product-total-right,
        .product-total-left {
            width: 100%;
        }

        .product-total-left {
            margin-bottom: 25px;
        }
    }
</style>
<script defer>
    window.onload = function() {
        $('.product-total-left  ul li  a').each(function() {
            $this = $(this);
            if (!isExist($this.next('ul').find('li'))) {
                $this.next('ul').remove();
                $this.removeClass('has-child');
            }
        });
        $('.product-total-left  ul li  a.has-child span').click(function(event) {
            event.preventDefault();
            $(this).parents('li').find('ul').stop().slideToggle()
            $(this).toggleClass('active');
        })
    };
</script>