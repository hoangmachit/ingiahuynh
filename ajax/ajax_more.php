<?php
include "ajax_config.php";

$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;
$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
$type = (isset($_GET['type']) && $_GET['type'] != '') ? htmlspecialchars($_GET['type']) : '';
$title = (isset($_GET['title']) && $_GET['title'] != '') ? htmlspecialchars($_GET['title']) : '';
$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = 0;
$limit = (isset($_GET['showadd']) && $_GET['showadd'] > 0) ? htmlspecialchars($_GET['showadd']) : 0;

if($type)
{
	$where .= " type = '".$type."'";
}
/* Math url */
if($idList)
{
	$where .= " and id_list = ".$idList;
}
/* Math url */
if($idCat)
{
	$where .= " and id_cat = ".$idCat;
}
/* Get data */
$sql = "select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id, photo,ngaytao,ngaysua,type,mota$lang as mota from #_news where  $where and hienthi > 0 order by stt,id desc";
$sqlCache = $sql." limit $start, $limit";
$items = $cache->getCache($sqlCache,'result',7200);
/* Count all data */
$countItems = count($cache->getCache($sql,'result',7200));

?>
<?php if($countItems) { ?>
    <div class="box-hot-news">
        <div class="pic-hot-news">
            <a class="text-decoration-none scale-img" href="<?=$items[0][$sluglang]?>" title="<?=$items[0]['ten']?>">
                <img onerror="this.src='<?=THUMBS?>/480x320x2/assets/images/noimage.png';" src="<?=THUMBS?>/480x320x1/<?=UPLOAD_NEWS_L.$items[0]['photo']?>" alt="<?=$items[0]['ten']?>">
            </a>
        </div>
        <div class="desc-hot-news">
            <p><?=$title?></p>
            <h3 class="name-hot-news">
                <a class="text-decoration-none scale-img" href="<?=$items[0][$sluglang]?>" title="<?=$items[0]['ten']?>">
                    <?=$items[0]['ten']?>
                </a>
            </h3>
            <div class="time-hot-news"><?=ngaydang?>: <?=date("d/m/Y ",$items[0]['ngaytao'])?></div>
            <p class="info-hot-news text-split"><?=$items[0]['mota']?></p>
            <a href="<?=$items[0][$sluglang]?>" class="btn-hot-news">Xem thêm</a>
        </div>
    </div>
    <div class="news-total-container">
        <?php foreach ($items as $key => $value) {
            if($key > 0){
            ?>
            <div class="boxs-news">
                <div class="box-news">
                    <div class="pic-news">
                        <a class="text-decoration-none scale-img" href="<?=$value[$sluglang]?>" title="<?=$value['ten']?>">
                            <img onerror="this.src='<?=THUMBS?>/480x320x2/assets/images/noimage.png';" src="<?=THUMBS?>/480x320x1/<?=UPLOAD_NEWS_L.$value['photo']?>" alt="<?=$value['ten']?>">
                        </a>
                    </div>
                    <div class="desc-news">
                        <p class="time-news"><span><?=$title?></span> <span><?=date("d/m/Y ",($value['ngaytao'] < $value['ngaysua']) ? $value['ngaysua'] : $value['ngaytao'])?></span></p>
                        <h3 class="name-news">
                            <a class="text-split text-split-2" href="<?=$value[$sluglang]?>" title="<?=$value['ten']?>">
                                <?=$value['ten']?>
                            </a>
                        </h3>
                        <p class="info-news text-split text-split-2"><?=$value['mota']?></p>
                    </div>
                </div>
            </div>
        <?php } }?>
    </div>
<?php } ?>