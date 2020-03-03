<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top1.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear;
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
            <h1 class="page-title">Dashboard</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Dashboard</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Hey <strong><?php echo $user;?>!</strong> Welcome to the <strong>"
School/College Management"</strong> Parent Panel. hope you enjoy your stay and please make sure, that you visit the other pages.
    </div>

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest of Titles</a>
        <div class="block-body gallery">
            
                <a href="pattendance.php" title="Attendance"><img src="images/att.png" class="img-polaroid" width="80" height="80"></a>
            
                <a href="pexamlist.php" title="Result"><img src="images/result.png" class="img-polaroid" width="80" height="80"></a>
            
                <a href="pmonthselect.php" title="Class Test"><img src="images/classtest.png" class="img-polaroid" width="80" height="80"></a>
            
                <a href="pmonthselect1.php" title="Homework"><img src="images/home.png" class="img-polaroid" width="80" height="80"></a>
            
                <a href="" title="Peroid timetable"><img src="images/peroid.png" class="img-polaroid" width="80" height="80"></a>
                
                <a href="pexamlist1.php" title="Exam TimeTable"><img src="images/exam.png" class="img-polaroid" width="80" height="80"></a>
                
                <a href="pstaffdetail.php" title="Staff Details"><img src="images/staff.png" class="img-polaroid" width="80" height="80"></a>
                
                <a href="parent.php" title="My Profile"><img src="images/profile.png" class="img-polaroid" width="80" height="80"></a>
                
                <a href="feedback_form.php" title="Feedback"><img src="images/feedback.png" class="img-polaroid" width="80" height="80"></a>
                
                
                
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>
                    <footer>
                        <hr>

                        <!--<p class="pull-right">Designed by  <a href="http://www.webarticleinfotech.com" target="_blank">WebArticleInfoTech</a></p>-->

                        <p>Copyright &copy; 2015 All rights reserved</p>
                    </footer>
                    
            </div>
        </div>
    </div>
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

