<!DOCTYPE html>
<html>
<link rel="stylesheet" href="speech-input.css">

<?php


include_once 'header.php';


if($_GET[form] == 'edit'){
    
    $postId = $_GET[id];
    $postTitle = $_GET[title];
    $postContent = $_GET[con];
    
}


?>

<div class="container">
    <div class="row"><br></div>
    <div class="row">
        <div class="row details">
            <div class="col-md-offset-1 col-md-10 form-responsive">
                </br>




            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="row inputDetails">

<?php if($_GET[form] == 'edit') { 
      echo '<form id="postDetails" action="editData.php?form=post&id='.$postId.'" method="post">';

 }
else{
    ?>
      <form id="postDetails" action="newData.php?id=postDetails" method="post">
<?php 
}
?>


           

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="name">Title:</label>
                    </div>
                    <div class="col-md-10">
                        <?php echo '<input type="text" class="form-control" name="postTitle" value="'.$postTitle.'">'; ?>
                    </div>
                </div>
                <!--
                       <div class="form-group row">
                           <div class="col-md-2">
                               <label for="mobile">Tags:</label>
                           </div>
                           <div class="col-md-10">
                               <input type="text" class="form-control" name="postMobile">            
                           </div>
                       </div>
                -->
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="address">Text:</label>
                    </div>
                    <div class="col-md-10">
                        <?php echo '<textarea type="text" class="speech-input form-control"  name="postText" rows=7 cols=120>'.$postContent.'</textarea>'; ?>
                    </div>
                </div>

                



                <div class="row">
                    <div class="col-md-offset-5 col-md-3">
                        <a href=""><button type="submit" class="btn btn-primary">Submit</button></a>
                        <button type="reset" class="btn btn-success">Reset</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
      
        </form>
  </div>


        <?php include_once '../web/footer.php'; ?>
        <script type="text/javascript">
function clearForm() { 
  document.getElementByTagName['form pageId'].reset();
}
</script>
<script src="speech-input.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
