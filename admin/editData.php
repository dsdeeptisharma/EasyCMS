<?php

include_once 'header.php';
include_once '../config/db.php';

if($_GET[form] == 'page'){
    
    $pageId = $_GET[id];
    
    $pageTitle = $_POST[pageTitle];
    $pageDescription = $_POST[pageDescription];
    $pageContent = $_POST[pageContent];
    $date = new DateTime();
    $editDate = $date->format('Y-m-d H:i:s');

   	$editPage = editPage($pageId,$pageTitle,$pageDescription,$pageContent,$editDate);



   	if($editPage != 0){
        echo "Something's the issue. Please try again";
    }
    else{
        header("Location: ../web/page.php?id=".$pageId);
    }
    
    
}

if($_GET[form] == 'post'){
    
    $postId = $_GET[id];
  
    $postTitle = $_POST[postTitle];
    
    $postContent = $_POST[postText];
    $date = new DateTime();
    $editDate = $date->format('Y-m-d H:i:s');

   	$editPost = editPost($postId,$postTitle,$postContent,$editDate);



   	if($editPost != 0){
        echo "Something's the issue. Please try again";
    }
    else{
        header("Location: ../web/post.php?id=".$postId);
    }
    
    
}