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
    const productId = '<?=$id ?? 0?>';
    const { useState, useEffect, StrictMode } = React;
    function App() {
        const [allKT, setAllKT] = useState([]);
        const [allKTCL, setAllKTCL] = useState([]);
        const [dataForKTCL, setDataForKTCL] = useState({
            allCanMang: [],
            allMatIn:[],
            allQuyCach:[],
            allSoLuong:[],
            allThoiGian:[],
        });
        const [dataChoice,setDataChoice] = useState({
            kichThuocId: null,
            kichThuocChatLieuId: null,
            canMangId: null,
            matInId: null,
            quyCachId: null,
            soLuongId: null,
            thoiGianId: null,
        });
        const [totalPrice,setTotalPrice] = useState({});
        const handlePrice = async (price)=>{
            const docPrice =  document.getElementById("totalPrice");
            docPrice.innerHTML = Intl.NumberFormat('vi-VN').format(price);
        }
        const getDataFirst = async()=>{
            const formData = new FormData();
            formData.append('productId',productId);
            const res = await fetch(`${CONFIG_BASE}/api/post.size.php`,{
                method:"POST",
                body:formData
            });
            if(!res.ok){
                new Error("Error");
            }
            const { success, dsKichThuoc, dsKTChatLieu, allDataForKTCL, allDataChoice, price } = await res.json();
            if(success){
                await setAllKT(dsKichThuoc);
                await setAllKTCL(dsKTChatLieu);
                await setDataForKTCL(allDataForKTCL);
                await setDataChoice(allDataChoice);
                await setTotalPrice(price);
                await handlePrice(price);
            }
        }
        useEffect(()=>{
            getDataFirst();
        },[]);
        const changeKichThuoc = async (e) =>{
            const kichThuocId = e.target.value;
            e.preventDefault();
            setDataChoice({...dataChoice,kichThuocId:kichThuocId});
            const formData = new FormData();
            formData.append('kichThuocId',kichThuocId);
            const res = await fetch(`${CONFIG_BASE}/api/post.size.choice.php`,{
                method:"POST",
                body:formData
            });
            if(!res.ok){
                new Error("Error");
            }
            const { success, dsKTChatLieu, allDataForKTCL, allDataChoice, price } = await res.json();
            if(success){
                await setAllKTCL(dsKTChatLieu);
                await setDataForKTCL(allDataForKTCL);
                await setDataChoice(allDataChoice);
                await setTotalPrice(price);
                await handlePrice(price);
            }
        }
        const changeKTCL = async (e)=>{
            e.preventDefault();
            const kichThuocChatLieuId = e.target.value;
            setDataChoice({...dataChoice,kichThuocChatLieuId:e.target.value});
            const formData = new FormData();
            formData.append('kichThuocChatLieuId',kichThuocChatLieuId);
            formData.append('kichThuocId',dataChoice.kichThuocId);
            const res = await fetch(`${CONFIG_BASE}/api/post.cl.choice.php`,{
                method:"POST",
                body:formData
            });
            if(!res.ok){
                new Error("Error");
            }
            const { success, allDataForKTCL, allDataChoice, price } = await res.json();
            if(success){
                await setDataForKTCL(allDataForKTCL);
                await setDataChoice(allDataChoice);
                await setTotalPrice(price);
                await handlePrice(price);
            }
        }
        const changeDataForKTCL = async(e) =>{
            e.preventDefault();
            const newDataChoice = {...dataChoice,[e.target.name]:e.target.value};
            setDataChoice(newDataChoice);
            const res = await fetch(`${CONFIG_BASE}/api/post.data-for-ktcl.php`,{
                method:"POST",
                body:JSON.stringify({dataChoice:newDataChoice})
            });
            if(!res.ok){
                new Error("Error");
            }
            const { success, price } = await res.json();
            if(success){
                await setTotalPrice(price);
                await handlePrice(price);
            }
        }
        return (
            <div>
                <p className="pro-detail-title">Yêu cầu của bạn</p>
                { allKT && allKT.length >0 &&

                    <div>
                        <div className="pro-detail-group">
                            <label htmlFor="pro-detail-size">- Kích thước</label>
                            <select className="form-pro-detail" id="pro-detail-size"
                                value={ dataChoice.kichThuocId }
                                onChange={(e)=>changeKichThuoc(e)}>
                                <option value="" hidden> - Chọn kích thước</option>
                                { allKT.map(item=>{
                                    return  <option key={item.id} value={item.id}>{ item.length }mm x {item.width}mm</option>
                                }) }
                            </select>
                        </div>
                        {
                            allKTCL && allKTCL.length > 0 &&
                            <div>
                                    <div className="pro-detail-group">
                                        <label htmlFor="pro-detail-chatlieu">- Chất liệu giấy</label>
                                        <select className="form-pro-detail" id="pro-detail-chatlieu"
                                            value={ dataChoice.kichThuocChatLieuId }
                                            onChange={(e)=>changeKTCL(e)}
                                        >
                                            <option value="" hidden> - Chọn Chất liệu giấy</option>
                                            { allKTCL.map(item=>{
                                                return <option value={item.id}>{item.chat_lieu_name}</option>
                                            }) }
                                        </select>
                                    </div>
                                    { dataForKTCL.allMatIn && dataForKTCL.allMatIn.length > 0 &&
                                        <div className="pro-detail-group">
                                            <label htmlFor="pro-detail-somat">- Số mặt in</label>
                                            <select className="form-pro-detail" name="matInId" id="pro-detail-somat"
                                                value={ dataChoice.matInId }
                                                onChange={(e)=>changeDataForKTCL(e)}
                                            >
                                                <option value="" hidden> - Chọn Số mặt in</option>
                                                { dataForKTCL.allMatIn.map(item=>{
                                                    return <option value={item.mi_id}>{item.name}</option>
                                                })  }
                                            </select>
                                        </div>
                                    }
                                    {dataForKTCL.allCanMang && dataForKTCL.allCanMang.length > 0 &&
                                        <div className="pro-detail-group">
                                            <label htmlFor="pro-detail-canmang">- Loại cán màng</label>
                                            <select className="form-pro-detail" name="canMangId" id="pro-detail-canmang"
                                                value={ dataChoice.canMangId }
                                                onChange={(e)=>changeDataForKTCL(e)}
                                            >
                                                <option value="" hidden> - Chọn Loại cán màng</option>
                                                {  dataForKTCL.allCanMang.map(item=>{
                                                    return <option value={item.cm_id}>{item.name}</option>
                                                })  }
                                            </select>
                                        </div>
                                    }
                                    {dataForKTCL.allQuyCach && dataForKTCL.allQuyCach.length > 0 &&
                                        <div className="pro-detail-group">
                                            <label htmlFor="pro-detail-soduongcung">- Quy cách</label>
                                            <select className="form-pro-detail" name="quyCachId" id="pro-detail-soduongcung"
                                                value={ dataChoice.quyCachId }
                                                onChange={(e)=>changeDataForKTCL(e)}
                                            >
                                                <option value="" hidden> - Chọn Qui cách</option>
                                                {  dataForKTCL.allQuyCach.map(item=>{
                                                    return <option value={item.qc_id}>{item.name}</option>
                                                })  }
                                            </select>
                                        </div>
                                    }
                                    {dataForKTCL.allSoLuong && dataForKTCL.allSoLuong.length > 0 &&
                                        <div className="pro-detail-group">
                                            <label htmlFor="pro-detail-soluong">- Số lượng</label>
                                            <select className="form-pro-detail" name="soLuongId" id="pro-detail-soluong"
                                                value={ dataChoice.soLuongId }
                                                onChange={(e)=>changeDataForKTCL(e)}
                                            >
                                                <option value="" hidden> - Chọn Số lượng</option>
                                                {  dataForKTCL.allSoLuong.map(item=>{
                                                    return <option value={item.sl_id}>{item.name}</option>
                                                })  }
                                            </select>
                                        </div>
                                    }
                                    { dataForKTCL.allThoiGian && dataForKTCL.allThoiGian.length > 0 &&
                                        <div className="pro-detail-group">
                                            <label htmlFor="pro-detail-hinhdang">- Thời gian</label>
                                            <select className="form-pro-detail" name="thoiGianId" id="pro-detail-hinhdang"
                                                value={ dataChoice.thoiGianId }
                                                onChange={(e)=>changeDataForKTCL(e)}
                                            >
                                                <option value="" hidden> - Chọn Thời gian</option>
                                                {  dataForKTCL.allThoiGian.map(item=>{
                                                    return <option value={item.tg_id}>{item.name}</option>
                                                })  }
                                            </select>
                                        </div>
                                    }
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