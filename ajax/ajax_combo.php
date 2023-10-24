<?php
include "ajax_config.php";

$id = (isset($_POST['id']) && $_POST['id'] > 0) ? htmlspecialchars($_POST['id']) : 0;
$type = (isset($_POST['type']) && $_POST['type'] != '') ? htmlspecialchars($_POST['type']) : '';
$kichthuoc = (isset($_POST['kichthuoc']) && $_POST['kichthuoc'] > 0) ? htmlspecialchars($_POST['kichthuoc']) : 0;
$chatlieu = (isset($_POST['chatlieu']) && $_POST['chatlieu'] > 0) ? htmlspecialchars($_POST['chatlieu']) : 0;
$somat = (isset($_POST['somat']) && $_POST['somat'] > 0) ? htmlspecialchars($_POST['somat']) : 0;
$canmang = (isset($_POST['canmang']) && $_POST['canmang'] > 0) ? htmlspecialchars($_POST['canmang']) : 0;
$khoanlo = (isset($_POST['khoanlo']) && $_POST['khoanlo'] > 0) ? htmlspecialchars($_POST['khoanlo']) : 0;
$soduongcung = (isset($_POST['soduongcung']) && $_POST['soduongcung'] > 0) ? htmlspecialchars($_POST['soduongcung']) : 0;
$hinhdang = (isset($_POST['hinhdang']) && $_POST['hinhdang'] > 0) ? htmlspecialchars($_POST['hinhdang']) : 0;
$cachthuc = (isset($_POST['cachthuc']) && $_POST['cachthuc'] > 0) ? htmlspecialchars($_POST['cachthuc']) : 0;
$kieube = (isset($_POST['kieube']) && $_POST['kieube'] > 0) ? htmlspecialchars($_POST['kieube']) : 0;
$soluong = (isset($_POST['soluong']) && $_POST['soluong'] > 0) ? htmlspecialchars($_POST['soluong']) : 0;
$row_detail = $d->rawQueryOne("select gia from #_product where id = ? and type = ? and hienthi > 0 limit 0,1",array($id,$type));

$total = ($row_detail['gia'] > 0) ? $row_detail['gia'] : 0;


if($kichthuoc)
{
	$kichthuocsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_size = ? and type = ? and hienthi > 0 limit 0,1",array($id,$kichthuoc,$type));
    $total += $kichthuocsql['gia'];
}
if($chatlieu)
{
	$chatlieusql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_chatlieu = ? and type = ? and hienthi > 0 limit 0,1",array($id,$chatlieu,$type));
    $total += $chatlieusql['gia'];
}
if($somat)
{
	$somatsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_somat = ? and type = ? and hienthi > 0 limit 0,1",array($id,$somat,$type));
    $total += $somatsql['gia'];
}
if($canmang)
{
	$canmangsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_canmang = ? and type = ? and hienthi > 0 limit 0,1",array($id,$canmang,$type));
    $total += $canmangsql['gia'];
}
if($khoanlo)
{
	$khoanlosql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_khoanlo = ? and type = ? and hienthi > 0 limit 0,1",array($id,$khoanlo,$type));
    $total += $khoanlosql['gia'];
}
if($soduongcung)
{
	$soduongcungsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_soduongcung = ? and type = ? and hienthi > 0 limit 0,1",array($id,$soduongcung,$type));
    $total += $soduongcungsql['gia'];
}
if($hinhdang)
{
	$hinhdangsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_hinhdang = ? and type = ? and hienthi > 0 limit 0,1",array($id,$hinhdang,$type));
    $total += $hinhdangsql['gia'];
}
if($cachthuc)
{
	$cachthucsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_cachthuc = ? and type = ? and hienthi > 0 limit 0,1",array($id,$cachthuc,$type));
    $total += $cachthucsql['gia'];
}
if($kieube)
{
	$kieubesql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_kieube = ? and type = ? and hienthi > 0 limit 0,1",array($id,$kieube,$type));
    $total += $kieubesql['gia'];
}
if($soluong)
{
	$soluongsql = $d->rawQueryOne("select gia from #_product_price where id_product = ? and id_soluong = ? and type = ? and hienthi > 0 limit 0,1",array($id,$soluong,$type));
    $total += $soluongsql['gia'];
}
$data['total'] = $total;
$data['totaltext'] = $func->format_money($total);
echo json_encode($data);
?>