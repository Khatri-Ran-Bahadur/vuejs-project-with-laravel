<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top.php"); 
  $mid=$_GET['mid'];
 $subid=$_GET['subid'];
 $hid=$_GET['hid'];
 //echo $_SESSION['uname'];
 //echo $acyear;
 
  if (isset($_POST['update'])) {
	  $status=$_POST['status'];
	  $remark=$_POST['remark'];
	  $hst_id=$_POST['hst_id'];
	if($status){  
	  if($hst_id){
		  $sql=mysql_query("UPDATE homework_status SET status='$status',s_remark='$remark' WHERE id='$hst_id'");		  
	  }else{
		  $sql=mysql_query("INSERT INTO homework_status (status,h_id,ss_id,c_id,s_id,b_id,ay_id,s_remark) VALUES ('$status','$hid','$ssid','$cid','$sid','$bid','$acyear','$remark')");
	  }
	 	 if($sql){
			 $msg="succ";
	   }else{
		 $msg="err";
	   }
	}else{
		$msg="errfill";
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
        <?php include("includes/head.php");
							if(!$mid){ 
							$dmonth=date("m");
							$monthlist1=mysql_query("SELECT * FROM month WHERE m_no=$dmonth AND ay_id=$acyear"); 
								  $month1=mysql_fetch_array($monthlist1);
								  $mid=$month1['m_id'];
							}
		
							if(!$subid){
								$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid LIMIT 0,1");
								$row1=mysql_fetch_array($qry1);
								$subid=$row1['sl_id'];
							}
							$subjectlist=mysql_query("SELECT * FROM month WHERE m_id=$mid"); 
								  $month=mysql_fetch_array($subjectlist);
								  ?>
            <h1 class="page-title">Homework Details <?php echo "( ".$month['m_name']." )";?></h1>
        </div>        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li><a href="homework.php?mid=<?php echo $mid."&subid=".$subid;?>">Homework Details</a> <span class="divider">/</span></li>
            <li class="active">Edit Homework Status</li>
            <a href="homework.php?mid=<?php echo $mid."&subid=".$subid;?>"<span class="label label-warning"> <i class="icon-arrow-left"></i> back</span></a>
            </ul>
        <?php 
			//$msg=$_GET['msg'];
			if($msg == "errfill"){?>
                    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Please provide your homework status!!!
    </div><?php } if($msg=="succ"){?>
    				<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Your Homework Status has been succesfully updated!!!
    </div>
    			<?php } if($msg=="err"){?>
    				<div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Some Error On your Details
    </div>
    			<?php } ?>	
        <div class="container-fluid">
            <div class="row-fluid">
<div class="row-fluid">      
    <div class="row-fluid" style="min-height:300px;">
    <?php					
				if($subid){
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	  
							$subjectlist1=mysql_query("SELECT * FROM subject WHERE sub_id=$subid"); 
								  $subject=mysql_fetch_array($subjectlist1);
								  $slid=$subject['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid'"); 
								   $slist=mysql_fetch_array($subjectlist1);
							 	  //echo $class['c_name']."-".$section['s_name'];
				?>  
    <div class="block span12">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse"><?php echo $class['c_name']." - ".$section['s_name'];?> - Homework Details (<?php echo $slist['s_name'];?>)<span class="label label-warning"><?php echo $month['m_name'];?> Month</span></a>
        <div id="tablewidget" class="block-body collapse in">
        <form id="homework-form" method='post' action=''>
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>:</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
              <?php 
			  	$count1=1;
						 $select_record2=mysql_query("SELECT * FROM homework WHERE h_id=$hid");						
					$classtest21=mysql_fetch_array($select_record2);
					
					$hstatus=mysql_query("SELECT * FROM homework_status WHERE h_id=$hid AND ss_id=$ssid AND c_id=$cid AND s_id=$sid AND b_id=$bid AND ay_id=$acyear");						
					$hstatuslist=mysql_fetch_array($hstatus);
					
					$status=$hstatuslist['status'];
					$remark1=$hstatuslist['s_remark'];
					$remark2=$hstatuslist['st_remark'];
					$hst_id=$hstatuslist['id'];
					
					?>
                    <tr>
                  <td>Title</td>
                  <td>:</td>
                  <td><?php echo $classtest21['title'];?></td>
                  </tr>
                  <tr>
                  <td>Date</td>
                  <td>:</td>
                  <td><?php echo $classtest21['day']."-".$classtest21['month']."-".$classtest21['year'];;?></td>
                  </tr>
                  <tr>
                  <td>Homework Details</td>
                  <td>:</td>
                  <td><?php echo $classtest21['detail'];?></td>
                  </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td><select name="status" id="status">
                  						<option value="" <?php if(!$status){ echo 'selected'; }?>>Pending</option>
										<option value="1" <?php if($status=='1'){ echo 'selected'; }?>>Started</option>
                                        <option value="2" <?php if($status=='2'){ echo 'selected'; }?>>Finished</option>
					</select></td>
                 </tr>
                 <tr>
                  <td>Finished Details</td>
                  <td>:</td>
                  <td><textarea name="remark" id="remark" rows="5" style="width:90%"><?php echo $remark1;?></textarea></td>
                  </tr>
                 <tr>
                 <?php if($remark2){?>
                 <tr>
                  <td>Staff's Remark</td>
                  <td>:</td>
                  <td><?php echo $remark2;?></td>
                  </tr>
                  <?php }?>
                 <td colspan="3">
                 <div align="center">
                 <input type="hidden" name="hst_id" value="<?php echo $hst_id;?>" />
            <button class="btn btn-primary" name="update" type="submit">Submit</button>
            
        </div>
                 </td>
                 </tr>
              </tbody>
            </table>  </form> 
            <?php } else { echo "<br><center><p> There is no homework found!!!<p></center> <br>" ;}?>         
        </div>
    </div>  
</div>
</div>
                    <footer>
                        <hr>
                        <p>Copyright &copy; 2014 All rights reserved</p>
                    </footer>
                    
            </div>
        </div>
    </div>
    <script src="lib/jquery.validate.min.js"></script>

<!-- jQuery Form Validation code -->
<script>
    // When the browser is ready...
    $(function() {

        // Setup form validation on the #register-form element
        $("#homework-form").validate({
            // Specify the validation rules
            rules: {
                status: "required"
            },
            // Specify the validation error messages
            messages: {
                status: "Please provide your homework status"
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
		
		function change_function() { 
     var mid =document.getElementById('mid').value;
	  window.location.href = 'homework.php?mid='+mid+'&subid=<?php echo $subid;?>';	
	} 
    </script>
    <!-- Load jQuery and the validate plugin -->
  </body>
</html>
<? ob_flush(); ?>

