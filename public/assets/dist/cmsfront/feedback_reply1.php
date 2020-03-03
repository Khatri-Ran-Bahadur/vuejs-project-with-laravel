<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear; 
  if (isset($_POST['send'])) {
	  $title=$_POST['title'];
	  $msg=$_POST['msg'];
	  $stid=$_POST['stid'];
	  
	  $todaydate=date("d/m/Y H:i:s");
	  
	  $sql=mysql_query("INSERT INTO ssfeedback (st_id,ss_id,title,msg,date,c_id,s_id,b_id,ay_id,status,send) VALUES
('$stid','$ssid','$title','$msg','$todaydate','$cid','$sid','$bid','$acyear','1','student')");
	 if($sql){
		 	 header("Location:feedback_reply1.php?stid=$stid&msg=succ");		 	 
	 }else{
		 header("Location:feedback_reply1.php?stid=$stid&msg=err");
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
         <?php
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	
								  $stid=$_GET['stid'];
							$stafflist=mysql_query("SELECT * FROM staff WHERE st_id=$stid"); 
								  $staff=mysql_fetch_array($stafflist);	
								  $staffname=$staff['fname']." ".$staff['mname']." ".$staff['lname'];
							 	  
				?>  
            <h1 class="page-title"><?php echo $staffname;?> - Feedback</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li><a href="staff_feedback.php">Staff wise Feedback</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $staffname;?> - Feedback</li>
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
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse"> <?php echo $class['c_name']." - ".$section['s_name'];?> <?php echo $staffname;?> -  Feedback</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <!--<thead>
                <tr>
                  <th>Subject Name</th>
                  <th>-</th>
                  <th>Staff Name</th>
                  <th width="100px">Feedbacks</th>
                </tr>
              </thead>-->
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM ssfeedback WHERE c_id=$cid AND s_id=$sid AND st_id=$stid AND ss_id=$ssid AND ay_id=$acyear AND b_id=$bid"); 
						$totasl =0;
					while($subject3=mysql_fetch_array($qury1))
					{ 
					$fid=$subject3['f_id'];
					 $sql=mysql_query("UPDATE feedback SET status='0' WHERE f_id='$fid' AND send='staff'");
					 
					$stid=$subject3['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); 
					$send=$subject3['send'];
					?>
                  <tr style="border:1px solid #C1C0C0;">
                      <td width="150px;">
                          <?php if($send=="student"){ echo "<strong> You<br></strong><span style=' font-size:12px'>".$subject3['date']."</span> "; } else { echo "<strong>".$result3['fname']." ".$result3['mname']." ".$result3['lname']."<br></strong><span style=' font-size:12px'>".$subject3['date']."</span> ";}?>                        
                      </td>
                      <td><?php echo "Title: <strong>".$subject3['title']."</strong><br> Msg : ".$subject3['msg'];?></td>
                  </tr>
                  <?php $totasl++; }
				  if($totasl==0){ echo "<br><center><p>There is no Feedbacks found ! </p></center>"; }?>
              </tbody>
            </table><br><hr>
            <h5>Feedback / Reply</h5>
            <form id="feedback-form" method='post' action=''>
                    <label>Title</label>
                    <input type="text" value="" name="title" class="input-xlarge">
                    <label>Message</label>
                    <textarea value="Smith" rows="3" name="msg" class="input-xlarge"></textarea>
                    <div>
                    <input type="hidden" value="<?php echo $stid;?>" name="stid">
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
                title: "required",
				msg: "required"
            },
            // Specify the validation error messages
            messages: {
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

