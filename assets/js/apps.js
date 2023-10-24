/* Validation form */
ValidationFormSelf("validation-newsletter");
ValidationFormSelf("validation-cart");
ValidationFormSelf("validation-user");
ValidationFormSelf("validation-contact");

/* Exists */
$.fn.exists = function(){
    return this.length;
};

/* Paging ajax */
if($(".paging-product").exists())
{
    loadPagingAjax("ajax/ajax_product.php?perpage=8",'.paging-product');
}



$(document).ready(function(e) {
    $('.menu-left > ul > li').hover(function(){
        var vitri = $(this).position().top;
        $('.menu-left ul li ul.menu_cap2').css({'top':vitri+'px'})
    });
    $(".input-user-doimatkhau label").click(function(){
        $(".open-input-group").toggleClass('active');
    });
});
// Logo sang loang
$(".content-tabs-pro-detail  table").wrap("<div class='responsive-item'></div>");
$(".content-news  table").wrap("<div class='responsive-item'></div>");

if($("#loader-wrapper").exists())
{
    setTimeout(function() {
    $("#loader-wrapper").addClass('show1')
    }, 1000);
    setTimeout(function() {
      $('#loader-wrapper').remove()
    }, 3000);
}
function check_email(email)
{
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
};

if($(".form-cart").exists())
{
    $('.btn-cart').click(function (){
        var httt = '';
        if($(".payments-label.active").exists()){
            httt = $(".payments-label.active").parents(".payments-cart").find("input").val();
        }
        var ten = $(".input-cart input[name='ten']").val();
        var dienthoai = $(".input-cart input[name='dienthoai']").val();
        var city = $(".select-city-cart option:selected").val();
        var district = $(".select-district-cart option:selected").val();
        var wards = $(".select-wards-cart option:selected").val();
        var diachi = $(".input-cart input[name='diachi']").val();
        if(httt!='' && ten!='' && dienthoai!='' && city!='' && district!='' && wards!='' && diachi!=''){
         $('#cart-notify').modal('show');
     }
 });
};
VNS_FRAMEWORK.LogoPeshiner = function(){
    if($(".peShiner").exists())
        {
            var api = $(".peShiner").peShiner({ api: true, paused: true, reverse: true, repeat: 1, color: 'fireHL',duration:1.5}); //ma mau dac biet: monoHL, oceanHL, fireHL
            api.resume();
        }
        if($(".peShiner2").exists())
        {
            var api = $(".peShiner2").peShiner({ api: true, paused: true, reverse: true, repeat: 1, color: 'fireHL',duration:1.5}); //ma mau dac biet: monoHL, oceanHL, fireHL
            api.resume();
        }
};
/* Back to top */
VNS_FRAMEWORK.BackToTop = function(){
    $(window).scroll(function(){
        if(!$('.scrollToTop').length) $("body").append('<div class="scrollToTop"><img src="'+GOTOP+'" alt="Go Top"/></div>');
        if($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
        else $('.scrollToTop').fadeOut();
    });

    $('body').on("click",".scrollToTop",function() {
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
};

/* Alt images */
VNS_FRAMEWORK.AltImages = function(){
    $('img').each(function(index, element) {
        if(!$(this).attr('alt') || $(this).attr('alt')=='')
        {
            $(this).attr('alt',WEBSITE_NAME);
        }
    });
};

/* Fix menu */
VNS_FRAMEWORK.FixMenu = function(){
    $(window).scroll(function(){
        if($(window).scrollTop() >= ($("#header").height() + $("#banner").height()))
            $("#menu").addClass('fixing');
        else
            $("#menu").removeClass('fixing');
    });
};

/* Tools */
VNS_FRAMEWORK.Tools = function(){
    if($(".toolbar").exists())
    {
        $(".footer").css({marginBottom:$(".toolbar").innerHeight()});
    }
};

/* Popup */
VNS_FRAMEWORK.Popup = function(){
    if($("#popup").exists())
    {
        $('#popup').modal('show');
    }
};

/* Wow */
VNS_FRAMEWORK.WowAnimation = function(){
    new WOW().init();
};

/* Mmenu */
VNS_FRAMEWORK.Mmenu = function(){
    if($("nav#mmenu").exists())
    {
        $('nav#mmenu').mmenu({
            extensions  : [ 'effect-slide-menu', 'pageshadow' ],
            searchfield : false,
            counters  : false,
            offCanvas: {
                position  : "left"
            }
        });
    }
};

/* Toc */
VNS_FRAMEWORK.Toc = function(){
    if($(".toc-list").exists())
    {
        $(".toc-list").toc({
            content: "div#toc-content",
            headings: "h2,h3,h4"
        });

        if(!$(".toc-list li").length) $(".meta-toc").hide();

        $('.toc-list').find('a').click(function(){
            var x = $(this).attr('data-rel');
            goToByScroll(x);
        });
    }
};

/* Simply scroll */
VNS_FRAMEWORK.SimplyScroll = function(){
    if($(".tintuc-r ul").exists())
    {
        $(".tintuc-r ul").simplyScroll({
            customClass: 'vert',
            orientation: 'vertical',
            // orientation: 'horizontal',
            auto: true,
            manualMode: 'auto',
            pauseOnHover: 1,
            speed: 1,
            loop: 0
        });
    }
};

/* Tabs */

VNS_FRAMEWORK.Tabs = function(){
    if($(".ul-tabs-pro-detail").exists())
    {
        $(".ul-tabs-pro-detail li").click(function(){
            var tabs = $(this).data("tabs");
            $(".content-tabs-pro-detail, .ul-tabs-pro-detail li").removeClass("activeht");
            $(this).addClass("activeht");
            $("."+tabs).addClass("activeht");
            $('.pro-detail-btn-container').attr('data-tab',tabs);
            $('.pro-detail-btn-container').text("Xem thêm");
            $('.pro-detail-btn-container').removeClass('activeht');
            if($("."+tabs).height() < 930){
                $('.pro-detail-btn-container').addClass('d-none');
            }else{
                $('.pro-detail-btn-container').removeClass('d-none');
            }
        });
    }
    $('.pro-detail-btn-container').click(function(){
        $(this).toggleClass('active');
        var tab = $(".pro-detail-btn-container").attr('data-tab');
        if($(this).hasClass('active')){
            $(this).text("Thu gọn");
            $('.'+tab).removeClass('opacity');
        }else{
            $(this).text("Xem thêm");
            $('.'+tab).addClass('opacity');
        }
    });

    $('.content-tabs-pro-detail').each(function(){
        if($(this).height() >= 930){
            $('.pro-detail-btn-container').removeClass('d-none');
            $(this).addClass('opacity');
        }
    });
};

/* Photobox */
VNS_FRAMEWORK.Photobox = function(){
    if($(".album-gallery").exists())
    {
        $('.album-gallery').photobox('a',{thumbs:true,loop:false});
    }
};

/* Datetime picker */
VNS_FRAMEWORK.DatetimePicker = function(){
    if($('#ngaysinh').exists())
    {
        $('#ngaysinh').datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            minDate: '01/01/1950',
            maxDate: TIMENOW
        });
    }
};

/* Search */
VNS_FRAMEWORK.Search = function(){
    if($(".icon-search").exists())
    {
        $(".icon-search").click(function(){
            if($(this).hasClass('active'))
            {
                $(this).removeClass('active');
                $(".search-grid").stop(true,true).animate({opacity: "0",width: "0px"}, 200);
            }
            else
            {
                $(this).addClass('active');
                $(".search-grid").stop(true,true).animate({opacity: "1",width: "230px"}, 200);
            }
            document.getElementById($(this).next().find("input").attr('id')).focus();
            $('.icon-search i').toggleClass('fa fa-search fa fa-times');
        });
    }
};

/* Videos */
VNS_FRAMEWORK.Videos = function(){
    /* Fancybox */
    // $('[data-fancybox="something"]').fancybox({
    //     // transitionEffect: "fade",
    //     // transitionEffect: "slide",
    //     // transitionEffect: "circular",
    //     // transitionEffect: "tube",
    //     // transitionEffect: "zoom-in-out",
    //     // transitionEffect: "rotate",
    //     transitionEffect: "fade",
    //     transitionDuration: 800,
    //     animationEffect: "fade",
    //     animationDuration: 800,
    //     slideShow: {
    //         autoStart: true,
    //         speed: 3000
    //     },
    //     arrows: true,
    //     infobar: false,
    //     toolbar: false,
    //     hash: false
    // });

    if($(".video").exists())
    {
        $('[data-fancybox="video"]').fancybox({
            transitionEffect: "fade",
            transitionDuration: 800,
            animationEffect: "fade",
            animationDuration: 800,
            arrows: true,
            infobar: false,
            toolbar: true,
            hash: false
        });
    }
};

    /* Owl */
    VNS_FRAMEWORK.OwlPage2 = function(){
        if($(".owl-slideshow").exists())
        {
            $('.owl-slideshow').owlCarousel({
                items: 1,
                rewind: true,
                autoplay: true,
                loop: true,
                lazyLoad: false,
                mouseDrag: false,
                touchDrag: false,
                // animateIn: 'animate__animated animate__fadeInLeft',
                // animateOut: 'animate__animated animate__fadeOutRight',
                margin: 0,
                smartSpeed: 500,
                autoplaySpeed: 1500,
                nav: false,
                dots: false
            });
            $('.prev-slideshow').click(function() {
                $('.owl-slideshow').trigger('prev.owl.carousel');
            });
            $('.next-slideshow').click(function() {
                $('.owl-slideshow').trigger('next.owl.carousel');
            });
        }

    };
VNS_FRAMEWORK.SwiperLibary = function () {
  if ($(".mySwiper").exists()) {
    new Swiper(".mySwiper", {
      loop: true,
      effect: "fade",
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      clickable: true,
    });
  }
  if ($(".swiperproduct2").exists()) {
    swiperproduct2 = new Swiper(".swiperproduct2", {
      // Optional parameters
      effect: "slide",
      speed: 150,
      loop: true,
      slidesPerView: 4,
      spaceBetween: 0,
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        767: {
          slidesPerView: 3,
          spaceBetween: 0,
        },
        991: {
          slidesPerView: 4,
          spaceBetween: 0,
        },
      },
    });
  }
};
/* Owl pro detail */
VNS_FRAMEWORK.OwlProDetail = function(){
    if($(".owl-thumb-pro").exists())
    {
        $('.owl-thumb-pro').owlCarousel({
            items: 3,
            lazyLoad: false,
            mouseDrag: true,
            touchDrag: true,
            margin: 15,
            smartSpeed: 250,
            nav: false,
            dots: false
        });
        $('.prev-thumb-pro').click(function() {
            $('.owl-thumb-pro').trigger('prev.owl.carousel');
        });
        $('.next-thumb-pro').click(function() {
            $('.owl-thumb-pro').trigger('next.owl.carousel');
        });
    }
};

