<!-- Js Config -->
<script type="text/javascript">
    var VNS_FRAMEWORK = VNS_FRAMEWORK || {};
    var CONFIG_BASE = '<?=$config_base?>';
    var WEBSITE_NAME = '<?=(!empty($setting['ten' . $lang])) ? addslashes($setting['ten' . $lang]) : ''?>';
    var TIMENOW = '<?=date("d/m/Y", time())?>';
    var SHIP_CART = <?=(isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false'?>;
    var GOTOP = 'assets/images/top.png';
    var LANG = {
        'no_keywords': '<?=chuanhaptukhoatimkiem?>',
        'delete_product_from_cart': '<?=banmuonxoasanphamnay?>',
        'no_products_in_cart': '<?=khongtontaisanphamtronggiohang?>',
        'wards': '<?=phuongxa?>',
        'back_to_home': '<?=vetrangchu?>',
    };
</script>

<!-- Js Files -->
<?php
$js->setCache("cached");
$js->setJs("./assets/js/jquery.min.js");
$js->setJs("./assets/bootstrap/bootstrap.js");
$js->setJs("./assets/js/wow.min.js");
$js->setJs("./assets/mmenu/mmenu.js");
$js->setJs("./assets/simplyscroll/jquery.simplyscroll.js");
$js->setJs("./assets/fotorama/fotorama.js");
$js->setJs("./assets/owlcarousel2/owl.carousel.js");
$js->setJs("./assets/magiczoomplus/magiczoomplus.js");
$js->setJs("./assets/slick/slick.js");
$js->setJs("./assets/fancybox3/jquery.fancybox.js");
$js->setJs("./assets/photobox/photobox.js");
$js->setJs("./assets/datetimepicker/php-date-formatter.min.js");
$js->setJs("./assets/datetimepicker/jquery.mousewheel.js");
$js->setJs("./assets/datetimepicker/jquery.datetimepicker.js");
$js->setJs("./assets/js/jquery.pixelentity.shiner.min.js");
$js->setJs("./assets/toc/toc.js");
$js->setJs("./assets/swiperjs/swiper-bundle.min.js");
$js->setJs("./assets/holdon/HoldOn.js");
// $js->setJs("./assets/js/popupvirtual.js");
$js->setJs("./assets/js/functions.js");
$js->setJs("./assets/js/apps.js");
// $js->setJs("./assets/js/disable-copy.js");
echo $js->getJs();
?>
<script type="text/javascript">
function GoogleLanguageTranslatorInit(){new google.translate.TranslateElement({pageLanguage:'vi',autoDisplay:false},'google_language_translator');}google_initialized=false;
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit"></script>

<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) {?>
    <!-- Js Google Recaptcha V3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?=$config['googleAPI']['recaptcha']['sitekey']?>"></script>
    <script type="text/javascript">
        grecaptcha.ready(function () {
            grecaptcha.execute('<?=$config['googleAPI']['recaptcha']['sitekey']?>', { action: 'Newsletter' }).then(function (token) {
                var recaptchaResponseNewsletter = document.getElementById('recaptchaResponseNewsletter');
                recaptchaResponseNewsletter.value = token;
            });
            <?php if ($source == 'contact') {?>
                grecaptcha.execute('<?=$config['googleAPI']['recaptcha']['sitekey']?>', { action: 'contact' }).then(function (token) {
                    var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
                    recaptchaResponseContact.value = token;
                });
            <?php }?>
        });
    </script>
<?php }?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) {?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?=$config['oneSignal']['id']?>"
            });
        });
    </script>
<?php }?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php";?>

<!-- Js Addons -->
<?=$addons->setAddons('script-main', 'script-main', 0.5);?>
<?=$addons->getAddons();?>

<!-- Js Body -->
<?=htmlspecialchars_decode($setting['bodyjs'])?>

