<?php
    // require_once(app_path().'/Includes/Connections/Conn_PDO.php');

    // $sql_statement = "SELECT post.`Index`, Title, AuthorIndex, PostDatetime, LastUpdate, Content, Realname, Nickname FROM post, `user` WHERE post.AuthorIndex = `user`.`Index` ORDER BY post.`Index` DESC ";
    // $rsPost = $pdo->prepare($sql_statement);
    // $rsPost->execute();
    // $row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC);
    // $totalRows_rsPost = $rsPost->rowCount();
?>

@extends('templates.master-signin')

@section('title', 'Signin Template 2')


