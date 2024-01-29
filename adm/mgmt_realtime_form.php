<?php
include_once('header.php');
?>
<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>실시간 섹션 광고 수정</h2>
            <p class="lead"></p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-12">
                <form name="uploadForm" id="uploadForm" method="post" action="mgmt_save_form_update.php" enctype="multipart/form-data">
                <!-- onsubmit="return formSubmit(this);" -->
                <input type="hidden" name="APND_FILE_CATE" value="3">
                    <h4 class="mb-3">상단배너</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" name="top_upfile" placeholder="" value="" required>
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <input type="text" class="form-control" name="top_link" placeholder="" value="" >
                        </div>
                    </div>
                    <h4 class="mb-3">중간 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" name="mid_upfile" placeholder="" value="" required>
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <input type="text" class="form-control" name="mid_link" placeholder="" value="" >
                        </div>
                    </div>
                    <h4 class="mb-3">팝업 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" name="popup_upfile" placeholder="" value="" required>
                        </div>


                        <div class="col-sm-6">
                            <label for="link" class="form-label">링크</label>
                            <input type="text" class="form-control" name="popup_link" placeholder="" value="" >
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