/* Owl Data */
VNS_FRAMEWORK.OwlData = function(obj){
    if(!isExist(obj)) return false;
    var xsm_items = obj.attr("data-xsm-items");
    var sm_items = obj.attr("data-sm-items");
    var md_items = obj.attr("data-md-items");
    var lg_items = obj.attr("data-lg-items");
    var xlg_items = obj.attr("data-xlg-items");
    var rewind = obj.attr("data-rewind");
    var autoplay = obj.attr("data-autoplay");
    var loop = obj.attr("data-loop");
    var lazyLoad = obj.attr("data-lazyload");
    var mouseDrag = obj.attr("data-mousedrag");
    var touchDrag = obj.attr("data-touchdrag");
    var animations = obj.attr("data-animations");
    var smartSpeed = obj.attr("data-smartspeed");
    var autoplaySpeed = obj.attr("data-autoplayspeed");
    var autoplayTimeout = obj.attr("data-autoplaytimeout");
    var dots = obj.attr("data-dots");
    var nav = obj.attr("data-nav");
    var navText = false;
    var navContainer = false;
    var responsive = {};
    var responsiveClass = true;
    var responsiveRefreshRate = 200;

    if(xsm_items != '') { xsm_items = xsm_items.split(":"); }
    if(sm_items != '') { sm_items = sm_items.split(":"); }
    if(md_items != '') { md_items = md_items.split(":"); }
    if(lg_items != '') { lg_items = lg_items.split(":"); }
    if(xlg_items != '') { xlg_items = xlg_items.split(":"); }
    if(rewind == 1) { rewind = true; } else { rewind = false; };
    if(autoplay == 1) { autoplay = true; } else { autoplay = false; };
    if(loop == 1) { loop = true; } else { loop = false; };
    if(lazyLoad == 1) { lazyLoad = true; } else { lazyLoad = false; };
    if(mouseDrag == 1) { mouseDrag = true; } else { mouseDrag = false; };
    if(animations != '') { animations = animations; } else { animations = false; };
    if(smartSpeed > 0) { smartSpeed = Number(smartSpeed); } else { smartSpeed = 800; };
    if(autoplaySpeed > 0) { autoplaySpeed = Number(autoplaySpeed); } else { autoplaySpeed = 800; };
    if(autoplayTimeout > 0) { autoplayTimeout = Number(autoplayTimeout); } else { autoplayTimeout = 5000; };
    if(dots == 1) { dots = true; } else { dots = false; };
    if(nav == 1)
    {
        nav = true;
        navText = obj.attr("data-navtext");
        navContainer = obj.attr("data-navcontainer");

        if(navText != '')
        {
            navText = (navText.indexOf("|") > 0) ? navText.split("|") : navText.split(":");
            navText = [navText[0],navText[1]];
        }

        if(navContainer != '')
        {
            navContainer = navContainer;
        }
    }
    else
    {
        nav = false;
    };

    responsive = {
        0: {
            items: Number(xsm_items[0]),
            margin: Number(xsm_items[1])
        },
        576: {
            items: Number(sm_items[0]),
            margin: Number(sm_items[1])
        },
        768: {
            items: Number(md_items[0]),
            margin: Number(md_items[1])
        },
        992: {
            items: Number(lg_items[0]),
            margin: Number(lg_items[1])
        },
        1200: {
            items: Number(xlg_items[0]),
            margin: Number(xlg_items[1])
        }
    };

    obj.owlCarousel({
        rewind: rewind,
        autoplay: autoplay,
        loop: loop,
        lazyLoad: lazyLoad,
        mouseDrag: mouseDrag,
        touchDrag: touchDrag,
        smartSpeed: smartSpeed,
        autoplaySpeed: autoplaySpeed,
        autoplayTimeout: autoplayTimeout,
        dots: dots,
        nav: nav,
        navText: navText,
        navContainer: navContainer,
        responsiveClass: responsiveClass,
        responsiveRefreshRate: responsiveRefreshRate,
        responsive: responsive,
        onChange: function (event) {
            var element = event.target;
            var item = event.item.index;
            var videoWrap = $(element)
                .find(".owl-item")
                .eq(item)
                .find(".item-video iframe");
            $(element).trigger('stop.owl.video');
            (videoWrap && videoWrap.remove())
        },
        onChanged: function (event) {
            var element = event.target;
            var item = event.item.index;
            var videoWrap = $(element)
                .find(".owl-item")
                .eq(item)
                .find(".item-video .owl-video-play-icon");
            videoWrap.click() && $(element).trigger("stop.owl.autoplay");
            if (videoWrap.length > 0) {
                $('.slide-text').addClass('mobi-none');
            } else {
                $('.slide-text').removeClass('mobi-none');
            }
        },
    });

    if(autoplay)
    {
        obj.on("translate.owl.carousel", function(event){
            obj.trigger('stop.owl.autoplay');
        });

        obj.on("translated.owl.carousel", function(event){
            obj.trigger('play.owl.autoplay',[autoplayTimeout]);
        });
    }

    if(animations && isExist(obj.find("[owl-item-animation]")))
    {
        var animation_now = '';
        var animation_count = 0;
        var animations_excuted = [];
        var animations_list = (animations.indexOf(",")) ? animations.split(",") : animations;

        obj.on("changed.owl.carousel", function(event){
            $(this).find(".owl-item.active").find("[owl-item-animation]").removeClass(animation_now);
        });

        obj.on("translate.owl.carousel", function(event){
            var item = event.item.index;

            if(Array.isArray(animations_list))
            {
                var animation_trim = animations_list[animation_count].trim();

                if(!animations_excuted.includes(animation_trim))
                {
                    animation_now = 'animate__animated ' + animation_trim;
                    animations_excuted.push(animation_trim);
                    animation_count++;
                }

                if(animations_excuted.length == animations_list.length)
                {
                    animation_count = 0;
                    animations_excuted = [];
                }
            }
            else
            {
                animation_now = 'animate__animated ' + animations_list.trim();
            }
            $(this).find('.owl-item').eq(item).find('[owl-item-animation]').addClass(animation_now);
        });
    }
};

