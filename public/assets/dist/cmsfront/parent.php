<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top1.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear;
 
 if (isset($_POST['update'])) {
	  $oldpassword=$_POST['oldpassword'];
	  $password=$_POST['password'];
	 
	 $qury2=mysql_query("SELECT * FROM parent WHERE password='$oldpassword' AND p_id='$pid'"); 
	 $querysold=mysql_fetch_array($qury2);
								  
	 if($querysold){
		 $sql=mysql_query("UPDATE parent SET password='$password' WHERE p_id='$pid'");
		 if($sql){
			 header("Location:parent.php?msg=succ");
		 }		 
	 }else{
		 header("Location:parent.php?msg=erronold");
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
 
 		<div class="btn-toolbar">
  <div class="btn-group">
  </div>
</div>
 <?php 
			$msg=$_GET['msg'];
			if($msg == "erronold"){?>
                    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Please Fillout Correct current Password!!!
    </div><?php } if($msg=="succ"){?>
    				<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
         Your password has been succesfully updated!!!
    </div>
    			<?php } ?>	
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Change Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <table class="table list">
            <thead>
                <tr>
                  <th>Title</th>
                  <th>-</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM parent WHERE p_id=$pid"); 
						//$total =0;
					$row=mysql_fetch_array($qury1);					 
					?>
                  <tr>
                      <td>Name</td>
                      <td> - </td>
                      <td><?php echo $row['p_name']; ?></td>
                  </tr>
                  <tr>
                      <td>Phone No</td>
                      <td> - </td>
                      <td><?php echo $row['phone_number']; ?></td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td> - </td>
                      <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                      <td>Occupation</td>
                      <td> - </td>
                      <td><?php echo $row['ocupation']; ?></td>
                  </tr>
                  
              </tbody>
            </table><hr>
      <div class="block-heading">
        	<center><strong><h5>Student Details</h5></strong></center>
        </div>	<table class="table list">
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM student WHERE ss_id=$ssid"); 
						//$total =0;
					$row=mysql_fetch_array($qury1);					 
					?>
                  <tr>
                      <td>Admin NO</td>
                      <td> - </td>
                      <td><?php echo $row['admission_number']; ?></td>
                  </tr>
                  <tr>
                      <td>Student First Name</td>
                      <td> - </td>
                      <td><?php echo $row['firstname']; ?></td>
                  </tr>
                  <tr>
                      <td>Student Last Name</td>
                      <td> - </td>
                      <td><?php echo $row['lastname']; ?></td>
                  </tr>
                  <tr>
                      <td>Monthly Income of Father / Guardian</td>
                      <td> - </td>
                      <td><?php echo $row['p_income']; ?></td>
                  </tr>
                  <tr>
                      <td>Mother's Name</td>
                      <td> - </td>
                      <td><?php echo $row['m_name']; ?></td>
                  </tr>
                  <tr>
                      <td>Mother's Occupation</td>
                      <td> - </td>
                      <td><?php echo $row['m_occup']; ?></td>
                  </tr>
                  <tr>
                      <td>Mother's Monthly Income</td>
                      <td> - </td>
                      <td><?php echo $row['m_income']; ?></td>
                  </tr>
                   <tr>
                      <td>Date of admission</td>
                      <td> - </td>
                      <td><?php echo $row['doa']; ?></td>
                  </tr>
                  <tr>
                      <td>Date Of Birth</td>
                      <td> - </td>
                      <td><?php echo $row['dob']; ?></td>
                  </tr>
                  <tr>
                      <td>Gender</td>
                      <td> - </td>
                      <td><?php if($row['gender']=='M'){ echo 'Male'; }else{ echo"Female"; }?></td>
                  </tr>
                  <tr>
                      <td>Religion</td>
                      <td> - </td>
                      <td><?php echo $row['reg']; ?></td>
                  </tr>
                  <tr>
                      <td>Caste</td>
                      <td> - </td>
                      <td><?php echo $row['caste']; ?></td>
                  </tr>
                  <tr>
                      <td>Blood Group</td>
                      <td> - </td>
                      <td><?php echo $row['blood']; ?></td>
                  </tr>
                  <tr>
                      <td>Residence Address1</td>
                      <td> - </td>
                      <td><?php echo $row['address1']; ?></td>
                  </tr>
                  <tr>
                      <td>Town or village Name</td>
                      <td> - </td>
                      <td><?php echo $row['city_id']; ?></td>
                  </tr>
                  <tr>
                      <td>Country</td>
                      <td> - </td>
                      <td><?php echo $row['country']; ?></td>
                  </tr>
                  <tr>
                      <td>Pin Code</td>
                      <td> - </td>
                      <td><?php echo $row['pin']; ?></td>
                  </tr>
                  <tr>
                      <td>Mother Tongue of the Pubil </td>
                      <td> - </td>
                      <td><?php echo $row['mother_tongue']; ?></td>
                  </tr>
                  <tr>
                      <td>Height</td>
                      <td> - </td>
                      <td><?php echo $row['height']; ?></td>
                  </tr>
                  <tr>
                      <td>Weight</td>
                      <td> - </td>
                      <td><?php echo $row['weight']; ?></td>
                  </tr>
                  
              </tbody>
            </table>	      </div>
      <div class="tab-pane fade" id="profile">
    <form id="register-form" method='post' action=''>
    	<label>Old Password</label>
        <input type="password" name="oldpassword" class="input-xlarge">
        <label>New Password</label>
        <input type="password" id="Password" name="password" class="input-xlarge">
        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" class="input-xlarge">
        <div>
            <button class="btn btn-primary" name="update" type="submit">Update</button>
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

