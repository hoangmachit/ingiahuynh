<?php
/* Ấn phẩm */
$nametype = "an-pham";
$config['product'][$nametype]['title_main'] = "Ấn phẩm";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['item'] = true;
$config['product'][$nametype]['sub'] = false;
$config['product'][$nametype]['tags'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['import'] = true;
$config['product'][$nametype]['options'] = true;
$config['product'][$nametype]['export'] = true;
$config['product'][$nametype]['copy'] = false;
$config['product'][$nametype]['copy_image'] = false;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['donvi'] = true;
$config['product'][$nametype]['images2'] = false;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array
(
    $nametype => array
    (
        "title_main_photo" => "Hình ảnh Ấn phẩm",
        "title_sub_photo" => "Hình ảnh",
        "number_photo" => 3,
        "images_photo" => true,
        "cart_photo" => false,
        "avatar_photo" => true,
        "tieude_photo" => true,
        "width_photo" => 540,
        "height_photo" => 540,
        "thumb_photo" => '540x540x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
    ),
);
$config['product'][$nametype]['ma'] = true;
$config['product'][$nametype]['gia'] = true;
$config['product'][$nametype]['giamoi'] = false;
$config['product'][$nametype]['giakm'] = false;
$config['product'][$nametype]['giatext'] = false;
$config['product'][$nametype]['dientich'] = false;
$config['product'][$nametype]['huong'] = false;
$config['product'][$nametype]['diachi'] = false;
$config['product'][$nametype]['motangan'] = true;
$config['product'][$nametype]['mota'] = true;
$config['product'][$nametype]['mota_cke'] = true;
$config['product'][$nametype]['motangan2'] = true;
$config['product'][$nametype]['motangan2_cke'] = false;
$config['product'][$nametype]['noidung'] = true;
$config['product'][$nametype]['noidung_cke'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 540;
$config['product'][$nametype]['height'] = 511;
$config['product'][$nametype]['thumb'] = '540x511x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Ấn phẩm (List) */
$config['product'][$nametype]['title_main_list'] = "Ấn phẩm cấp 1";
$config['product'][$nametype]['images_list'] = true;
$config['product'][$nametype]['show_images_list'] = true;
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['check_list'] = array("noibat" => "Menu");
$config['product'][$nametype]['gallery_list'] = array();
$config['product'][$nametype]['mota_list'] = false;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['width_list'] = 300;
$config['product'][$nametype]['height_list'] = 200;
$config['product'][$nametype]['thumb_list'] = '300x200x1';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Ấn phẩm (Cat) */
$config['product'][$nametype]['title_main_cat'] = "Ấn phẩm cấp 2";
$config['product'][$nametype]['images_cat'] = true;
$config['product'][$nametype]['show_images_cat'] = true;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['mota_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 101;
$config['product'][$nametype]['height_cat'] = 101;
$config['product'][$nametype]['thumb_cat'] = '101x101x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Ấn phẩm (Item) */
$config['product'][$nametype]['title_main_item'] = "Ấn phẩm cấp 3";
$config['product'][$nametype]['images_item'] = true;
$config['product'][$nametype]['show_images_item'] = true;
$config['product'][$nametype]['slug_item'] = true;
$config['product'][$nametype]['check_item'] = array();
$config['product'][$nametype]['mota_item'] = false;
$config['product'][$nametype]['seo_item'] = true;
$config['product'][$nametype]['width_item'] = 300;
$config['product'][$nametype]['height_item'] = 200;
$config['product'][$nametype]['thumb_item'] = '300x200x1';
$config['product'][$nametype]['img_type_item'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
/* Cửa hàng */
$nametype = "cua-hang";
$config['product'][$nametype]['title_main'] = "Cửa hàng";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['item'] = false;
$config['product'][$nametype]['sub'] = false;
$config['product'][$nametype]['tags'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['import'] = false;
$config['product'][$nametype]['export'] = false;
$config['product'][$nametype]['size'] = false;
$config['product'][$nametype]['price'] = false;
$config['product'][$nametype]['copy'] = false;
$config['product'][$nametype]['copy_image'] = false;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['donvi'] = true;
$config['product'][$nametype]['images2'] = false;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = array
(
    $nametype => array
    (
        "title_main_photo" => "Hình ảnh Cửa hàng",
        "title_sub_photo" => "Hình ảnh",
        "number_photo" => 3,
        "images_photo" => true,
        "cart_photo" => false,
        "avatar_photo" => true,
        "tieude_photo" => true,
        "width_photo" => 540,
        "height_photo" => 540,
        "thumb_photo" => '540x540x1',
        "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
    ),
);
$config['product'][$nametype]['ma'] = true;
$config['product'][$nametype]['gia'] = true;
$config['product'][$nametype]['giamoi'] = false;
$config['product'][$nametype]['giakm'] = false;
$config['product'][$nametype]['giatext'] = false;
$config['product'][$nametype]['dientich'] = false;
$config['product'][$nametype]['huong'] = false;
$config['product'][$nametype]['diachi'] = false;
$config['product'][$nametype]['motangan'] = true;
$config['product'][$nametype]['mota'] = true;
$config['product'][$nametype]['mota_cke'] = true;
$config['product'][$nametype]['noidung'] = true;
$config['product'][$nametype]['noidung_cke'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 540;
$config['product'][$nametype]['height'] = 511;
$config['product'][$nametype]['thumb'] = '540x511x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Cửa hàng (List) */
$config['product'][$nametype]['title_main_list'] = "Cửa hàng cấp 1";
$config['product'][$nametype]['images_list'] = true;
$config['product'][$nametype]['show_images_list'] = true;
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['check_list'] = array();
$config['product'][$nametype]['gallery_list'] = array();
$config['product'][$nametype]['mota_list'] = false;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['width_list'] = 300;
$config['product'][$nametype]['height_list'] = 200;
$config['product'][$nametype]['thumb_list'] = '300x200x1';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Cửa hàng (Cat) */
$config['product'][$nametype]['title_main_cat'] = "Cửa hàng cấp 2";
$config['product'][$nametype]['images_cat'] = true;
$config['product'][$nametype]['show_images_cat'] = true;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = array();
$config['product'][$nametype]['mota_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 300;
$config['product'][$nametype]['height_cat'] = 200;
$config['product'][$nametype]['thumb_cat'] = '300x200x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
?>