/* Owl Page */
VNS_FRAMEWORK.OwlPage = function(){
    if(isExist($(".owl-page")))
    {
        $(".owl-page").each(function(){
            VNS_FRAMEWORK.OwlData($(this));
        });
    }
};
/* Slick page */
VNS_FRAMEWORK.SlickPage = function(){
    if($(".slick-step").exists())
    {
       $('.slick-step').slick({
        vertical:false,//Chay dọc
        slidesToShow: 3,    //Số item hiển thị
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:false,  //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:false, //Hiển thị mũi tên
        dots:false,  //Hiển thị dấu chấm
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2 ,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
          ]
    });
    $('.step-slick-next').on('click', function() {
        $('.slick-step').slick('slickNext');
      });
   }
   if($(".slick-product").exists())
   {
      $('.slick-product').slick({
       vertical:false,//Chay dọc
       slidesToShow: 4,    //Số item hiển thị
       rows: 2,
       slidesToScroll: 4, //Số item cuộn khi chạy
       autoplay:false,  //Tự động chạy
       autoplaySpeed:3000,  //Tốc độ chạy
       speed:1000,//Tốc độ chuyển slider
       arrows:true, //Hiển thị mũi tên
       dots:false,  //Hiển thị dấu chấm
       responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
      ]
   });

    $('.slick-product-hot-prev').on('click', function() {
        $('.slick-product').slick('slickPrev');
    });

       $('.slick-product-hot-next').on('click', function() {
           $('.slick-product').slick('slickNext');
         });
    }
    if($(".slick-product2").exists())
    {
       $('.slick-product2').slick({
        vertical:false,//Chay dọc
        slidesToShow: 4,    //Số item hiển thị
        rows: 2,
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:false,  //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:true, //Hiển thị mũi tên
        dots:false,  //Hiển thị dấu chấm
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
          ]
    });

     $('.slick-product2-hot-prev').on('click', function() {
         $('.slick-product2').slick('slickPrev');
     });

        $('.slick-product2-hot-next').on('click', function() {
            $('.slick-product2').slick('slickNext');
          });
     }
     if($(".slick-product3").exists())
     {
        $('.slick-product3').slick({
         vertical:false,//Chay dọc
         slidesToShow: 8,    //Số item hiển thị
         rows: 2,
         slidesToScroll: 1, //Số item cuộn khi chạy
         autoplay:false,  //Tự động chạy
         autoplaySpeed:3000,  //Tốc độ chạy
         speed:1000,//Tốc độ chuyển slider
         arrows:true, //Hiển thị mũi tên
         dots:false,  //Hiển thị dấu chấm
         responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
              }
            },
            {
                breakpoint: 800,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 1,
                }
              },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
        ]
     });

      $('.slick-product-hot-prev3').on('click', function() {
          $('.slick-product3').slick('slickPrev');
      });

         $('.slick-product-hot-next3').on('click', function() {
             $('.slick-product3').slick('slickNext');
           });
      }
};

