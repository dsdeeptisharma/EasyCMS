<?php

// Turn off all error reporting


require 'config.php';
include_once 'header.php';




/* db connect */
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}




/* GET DATA */

/* get data for page */
function getPage($pageId) {
global $connection;
    $getPage = mysqli_query($connection, "SELECT page_id,page_title,page_text,page_description FROM `easy_pages` WHERE page_id = " . $pageId);
    $resultset = array();
    while ($row = mysqli_fetch_array($getPage, MYSQLI_NUM)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get data for post */
function getPosts() {
global $connection;
    $getPosts = mysqli_query($connection, "SELECT post_id,post_title,post_text,date_of_post FROM `easy_posts` WHERE post_active=1 ");
$resultset = array();
    while ($row = mysqli_fetch_array($getPosts, MYSQLI_NUM)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get user roles */
$getRoles = "SELECT 'role_id','role_name' FROM `" . DB_NAME . "`.`easy_roles`";


/* get users */
function getUsers() {
global $connection;
    //$getUsers = mysql_query("SELECT user_id,user_name,user_role,user_fullname FROM `".DB_NAME."`.`easy_users`");
    $getUsers = mysqli_query($connection, "SELECT user_id,user_name,user_role,user_fullname,role_id,role_name FROM `easy_users`,`easy_roles` WHERE easy_users.user_role = easy_roles.role_id and  user_active=1");

    $resultset = array();
    while ($row = mysqli_fetch_array($getUsers, MYSQLI_NUM)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/* get pages */
function getPages() {
global $connection;
    $getPages = mysqli_query($connection, "SELECT page_id,page_title,page_text,page_description FROM `easy_pages` WHERE 1 and  page_active=1");
    $resultset = array();
    while ($row = mysqli_fetch_array($getPages, MYSQLI_NUM)) {
        $resultset[] = $row;
    }
    return $resultset;
}

/*get post from id*/
function getPostFromId($postId){
global $connection;
    $getPost = mysqli_query($connection, "SELECT post_id,post_title,post_text,date_of_post FROM `easy_posts` WHERE post_id = ".$postId);
    $row = mysqli_fetch_array($getPost, MYSQLI_NUM);
    
    return $row; 
}

/* SET DATA */
/* set data for page */

function setPage($pageTitle, $pageDescription, $pageContent, $pageDate) {
global $connection;
    $setPage = mysqli_query($connection, "INSERT INTO `" . DB_NAME . "`.easy_pages(page_id,page_title,page_text,page_description,create_date) VALUES(NULL,'" . $pageTitle . "','" . $pageContent . "','" . $pageDescription . "','" . $pageDate . "')");
   
    if ($setPage) {
        return 0;
    } else {
        return 1;
    }
    
}

/* set data for post */

function setPost($postTitle, $postText, $postDate) {
global $connection;
    $setPost = mysqli_query($connection, "INSERT INTO `" . DB_NAME . "`.easy_posts(post_id,post_title,post_text,date_of_post) VALUES(NULL,'" . $postTitle . "','" . $postText . "','" . $postDate . "')");
    
    if ($setPost) {
        return 0;
    } else {
        return 1;
    }
}

/* set data for users */

function setUser($userFullname, $userName, $userPassword, $userRole) {
global $connection;
    $setUsers = mysqli_query($connection, "INSERT INTO `" . DB_NAME . "`.easy_users(user_id,user_name,user_password,user_fullname,user_role) VALUES(NULL,'" . $userName . "','" . $userPassword . "','" . $userFullname . "'," . $userRole . ")");

    if ($setUsers) {
        return 0;
    } else {
        return mysqli_error();
    }
}

/*check details*/

function checkLogin($userName){
global $connection;
    $getUser = mysqli_query($connection, "SELECT user_password,user_role from `".DB_NAME."`.easy_users WHERE user_name ='".$userName."'");
    
    $row = mysqli_fetch_array($getUser, MYSQLI_NUM);
    
    return $row;
}

/*del data from table*/
function deactivatePage($pageId){
global $connection;
    $dePage = mysqli_query($connection, "UPDATE `".DB_NAME."`.`easy_pages` SET `page_active` = '0' WHERE `easy_pages`.`page_id` =".$pageId);
     if ($dePage) {
        return 0;
    } else {
        return mysqli_error();
    }
    
}

function deactivatePost($postId){
global $connection;
    $dePost = mysqli_query($connection, "UPDATE `".DB_NAME."`.`easy_posts` SET `post_active` = '0' WHERE `easy_posts`.`post_id` =".$postId);
     if ($dePost) {
        return 0;
    } else {
        return mysqli_error();
    }
    
}

function deactivateUser($userId){
global $connection;
    $deUser = mysqli_query($connection, "UPDATE `".DB_NAME."`.`easy_users` SET `user_active` = '0' WHERE `easy_users`.`user_id` =".$userId);
     if ($deUser) {
        return 0;
    } else {
        return mysqli_error();
    }
    
}


/*edit data*/
function editPage($pageId,$pageTitle,$pageDescription,$pageContent,$editDate){
global $connection;
    $editPage = mysqli_query($connection, "UPDATE `".DB_NAME."`.`easy_pages` SET `page_title` = '".$pageTitle."' , `page_description` = '".$pageDescription."' , `page_text` = '".$pageContent."' , `edit_date` = '".$editDate."' WHERE `page_id` = ".$pageId);
    if ($editPage) {
        return 0;
    } else {
        return mysqli_error();
    }
}

function editPost($postId,$postTitle,$postContent,$editDate){
global $connection;
$editPost = mysqli_query($connection, "UPDATE `".DB_NAME."`.`easy_posts` SET `post_title` = '".$postTitle."' , `post_text` = '".$postContent."' , `date_of_edit` = '".$editDate."' WHERE `post_id` = ".$postId);
    
    if ($editPost) {
        return 0;
    } else {
        return mysqli_error();
    }

}
