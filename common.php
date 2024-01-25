<?php
define('CSS','/css');
define('JS','/js');

// 현재 서버 주소 
$currentSiteURL = 'https';
$currentSiteURL .= '://' . $_SERVER['HTTP_HOST'];

// 현재 서버 주소 URL 정의
define('URL',$currentSiteURL);

// 현재 서버의 CSS주소 URL 정의 
define('CSS_URL',$currentSiteURL.CSS);

// 현재 서버의 JS주소 URL 정의
define('JS_URL',$currentSiteURL.JS);
// 현재 서버 주소 반환
$serverPath = __DIR__;
define('SERVER',$serverPath);

// 예시 사이트 https://s.click.aliexpress.com/e/_DlAyOmD
// 예시 img img/test.jpg
// 

/*
211.15.33.219
원격포트 22
root//jcw@4321@!
*/
?>