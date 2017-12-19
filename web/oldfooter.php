<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../config/db.php';
$pages = getPages();
?>
<div class="container footer">
<div class="row">
    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-5">
        Designed, Developed and Driven by <a href='https://deepti96.wordpress.com'> Deepti Sharma </a> &copy; 2017
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 footerLinks">
        
<?php
foreach($pages as $value) {
    echo '<a href="../web/page.php?id='.$value[page_id].'">'.$value[page_title].'</a>';
}
?>

<!--
        <a href='../web/page.php?id=1'>About </a>
        <a href='../web/page.php?id=2'>Contact</a>
    -->    <a href='../admin/'>Admin</a>
    </div>
    <br><br>
</div>
    </div>
