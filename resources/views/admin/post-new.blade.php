<?php
    require_once(app_path().'/Includes/Connections/Conn_PDO.php');

   if ( isset($_POST['PostTitle']) && isset($_POST['PostContent']) )
   {
      $varTitle = $_POST['PostTitle'];
      $varUserIndex = $_SESSION['uIndex'];
      $varContent = $_POST['PostContent'];

      $sql_statement = "INSERT INTO post (Title, AuthorIndex, Content) VALUES (?, ?, ?) ";
      $insPost = $pdo->prepare($sql_statement);
      $insPost->bindParam(1, $varTitle, PDO::PARAM_STR);
      $insPost->bindParam(2, $varUserIndex, PDO::FETCH_NUM);
      $insPost->bindParam(3, $varContent, PDO::PARAM_STR);
      $insPost->execute();

      header("location:"."post.php?s=new_post_sucess");
   }
?>

@extends('templates.master-admin')

@section('title', 'SB Admin')
@section('page-header', '撰寫新文章')
@section('page-header-sub', '寫下你的心得、感想及想說的東西吧...')


@section('breadcrumb')
    <li>
        <i class="fa fa-dashboard"></i>  <a href="{{ asset('') }}admin">首頁</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> 撰寫新文章
    </li>
@endsection
@section('content')
         <div class="row">
            <div class="col-lg-12">
               <form method="post" id="form1" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                  <div class="form-group">
                     <label>標題</label>
                     <input class="form-control" id="PostTitle" name="PostTitle" />
                     <p class="help-block">請輸入文章標題</p>
                  </div>
                  <div class="form-group">
                     <label>文章內容</label>
                     <textarea class="form-control" id="PostContent" name="PostContent" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                     <button type="button" class="btn btn-primary" id="btnSubmit">送出</button>
                     <button type="button" class="btn btn-default" id="btnReset">清除</button>
                     <a href="{{ asset('') }}admin/post"><button type="button" class="btn btn-primary" id="btnPostList">取消</button></a>
                  </div>

               </form>
            </div>
         </div>
         <!-- /.row -->
@endsection
@section('tinymce-js')
    @include('components.script-tinymce-edit')
@endsection
@section('user-define-js')
   <script type="text/javascript">
      $(document).ready(function(){
          // 沒有作用，待釐清。
         $("#btnSubmit").click(function(){
            $("#form1").submit();
         })
         $("#btnCancel").click(function(){
            $("#form1")[0].reset();
         })
         $("#btnPostList").click(function(){
            window.location.href = "post.php";
         })
      })
   </script>

   <!-- User define script with PHP variable -->
   <?php //echo "<script type=\"text/javascript\">" ?>
   <?php //if ( $varSuccess == true ) { ?>
      //alert("文章更新成功！");
   <?php //} ?>
   <?php //echo "</script>" ?>
@endsection