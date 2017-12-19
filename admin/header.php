<?php

?>


<html>
    <head>
        <title>Easy CMS - The lightweight, fast, quick and no pain CMS!</title>
        <!-- libraries-->
        <link rel="stylesheet" href="librariesLocal/bootstrap.min.css">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <script src="librariesLocal/jquery.min.js"></script>
        <script src="librariesLocal/bootstrap.min.js"></script>

        <!-- Local Libraries -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 header">
                    <span style='color:rgb(109,172,188);font-size:400%;margin:18% 15% 12% 15%;'>
                        <a href="index.php"><img src='../images/easy.png' alt="Easy CMS" style='width:10%;'/></a>
                        Easy CMS </span>
                </div>
            </div>
        </div>

        <?php
        session_start();

        if ($_SESSION["userName"] != NULL) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-9 col-md-3">
                      <a href="https://deepti96.wordpress.com/">  <button class="btn btn-info"> Hello <?php echo $_SESSION[userName]; ?> </button></a>
                    </div>
                    <br><br>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-1"><a href="newPost.php" target="_self"><button type="button" class="btn btn-primary newcust"> +Post</button></a></div>
                   
                    <div class="col-md-1"><a href="newPage.php"><button type="button" class="btn btn-primary newcust"> +Page</button></a></div>
                    
                    <?php if($_SESSION["userRole"] == 1) { ?>
                    <div class="col-md-1"><a href="newUser.php"><button type="button" class="btn btn-primary newcust"> +User</button></a></div>
                    <div class="col-md-1"><a href="viewUser.php"><button type="button" class="btn btn-primary newcust"> Users</button></a></div>                     
                    <div class="col-md-1"><a href="viewPost.php"><button type="button" class="btn btn-primary newcust"> Posts</button></a> </div>
                    <?php } ?>
                    <div class="col-md-1"><a href="newData.php?id=logoutDetails"><button type="button" class="btn btn-primary newcust"> Logout? </button></a> </div>

                </div>        


            <?php } ?>
