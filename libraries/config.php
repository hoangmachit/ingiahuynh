<?php
if(!defined('LIBRARIES')) die("Error");

/* Root */
define('ROOT',__DIR__);

/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');

/* Cấu hình coder */
define('VNS_MSHD','MSHD');

/* Cấu hình chung */
$config = array(
	'author' => array(
		'name' => 'Đỗ Tấn Phát',
		'email' => 'tanphat.vinasoftware@gmail.com',
		'timefinish' => '09/2022'
	),
	'arrayDomainSSL' => array("ingiahuynh.dev"),
	'database' => array(
		'server-name' => $_SERVER["SERVER_NAME"],
		'url' => '/',
		'type' => 'mysql',
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'ingiahuynh',
		'port' => 3306,
		'prefix' => 'table_',
		'charset' => 'utf8'
	),
	'website' => array(
		'error-reporting' => false,
		'secret' => '$vina@',
		'salt' => '4nGM$`98Pn',
		'default_pass' => '55cda80d',
		'default_md5' => 'acfb2f117fc5c3326d57a3091d29ab09',
		'debug-developer' => true,
		'debug-css' => true,
		'debug-js' => true,
		'mailhost' => true,
		'index' => false,
		'upload' => array(
			'max-width' => 1600,
			'max-height' => 1600
		),
		'lang' => array(
			'vi'=>'Tiếng Việt',
				// 'en'=>'Tiếng Anh'
		),
		'lang-doc' => 'vi|en',
		'slug' => array(
			'vi'=>'Tiếng Việt',
				// 'en'=>'Tiếng Anh'
		),
		'seo' => array(
			'vi'=>'Tiếng Việt',
				// 'en'=>'Tiếng Anh'
		),
		'comlang' => array(
			"gioi-thieu" => array("vi"=>"gioi-thieu"),
			"san-pham" => array("vi"=>"san-pham"),
			"tin-tuc" => array("vi"=>"tin-tuc"),
			"thu-vien-anh" => array("vi"=>"thu-vien-anh"),
			"video" => array("vi"=>"video"),
			"lien-he" => array("vi"=>"lien-he")
		)
	),

	'googleAPI' => array(
		'recaptcha' => array(
			'active' => true,
			'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
			'sitekey' => '6LfFTp0lAAAAAGkAE4WVbPvzrZoQPrIWhKbYqQlP',
			'secretkey' => '6LfFTp0lAAAAAC4IBox7DDx-XzPA7I1XH7YcMh7E'
		)
	),
	'cart' => array(
		'active' => false ,
	),
	'order' => array(
		'ship' => false
	),
	'oneSignal' => array(
		'active' => false,
		'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
		'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
	),
	'login' => array(
		'admin' => 'LoginAdmin'.VNS_MSHD,
		'member' => 'LoginMember'.VNS_MSHD,
		'attempt' => 5,
		'delay' => 15
	),
	'license' => array(
		'version' => "7.0.0",
		'powered' => ""
	)
);

/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

/* Cấu hình base */
require_once LIBRARIES."checkSSL.php";
$http = getProtocol();
// $http = 'https://';
$config_url = $config['database']['server-name'].$config['database']['url'];
$config_base = $http.$config_url;

/* Cấu hình login */
$login_admin = $config['login']['admin'];
$login_member = $config['login']['member'];

/* Cấu hình upload */
require_once LIBRARIES."constant.php";
?>