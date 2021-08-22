<?php
require_once MODEL_PATH. 'functions.php';
require_once MODEL_PATH. 'db.php';

function get_histories($db, $user_id){
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
function get_all_histories($db){
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
    GROUP BY
      purchase_id
    ORDER BY
      created desc
  ";
  return fetch_all_query($db, $sql);
}
function get_detail($db, $purchase_id){
  $sql = "
    SELECT
      items.name,
      Purchase_details.price,
      Purchase_details.amount,
      Purchase_details.created,
      Purchase_details.price * Purchase_details.amount AS subtotal
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
function get_user_detail($db, $purchase_id ,$user_id){
  $sql = "
    SELECT
      items.name,
      Purchase_details.price,
      Purchase_details.amount,
      Purchase_details.created,
      Purchase_details.price * Purchase_details.amount AS subtotal
    FROM
      Purchase_details
    JOIN
      items
    ON
      Purchase_details.item_id = items.item_id
    JOIN
      Purchase_history
    ON
      Purchase_history.purchase_id = Purchase_details.purchase_id
    WHERE
      Purchase_history.purchase_id = ?
    AND
      user_id = ?
  ";
  return fetch_all_query($db, $sql, array($purchase_id,$user_id));
}
function get_history($db, $user_id ,$purchase_id){
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
    AND
      Purchase_history.purchase_id = ?
    GROUP BY
      Purchase_history.purchase_id
  ";
  return fetch_query($db, $sql, array($user_id,$purchase_id));
}
function get_all_history($db ,$purchase_id){
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
      Purchase_history.purchase_id = ?
    GROUP BY
      Purchase_history.purchase_id
  ";
  return fetch_query($db, $sql, array($purchase_id));
}