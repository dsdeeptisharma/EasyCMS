<?php

require 'config.php';
include_once 'header.php';

/* db connect */

if (!$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)) {
    echo 'could not connect to mysql';
    exit;
}
if (!mysql_select_db(DB_NAME, $link)) {
    echo 'could not select db';
    exit;
}


/* GET DATA */

/* get data for page */
function getPage($pageId) {
    $getPage = mysql_query("SELECT page_id,page_title,page_text,page_description FROM `easy_pages` WHERE page_id = " . $pageId);
    $resultset = array();
    while ($row = mysql_fetch_array($getPage)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get data for post */
function getPosts() {
    $getPosts = mysql_query("SELECT post_id,post_title,post_text,date_of_post FROM `easy_posts` WHERE post_active=1 ");
    $resultset = array();
    while ($row = mysql_fetch_array($getPosts)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get user roles */
$getRoles = "SELECT 'role_id','role_name' FROM `" . DB_NAME . "`.`easy_roles`";


/* get users */
function getUsers() {
    //$getUsers = mysql_query("SELECT user_id,user_name,user_role,user_fullname FROM `".DB_NAME."`.`easy_users`");
    $getUsers = mysql_query("SELECT user_id,user_name,user_role,user_fullname,role_id,role_name FROM `easy_users`,`easy_roles` WHERE easy_users.user_role = easy_roles.role_id and  user_active=1");

    $resultset = array();
    while ($row = mysql_fetch_array($getUsers)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get pages */
function getPages() {

    $getPages = mysql_query("SELECT page_id,page_title,page_text,page_description FROM `easy_pages` WHERE 1 and  page_active=1");
    $resultset = array();
    while ($row = mysql_fetch_array($getPages)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/*get post from id*/
function getPostFromId($postId){
    $getPost = mysql_query("SELECT post_id,post_title,post_text,date_of_post FROM `easy_posts` WHERE post_id = ".$postId);
    $row = mysql_fetch_array($getPost);
    
    return $row; 
}

/* SET DATA */
/* set data for page */

function setPage($pageTitle, $pageDescription, $pageContent, $pageDate) {
    $setPage = mysql_query("INSERT INTO `" . DB_NAME . "`.easy_pages(page_id,page_title,page_text,page_description,create_date) VALUES(NULL,'" . $pageTitle . "','" . $pageContent . "','" . $pageDescription . "','" . $pageDate . "')");
   
    if ($setPage) {
        return 0;
    } else {
        return 1;
    }
    
}

/* set data for post */

function setPost($postTitle, $postText, $postDate) {

    $setPost = mysql_query("INSERT INTO `" . DB_NAME . "`.easy_posts(post_id,post_title,post_text,date_of_post) VALUES(NULL,'" . $postTitle . "','" . $postText . "','" . $postDate . "')");
    
    if ($setPost) {
        return 0;
    } else {
        return 1;
    }
}

/* set data for users */

function setUser($userFullname, $userName, $userPassword, $userRole) {

    $setUsers = mysql_query("INSERT INTO `" . DB_NAME . "`.easy_users(user_id,user_name,user_password,user_fullname,user_role) VALUES(NULL,'" . $userName . "','" . $userPassword . "','" . $userFullname . "'," . $userRole . ")");

    if ($setUsers) {
        return 0;
    } else {
        return mysql_error();
    }
}

/*check details*/

function checkLogin($userName){
    $getUser = mysql_query("SELECT user_password,user_role from `".DB_NAME."`.easy_users WHERE user_name ='".$userName."'");
    
    $row = mysql_fetch_array($getUser);
    
    return $row;
}

/*del data from table*/
function deactivatePage($pageId){
    $dePage = mysql_query("UPDATE `".DB_NAME."`.`easy_pages` SET `page_active` = '0' WHERE `easy_pages`.`page_id` =".$pageId);
     if ($dePage) {
        return 0;
    } else {
        return mysql_error();
    }
    
}

function deactivatePost($postId){
    $dePost = mysql_query("UPDATE `".DB_NAME."`.`easy_posts` SET `post_active` = '0' WHERE `easy_posts`.`post_id` =".$postId);
     if ($dePost) {
        return 0;
    } else {
        return mysql_error();
    }
    
}

function deactivateUser($userId){
    $deUser = mysql_query("UPDATE `".DB_NAME."`.`easy_users` SET `user_active` = '0' WHERE `easy_users`.`user_id` =".$userId);
     if ($deUser) {
        return 0;
    } else {
        return mysql_error();
    }
    
}


/*edit data*/
function editPage($pageId,$pageTitle,$pageDescription,$pageContent,$editDate){
    $editPage = mysql_query("UPDATE `".DB_NAME."`.`easy_pages` SET `page_title` = '".$pageTitle."' , `page_description` = '".$pageDescription."' , `page_text` = '".$pageContent."' , `edit_date` = '".$editDate."' WHERE `page_id` = ".$pageId);
    if ($editPage) {
        return 0;
    } else {
        return mysql_error();
    }
}

function editPost($postId,$postTitle,$postContent,$editDate){

$editPost = mysql_query("UPDATE `".DB_NAME."`.`easy_posts` SET `post_title` = '".$postTitle."' , `post_text` = '".$postContent."' , `date_of_edit` = '".$editDate."' WHERE `post_id` = ".$postId);
    
    if ($editPost) {
        return 0;
    } else {
        return mysql_error();
    }

}