// Logo sang loang
function check_email(email)
{
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
};

if($(".form-cart").exists())
{
    $('.btn-cart').click(function (){
        var httt = '';
        if($(".payments-label.active").exists()){
            httt = $(".payments-label.active").parents(".payments-cart").find("input").val();
        }
        var ten = $(".input-cart input[name='ten']").val();
        var dienthoai = $(".input-cart input[name='dienthoai']").val();
        var city = $(".select-city-cart option:selected").val();
        var district = $(".select-district-cart option:selected").val();
        var wards = $(".select-wards-cart option:selected").val();
        var diachi = $(".input-cart input[name='diachi']").val();
        if(httt!='' && ten!='' && dienthoai!='' && city!='' && district!='' && wards!='' && diachi!=''){
         $('#cart-notify').modal('show');
     }
 });
};
$("body").on("change","select.form-pro-detail",function(){
    id = $('#pro-detail-id').val();
    var type = $(".attr-pro-detail").data('type');

    kichthuoc = $('#pro-detail-size').val();
    chatlieu = $('#pro-detail-chatlieu').val();
    somat = $('#pro-detail-somat').val();
    canmang = $('#pro-detail-canmang').val();
    khoanlo = $('#pro-detail-khoanlo').val();
    soduongcung = $('#pro-detail-soduongcung').val();
    hinhdang = $('#pro-detail-hinhdang').val();
    cachthuc = $('#pro-detail-cachthuc').val();
    kieube = $('#pro-detail-kieube').val();
    soluong = $('#pro-detail-soluong').val();
    $.ajax({
        url:'ajax/ajax_combo.php',
        type: "POST",
        dataType: 'json',
        async: false,
        data: {id:id,type:type,kichthuoc:kichthuoc,chatlieu:chatlieu,somat:somat,canmang:canmang,khoanlo:khoanlo,soduongcung:soduongcung,hinhdang:hinhdang,cachthuc:cachthuc,kieube:kieube,soluong:soluong},
        success: function(result){
            $('.pro-detail-total-price span').html(result.totaltext);
            $('#total-price').val(result.total);
        }
    });
});

