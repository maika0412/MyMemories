<?php
session_start();

//require('dbconnect.php')

//date_default_timezone_set('Asia/Manila');
    // PHPプログラム
$title = '';
$date = '';
$detaile = '';
$errors = array();


//入力なしだったら
if (isset($_GET['action']) && $_GET['action'] == 'rewrite') {
  $_POST['input_title'] = $_SESSION['register']['title'];
  $_POST['input_date'] = $_SESSION['register']['date'];
  $_POST['input_detail'] = $_SESSION['register']['detail'];

$errors['rewrite'] = true;
}



if (!empty($_POST)) {
    $title = $_POST['input_title'];
    $date = $_POST['input_date'];
    $detail = $_POST['input_detail'];

    if ($title == '') {
        $errors['title'] = 'blank';
   }

    if ($date == '') {
        $errors['email'] = 'blank';
   }

 if ($detail == '') {
        $errors['detail'] = 'blank';
   }

//画像名を取得
    $file_name = '';
       if (!isset($_GET['action'])) {
         $file_name = $_FILES['input_img_name']['name'];
       }
       if (!empty($file_name)) {
       }

   if (!empty($file_name)) {
       //拡張子チェック
        $file_type = substr($file_name, -3);
        $file_type = strtolower($file_name);
        // if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
        //     $errors['img_name'] = 'type';
        // }
    } else {
        $errors['img_name'] = 'blank';
    }

   // var_dump($errors);die();
   if (empty($errors)) {
        $date_str = date('YmdHis');
        $submit_file_name = $date_str.$file_name;
        move_uploaded_file($_FILES['input_img_name']['tmp_name'],'post.img'.$submit_file_name);
   
       $_SESSION['register']['title'] = $_POST[input_title];
       $_SESSION['register']['date'] = $_POST[input_date];
       $_SESSION['register']['detail'] = $_POST[input_detail];
       $_SESSION['register']['img_name'] = $submit_file_name;

       header('Location: check.php');
       exit();
   }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Memories</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/chart.js"></script>


  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""><i class="fa fa-camera" style="color: #fff;"></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">Main page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
    
    <div class="container">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header">写真投稿</h2>
        <form method="POST" action="post.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="task">タイトル</label>
            <input name="input_title" class="form-control"><?php echo htmlspecialchars($title); ?>
                        <?php if (isset($errors['title']) && $errors['title'] == 'blank'):?> 
                            <p class="text-danger">タイトルを入力してください</p>
                        <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="date">日程</label>
            <input type="date" name="input_date" class="form-control">
            <?php echo htmlspecialchars($date); ?>
                        <?php if (isset($errors['date']) && $errors['date'] == 'blank'):?> 
                            <p class="text-danger">ユーザー名を入力してください</p>
                        <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="detail">詳細</label>
            <textarea name="input_detail" class="form-control" rows="3"></textarea><br>
             <!--<?php echo htmlspecialchars($detail); ?>-->
                        <?php if (isset($errors['detail']) && $errors['detail'] == 'blank'):?> 
                            <p class="text-danger">詳細を入力してください</p>
                        <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="img_name">写真</label>
            <input type="file" name="input_img_name" id="img_name">
            <?php if (isset($errors['img_name']) && $errors['img_name'] == 'blank'){ ?>
                            <p class="text-danger"> 画像を選択してください。</p>
                            <?php } ?>
                            <?php if (isset($errors['img_name']) && $errors['img_name'] =='type') { ?>
                                <p class="text-danger">拡張子が「jpg」 「png」 「gif」の画像を選択してください。</p>
                            <?php } ?>
          </div><br>
          <input type="submit" class="btn btn-primary" href="check.php" value="投稿">
          
        </form>
      </div>
    </div>

    <div id="f">
      <div class="container">
        <div class="row">
          <p>I <i class="fa fa-heart"></i> Cubu.</p>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
