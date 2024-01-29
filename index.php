<?php
require "connection.php";

function file_download($target_Dir, $file)
{
    $down = $target_Dir . $file;
    $filesize = filesize($down);

    if (file_exists($down)) {
        header("Content-Type:application/octet-stream");
        header("Content-Disposition:attachment;filename=$file");
        header("Content-Transfer-Encoding:binary");
        header("Content-Length:" . filesize($target_Dir . $file));
        header("Cache-Control:cache,must-revalidate");
        header("Pragma:no-cache");
        header("Expires:0");
        if (is_file($down)) {
            $fp = fopen($down, "r");
            while (!feof($fp)) {
                $buf = fread($fp, 8096);
                $read = strlen($buf);
                print($buf);
                flush();
            }
            fclose($fp);
        }
    } else {
        echo $down . "error";
    }
}


$db_obj = new connection;

$title = "";
$video_link = "";
$preview_image_url = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $twitter_link = $_REQUEST["para"];
    $arr = explode("/status/", $_REQUEST["para"]);
    if (count($arr) == 2) {
        $new_arr = explode("?", $arr[1]);
        $tweet_id = "";

        if (count($new_arr) == 2) {
            $tweet_id = $new_arr[0];
        } else {
            $tweet_id = $arr[1];
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/tweets/' . $tweet_id . '?expansions=attachments.media_keys&media.fields=variants,preview_image_url',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAAIaqwEAAAAAhK27WY6QmX3UozQznXzdp3PxFtU%3DRzAXlXymRKZH0GmtQTK2q9kmdaU2ZJxZgARNzKbyeYmVTkHWvM'
            ),
        )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        $object = json_decode($response);
        if (isset($object->data)) {
            $title = $object->data->text;
            if ($video_link = $object->includes->media[0]->type == "video") {
                $video_link = $object->includes->media[0]->variants[1]->url;
                /*
        $filename = sprintf("%06d",rand(000000,999999)).".mp4";

        file_put_contents("video/".$filename, file_get_contents($video_link));
        file_download("video/", $filename);
*/
                $preview_image_url = $object->includes->media[0]->preview_image_url;

                $create_at = date('Y-m-d H:i:s');

                $data = "INSERT INTO tb_video(title, twitter_link, video_link, preview_image_url, create_date) VALUES('$title', '$twitter_link', '$video_link', '$preview_image_url', '$create_at')";
                $result = $db_obj->insert($data);
            }
        }
    }
}