$("body").on("click",".pro-detail-file a",function(){
    $('.pro-detail-file a').removeClass("active");
    $(this).addClass("active");
    let havefile = $(this).data("file");

    $('#have-file').val(havefile);
});
$("body").on("click","#send-cart",function(){
    id = $('#pro-detail-id').val();
    type = $(".attr-pro-detail").data('type');
    kichthuoc = $('#pro-detail-size').val();
    chatlieu = $('#pro-detail-chatlieu').val();
    somat = $('#pro-detail-somat').val();
    canmang = $('#pro-detail-canmang').val();
    khoanlo = $('#pro-detail-khoanlo').val();
    soduongcung = $('#pro-detail-soduongcung').val();
    hinhdang = $('#pro-detail-hinhdang').val();
    cachthuc = $('#pro-detail-cachthuc').val();
    kieube = $('#pro-detail-kieube').val();
    soluong = $('#pro-detail-soluong').val();

    total  = $('#total-price').val();
    havefile = $('#have-file').val()
    $.ajax({
        url:'ajax/ajax_send_cart.php',
        type: "POST",
        dataType: 'html',
        async: false,
        data: {id:id,type:type,kichthuoc:kichthuoc,chatlieu:chatlieu,somat:somat,canmang:canmang,khoanlo:khoanlo,soduongcung:soduongcung,hinhdang:hinhdang,cachthuc:cachthuc,kieube:kieube,soluong:soluong,havefile:havefile,total:total},
        success: function(result){
            $('.newsletter .modal-body').html(result);
            $('.newsletter').modal('show');
        }
    });
});

