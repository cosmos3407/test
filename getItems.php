<?php
require "connection.php";
$db_obj = new connection;

$ph_where = "SELECT * FROM tb_video where 1 order by id desc";
$user_detail = $db_obj->select_where($ph_where);

$obj['list'] = $user_detail;

echo json_encode($obj);
?>