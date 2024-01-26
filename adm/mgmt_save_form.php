<?php
include_once('header.php');
?>
<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>저장 섹션 광고 수정</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-12">

                <form class="needs-validation" novalidate>
                    <h4 class="mb-3">상단배너</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid 파일 is required.
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">링크</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid 링크 is required.
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">중간 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid 파일 is required.
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">링크</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid 링크 is required.
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-3">팝업 광고</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">파일</label>
                            <input type="file" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">링크</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid 링크 is required.
                            </div>
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

</html>