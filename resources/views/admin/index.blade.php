<?php
    // require_once(app_path().'/Includes/Connections/Conn_PDO.php');

    // $sql_statement = "SELECT post.`Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content, Realname, Nickname FROM post, `user` WHERE post.AuthorIndex = `user`.`Index` ORDER BY post.`Index` DESC ";
    // $rsPost = $pdo->prepare($sql_statement);
    // $rsPost->execute();
    // $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
    // $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-admin')

@section('title', 'SB Admin')
@section('page-header', '以Blade架設的簡易部落格(後台)')
@section('page-header-sub', '道場的第3份作業')

@section('breadcrumb')
    <li class="active">
        <i class="fa fa-dashboard"></i> 首頁
    </li>
@endsection
@section('content')
                <!-- Page Heading -->
                @include('components.admin-message')
                <!-- /.row -->

                @include('components.admin-dashboard')
                <!-- /.row -->

                @include('components.admin-chart-area')
                <!-- /.row -->

                @include('components.admin-unuse')
                <!-- /.row -->
@endsection