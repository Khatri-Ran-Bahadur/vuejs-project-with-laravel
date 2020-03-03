<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top.php"); 
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
    
    <?php include("nav.php");?>
    
	<?php include("sidemenu.php"); ?>   
    <div class="content">
        <?php include("includes/head.php");?>
            <h1 class="page-title">Exam list</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Exam list</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block">
                <p class="block-heading">Exam list</p>
                <div class="block-body">
                    <ol>
                    <?php 
				 			$qry1=mysql_query("SELECT * FROM exam WHERE ay_id=$acyear");
							$count=1;
			  while($row1=mysql_fetch_array($qry1))
        		{?>
                        <li><a href="examtimetable.php?cid=<?php echo $cid;?>&sid=<?php echo $sid;?>&eid=<?php echo $row1['e_id']; ?>&bid=<?php echo $bid;?>"><?php echo $row1['e_name'];?></a></li>
                  <?php } ?> 
                    </ol>
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