/* Cart */
VNS_FRAMEWORK.Cart = function(){


	$("body").on("click",".addcart",function(){
		var mau = ($(".color-pro-detail input:checked").val()) ? $(".color-pro-detail input:checked").val() : 0;
		var size = ($(".size-pro-detail.active input").val()) ? $(".size-pro-detail.active input").val() : 0;
		var id = $(this).data("id");
		var action = $(this).data("action");
		var quantity = ($(".qty-pro").val()) ? $(".qty-pro").val() : 1;
		var type = $(".attr-pro-detail").data('type');
        if($(this).data('type') != undefined){
            type = $(this).data('type');
        }
		if(id)
		{
			$.ajax({
				url:'ajax/ajax_cart.php',
				type: "POST",
				dataType: 'json',
				async: false,
				data: {cmd:'add-cart',id:id,mau:mau,size:size,quantity:quantity,type:type},
				success: function(result){
					if(action=='addnow')
					{
						$('.count-cart').html(result.max);
						$.ajax({
							url:'ajax/ajax_cart.php',
							type: "POST",
							dataType: 'html',
							async: false,
							data: {cmd:'popup-cart'},
							success: function(result){
								$("#popup-cart .modal-body").html(result);
								$('#popup-cart').modal('show');
							}
						});
					}
					else if(action=='buynow')
					{
						window.location = CONFIG_BASE + "gio-hang";
					}
				}
			});
		}
	});

	$("body").on("click",".del-procart",function(){
		if(confirm(LANG['delete_product_from_cart']))
		{
			var code = $(this).data("code");
			var ship = $(".price-ship").val();

			$.ajax({
				type: "POST",
				url:'ajax/ajax_cart.php',
				dataType: 'json',
				data: {cmd:'delete-cart',code:code,ship:ship},
				success: function(result){
					$('.count-cart').html(result.max);
					if(result.max)
					{
						$('.price-temp').val(result.temp);
						$('.load-price-temp').html(result.tempText);
						$('.price-total').val(result.total);
						$('.load-price-total').html(result.totalText);
						$(".procart-"+code).remove();
					}
					else
					{
						$(".wrap-cart").html('<a href="" class="empty-cart text-decoration-none"><i class="fa fa-cart-arrow-down"></i><p>'+LANG['no_products_in_cart']+'</p><span>'+LANG['back_to_home']+'</span></a>');
					}
				}
			});
		}
	});

	$("body").on("click",".counter-procart",function(){
		var $button = $(this);
		var quantity = 1;
		var input = $button.parent().find("input");
		var id = input.data('pid');
		var size = input.data('size');
		var code = input.data('code');
		var type = input.data('type');
		var oldValue = $button.parent().find("input").val();
		if($button.text() == "+") quantity = parseFloat(oldValue) + 1;
		else if(oldValue > 1) quantity = parseFloat(oldValue) - 1;
		$button.parent().find("input").val(quantity);
		update_cart(id,size,type,code,quantity);
	});


	$("body").on("change","input.quantity-procat",function(){
		var quantity = $(this).val();
		var id = $(this).data("pid");
		var code = $(this).data("code");
		var size = $(this).data("size");
		var type = $(this).data("type");
		update_cart(id,size,type,code,quantity);
	});

	$(".attr-pro-detail").each(function(){
		var size = ($(".size-pro-detail.active input").val()) ? $(".size-pro-detail.active input").val() : 0;
		var product = ($(".addnow").data('id')) ? $(".addnow").data('id') : 0;
		var type = $(this).data('type');
		if(size && product && type){
			$.ajax({
				url:'ajax/ajax_size.php',
				type: "GET",
				dataType: 'html',
				data: {size:size,product:product,type:type},
				success: function(result){
					if(result!='')
					{
						$('.attr-price-pro-detail').html(result);
					}
				}
			});
		}
	});

	$("body").on("click",".size-pro-detail",function(){
		var size = ($(".size-pro-detail.active input").val()) ? $(".size-pro-detail.active input").val() : 0;
		var product = ($(".addnow").data('id')) ? $(".addnow").data('id') : 0;
		var type = $(".attr-pro-detail").data('type');
		if(size && product && type){
			$.ajax({
				url:'ajax/ajax_size.php',
				type: "GET",
				dataType: 'html',
				data: {size:size,product:product,type:type},
				success: function(result){
					if(result!='')
					{
						$('.attr-price-pro-detail').html(result);
					}
				}
			});
		}
	});

	if($(".select-city-cart").exists())
	{
		$(".select-city-cart").change(function(){
			var id = $(this).val();
			load_district(id);
			load_ship();
		});
	}

	if($(".select-district-cart").exists())
	{
		$(".select-district-cart").change(function(){
			var id = $(this).val();
			load_wards(id);
			load_ship();
		});
	}

	if($(".select-wards-cart").exists())
	{
		$(".select-wards-cart").change(function(){
			var id = $(this).val();
			load_ship(id);
		});
	}

	if($(".payments-label").exists())
	{
		$(".payments-label").click(function(){
			var payments = $(this).data("payments");
			$(".payments-cart .payments-label, .payments-info").removeClass("active");
			$(this).addClass("active");
			$(".payments-info-"+payments).addClass("active");
		});
	}

	if($(".color-pro-detail").exists())
	{
		$(".color-pro-detail").click(function(){
			$(".color-pro-detail").removeClass("active");
			$(this).addClass("active");

			var id_mau=$("input[name=color-pro-detail]:checked").val();
			var idpro=$(this).data('idpro');
			var type=$(this).data('type');

			$.ajax({
				url:'ajax/ajax_color.php',
				type: "POST",
				dataType: 'html',
				data: {id_mau:id_mau,idpro:idpro,type:type},
				success: function(result){
					if(result!='')
					{
						$('.left-pro-detail').html(result);
						MagicZoom.refresh("Zoom-1");
						VNS_FRAMEWORK.OwlProDetail();
					}
				}
			});
		});
	}

	if($(".size-pro-detail").exists())
	{
		$(".size-pro-detail").click(function(){
			$(".size-pro-detail").removeClass("active");
			$(this).addClass("active");
		});
	}

	if($(".quantity-pro-detail span").exists())
	{
		$(".quantity-pro-detail span").click(function(){
			var $button = $(this);
			var oldValue = $button.parent().find("input").val();
			if($button.text() == "+")
			{
				var newVal = parseFloat(oldValue) + 1;
			}
			else
			{
				if(oldValue > 1) var newVal = parseFloat(oldValue) - 1;
				else var newVal = 1;
			}
			$button.parent().find("input").val(newVal);
		});
	}
};


