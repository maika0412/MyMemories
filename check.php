<?php
session_start();

// require_once('/dbconnect.php');

if (!isset($_SESSION['register'])) {
    header('Location:post.php');
    exit();
}

//多次元配列　[]がいくつかあるかで決まる。今回は二次元配列。
 $title = $_SESSION['register']['title'];
 $date = $_SESSION['register']['date'];
 $detail = $_SESSION['register']['detail'];
 $img_name = $_SESSION['register']['img_name'];

if (!empty($_POST)) {

    //echo '通過テスト' . '<br>';
       $sql = 'INSERT INTO `users` SET `title`=?, `date`=?, `detail`=?, `img_name`=?, `created`=NOW()';
        $data = array($title, $date ,$detail, $img_name);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
        unset($_SESSION['register']);
        header('Location:thanks.php');
    }
?>



<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    </head>
    <body style="margin-top: 60px">
        <div class="container">
            <div class="row">
                <!-- ここから -->
            <div class="col-xs-8 col-xs-offset-2 thumbnail">
                <h2 class="text-center content_header">投稿情報確認</h2>
                <div class="row">
                    <div class="col-xs-4">
                        <img src="../user_profile_img/<?php echo htmlspecialchars($img_name); ?>" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-xs-8">
                        <div>
                            <span>タイトル</span>
                            <p class="lead"><?php echo htmlspecialchars($titel); ?></p>
                        </div>
                        <div>
                            <span>詳細</span>
                            <p class="lead"><?php echo htmlspecialchars($date); ?></p>
                        </div>
                        <!-- ③ -->
                        <form method="POST" action="">
                            <!-- ④ -->
                            <a href="post.php?action=rewrite" class="btn btn-default">&laquo;&nbsp;戻る</a> | 
                            <!-- ⑤ -->
                            <input type="hidden" name="action" value="submit">
                            <input type="submit" class="btn btn-primary" value="投稿">
                        </form>
                    </div>
                </div>
            </div>
            <!-- ここまで -->
                <!-- <img src="../user_profile_img/"<?php echo $_SESSION['register']['img_name']; ?>"> -->
                 
                  </div><!-- ここにコンテンツ -->
            </div>
        </div>
        <script src="../assets/js/jquery-3.1.1.js"></script>
        <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
    </body>
</html>