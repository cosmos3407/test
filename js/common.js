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
});

// $(".adver").hide(); //우선 배너는 안보이게끔 숨긴다.
$(".header .down").on("click", function () {
  console.log("te");
  // 버튼을 클릭했을 때
  $(".banner").slideToggle(300); //토글작동!!
  return false;
});

$(".bottom_right_banner_close").on("click", function () {
  console.log("te");
  // 버튼을 클릭했을 때
  $(".bottom_right_banner").toggle("slide", { direction: "left" }, 300);
  return false;
});