<?php if ($template = "product/product_detail"): ?>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
<script crossorigin src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
<script type="text/babel">
    const productID = '<?=$id ?? 0?>';
    const { useState, useEffect, StrictMode } = React;
    function App() {
        const [allKichThuoc,setAllKichThuoc] = useState([]);
        const [kichThuocID,setKichThuocID] = useState({});
        const [allChatLieu,setAllChatLieu] =useState([]);
        const [chatLieu,setChatLieu] =useState({});
        const [options,setOptions] = useState({
            canMang: 0,
            matIn: 0,
            quyCach: 0,
            soLuong: 0,
            thoiGian: 0
        });
        const getKichThuocProduct = async()=>{
            await fetch(`${CONFIG_BASE}/ajax/ajax_kich_thuoc.php?productID=${productID}`)
            .then(response=>response.json())
            .then(async (res)=>{
                const { success, result } = res;
                if(success){
                    await setAllKichThuoc(result.allKichThuoc);
                    await setKichThuocID(result.allKichThuoc[0].id);
                    await setAllChatLieu(result.allChatLieu);
                    await setChatLieu(result.firstChatLieu);
                }
            });
        }
        useEffect(()=>{
            getKichThuocProduct();
        },[]);
        const changeKichThuoc = (e)=>{
            e.preventDefault();
            setKichThuocID(e.target.value);
        }
        return (
            <div>
                <p className="pro-detail-title">Yêu cầu của bạn</p>
                { allKichThuoc && allKichThuoc.length > 0
                    &&
                        <div>
                            <div className="pro-detail-group">
                                <label htmlFor="pro-detail-size">- Kích thước</label>
                                <select
                                onChange={(e)=>changeKichThuoc(e)}
                                value={kichThuocID}
                                name="pro-detail-size" id="pro-detail-size" className="form-pro-detail">
                                    <option value=""> - Chọn kích thước</option>
                                    { allKichThuoc.map(item=>{
                                        return  <option key={item.id} value={item.id}>{ item.length }mm x {item.width}mm</option>
                                    }) }
                                </select>
                            </div>
                            {
                                allChatLieu && allChatLieu.length > 0 &&
                                <div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-chatlieu">- Chất liệu giấy</label>
                                        <select
                                        disabled={!kichThuocID}
                                        value={chatLieu?chatLieu.id : ""}
                                        name="pro-detail-chatlieu" id="pro-detail-chatlieu" className="form-pro-detail">
                                            <option value=""> - Chọn Chất liệu giấy</option>
                                            { allChatLieu && allChatLieu.length && allChatLieu.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-somat">- Số mặt in</label>
                                        <select disabled={!kichThuocID} name="pro-detail-somat" id="pro-detail-somat" className="form-pro-detail">
                                            <option value=""> - Chọn Số mặt in</option>
                                            { chatLieu.matIn && chatLieu.matIn.length && chatLieu.matIn.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-canmang">- Loại cán màng</label>
                                        <select disabled={!kichThuocID} name="pro-detail-canmang" id="pro-detail-canmang" className="form-pro-detail">
                                            <option value=""> - Chọn Loại cán màng</option>
                                            { chatLieu.canMang && chatLieu.canMang.length && chatLieu.canMang.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-soduongcung">- Qui cách</label>
                                        <select disabled={!kichThuocID} name="pro-detail-soduongcung" id="pro-detail-soduongcung" className="form-pro-detail">
                                            <option value=""> - Chọn Qui cách</option>
                                            { chatLieu.quyCach && chatLieu.quyCach.length && chatLieu.quyCach.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-soluong">- Số lượng</label>
                                        <select disabled={!kichThuocID} name="pro-detail-soluong" id="pro-detail-soluong" className="form-pro-detail">
                                            <option value=""> - Chọn Số lượng</option>
                                            { chatLieu.soLuong && chatLieu.soLuong.length && chatLieu.soLuong.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-hinhdang">- Thời gian</label>
                                        <select disabled={!kichThuocID} name="pro-detail-hinhdang" id="pro-detail-hinhdang" className="form-pro-detail">
                                            <option value=""> - Chọn Thời gian</option>
                                            { chatLieu.thoiGian && chatLieu.thoiGian.length && chatLieu.thoiGian.map(item=>{
                                                return <option key={item.id} value={item.id}> {item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                            </div>
                            }
                        </div>
                    }
            </div>
        )
    }
    const root = ReactDOM.createRoot(document.getElementById('requirement'));
    root.render(
        <StrictMode>
            <App />
        </StrictMode>
    );
    </script>
<?php endif;?>