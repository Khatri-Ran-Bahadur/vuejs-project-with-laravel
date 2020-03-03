<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top1.php");
 
 if (isset($_POST['update'])) {
	  $ssid_select=$_POST['ssid'];
	  	$squery2=mysql_query("select * from student where ss_id='$ssid_select' ");
		$student4=mysql_fetch_array($squery2);	  	
	  
	  	$_SESSION['sadmin_no']=$student4['admission_number'];;
		$_SESSION['ss_id']=$ssid_select;  
		 header("Location:student_select.php?msg=succ");	 
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
    
    <?php include("nav1.php");?>
    
	<?php include("sidemenu1.php"); ?>   
    <div class="content">
        <?php include("includes/head.php");?>
            <h1 class="page-title">My Profile</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">My Profile</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">

 <?php 
			$msg=$_GET['msg'];
			 if($msg=="succ"){?>
    				<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
         The Student has been succesfully changed!!!
    </div>
    			<?php } ?>
                <div class="row-fluid" style="min-height:320px">
   <div class="block">
                <p class="block-heading">Exam list</p>
                <div class="block-body">
                    <form id="register-form" method='post' action=''>
    	 <?php 
								 $classl = mysql_query("SELECT * FROM sibling WHERE p_id='$pid'");
                                           while ($row1 = mysql_fetch_assoc($classl)){
											   $ssid2=$row1['ss_id'];
												   	$squery1=mysql_query("select * from student where ss_id='$ssid2' ");
													$student3=mysql_fetch_array($squery1);
											   if($check==$row1['admin_no']){
												   ?>
								<label><input type="radio" class="radio" name="ssid" value="<?php echo $row1['ss_id']; ?>" checked/> <?php echo $row1['admin_no']." - ".$student3['firstname']." ".$student3['lastname']; ?></label>
                                <?php }else{ ?>
                                <label><input type="radio" name="ssid" value="<?php echo $row1['ss_id']; ?>" /> <?php echo $row1['admin_no']." - ".$student3['firstname']." ".$student3['lastname']; ?></label>                        
                                <?php } } ?>
        <div>
            <center><button class="btn btn-primary" name="update" type="submit">select</button></center>
        </div>
    </form>
                </div>
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
        $("#register-form").validate({
            // Specify the validation rules
            rules: {
                oldpassword: "required",
                password: "required",
                confirmpassword: {
                    required: true,
                    equalTo: "#Password"
                }
            },
            // Specify the validation error messages
            messages: {
                oldpassword: "Please enter your current password",
                password: {
                    required: "Please provide a New password",                    
                },
                confirmpassword: {
                    required: "Please provide a ConfirmPassword",
                    equalTo: "Please enter the same value again"
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

