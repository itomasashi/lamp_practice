<?php
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'db.php';

function get_history($db, $user_id){
  $sql = "
    SELECT
      Purchase_history.purchase_id,
      Purchase_history.created,
      SUM(Purchase_details.price * Purchase_details.amount) AS total
    FROM
      Purchase_history
    JOIN
      Purchase_details
    ON
      Purchase_history.purchase_id = Purchase_details.purchase_id
    WHERE
      user_id = ? 
    GROUP BY
      purchase_id
    ORDER BY
      created desc
  ";
  return fetch_all_query($db, $sql, array($user_id));
}

function get_detail($db, $purchase_id){
  $sql = "
    SELECT
      items.name
      Purchase_details.price,
      Purchase_details.amount,
      Purchase_details.created
    FROM
      Purchase_details
    JOIN
      items
    ON
      Purchase_details.item_id = items.item_id
    WHERE
      purchase_id = ?
  ";
  return fetch_all_query($db, $sql, array($purchase_id));
}