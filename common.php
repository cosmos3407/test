<?php

// 오류 표시 설정 (개발 중에만 사용, 실제 서버에는 사용하지 않는 것이 좋음)
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

define('CSS', '/css');
define('JS', '/js');
define('CODE', 'jcw');
// 현재 서버 주소 
$currentSiteURL = 'https';
$currentSiteURL .= '://' . $_SERVER['HTTP_HOST'];

// 현재 서버 주소 URL 정의
define('URL', $currentSiteURL);

// 현재 서버의 CSS주소 URL 정의 
define('CSS_URL', $currentSiteURL . CSS);

// 현재 서버의 JS주소 URL 정의
define('JS_URL', $currentSiteURL . JS);
// 현재 서버 주소 반환
$serverPath = __DIR__;
define('SERVER', $serverPath);

function alert($msg, $url)
{
    echo "<script>
    alert('" . $msg . "');
    location.href='" . $url . "';
    </script>";
}

// 예시 사이트 https://s.click.aliexpress.com/e/_DlAyOmD
// 예시 img img/test.jpg
// 

/*
211.15.33.219
원격포트 22
root//jcw@4321@!
*/
/*
$username = 'siron1';
$password = 'Siron123!@#';
*/
?>