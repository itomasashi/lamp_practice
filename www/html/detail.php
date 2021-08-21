<?php
require_once '../conf/const.php';
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'user.php';
require_once MODEL_PATH. 'item.php';
require_once MODEL_PATH. 'cart.php';
require_once MODEL_PATH. 'histories.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$purchase_id = get_post('purchase_id');
if(is_admin($user)){
  $history = get_all_history($db ,$purchase_id);
  $details = get_detail($db, $purchase_id);
}else{
  $history = get_history($db, $user['user_id'] ,$purchase_id);
  $details = get_user_detail($db,$purchase_id,$user['user_id']);
}

include_once VIEW_PATH. 'detail_view.php';