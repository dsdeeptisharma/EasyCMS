<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'header.php';
include_once '../config/db.php';
?>
<div class="container">
<?php


$posts = getPosts();

foreach ($posts as $value) {
    
?>
     <div class="row">
         <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 post">
     
            <?php
            echo '<a href="post.php?id='.$value[post_id].'"> <h3>'.$value[post_title].'</h3></a>';
            ?>
             
             <p>
<?php             
    
echo $value[post_text];
 echo '</p>';
 echo '<br><i>posted on </i>'.$value[date_of_post];
 ?>
               
    </div>
           <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
     </div>
         <?php
    }
?>

    <div class="row">
        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 post">
            <h4>Welcome to Easy CMS!</h4>
            <br>
            <p>
                Easy CMS is the best, lightest, most amazing CMS. It's fast, awfully quick and astoundingly light. It has been developed using the latest technologies. You don't have to be a techie to use Easy CMS. All you need to do is sip on your coffee and write. Easy CMS will manage all the content like a piece of cake.
            </p>
        </div>
        
</div>

<?php include_once 'footer.php'; ?>
