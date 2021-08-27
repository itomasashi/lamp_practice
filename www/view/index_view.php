<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print(h($item['name'])); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . h($item['image'])); ?>">
              <figcaption>
                <?php print(number_format(h($item['price']))); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print(h($item['item_id'])); ?>">
                    <input type ="hidden" name="token" value="<?php print $token?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <h2>人気ランキング</h2>
    <table class="table table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($rank_items as $rank_item){ ?>
        <tr>
          <td>
            <img src="<?php print(IMAGE_PATH . h($rank_item['image'])); ?>" width="300" height="200">
          </td>
          <td>
            <?php print(h($rank_item['name'])); ?>
          </td>
          <td>
          <?php print(number_format(h($rank_item['price']))); ?>円
            <?php if($rank_item['stock'] > 0){ ?>
          </td>
          <td>
          <form action="index_add_cart.php" method="post">
            <input type="submit" value="カートに追加" class="btn btn-primary btn">
            <input type="hidden" name="item_id" value="<?php print(h($rank_item['item_id'])); ?>">
            <input type ="hidden" name="token" value="<?php print $token?>">
          </form>
          <?php } else { ?>
            <p class="text-danger">現在売り切れです。</p>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>