/* Paging ajax */
VNS_FRAMEWORK.PagingAjax = function(list,element,type,perpage){
    loadPagingAjax("ajax/ajax_paging.php?perpage="+perpage+"&idList="+list+"&type="+type,element);
};

/* Paging product */
VNS_FRAMEWORK.PagingProduct = function(){
    if($(".paging-product-category").exists())
    {
        var list = $(".paging-product-category").data("list");
        VNS_FRAMEWORK.PagingAjax(list, '.paging-product-category', 'product', 8);
        $(".product-list li").click(function(){
            list = $(this).data("list");
            $(".product-list li").removeClass("active");
            $(this).addClass("active");
            VNS_FRAMEWORK.PagingAjax(list, '.paging-product-category', 'product', 8);
        });
    }
};

/* ToggleSearch */
VNS_FRAMEWORK.ToggleSearch = function(){
    if($(".btn-search").exists())
    {
        $(".search_open").click(function(){
            $(".search_box_hide").toggleClass('opening');
        });
    }
};

/*Ajax bản đồ*/
VNS_FRAMEWORK.AjaxBando = function(){
    if($(".click-map.active").exists())
    {
        $(".click-map.active").each(function(){
            var id = $(this).data("id");
            loadPagingAjax("ajax/ajax_bando.php?id="+id,'.load-map');
        });
        $('.click-map').click(function (){
            $(this).parents('.title-map').find('.click-map').removeClass('active');
            $(this).addClass('active');
            var id = $(this).data("id");
            loadPagingAjax("ajax/ajax_bando.php?id="+id, '.load-map');
        });
    }
};

