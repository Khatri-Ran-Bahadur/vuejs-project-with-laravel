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
            <h1 class="page-title">Month Select for Homework</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Month Select for Homework</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block">
                <p class="block-heading">Month Select for Homework</p>
                <div class="block-body">
                    <ul style="list-style:none;">
                    <?php 
					$monthno=date("m");
				 			$qry1=mysql_query("SELECT * FROM month WHERE ay_id=$acyear");
							$count=1;
							$mcount=1;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$mno=$row1['m_no'];
					if($mcount==1){?>
                 <center>
<li><a href="homework.php?cid=<?php echo $cid;?>&sid=<?php echo $sid;?>&mid=<?php echo $row1['m_id'];?>&bid=<?php echo $bid;?>" class="btn btn-warning btn-large" style="padding:5px 60px;"><?php echo $row1['m_name'];?> Month</a></li><br>
</center>
                <?php } if($mno==$monthno){
						$mcount=0;
					} }
					?> 
                    </ul>
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
    
  </body>
</html>
<? ob_flush(); ?>

