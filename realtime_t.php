<html lang="ko">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.ico">
    <link rel="canonical" href="https://twi-save.com/realtime_t.php">
    <link rel="alternate" href="https://twi-save.com/realtime_t.php" hreflang="ko" />
    <link rel="alternate" href="https://twi-save.com/realtime_t.php" hreflang="ja" />
    <title>트윗저장소 실시간100!</title>
    <link rel="stylesheet" type="text/css" href="realtwi.css">
    <meta name="ROBOTS" content="INDEX,FOLLOW" />
    <meta name="description" content="트윗저장소 실시간100!" />
    <meta property="og:title" content="트위터 실시간 랭킹 영상과 동영상 다운로드와 저장은 트위세이브 ">
    <meta property="og:description" content="트위터 실시간 랭킹 원본 동영상을 간단하게 저장할 수 있습니다. 다운로드 하실 트위터 영상을 고화질로 즐기세요">
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
        <!--
<script>
(function(tgsk){
var d = document,
    s = d.createElement('script'),
    l = d.scripts[d.scripts.length - 1];
s.settings = tgsk || {};
s.src = "\/\/wumufama.com\/c\/Do9.6\/bQ2V5Xl\/STWAQI9\/N\/DqYG3yNCD\/kV4zNbyC0\/0qN-jxcG0bO\/TWgF4O";
l.parentNode.insertBefore(s, l);
})({})
</script>
<script type="text/javascript" src="https://www.twidouga.net/ko/js/inste.js"></script>
<script type="text/javascript" src="https://js.waqool.com/t/029/856/a90029856.js"></script>-->
        <div id="headertop">
            <div style="display:inline-flex">
                <div id="nav">
                    <ul>
                        <li><a href="https://twi-save.com/index.php">저장</a></li>
                        <li><a href="https://twi-save.com/ranking_t.php?index=0">랭킹</a></li>
                        <li id="here" style="padding-top: 1px;"><b>실시간</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="headerlogo">
            <a href="https://twi-save.com/realtime_t.php"><img src="img/realtwi100.png" alt="realtime" height="100" class="photo" style="margin-top: 6px;"></a>
        </div>
    </header>
    <div id="wrap">
        <h2 style="margin-top: 0px; margin-bottom: 0px;">트위저장소 실시간100!</h2>
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
        <div style="display:none;">

        </div>
        <!--
<br>
<script type="text/javascript" data-cfasync="false" async src="https://poweredby.jads.co/js/jads.js"></script>
<ins id="929114" data-width="300" data-height="262"></ins>
<script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':929114});</script>
-->
        <br>
        <div id="container" style="display:inline-block">
            <?php
            require "connection.php";

            $db_obj = new connection;

            $title = "";
            $video_link = "";
            $preview_image_url = "";
            $index = "0";
            $count = 10;

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_REQUEST["page"])) {
                    $index = $_REQUEST["page"];
                } else {
                    $index = "1";
                }
            }
            $page = intval($index);
            $ph_where = "SELECT * FROM tb_video where 1 order by id desc";
            $user_detail = $db_obj->select_where($ph_where);
            for ($i = 0; $i < count($user_detail); $i++) {
                if ($i < $count * ($page - 1))
                    continue;
                $item = $user_detail[$i];
                echo "<div class='item item_w180'>";
                echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='" . $item["preview_image_url"] . "' width='180' style='border-radius: 15px;' /></a>";
                echo "<div class='saisei'>";
                echo "<a href='" . $item["twitter_link"] . "' target='_blank'><img src='img/twil.png'/></a>";
                echo "</div></div>";
                if ($i > ($count * ($page)))
                    break;
            }

            ?>
        </div>
        <div class="navigation">
            <a class="nextlink" href="?page=<?php echo ($page + 1); ?>">다음 페이지</a>
        </div>
        <!--
<div>
<a class="nextlink" href="?page=0"><?php echo ($page == 0) ? "<font style='font-weight:bold;' color='red'>1</font>" : "1"; ?></a>
<a class="nextlink" href="?page=1"><?php echo ($page == 1) ? "<font style='font-weight:bold;' color='red'>2</font>" : "2"; ?></a>
<a class="nextlink" href="?page=2"><?php echo ($page == 2) ? "<font style='font-weight:bold;' color='red'>3</font>" : "3"; ?></a>

</div>-->
        <!--
<br>
<ul class="share-buttons">
<li><a href="https://line.me/R/msg/text/?트위터 동영상 저장 실시간100!!https://www.nurumayu.net/ko/twidouga/realtime_t.php"><img src="img/Line.png" alt="LINEで送る"><script type="text/javascript">new media_line_me.LineButton({"pc":true,"lang":"ja","type":"a"});</script></a></li>
<li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Frealtime_t.php&text=:%20https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Frealtime_t.php" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img src="img/Twitter.png"></a></li>
<br><br>
<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Frealtime_t.php&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="img/Facebook.png"></a></li>
<li><a href="https://plus.google.com/share?url=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Frealtime_t.php" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="img/Google+.png"></a></li>
<li><a href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Frealtime_t.php&description=" target="_blank" title="Pin it" onclick="window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img src="img/Pinterest.png"></a></li>
</ul>-->
        <br>
        <div id="box">
            <p>【사이트 설명】
            <p style="margin-left: 10px; margin-right: 10px;">
                해당 사이트는 <a href="https://x.com/twiiter_save/" target="_blank">【트위터 저장소】</a>에서 사용자가 저장한 트위터동영상입니다.
                <br>
            </p>
        </div>
        <footer>
            Copyright&copy; <a href="https://x.com/twiiter_save/">TWI_SAVE</a>, 2023 All Rights Reserved
            <div id="footerlast">
                &nbsp;
            </div>
        </footer>
        <script src="js/autoloading.js"></script>
        <script src="js/jquery.overlayad.js"></script>
</body>

</html>