/* Ready */
$(document).ready(function(){
    VNS_FRAMEWORK.Tools();
    VNS_FRAMEWORK.Popup();
    VNS_FRAMEWORK.WowAnimation();
    VNS_FRAMEWORK.AltImages();
    //VNS_FRAMEWORK.BackToTop();
    VNS_FRAMEWORK.FixMenu();
    VNS_FRAMEWORK.Mmenu();
    VNS_FRAMEWORK.OwlPage();
    VNS_FRAMEWORK.OwlProDetail();
    VNS_FRAMEWORK.SlickPage();
    VNS_FRAMEWORK.Toc();
    VNS_FRAMEWORK.Cart();
    VNS_FRAMEWORK.SimplyScroll();
    VNS_FRAMEWORK.Tabs();
    VNS_FRAMEWORK.Videos();
    VNS_FRAMEWORK.Photobox();
    VNS_FRAMEWORK.Search();
	VNS_FRAMEWORK.LogoPeshiner();
    VNS_FRAMEWORK.DatetimePicker();
    VNS_FRAMEWORK.ToggleSearch();
    // VNS_FRAMEWORK.PagingProduct();
    VNS_FRAMEWORK.OwlPage2();
    // VNS_FRAMEWORK.PopupVirtual();
    VNS_FRAMEWORK.SwiperLibary();
});

$(document).ready(function() {
    "use strict";
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function() {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > offset) {
            $('.progress-wrap').addClass('active-progress');
        } else {
            $('.progress-wrap').removeClass('active-progress');
        }
    });
    $('.progress-wrap').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    });
    /* Paging category ajax */
if($(".paging-product-category").exists())
{
    $(".paging-product-category").each(function(){
        var cat = $(this).data("cat");        
        var item = $(this).data("item");    
        var type = $(this).data("type");
        let nameshow = '';
        if(cat != ''){
            nameshow = '.paging-product-category-'+cat ;
        }
        if(item != ''){
            nameshow = '.paging-product-category-'+item ;
        }
        loadPagingAjax("ajax/ajax_product.php?perpage=8&idCat="+cat+"&idItem="+item+"&type="+type,nameshow);
    })
}
});