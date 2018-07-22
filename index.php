<?php
session_start();

require_once('dbconnect.php');

//多次元配列　[]がいくつかあるかで決まる。今回は二次元配列。




//if(!empty($_POST)){
  //$email = $_POST['input_email'];
  //$password = $_POST['input_password'];


    $sql = 'SELECT * FROM `feeds`';
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    
    $errors = array();

    while (1){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
            break;}
            $comments[] = $rec;

            $dbh = null;
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
            <li class="active"><a href="post.php">Post photos</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div id="hello">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <h1>My Memories</h1>
                    <h2>~ In Cebu ~</h2>
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /hello -->
    
    
    <div class="container">
      <div class="main-contents">
            <div class="row centered mt grid">
                <h3>Album</h3>
                <div class="col-lg-4">
                    <a href="detail.html" class="trim"><img class="picture" src="assets" alt=""></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><img class="picture" src="assets/img/02.jpg" alt=""></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><img class="picture" src="assets/img/03.jpg" alt=""></a>
                </div>
            </div>
            
            <div class="row centered mt grid">
                <div class="col-lg-4">
                    <a href="#"><img class="picture" src="assets/img/04.jpg" alt=""></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><img class="picture" src="assets/img/05.jpg" alt=""></a>
                </div>
                <div class="col-lg-4">
                    <a href="#"><img class="picture" src="assets/img/06.jpg" alt=""></a>
                </div>
        </div>
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
