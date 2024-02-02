<?php
require "connection.php";

$db_obj = new connection;

// 추가
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'top' and APND_FILE_CATE = 3 LIMIT 1"))) {
    $top_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'top' and APND_FILE_CATE = 3 LIMIT 1");
    $top = $top_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'mid' and APND_FILE_CATE = 3 LIMIT 1"))) {
    $mid_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'mid' and APND_FILE_CATE = 3 LIMIT 1");
    $mid = $mid_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'popup' and APND_FILE_CATE = 3 LIMIT 1"))) {
    $popup_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'popup' and APND_FILE_CATE = 3 LIMIT 1");
    $popup = $popup_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'bottom' and APND_FILE_CATE = 3 LIMIT 1"))) {
    $bottom_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'bottom' and APND_FILE_CATE = 3 LIMIT 1");
    $bottom = $bottom_data[0];
}
$dir = "/uploads/";

?>

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

    <!-- 추가부분 -->
    <link rel="stylesheet" type="text/css" href="css/popup.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <script src="/js/common.js"></script> -->
    <!-- 추가부분 -->
</head>

<body style="background-color: #a4dbf7;">
    <header>
        <div id="headertop">
            <div style="display:inline-flex">
                <div id="nav">
                    <ul>
                        <li class="save popupOpen">저장</li>
                        <li class="ranking popupOpen">랭킹</li>
                        <li class="live popupOpen" id="here" style="padding-top: 1px;"><b>실시간</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="headerlogo">
            <a href="https://twi-save.com/realtime_t.php"><img src="img/realtwi100.png" alt="realtime" height="100" class="photo" style="margin-top: 6px;"></a>
        </div>
    </header>
    <!-- 
    <div class="header">
        <div class="banner">
            <a href="#">
                <img src="img/test.jpg">
            </a>
        </div>
    </div> -->




    <?php $ones = 0; ?>
    <div id="wrap">
        <h2 style="margin-top: 0px; margin-bottom: 0px;">트위저장소 실시간100!</h2>

        <script type="text/javascript">
            function sample() {
                console.log("qwe");
                var browser = document.fm.s.value;
                location.href = browser;
            }
        </script>
        <div style="display:none;">

        </div>

        <?php if (!empty($popup)) { ?>
            <!-- popup -->
            <div class="layer_bg" style="display:none">
                <div class="popup" style="position:fixed">
                    <a href="<?= $popup['APND_FILE_LiNK_YN'] == 'Y' ? $popup['APND_FILE_LiNK'] : '#' ?>" <?= $popup['APND_FILE_LiNK_YN'] == 'Y' ? 'target="_blank"' : '' ?>>
                        <p class="popup_close">x</p>
                        <!-- <img src="img/test.jpg"> -->
                        <img class="w100" style="width:350px;" src="<?= $dir . $popup['APND_FILE_NM'] ?>">
                    </a>
                </div>
            </div>
        <?php } ?>

        <!-- popup2 -->
        <?php if (!empty($popup)) { ?>
            <div class="realtime_layer_bg" style="display:none;">
                <div class="realtime_popup" style="position:fixed; display:none;">
                    <a href="<?= $popup['APND_FILE_LiNK_YN'] == 'Y' ? $popup['APND_FILE_LiNK'] : '#' ?>" target="_blank">
                        <p class="realtime_popup_close">x</p>
                        <!-- <img src="img/test.jpg"> -->
                        <img class="w100" style="width:350px;" src="<?= $dir . $popup['APND_FILE_NM'] ?>">
                    </a>
                </div>
            </div>
        <?php } ?>


        <?php if (!empty($bottom)) { ?>
            <div class="header">
                <!-- 하단배너 배너 -->
                <div class="banner">
                    <a href="<?= $bottom['APND_FILE_LiNK_YN'] == 'Y' ? $bottom['APND_FILE_LiNK'] : '#' ?>" target="_blank">
                        <img src="<?= $dir . $bottom['APND_FILE_NM'] ?>">
                    </a>
                </div>
            </div>
        <?php } ?>


        <br>
        <div id="container" style="display:inline-block">
            <?php
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
            if ($page == 3) {
                echo "<script>";
                echo "if ($('.layer_bg').css('display') == 'none') {
                    $('.layer_bg').show();

                    $('html, body').css({
                        'overflow': 'hidden',
                        'height': '100%'
                    });
                }";
                echo "</script>";
            }
            $page = intval($index);
            $ph_where = "SELECT * FROM tb_video where 1 order by id desc";
            $user_detail = $db_obj->select_where($ph_where);
            for ($i = 0; $i < count($user_detail); $i++) {
                if ($i >= ($count * ($page))) break;
                if ($i < $count * ($page - 1)) continue;
                $item = $user_detail[$i];
                echo "<div class='item item_w180'>";
                echo "<a href='" . $item["video_link"] . "' target='_blank'><img src='" . $item["preview_image_url"] . "' width='180' style='border-radius: 15px;' /></a>";
                echo "<div class='saisei'>";
                echo "<a href='" . $item["twitter_link"] . "' target='_blank'><img src='img/twil.png'/></a>";
                echo "</div></div>";
                if ($i == ($count * ($page - 1) + 4)) {
                    $tmp = $top['APND_FILE_LiNK_YN'] == 'Y' ? $top['APND_FILE_LiNK'] : '#';

                    echo "<div class='item item_w180'>";
                    echo '<a href="' . $tmp . '" target="_blank">';
                    echo    '<img style=:"width:100%;" src="' . $dir . $top['APND_FILE_NM'] . '">';
                    echo '</a>';
                    echo "</div>";
                }
                if ($i == ($count * ($page - 1) + 9)) {
                    $tmp = $mid['APND_FILE_LiNK_YN'] == 'Y' ? $mid['APND_FILE_LiNK'] : '#';

                    echo "<div class='item item_w180'>";
                    echo '<a href="' . $tmp . '" target="_blank">';
                    echo    '<img style=:"width:100%;" src="' . $dir . $mid['APND_FILE_NM'] . '">';
                    echo '</a>';
                    echo "</div>";
                }
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


        <!-- <script>
            var targetUrl = "https://s.click.aliexpress.com/e/_DlAyOmD";
            window.open(targetUrl, "_blank");
        </script> -->
        <!-- <script>
            if ($(".layer_bg").css("display") == "none") {
                $(".layer_bg").show();

                $("html, body").css({
                    overflow: "hidden",
                    height: "100%",
                });
            }
        </script> -->
        <!-- <script>
            function nextPage(page) {
                console.log(page);
                location.href = 'realtime_t.php?page=' + <?php echo ($page + 1); ?>;
            }
        </script> -->

        <script src="js/autoloading.js"></script>
        <script src="js/jquery.overlayad.js"></script>
        <!-- <script>
            // jQuery를 사용하여 오버레이 광고 초기화 및 적용
            $(document).ready(function() {
                // overlayAd 플러그인을 사용하여 광고를 초기화합니다.
                $('.overlay-ad-container').overlayAd({
                    position: 'top', // 광고의 위치 (top, bottom 중 선택)
                    mobileStyle: 'responsive', // 모바일 스타일 (responsive, trimming 중 선택)
                    targetBlank: true, // 링크를 새 창에서 열지 여부
                    backgroundStyle: true, // 배경 스타일을 적용할지 여부
                    backgroundColor: 'rgba(1,1,1,1)' // 배경 색상 (rgba 형식)
                });
            });
        </script> -->

</body>
<script>
    $(document).ready(function() {
        console.log("test");
        let url;
        let popup_link = "<?= $popup['APND_FILE_LiNK_YN'] == 'Y' ? $popup['APND_FILE_LiNK'] : 0 ?>";

        if ($(".layer_bg").css("display") == "block") {
            // $("html, body").css({
            //     overflow: "hidden",
            // });
        }

        // 팝업 열기
        $(".popupOpen").on("click", function() {
            url = $(this).attr("class").split(" ")[0];
            console.log(url);
            if ($(".layer_bg").css("display") == "none") {
                $(".layer_bg").show();

                $("html, body").css({
                    overflow: "hidden",
                });
            }
        });

        // 팝업 닫기
        $(".popup_close").on("click", function() {
            console.log("popup_close");
            if ($(".layer_bg").css("display") != "none") {
                $(".layer_bg").hide();
                // $('body').off('scroll touchmove mousewheel');
                $("html, body").css({
                    overflow: "scroll",
                });
            }

            if (popup_link != "0" && popup_link != null) {
                window.open(popup_link, "_blank");
            }
            switch (url) {
                case "save":
                    location.href = "index.php";
                    break;
                case "ranking":
                    location.href = "ranking_t.php?index=0";
                    break;
                case "live":
                    location.href = "realtime_t.php";
                    break;
                default:
                    break;
            }

        });
        $(".bottom_right_banner_close").on("click", function() {
            // 버튼을 클릭했을 때
            $(".bottom_right_banner").slideToggle(600); //토글작동!!
            return false;
        });
    });
</script>

</html>