<?php
    require_once(app_path().'/Includes/Connections/Conn_PDO.php');

//    $varPostIndex = $_GET['i']; //已自 Controller 內取得
//    $varUserIndex = $_SESSION['uIndex'];
   $varUserIndex = 1;

   $sql_statement = "SELECT `Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content FROM post WHERE `Index` = ? AND AuthorIndex = ? ";
   $rsPost = $pdo->prepare($sql_statement);
   $rsPost->bindParam(1, $varPostIndex, PDO::FETCH_NUM);
   $rsPost->bindParam(2, $varUserIndex, PDO::FETCH_NUM);
   $rsPost->execute();
   $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-admin')

@section('title', 'SB Admin')
@section('page-header', '瀏覽文章')
@section('page-header-sub', '查看文章內容及詳細資料')


@section('breadcrumb')
    <li>
        <i class="fa fa-dashboard"></i>  <a href="{{ asset('') }}admin">首頁</a>
    </li>
    <li>
        <i class="fa fa-file"></i> <a href="{{ asset('') }}admin/post">文章管理</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> 瀏覽文章
    </li>
@endsection
@section('content')
<div class="row">
            <div class="col-lg-12">
                  <div class="form-group">
                     <label>標題</label>
                     <input class="form-control" readonly="readonly" value="<?php echo $row_rsPost['Title']; ?>" />
                  </div>
                  <div class="form-group">
                     <label>建立時間</label>
                     <input class="form-control" readonly="readonly" value="<?php echo $row_rsPost['PostDatetime']; ?>" />
                  </div>
                  <div class="form-group">
                     <label>最後更新時間</label>
                     <input class="form-control" readonly="readonly" value="<?php echo $row_rsPost['LastUpdate']; ?>" />
                  </div>
                  <div class="form-group">
                     <label>文章內容</label>
                     <textarea class="form-control" id="PostContent" name="PostContent" rows="10"><?php echo $row_rsPost['Content']; ?></textarea>
                  </div>
                  <div class="form-group">
                     <a href="javascript:history.go(-1);"><button type="button" class="btn btn-primary" id="btnBack">回到上一頁</button></a>
                     <a href="{{ asset('') }}admin/post"><button type="button" class="btn btn-primary" id="btnPostList">回到文章管理</button></a>
                  </div>
            </div>
         </div>
         <!-- /.row -->
@endsection
@section('tinymce-js')
    @include('components.script-tinymce-show')
@endsection
@section('user-define-js')
    <script type="text/javascript">
        // alert("NBBB");
        // 沒有作用，待釐清。
        $(document).ready(function(){
            alert("AAA");
            $("#btnBack").click(function(){
                window.location.href = "javascript:history.go(-1);";
            })
            $("#btnPostList").click(function(){
                window.location.href = "{{ asset('') }}admin/post";
            })
        })
    </script>
@endsection