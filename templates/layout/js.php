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
        const [listKichThuoc,setListKichThuoc] = useState([]);
        const [firstKichThuoc,setFirstKichThuoc] =useState({});

        // danh sach choice

        const [listChatLieu,setListChatLieu] = useState([]);
        const [relashion,setRelashion]  =useState({
            listCanMang: [],
            listMatIn: [],
            listQuyCach: [],
            listSoLuong: [],
            listThoiGian: [],
        });

        const [chatLieuChoice,setChatLieuChoice] =useState({});


        const getKichThuocProduct = async()=>{
            await fetch(`${CONFIG_BASE}/ajax/get.kich-thuoc.php?productID=${productID}`)
            .then(response=>response.json())
            .then(async (res)=>{
                const { success, result } = res;
                if(success){
                    console.log(">>>> API RESULT",res);
                    await setListKichThuoc(result.listKichThuoc);
                    await setFirstKichThuoc(result.listKichThuoc[0]);
                }
            });
        }
        useEffect(()=>{
            getKichThuocProduct();
        },[]);
        const getDataWithKichThuocActive = async (itemChoice) =>{
            const formData = new FormData();
            formData.append('kichThuocID',itemChoice.id);
            return await fetch(`${CONFIG_BASE}/ajax/post.kich-thuoc.php`,{
                method:"POST",
                body: formData,
            })
            .then(response=>response.json())
            .then((res)=>{
                return res;
            });
        }
        const getFullDataChoice = async(chatLieuChoice)=>{
            const formData = new FormData();
            console.log("chatLieuChoice",chatLieuChoice);
            formData.append('kichThuocChatLieuId',chatLieuChoice.id);
            const result =  await fetch(`${CONFIG_BASE}/ajax/post.chat-lieu.php`,{
                method:"POST",
                body: formData,
            })
            .then(response=>response.json())
            .then(res=>{ return res});
            return result;
        }
        const changeKichThuocActive = async (e)=>{
            e.preventDefault();
            const value = e.target.value;
            const itemChoice = listKichThuoc.find(item=>item.id===value);
            await setFirstKichThuoc(itemChoice);
            const result  = await getDataWithKichThuocActive(itemChoice);
            await setListChatLieu(result.listChatLieu);
            await setChatLieuChoice(result.chatLieuChoice);
            const fullData = await getFullDataChoice(result.chatLieuChoice);
            console.log(">>>fullData",fullData);
        }
        const changeChatLieuChoice= async(e) =>{
            const value = e.target.value;
            console.log("changeChatLieuChoice",value);
            const itemChoice = listChatLieu.find(item=>item.id===value);
            await setChatLieuChoice(itemChoice);
            const fullData =await getFullDataChoice(itemChoice);
        }
        return (
            <div>
                <p className="pro-detail-title">Yêu cầu của bạn</p>
                { listKichThuoc && listKichThuoc.length > 0
                    &&
                        <div>
                            <div className="pro-detail-group">
                                <label htmlFor="pro-detail-size">- Kích thước</label>
                                <select
                                    onChange={(e)=>changeKichThuocActive(e)}
                                    value={firstKichThuoc ? firstKichThuoc.id : ""}
                                    name="pro-detail-size" id="pro-detail-size" className="form-pro-detail">
                                    <option value=""> - Chọn kích thước</option>
                                    { listKichThuoc.map(item=>{
                                        return  <option key={item.id} value={item.id}>{ item.length }mm x {item.width}mm</option>
                                    }) }
                                </select>
                            </div>
                            {
                                firstKichThuoc &&
                                <div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-chatlieu">- Chất liệu giấy</label>
                                        <select
                                        value={chatLieuChoice? chatLieuChoice.id : ""}
                                        onChange={(e)=>changeChatLieuChoice(e)}
                                        name="pro-detail-chatlieu" className="form-pro-detail">
                                            <option value=""> - Chọn Chất liệu giấy</option>
                                            { listChatLieu && listChatLieu.length > 0 && listChatLieu.map(item=>{
                                                return <option value={item.id}>{item.name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-somat">- Số mặt in</label>
                                        <select name="pro-detail-somat" className="form-pro-detail">
                                            <option value=""> - Chọn Số mặt in</option>
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-canmang">- Loại cán màng</label>
                                        <select name="pro-detail-canmang" className="form-pro-detail">
                                            <option value=""> - Chọn Loại cán màng</option>
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-soduongcung">- Qui cách</label>
                                        <select name="pro-detail-soduongcung" className="form-pro-detail">
                                            <option value=""> - Chọn Qui cách</option>
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-soluong">- Số lượng</label>
                                        <select name="pro-detail-soluong" className="form-pro-detail">
                                            <option value=""> - Chọn Số lượng</option>
                                        </select>
                                    </div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-hinhdang">- Thời gian</label>
                                        <select name="pro-detail-hinhdang" className="form-pro-detail">
                                            <option value=""> - Chọn Thời gian</option>
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