<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear;
 
 if (isset($_POST['send'])) {
	  $staff=$_POST['staff'];
	  $title=$_POST['title'];
	  $msg=$_POST['msg'];
	  
	  $todaydate=date("d/m/Y H:i:s");
	  
	  $sql=mysql_query("INSERT INTO ssfeedback (st_id,ss_id,title,msg,date,c_id,s_id,b_id,ay_id,status,send) VALUES
('$staff','$ssid','$title','$msg','$todaydate','$cid','$sid','$bid','$acyear','1','student')");
	 if($sql){
		 	 header("Location:feedback_form1.php?msg=succ");		 	 
	 }else{
		 header("Location:feedback_form1.php?msg=err");
	 }
	 
 }
 
 ?>
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <?php include("nav.php");?>
    
	<?php include("sidemenu.php"); ?>   
    <div class="content">
        <?php include("includes/head.php");?>
            <h1 class="page-title">Feedback Form</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Feedback Form</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
             <?php 
			$msg=$_GET['msg'];
			if($msg == "err"){?>
                    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Some Problem on your Feedback details
    </div><?php } if($msg=="succ"){?>
    				<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Your feedback has been succesfully sent!!!
    </div>
    			<?php } ?>	
            
<div class="row-fluid" style="min-height:320px">
   <div class="block">
                <p class="block-heading">Feedback Form</p>
                <div class="block-body">
                    <form id="feedback-form" method='post' action=''>
                    <label>Staff</label>
                    <select name="staff" id="staff" class="input-xlarge">
                     <option value="">Please Select Staff</option>                    
                    <?php $qury1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid"); 
						//$total =0;
					while($subject3=mysql_fetch_array($qury1))
					{ 
					$stid=$subject3['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); 
					if($result3){
					?>
                      <option value="<?php echo $result3['st_id'];?>"><?php echo $result3['fname']." ".$result3['mname']." ".$result3['lname'];?></option>
                      <?php } } ?>
                	</select>
                    <label>Title</label>
                    <input type="text" value="" name="title" class="input-xlarge">
                    <label>Message</label>
                    <textarea value="Smith" rows="3" name="msg" class="input-xlarge"></textarea>
                    <div>
            <button class="btn btn-primary" name="send" type="submit">Send</button>
        </div>
        
    </form>
                </div>
            </div>
	
    
</div>
                    <footer>
                        <hr>
                        <!--<p class="pull-right">Designed by  <a href="http://www.webarticleinfotech.com" target="_blank">WebArticleInfoTech</a></p>-->
                        <p>Copyright &copy; 2014 All rights reserved</p>
                    </footer>
                    
            </div>
        </div>
    </div>
     <!-- Load jQuery and the validate plugin -->
<script src="lib/jquery.validate.min.js"></script>

<!-- jQuery Form Validation code -->
<script>
    // When the browser is ready...
    $(function() {

        // Setup form validation on the #register-form element
        $("#feedback-form").validate({
            // Specify the validation rules
            rules: {
                staff: "required",
                title: "required",
				msg: "required"
            },
            // Specify the validation error messages
            messages: {
                staff: "Please Select staff to send",
                title: {
                    required: "Please provide a Title",                    
                },
                msg: {
                    required: "Please provide a message",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });

</script>

 <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
  </body>
</html>
<? ob_flush(); ?>

