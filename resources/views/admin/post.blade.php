<?php
    require_once(app_path().'/Includes/Connections/Conn_PDO.php');

//    $varUserIndex = $_SESSION['uIndex'];
   $varUserIndex = 1;

   $sql_statement = "SELECT `Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content FROM post WHERE AuthorIndex = ? ORDER BY `Index` DESC ";
   $rsPost = $pdo->prepare($sql_statement);
   $rsPost->bindParam(1, $varUserIndex, PDO::FETCH_NUM);
   $rsPost->execute();
   $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-admin')

@section('title', 'SB Admin')
@section('page-header', '文章管理')
@section('page-header-sub', '所有文章清單')

@section('breadcrumb')
    <li>
        <i class="fa fa-dashboard"></i>  <a href="{{ asset('') }}admin">首頁</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> 文章管理
    </li>
@endsection
@section('content')
         <div class="row">
            <div class="col-lg-12">
            <h2>文章列表</h2>
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>文章編號</th>
                        <th>標題</th>
                        <th>建立時間</th>
                        <th>更新時間</th>
                        <th>功能</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php do { ?>
                     <tr>
                        <td><?php echo $row_rsPost['Index']; ?></td>
                        <td><?php echo $row_rsPost['Title']; ?></td>
                        <td><?php echo $row_rsPost['PostDatetime']; ?></td>
                        <td><?php echo $row_rsPost['LastUpdate']; ?></td>
                        <td>
                           <a href="{{ asset('') }}admin/post/show/<?php echo $row_rsPost['Index']; ?>"><button type="button" class="btn btn-xs btn-primary" id="btnView">查看</button></a>
                           <a href="{{ asset('') }}admin/post/modify/<?php echo $row_rsPost['Index']; ?>"><button type="button" class="btn btn-xs btn-primary" id="btnModify">修改</button></a>
                        </td>
                     </tr>
                     <?php } while ($row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC)); ?>
                  </tbody>
               </table>
            </div>
            <a href="{{ asset('') }}admin/post/new"><button type="button" class="btn btn-primary" id="btnPostList">新文章</button></a>
            </div>
         </div>
         <!-- /.row -->
@endsection