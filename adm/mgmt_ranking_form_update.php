<?php
require_once "../common.php";
require_once "../connection.php";
$db_obj = new connection;
// APND_FILE_NO
// APND_FILE_CATE 
// APND_FILE_SNO
// APND_FILE_NM
// APND_FILE_ORGN_NM	
// APND_FILE_EXTS_NM
// APND_FILE_PATH
// APND_FILE_SIZE
// APND_FILE_LiNK_YN
// APND_FILE_LiNK

if ($_POST['APND_FILE_CATE'] == 2) {

    $top_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'top' and APND_FILE_CATE = " . $_POST['APND_FILE_CATE']);
    if (!empty($top_data) && ($_FILES['top_file']['size'] != 0)) {
        // print_r($top_data);
        unlink($top_data[0]['APND_FILE_PATH'] . $top_data[0]['APND_FILE_NM']);
        $db_obj->DeleteData("APND_FILE_M", 'APND_FILE_NO = ' . $top_data[0]['APND_FILE_NO']);
        uploadFile('top_file', 'top_link', 'top');

    } else if (!empty($_FILES['top_file']['size'])) {
        uploadFile('top_file', 'top_link', 'top');

    } else if ($_POST['top_link'] != "") {
        updateLink($_POST['top_link'], $top_data[0]['APND_FILE_NO']);
    }

    $mid_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'mid' and APND_FILE_CATE = " . $_POST['APND_FILE_CATE']);
    if (!empty($mid_data) && ($_FILES['mid_file']['size'] != 0)) {
        // print_r($mid_data);
        unlink($mid_data[0]['APND_FILE_PATH'] . $mid_data[0]['APND_FILE_NM']);
        $db_obj->DeleteData("APND_FILE_M", 'APND_FILE_NO = ' . $mid_data[0]['APND_FILE_NO']);
        uploadFile('mid_file', 'mid_link', 'mid');

    } else if (!empty($_FILES['mid_file']['size'])) {
        uploadFile('mid_file', 'mid_link', 'mid');

    } else if ($_POST['mid_link'] != "") {
        updateLink($_POST['mid_link'], $mid_data[0]['APND_FILE_NO']);
    }

    $bottom_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'bottom' and APND_FILE_CATE = " . $_POST['APND_FILE_CATE']);
    if (!empty($bottom_data) && ($_FILES['bottom_file']['size'] != 0)) {
        // print_r($bottom_data);
        unlink($bottom_data[0]['APND_FILE_PATH'] . $bottom_data[0]['APND_FILE_NM']);
        $db_obj->DeleteData("APND_FILE_M", 'APND_FILE_NO = ' . $bottom_data[0]['APND_FILE_NO']);
        uploadFile('bottom_file', 'bottom_link', 'bottom');

    } else if (!empty($_FILES['bottom_file']['size'])) {
        uploadFile('bottom_file', 'bottom_link', 'bottom');

    } else if ($_POST['bottom_link'] != "") {
        updateLink($_POST['bottom_link'], $bottom_data[0]['APND_FILE_NO']);
    }

    $popup_data = $db_obj->select_where_with_param("APND_FILE_M", "APND_FILE_SNO = 'popup' and APND_FILE_CATE = " . $_POST['APND_FILE_CATE']);
    if (!empty($popup_data) && ($_FILES['popup_file']['size'] != 0)) {
        // print_r($popup_data);
        unlink($popup_data[0]['APND_FILE_PATH'] . $popup_data[0]['APND_FILE_NM']);
        $db_obj->DeleteData("APND_FILE_M", 'APND_FILE_NO = ' . $popup_data[0]['APND_FILE_NO']);
        uploadFile('popup_file', 'popup_link', 'popup');

    } else if (!empty($_FILES['popup_file']['size'])) {
        uploadFile('popup_file', 'popup_link', 'popup');

    } else if ($_POST['popup_link'] != "") {
        updateLink($_POST['popup_link'], $popup_data[0]['APND_FILE_NO']);
    }
   
    alert('요청성공', 'mgmt_ranking_form.php');
}

function uploadFile($filename, $linkName, $FILE_SNO)
{
    global $db_obj;
    $file = $_FILES[$filename];
    $link = $_POST[$linkName];
    $APND_FILE_SNO = $FILE_SNO;
    $upload_directory = dirname(__DIR__) . "/uploads/";
    $ext_str = "jpg,webp,gif,jpeg,jfif,png,PNG,JPG";
    $allowed_extensions = explode(',', $ext_str);

    $max_file_size = 5242880;
    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

    // 확장자 체크
    if (!in_array($ext, $allowed_extensions)) {
        //alert('업로드할 수 없는 확장자 입니다.', 'mgmt_save_form.php');
        print_r($allowed_extensions);
        echo $ext;
        exit;
    }

    // 파일 크기 체크
    if ($file['size'] >= $max_file_size) {
        echo "5MB 까지만 업로드 가능합니다.";
        exit;
    }

    $path = md5(microtime()) . '.' . $ext;
    if (move_uploaded_file($file['tmp_name'], $upload_directory . $path)) {

        $array = array(
            'APND_FILE_CATE' => $_POST['APND_FILE_CATE'],
            'APND_FILE_SNO' => $APND_FILE_SNO,
            'APND_FILE_NM' => $path,
            'APND_FILE_ORGN_NM' => $file['name'],
            'APND_FILE_EXTS_NM' => $ext,
            'APND_FILE_PATH' => $upload_directory,
            'APND_FILE_SIZE' => $file['size'],
            // 'reg_dt' => $db_obj->korea_now_date,
        );
        if (isset($link) && $link == "") {
            $array['APND_FILE_LiNK_YN'] = 'N';
        } else {
            $array['APND_FILE_LiNK_YN'] = 'Y';
            $array['APND_FILE_LiNK'] = $link;
        }

        $db_obj->InsertData("APND_FILE_M", $array);
    }
}

function updateLink($linkName, $APND_FILE_NO)
{
    global $db_obj;
    $link = $linkName;
    $array['APND_FILE_LiNK_YN'] = 'Y';
    $array['APND_FILE_LiNK'] = $link;
    $array = array(
        'APND_FILE_LiNK_YN' => 'Y',
        'APND_FILE_LiNK' => $link
    );
    $db_obj->UpdateData("APND_FILE_M", $array, 'APND_FILE_NO = ' . $APND_FILE_NO);
}