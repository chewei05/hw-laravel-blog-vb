<!DOCTYPE html>
<!-- saved from url=(0041)https://getbootstrap.com/examples/signin/ -->
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="https://getbootstrap.com/favicon.ico">

   <title>@yield('title') for Bootstrap</title>

   <!-- Bootstrap core CSS -->
   <link href="{{ asset('') }}css/bootstrap.min.css" rel="stylesheet">

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="{{ asset('') }}css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="{{ asset('') }}css/signin.css" rel="stylesheet">

   <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <script src="{{ asset('') }}js/ie-emulation-modes-warning.js"></script>

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->

   <style id="style-1-cropbar-clipper">
   /* Copyright 2014 Evernote Corporation. All rights reserved. */
   .en-markup-crop-options {
      top: 18px !important;
      left: 50% !important;
      margin-left: -100px !important;
      width: 200px !important;
      border: 2px rgba(255,255,255,.38) solid !important;
      border-radius: 4px !important;
   }

   .en-markup-crop-options div div:first-of-type {
      margin-left: 0px !important;
   }
   </style>
   <style id="stylerStyle">
   </style>
   <script id="stylerScript">
   </script>
</head>

   <body>

   <div class="container">

      <?php if ( isset($_GET['s']) ) { ?>
      <?php if ( $_GET['s'] == 'login_failed' ) { ?>
      <div class="alert alert-danger form-signin">
         <strong>登入失敗!</strong><br />請確認後重新輸入帳號及密碼.
      </div>
      <?php } else if ( $_GET['s'] == 'logout_success' ) { ?>
      <div class="alert alert-success form-signin">
         <strong>登出成功!</strong><br />你已成功登出本平台, 你可以再次重新登入.
      </div>
      <?php } else if ( $_GET['s'] == 'access_deny' ) { ?>
      <div class="alert alert-danger form-signin">
         <strong>存取拒絕!</strong><br />你沒有權限存取本頁面, 請輸入你的帳號及密碼.
      </div>
      <?php } ?>
      <?php } // End of isset($_GET['s']) ?>

      <!--<form class="form-signin" action="<?php //echo basename($_SERVER['PHP_SELF']); ?>" method="post">-->
      <form class="form-signin" action="{{ asset('') }}signin/u/" method="post">
         <h2 class="form-signin-heading">後台登入</h2>
         <h4>(請輸入帳號及密碼)</h4>
         <label for="inputUsername" class="sr-only">Username</label>
         <input type="text" id="Username" name="Username" class="form-control" placeholder="帳號" required="" autofocus="">
         <label for="inputPassword" class="sr-only">Password</label>
         <input type="password" id="Password" name="Password" class="form-control" placeholder="密碼" required="">
         <p>
            預設帳號為 <span class="text-danger">admin</span>, 預設密碼為 <span class="text-danger">admin</span>.
         </p>
         <div class="checkbox">
            <label>
            <input type="checkbox" value="remember-me"> 記住我
            </label>
         </div>
         <!--<button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>-->
         <a class="btn btn-lg btn-primary btn-block" href="{{ asset('') }}admin">登入</a>
         <!--<button class="btn btn-lg btn-info btn-block" id="btnHome">回到首頁</button>-->
         <a class="btn btn-lg btn-info btn-block" href="{{ asset('') }}home">回到首頁</a>
      </form>

   </div> <!-- /container -->

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="{{ asset('') }}js/ie10-viewport-bug-workaround.js"></script>

   <!-- jQuery -->
   <script src="{{ asset('') }}js/jquery.js"></script>

   <!-- User define script -->
   <script type="text/javascript">
      $(document).ready(function(){
         $("#btnHome").click(function(){
            window.location.href = "index.php";
         })
      })
   </script>

   </body>
</html>