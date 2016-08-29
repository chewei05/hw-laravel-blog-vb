<?php
    require_once(app_path().'/Includes/Connections/Conn_PDO.php');

//    $varPostIndex = $_GET['i']; // 已自 Controller 中取得

   $sql_statement = "SELECT post.`Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content, Realname, Nickname FROM post, `user` WHERE post.AuthorIndex = `user`.`Index` AND post.`Index` = ? ";
   $rsPost = $pdo->prepare($sql_statement);
   $rsPost->bindParam(1, $varPostIndex, PDO::FETCH_NUM);
   $rsPost->execute();
   $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-home')

@section('title', 'Blog Post')
@section('page-header', '以Blade架設的簡易部落格(內頁)')
@section('page-header-sub', '道場的第3份作業')

@section('contain')
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row_rsPost['Title'] ?></h1>

                <!-- Author -->
                <p class="lead">
                    作者 <a href="javascript:void();"><?php echo $row_rsPost['Realname']; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>  發佈於 <?php echo Carbon\Carbon::parse($row_rsPost['PostDatetime'])->format('Y-m-d h:i'); ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <div class="well well-lg">
                   <?php echo $row_rsPost['Content']; ?>
                </div>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>寫下你的回應或留言吧:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" readonly="readonly"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnSubmit">送出</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">無
                            <small>無</small>
                        </h4>
                        暫無回應...
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">無
                            <small>無</small>
                        </h4>
                        暫無回應...
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">無
                                    <small>無</small>
                                </h4>
                                暫無回應...
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>
@endsection