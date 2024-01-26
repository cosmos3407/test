<?php
include_once('../common.php');


?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Checkout example · Bootstrap v5.3</title>
    <link href="<?= CSS_URL ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?= CSS_URL ?>/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?= JS_URL ?>/bootstrap.js"></script>
    <script src="<?= JS_URL ?>/bootstrap.min.js"></script>
    <script src="<?= JS_URL ?>/color-modes.js"></script>
    <style>
        .container {
            max-width: 960px;
        }
    </style>
    <script>
        $(document).ready(function() {
            console.log("hello");
        })

        function menuMove(menu) {
            console.log(menu)
            $.ajax({
                url: "controller.php",
                type: "post",
                data: {
                    menu: menu
                },
                success: function(result) {
                    console.log(result);
                    console.log(this);
                    switch (result) {
                        case "save":
                            location.href = "mgmt_save_form.php";
                            break;
                        case "ranking":
                            location.href = "mgmt_ranking_form.php";
                            break;
                        case "realtime":
                            location.href = "mgmt_realtime_form.php";
                            break;
                        default:
                            break;
                    }
                    $(this).addClass('active');
                }
            })
        }
    </script>
</head>


<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="save nav-link" href='javascript:menuMove("save");'>저장</a>
                    </li>
                    <li class="nav-item">
                        <a class="ranking nav-link" href='javascript:menuMove("ranking");'>랭킹</a>
                    </li>
                    <li class="nav-item">
                        <a class="live nav-link" href='javascript:menuMove("realtime");'>실시간</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>