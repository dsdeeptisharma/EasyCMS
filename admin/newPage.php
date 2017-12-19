<!DOCTYPE html>
<html>
<link rel="stylesheet" href="speech-input.css">

<?php

include_once 'header.php';


if(isset($_POST['submit'])){

    //collect form data
    $title = $_POST['pageTitle'];
    $text = $_POST['pageDescription'];
$con=$_POST['pageContent'];

    //check name is set
    if($title ==''){
        $error[] = 'Title is required';
    }

   
    //if no errors carry on
    if(!isset($error)){

        //create html of the data
        ob_start();
        ?>
<div align="center">
         <h1>Your Content</h1> </div>
       <p style="color:red">Title: <?php echo $title;?></p>
        <p>Description: <?php echo $text;?></p>
<p>Content:<?php echo $con;?></p>

        <?php 
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        $mpdf->Output('demo.pdf','D');

        //save to server
        //$mpdf->Output("mydata.pdf",'F');



    }
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
<form action='' method='post'>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="name">Page Title:</label>
                </div>
                <div class="col-md-10">
                  <?php echo  '<input type="text" class="form-control" name="pageTitle" value="'.$pageTitle.'">'; ?>
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="mobile">Page Description:</label>
                </div>
                <div class="col-md-10">
                    <?php echo '<input type="text" class="form-control" name="pageDescription" value="'.$pageDescription.'">' ?>
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-2">
                    <label for="address">Page Content:</label>
                </div>
                <div class="col-md-10">
                    <?php echo '<textarea type="text" class="speech-input form-control" name="pageContent" rows=7 cols=120>'.$pageContent.'</textarea>'; ?>
                </div>
            </div>
    
	
	<div class="row">
                    <div class="col-md-offset-5 col-md-3">
                        <a href=""><button type="submit" name="submit" class="btn btn-primary">Generate PDF</button></a>
                        <button type="reset" class="btn btn-success" onclick="clearForm(this.form);">Reset</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
	
	
            <!--<div class="row">
                <div class="col-md-offset-5 col-md-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-success">Reset</button>
                </div>
                <div class="col-md-4"></div>
  </div>-->
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
