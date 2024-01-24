<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.ico">
    <link rel="canonical" href="https://twi-save.com/ranking_t.php">
    <link rel="alternate" href="https://twi-save.com/ranking_t.php" hreflang="ja" />
    <link rel="alternate" href="https://twi-save.com/ranking_t.php" hreflang="ko" />
    <title>트윗저장고 랭킹!</title>
    <link rel="stylesheet" type="text/css" href="twirank.css">
    <meta name="ROBOTS" content="INDEX,FOLLOW" />
    <meta name="keywords" content="Twitter,트위터,다운로드,저장">
    <meta name="description" content="이 사이트에서는 트윗저장고사이트에서 저장된 트윗저장고 랭킹입니다.">
    <meta property="og:title" content="트위터 실시간 랭킹 영상과 동영상 다운로드와 저장은 트위세이브 ">
    <meta property="og:description" content="트위터 실시간 랭킹 원본 동영상을 간단하게 저장할 수 있습니다. 다운로드 하실 트위터 영상을 고화질로 즐기세요">
    <meta property="og:url" content="https://twi-save.com/ranking_t.php">
    <meta property="og:image" content="https://twi-save.com/img/twiranking.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="NURUMAYU">
    <meta name="viewport" content="width=device-width, user-scalable=1" />
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C803NGZCN4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            //dataLayer.push(arguments);
        }
        //gtag('js', new Date());

        //gtag('config', 'G-C803NGZCN4');
    </script>
</head>

<body style="background-color: #a4dbf7;">
    <header>
        <!--<script type="text/javascript" src="https://www.twidouga.net/ko/js/inste.js"></script>
<script type="text/javascript" src="https://js.waqool.com/t/029/856/a90029856.js"></script>-->
        <div id="headertop">
            <div style="display:inline-flex">
                <div id="nav">
                    <ul>
                        <li><a href="https://twi-save.com/index.php">저장</a></li>
                        <li id="here" style="padding-top: 1px;"><b>랭킹</b></li>
                        <li><a href="https://twi-save.com/realtime_t.php">실시간</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="headerlogo">
            <a href="https://twi-save.com/ranking_t.php"><img src="img/twiranking.png" alt="twirank" weight="290" class="photo" style="margin-top: 6px;"></a>
        </div>
    </header>
    <div id="wrap">
        <h2 style="margin-top: 0px; margin-bottom: 0px;">트윗저장고 랭킹!</h2>
        <form name="fm">
            <select name="s" onchange="sample()" style="display:none;font-size:12px;">
            </select>
        </form>
        <script type="text/javascript">
            function sample() {
                var browser = document.fm.s.value;
                location.href = browser;
            }
        </script>
        <!--<script type="text/javascript" data-cfasync="false" async src="https://poweredby.jads.co/js/jads.js"></script>-->
        <ins id="929114" data-width="300" data-height="262"></ins>
        <!--<script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':929114});</script>-->
        <br>
        <table width="300" border="1">
            <tr>
                <td width="150" bgcolor="1AD2FF">
                    <a href="https://twi-save.com/ranking_t.php?index=0">주간랭킹</a>
                </td>
                <td width="150" bgcolor="EEFCFF">
                    <a href="https://twi-save.com/ranking_t.php?index=1">월간랭킹</a>
                </td>
            </tr>
        </table>
        <?php
        require "connection.php";

        $db_obj = new connection;

        $title = "";
        $video_link = "";
        $preview_image_url = "";
        $index = "0";
        $count = 10;

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $index = $_REQUEST["index"];
        }

        if ($index == "0") {
            $current_date = date('Y-m-d');
            $timestamp = strtotime("-5 days");
            $before_date = date("Y-m-d", $timestamp);
            $ph_where = "SELECT title, COUNT(title) as times, twitter_link, video_link, preview_image_url FROM tb_video where Date(create_date) BETWEEN '$before_date' AND '$current_date' GROUP BY title order by COUNT(title) desc";
            $user_detail = $db_obj->select_where($ph_where);
            $positioin = 0;
            if (count($user_detail) > 0) {
                for ($i = 0; $i < count($user_detail); $i++) {
                    $item = $user_detail[$i];
                    $arr = explode("https://t.co", $item["title"]);
                    $positioin = $i + 1;
                    $rank_index = 0;
                    if ($positioin >= 4) {
                        $rank_index = 4;
                    } else {
                        $rank_index = $positioin;
                    }
                    echo "<br>";
                    echo "<img src='img/rank" . $rank_index . ".png'>" . $positioin . "위<img src='img/rank" . $rank_index . ".png'>";
                    echo "<br>";
                    echo "<a href='" . $item["twitter_link"] . "' target='_blank'>" . $arr[0] . "</a>&nbsp;&nbsp;" . $item["times"] . "회저장";
                    echo "<br>";
                    echo "<div class='gazou'>";
                    echo "<div class='poster'>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='" . $item["preview_image_url"] . "' alt width='300' border='0' style='border-radius: 15px;' /></a>";
                    echo "</div>";
                    echo "<div class='saisei'>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='img/saisei.png'></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'>동영상URL</a><br>";
                    echo "<br>";
                }
            }
        } else {
            $current_date = date('Y-m-d');
            $timestamp = strtotime("-30 days");
            $before_date = date("Y-m-d", $timestamp);
            $ph_where = "SELECT title, COUNT(title) as times, twitter_link, video_link, preview_image_url FROM tb_video where Date(create_date) BETWEEN '$before_date' AND '$current_date' GROUP BY title order by COUNT(title) desc";
            $user_detail = $db_obj->select_where($ph_where);
            $positioin = 0;
            if (count($user_detail) > 0) {
                for ($i = 0; $i < count($user_detail); $i++) {
                    $item = $user_detail[$i];
                    $arr = explode("https://t.co", $item["title"]);
                    $positioin = $i + 1;
                    $rank_index = 0;
                    if ($positioin >= 4) {
                        $rank_index = 4;
                    } else {
                        $rank_index = $positioin;
                    }
                    echo "<br>";
                    echo "<img src='img/rank" . $rank_index . ".png'>" . $positioin . "위<img src='img/rank" . $rank_index . ".png'>";
                    echo "<br>";
                    echo "<a href='" . $item["twitter_link"] . "' target='_blank'>" . $arr[0] . "</a>&nbsp;&nbsp;" . $item["times"] . "회저장";
                    echo "<br>";
                    echo "<div class='gazou'>";
                    echo "<div class='poster'>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='" . $item["preview_image_url"] . "' alt width='300' border='0' style='border-radius: 15px;' /></a>";
                    echo "</div>";
                    echo "<div class='saisei'>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='img/saisei.png'></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='" . $item["video_link"] . "' target='_blank'>동영상URL</a><br>";
                    echo "<br>";
                }
            }
        }
        ?>

        <!--<script type="text/javascript" data-cfasync="false" async src="https://poweredby.jads.co/js/jads.js"></script>-->
        <ins id="929112" data-width="300" data-height="262"></ins>
        <!--<script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':929112});</script>-->

        <br>
        <table width="300" border="1">
            <tr>
                <td width="150" bgcolor="1AD2FF">
                    <a href="https://twi-save.com/ranking_t.php?index=0">주간랭킹</a>
                </td>
                <td width="150" bgcolor="EEFCFF">
                    <a href="https://twi-save.com/ranking_t.php?index=1">월간랭킹</a>
                </td>
            </tr>
        </table>
        <br>
        <!--
