<?php
require_once "../common.php";
require_once "../connection.php";
$db_obj = new connection;

if($_POST['APND_FILE_CATE']==2){
    uploadFile('top_upfile','top_link','top');
    uploadFile('mid_upfile','mid_link','mid');
    uploadFile('popup_upfile','popup_link','popup');
}

function uploadFile($filename,$linkName,$FILE_SNO){
    global $db_obj;
    $file = $_FILES[$filename];
    $link = $_POST[$linkName];
    $APND_FILE_SNO = $FILE_SNO;
    $upload_directory =  dirname(__DIR__). "/uploads/";
    $ext_str = "jpg,webp,gif,jpeg,jfif,png";
    $allowed_extensions = explode(',', $ext_str);
    
    $max_file_size = 5242880;
    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
    
    // 확장자 체크
    if(!in_array($ext, $allowed_extensions)) {
        alert('업로드할 수 없는 확장자 입니다.','mgmt_save_form.php');
        exit;
    }
    
    // 파일 크기 체크
    if($file['size'] >= $max_file_size) {
        echo "5MB 까지만 업로드 가능합니다.";
        exit;
    }
    
    $path = md5(microtime()) . '.' . $ext;
    if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {        
        // APND_FILE_CATE 
        // APND_FILE_SNO
        // APND_FILE_NM
        // APND_FILE_ORGN_NM	
        // APND_FILE_EXTS_NM
        // APND_FILE_PATH
        // APND_FILE_SIZE
        // APND_FILE_LiNK_YN
        // APND_FILE_LiNK
        $array = array(
            'APND_FILE_CATE' => 1,
            'APND_FILE_SNO' => $APND_FILE_SNO,
            'APND_FILE_NM' => $path,
            'APND_FILE_ORGN_NM' => $file['name'],
            'APND_FILE_EXTS_NM' => $ext,
            'APND_FILE_PATH' => $upload_directory,
            'APND_FILE_SIZE' => $file['size'],  
            // 'reg_dt' => $db_obj->korea_now_date,
        );
        if(isset($link) && $link== ""){
            $array['APND_FILE_LiNK_YN'] = 'N';
        }else{
            $array['APND_FILE_LiNK_YN'] = 'Y';
            $array['APND_FILE_LiNK'] = $link;
        }

        $db_obj->InsertData("APND_FILE_M",$array);
    }
}
?>