// 추가
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'top' and APND_FILE_CATE = 1 LIMIT 1"))) {
    $top_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'top' and APND_FILE_CATE = 1 LIMIT 1");
    $top = $top_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'mid' and APND_FILE_CATE = 1 LIMIT 1"))) {
    $mid_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'mid' and APND_FILE_CATE = 1 LIMIT 1");
    $mid = $mid_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'popup' and APND_FILE_CATE = 1 LIMIT 1"))) {
    $popup_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'popup' and APND_FILE_CATE = 1 LIMIT 1");
    $popup = $popup_data[0];
}
if (!empty($db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'bottom' and APND_FILE_CATE = 1 LIMIT 1"))) {
    $bottom_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'bottom' and APND_FILE_CATE = 1 LIMIT 1");
    $bottom = $bottom_data[0];
}
$dir = "/uploads/";

//print_r($object);
//print_r($object->includes->media[0]->variants[1]);
//echo $object->data->text;
//echo "<br/>";
//echo  $object->includes->media[0]->variants[1]->url;

?>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.ico">
    <title>트윗저장고</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="ROBOTS" content="INDEX,FOLLOW" />
    <meta name="keywords" content="Twitter,트위터,다운로드,동영상,저장">
    <meta name="description" content="이 웹 사이트에서 트위터 동영상을 다운로드 할 수 있습니다. 
전용어플 없이 저장할 수 있어, 누구나 쉽게 이용하실 수 있습니다. 
아이폰 , 안드로이드 , PC 에서도 적용 가능하오니 안심해서 이용하실 수 있습니다." />
    <meta property="og:type" content="website">
    <meta property="og:title" content="트위터 실시간 랭킹 영상과 동영상 다운로드와 저장은 트위세이브 ">
    <meta property="og:description" content="트위터 실시간 랭킹 원본 동영상을 간단하게 저장할 수 있습니다. 다운로드 하실 트위터 영상을 고화질로 즐기세요">
    <meta property="og:image" content="img/twidouga.png">
    <meta property="og:url" content="https://twi-save.com/index.php">
    <meta name="viewport" content="width=device-width, user-scalable=1" />
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <script type="text/javascript" src="https://static.criteo.net/js/ld/publishertag.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        /*
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66101275-2', 'auto');

  ga('send', 'pageview');
*/
    </script>
    <!-- 추가부분 -->
    <link rel="stylesheet" type="text/css" href="css/popup.css?after">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="/js/common.js"></script>
    <!-- 추가부분 -->
</head>

<body style="background-color: #a4dbf7;">


    <script type="application/javascript">
        var adConfig = {
            "idzone": 4646550,
            "frequency_period": 0,
            "close_after": 3,
            "on_complete": "repeat",
            "branding_enabled": 1,
            "screen_density": 25
        };
        //ExoVideoSlider.init(adConfig);
    </script>

    <?php if(!empty($bottom)) {?>
    <div class="header">
        <!-- 하단 배너 -->
        <div class="banner">
            <a href="<?= $bottom['APND_FILE_LiNK_YN'] == 'Y' ? $bottom['APND_FILE_LiNK'] : '#'?>" target="_blank">
                <!-- <img src="<?= $dir . $bottom['APND_FILE_NM'] ?>"> -->
            </a>
        </div>
    </div>
    <?php } ?>
    
    <?php if(!empty($popup)) {?>
    <!-- popup -->
    <div class="layer_bg">
        <div class="popup">
            <p class="popup_close">x</p>
            <!-- <img src="img/test.jpg"> -->
            <a href="<?= $popup['APND_FILE_LiNK_YN'] == 'Y' ? $popup['APND_FILE_LiNK'] : '#'?>" target="_blank">
            <!-- <img src="<?= $dir . $popup['APND_FILE_NM'] ?>"> -->
            </a>
        </div>
    </div>
    <?php } ?>


    <div class="bottom_right_banner">
        <p class="bottom_right_banner_close">x</p>
        <!-- <img src="img/test.jpg"> -->
    </div>

    <header>
        <div id="headertop">
            <div style="display:inline-flex">
                <div id="nav">
                    <ul>
                        <li class="save popupOpen" id="here" style="padding-top: 1px;"><b>저장</b></li>
                        <li class="ranking popupOpen">랭킹</li>
                        <li class="live popupOpen">실시간</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="headerlogo">
            <a href="https://twi-save.com/index.php"><img src="img/twidouga.png" alt="twidouga" width="320"
                    class="photo"></a>
        </div>
    </header>
    <div id="wrap">
        <h2 style="margin-top: 0px; margin-bottom: 0px;">이 웹 사이트에서 트위터 동영상를 저장할 수 있습니다!</h2>
        <form name="fm">
            <select name="s" onchange="sample()" style="font-size:12px;display:none;">

            </select>
        </form>
        <script type="text/javascript">
            function sample() {
                var browser = document.fm.s.value;
                location.href = browser;
            }
        </script>
        <br>

        <br>
        <div class="pcnone" style="display:none;">
            <script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script>
            <ins class="adsbyexoclick" data-zoneid="4646542"></ins>
            <script>
                (AdProvider = window.AdProvider || []).push({
                    "serve": {}
                });
            </script>
        </div>
        <div class="smanone" style="display:none;">
            <script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script>
            <ins class="adsbyexoclick" data-zoneid="4646544"></ins>
            <script>
                (AdProvider = window.AdProvider || []).push({
                    "serve": {}
                });
            </script>
        </div>
        <div style="margin-bottom: 30px;">
            <!-- <img style="width: 300px;" src="img/test.jpg"> -->
        </div>

        <form name="form" method="post" action="index.php" enctype="multipart/form-data">

            <input type="text" name="para" id="para" size="33" value placeholder="URL을 붙여 넣기" />
            <blockquote class="twitter-tweet"><a
                    href="https://twitter.com/twiiter_save/status/1720036664431738953?s=46&t=iSCnMPTTaFRtiKg4SUFFCg"></a>
            </blockquote>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <br>
            <?php
            if ($video_link != "") {
                echo "<a href=" . $video_link . " target='_blank'>" . $video_link . "</a><br>";
            } else {
                echo "<a href target='_blank'></a><br>";
            }
            ?>

            <br>
            <?php
            if ($video_link != "") { ?>
                <div class="gazou">
                    <div class="poster">
                        <?php
                        if ($video_link != "") {
                            echo "<a href=" . $video_link . " target='_blank'><img src=" . $preview_image_url . " alt width='300' border='0' style='border-radius: 15px;' /></a>";
                        } else {
                            echo "<a href target='_blank'><img src alt width='300' border='0' style='display:invisible;border-radius: 15px;'/></a>";
                        }
                        ?>
                    </div>
                    <div class="saisei">
                        <?php
                        if ($video_link != "") {
                            echo "<a href=" . $video_link . " target='_blank'><img src='img/saisei.png'></a>";
                        } else {
                            echo "<a href target='_blank'><img src='img/saisei.png'></a>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            } ?>
            <br>
            <div style="display:inline-flex">
                <input type="submit" id="exec" name="exec" value="추출" />　
                <input type="submit" id="reset" name="reset" value="다시 하기" />
            </div>
        </form>
        <br>
        <div>
            <!-- <iframe style="display:none;" src="https://27934.agatarainpro.com/v2/a/na/if/195111" frameborder="0" scrolling="no" width="300" height="250"></iframe> -->
            <!-- 전면 광고  -->

        </div>
        <br>
        <div class="pcnone">
            <div style="display:inline-flex">
                <a href="Twitter://”"><img src="img/tw_button.png"></a>
            </div>
        </div>
        <div class="smanone">
            <a href="https://www.twitter.com/" target="_blank"><img src="img/tw_botton.png"></a>
        </div>
        <ul class="share-buttons">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Fgettwi.php&t="
                    title="Share on Facebook" target="_blank"
                    onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img
                        src="img/Facebook.png"></a></li>
            <li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Fgettwi.php&text=:%20https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Fgettwi.php"
                    target="_blank" title="Tweet"
                    onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img
                        src="img/Twitter.png"></a></li>
            <li><a href="https://plus.google.com/share?url=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Fgettwi.php"
                    target="_blank" title="Share on Google+"
                    onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img
                        src="img/Google+.png"></a></li>
            <li><a href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Fwww.nurumayu.net%2Fko%2Ftwidouga%2Fgettwi.php&description="
                    target="_blank" title="Pin it"
                    onclick="window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><img
                        src="img/Pinterest.png"></a></li>
        </ul>
        <br>
        <div id="box">
            <p>【사이트 설명】
            <p style="margin-left: 10px; margin-right: 10px;">
                이 웹 사이트에서 트위터 동영상를 저장할 수 있습니다.
                <br>전용어플 없이 저장할 수 있어, 누구나 쉽게 이용하실 수 있습니다.
                <br>아이폰 , 안드로이드 , PC 에서도 적용 가능하오니 안심해서 이용하실 수 있습니다.
                <br>※개인소장 용도로 이용하시기 바랍니다.
            </p>
            <p>【저장하는 방법】</p>
            <ol>
                <li>저장할 트위터 동영상의 URL을 복사하십시오.</li>
                <li>【URL붙여놓기】란에 URL을 붙여놓고 【추출】버튼 누르기.</li>
                <li>아래쪽에 동영상URL과 동영상이 표시됩니다.</li>
                <li>PC를 이용하시는 분께서는, 동영상 혹은 URL을 클릭하여 저장하실 수 있습니다.</li>
            </ol>
            <br>
            <center><a href="img/twiurl.png" target="_blank"><img src="img/twiurl.png" alt="howto" width="90%"></a>
            </center>
            <br>
            【아이폰】
            <ul>
                <li>아이폰의 경우 , 미리 앱:Dropbox을 설치하세요.
                <li>동영상URL을 탭하여, 열기.
                <li>ACTIVITY 에서, DropBox로 동영상를 저장할 수 있습니다.
                    <br><br>
                    【DropBox 다운로드】<br>
                    <div style="display:inline-flex">
                        <a href="https://itunes.apple.com/ko/app/dropbox/id327630330?mt=8" target="_blanc"> <img
                                src="img/btn-apple.png" style="max-width:100px;"></a>&nbsp;&nbsp;&nbsp;
                        <a href="https://play.google.com/store/apps/details?id=com.dropbox.android" target="_blanc"><img
                                src="img/btn-google.png" style="max-width:100px;"></a>
            </ul>
            <center><a href="img/dougaip.png" target="_blank"><img src="img/dougaip.png" alt="howto" width="60%"></a>
            </center>
            <br>
            【안드로이드】
            <ul>
                <li>안드로이드폰을 이용하시는 분께서는, URL을 길게 누르시고 링크를 저장. 안되시는 경우 URL을 길게 누르시고 복사한 후에 Clip box를 열어 주세요.
                <li>「Clip」메뉴에서 복사하신 URL을 붙여놓기 하시면 됩니다.<br><br>
                    【Clipbox 다운로드】<br>
                    <div style="display:inline-flex">
                        <a href="https://itunes.apple.com/ko/app/clipbox/id437758919?mt=8&at=1001laxu" target="_blanc">
                            <img src="img/btn-apple.png" style="max-width:100px;"></a>&nbsp;&nbsp;&nbsp;
                        <a href="https://play.google.com/store/apps/details?id=jp.co.granks.clipbox4Gp "
                            target="_blanc"><img src="img/btn-google.png" style="max-width:100px;"></a>
                    </div>
                </li>
            </ul>
            <br>
        </div>
        <br>
        <div style="display:none;">

        </div>
        <p>
    </div>
    <footer>
        Copyright&copy; <a href="https://x.com/twiiter_save/">TWI_SAVE</a>, 2023 All Rights Reserved
        <div id="footerlast">
            &nbsp;
        </div>
    </footer>

    <link rel="stylesheet" type="text/css" href="jquery.bxslider/jquery.bxslider.css">
    <script src="jquery.bxslider/jquery.bxslider.js"></script>
    <script src="js/autoloading.js"></script>
    <script src="js/jquery.overlayad.js"></script>
    <script>
        $(document).ready(function () {
            console.log("te");
            let url;
            // 팝업 열기
            $(".popupOpen").on("click", function () {
                url = $(this).attr("class").split(" ")[0];
                console.log(url);
                if ($(".layer_bg").css("display") == "none") {
                    $(".layer_bg").show();

                    $("html, body").css({
                        overflow: "hidden",
                        height: "100%",
                    });
                }
            });

            // 팝업 닫기
            $(".popup_close").on("click", function () {
                console.log("popup_close");
                if ($(".layer_bg").css("display") != "none") {
                    $(".layer_bg").hide();
                    // $('body').off('scroll touchmove mousewheel');
                }
                $("html, body").css({
                    overflow: "scroll",
                });

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


            // $(".adver").hide(); //우선 배너는 안보이게끔 숨긴다.
            $(".header .down").on("click", function () {
                console.log("te");
                // 버튼을 클릭했을 때
                $(".banner").slideToggle(300); //토글작동!!
                return false;
            });

            $(".bottom_right_banner_close").on("click", function () {
                // 버튼을 클릭했을 때
                $(".bottom_right_banner").slideToggle(600); //토글작동!!
                return false;
            });
        });
    </script>

</body>

</html>