<ul class="share-buttons">
<li><a href="https://line.me/R/msg/text/?트위터동영상저장 랭킹!https://www.twidouga.net/ko/ranking_t.php"><img src="img/Line.png" alt="LINEで送る"><script type="text/javascript">new media_line_me.LineButton({"pc":true,"lang":"ja","type":"a"});</script></a></li>
<li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fwww.twidouga.net%2Fko%2Franking_t.php&text=:%20https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Franking_t.php" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="img/Twitter.png"></a></li>
<br><br>
<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.twidouga.net%2Fko%2Franking_t.php&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="img/Facebook.png"></a></li>
<li><a href="https://plus.google.com/share?url=https%3A%2F%2Fwww.twidouga.net%2Fko%2Franking_t.php" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="img/Google+.png"></a></li>
<li><a href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.twidouga.net%2Fko%2Franking_t.php&description=" target="_blank" title="Pin it" onclick="window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="img/Pinterest.png"></a></li>
</ul>
-->
        <br>
        <div id="box">
            <p>【사이트 설명】
            <p style="margin-left: 10px; margin-right: 10px;">
                이 사이트에서는 <a href="https://x.com/twiiter_save/" target="_blank">【트위터 저장소】</a>에서 저장된 트위터동영상 랭킹입니다.
                <br>
                랭킹을 1위~10위 ・ 11위~20위까지 실시간으로 업데이트하고 있습니다.
                <br>
                유저명의 링크는 원래의 트위터그램, 동영상 링크는 저장할 수 있는 상태인 동영상 링크입니다.
                <br>
                ※동영상 저장은 개인적인 소장을 위한 목적으로 이용해주시기 바랍니다.
            </p>
        </div>
    </div>
    <footer>
        Copyright&copy; <a href="https://x.com/twiiter_save/">TWI_SAVE</a>, 2023 All Rights Reserved
        <div id="footerlast">
            &nbsp;
        </div>
    </footer>
    <!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.slim.min.js"></script>
<script src="jquery.lazyload.js"></script>
<script src="lazy.js"></script>
<script src="js/autoloading.js"></script>-->
</body>

</html>