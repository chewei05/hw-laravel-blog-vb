<?php
    require_once(app_path().'/Includes/Connections/Conn_PDO.php');

//    if ( isset($_GET['i']) ) $varPostIndex = $_GET['i']; //已自 Controller 內取得
//    $varUserIndex = $_SESSION['uIndex'];
   $varUserIndex = 1;
   $varSuccess = false;

   if ( isset($_POST['PostTitle']) && isset($_POST['PostContent']) && isset($_POST['PostIndex']) )
   {
      $varTitle = $_POST['PostTitle'];
      $varContent = $_POST['PostContent'];
      $varPostIndex = $_POST['PostIndex'];

      $sql_statement = "UPDATE post SET Title = ?, LastUpdate = now(), Content = ? WHERE `Index` = ? AND AuthorIndex = ? ";
      $rsPost = $pdo->prepare($sql_statement);
      $rsPost->bindParam(1, $varTitle, PDO::PARAM_STR);
      $rsPost->bindParam(2, $varContent, PDO::PARAM_STR);
      $rsPost->bindParam(3, $varPostIndex, PDO::FETCH_NUM);
      $rsPost->bindParam(4, $varUserIndex, PDO::FETCH_NUM);
      $rsPost->execute();
      $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
      $totalRows_rsPost = $rsPost->rowCount();

      $varSuccess = true;
   }
   // else
   // {

      $sql_statement = "SELECT `Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content FROM post WHERE `Index` = ? AND AuthorIndex = ? ";
      $rsPost = $pdo->prepare($sql_statement);
      $rsPost->bindParam(1, $varPostIndex, PDO::FETCH_NUM);
      $rsPost->bindParam(2, $varUserIndex, PDO::FETCH_NUM);
   // }
   $rsPost->execute();
   $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-admin')

@section('title', 'SB Admin')
@section('page-header', '修改文章')
@section('page-header-sub', '修改你的文章內容, 文章時間不提供修改功能.')


@section('breadcrumb')
    <li>
        <i class="fa fa-dashboard"></i>  <a href="{{ asset('') }}admin">首頁</a>
    </li>
    <li>
        <i class="fa fa-file"></i> <a href="{{ asset('') }}post">文章管理</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> 修改文章
    </li>
@endsection
@section('content')
         <div class="row">
            <div class="col-lg-12">
               <form method="post" id="form1" action="<?php echo basename($_SERVER['PHP_SELF']); ?>">
                  <div class="form-group">
                     <label>標題</label>
                     <input class="form-control" id="PostTitle" name="PostTitle" value="<?php echo $row_rsPost['Title']; ?>"/>
                     <p class="help-block">請修改文章標題, 不修改時請保持原標題即可.</p>
                  </div>
                  <div class="form-group">
                     <label>文章內容</label>
                     <textarea class="form-control" id="PostContent" name="PostContent" rows="10"><?php echo $row_rsPost['Content']; ?></textarea>
                     <p class="help-block">請重新輸入或修改文章.</p>
                  </div>
                  <div class="form-group">
                     <button type="button" class="btn btn-primary" id="btnSubmit">修改</button>
                     <button type="button" class="btn btn-default" id="btnCancel">重置</button>
                     <a href="{{ asset('') }}admin/post"><button type="button" class="btn btn-primary" id="btnPostList">回到文章管理</button></a>
                     <input type="hidden" id="PostIndex" name="PostIndex" value="<?php echo $varPostIndex; ?>" />
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
   <?php echo "<script type=\"text/javascript\">" ?>
   <?php if ( $varSuccess == true ) { ?>
      alert("文章更新成功！");
   <?php } ?>
   <?php echo "</script>" ?>
@endsection