<?php
include_once('../common.php');
require_once "../connection.php";
$db_obj = new connection;
include_once('header.php');

if($_SESSION['mb_level'] != 10){
    alert('잘못된 접근입니다.','index.php');
}

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

$str = "비어있음";
?>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>저장 섹션 광고 수정</h2>
            <p class="lead"></p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-12">
                <form name="uploadForm" id="uploadForm" method="post" action="mgmt_save_form_update.php" enctype="multipart/form-data">
                <!-- onsubmit="return formSubmit(this);" -->
                <input type="hidden" name="APND_FILE_CATE" value="1">
                    <h4 class="mb-3">상단배너</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <label for="firstName" class="form-label"><?= !empty($top['APND_FILE_ORGN_NM']) ? $top['APND_FILE_ORGN_NM'] : $str ?></label>
                            <input type="file" class="form-control" name="top_file" placeholder="" value="" >
                            
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <label for="link" class="form-label"><?= !empty($top['APND_FILE_LiNK']) ? $top['APND_FILE_LiNK'] : $str ?></label>
                            <input type="text" class="form-control" name="top_link" placeholder="" value="<?= !empty($top['APND_FILE_LiNK']) ? $top['APND_FILE_LiNK'] : "" ?>" >
                        </div>
                    </div>
                    <h4 class="mb-3">중간 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <label for="firstName" class="form-label"><?= !empty($mid['APND_FILE_ORGN_NM']) ? $mid['APND_FILE_ORGN_NM'] : $str ?></label>
                            <input type="file" class="form-control" name="mid_file" placeholder="" value="" >
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <label for="link" class="form-label"><?= !empty($mid['APND_FILE_LiNK']) ? $mid['APND_FILE_LiNK'] : $str ?></label>
                            <input type="text" class="form-control" name="mid_link" placeholder="" value="<?= !empty($mid['APND_FILE_LiNK']) ? $mid['APND_FILE_LiNK'] : "" ?>" >
                        </div>
                    </div>
                    <h4 class="mb-3">하단 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <label for="firstName" class="form-label"><?= !empty($bottom['APND_FILE_ORGN_NM']) ? $bottom['APND_FILE_ORGN_NM'] : $str ?></label>
                            <input type="file" class="form-control" name="bottom_file" placeholder="" value="" >
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <label for="link" class="form-label"><?= !empty($bottom['APND_FILE_LiNK']) ? $bottom['APND_FILE_LiNK'] : $str ?></label>
                            <input type="text" class="form-control" name="bottom_link" placeholder="" value="<?= !empty($bottom['APND_FILE_LiNK']) ? $bottom['APND_FILE_LiNK'] : "" ?>" >
                        </div>
                    </div>
                    <h4 class="mb-3">팝업 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <label for="firstName" class="form-label"><?= !empty($popup['APND_FILE_ORGN_NM']) ? $popup['APND_FILE_ORGN_NM'] : $str ?></label>
                            <input type="file" class="form-control" name="popup_file" placeholder="" value="" >
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <label for="link" class="form-label"><?= !empty($popup['APND_FILE_LiNK']) ? $popup['APND_FILE_LiNK'] : $str ?></label>
                            <input type="text" class="form-control" name="popup_link" placeholder="" value="<?= !empty($popup['APND_FILE_LiNK']) ? $popup['APND_FILE_LiNK'] : "" ?>" >
                        </div>
                    </div>
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
        </div>
</div>
</main>

<footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2017–2023 Company Name</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
</footer>
</div>

</body>
<script type="text/javascript">
    function formSubmit(f) {
        var extArray = new Array('hwp', 'xls', 'doc', 'xlsx', 'docx', 'pdf', 'jpg', 'gif', 'png', 'txt', 'ppt', 'pptx');
        var path = document.getElementById("upfile").value;
        if (path == "") {
            alert("파일을 선택해 주세요.");
            return false;
        }

        var pos = path.indexOf(".");
        if (pos < 0) {
            alert("확장자가 없는파일 입니다.");
            return false;
        }

        var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
        var checkExt = false;
        for (var i = 0; i < extArray.length; i++) {
            if (ext == extArray[i]) {
                checkExt = true;
                break;
            }
        }

        if (checkExt == false) {
            alert("업로드 할 수 없는 파일 확장자 입니다.");
            return false;
        }

        return true;
    }
</script>

</html>