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
            <h1 class="page-title">Circular Details</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Circular Details</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Your Circular Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <thead>
                <tr>
                  <th>S.no</th>
                  <th>Published Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Download Circular</th>
                </tr>
              </thead>
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM circular WHERE ay_id=$acyear AND (b_id=$bid OR b_id='0') AND (type='Parent' OR type='All') AND Status='1' ORDER BY cl_id DESC"); 
						$count =1;
					while($row3=mysql_fetch_array($qury1))
					{ 
					?>
                  <tr>
                  		<td><?php echo $count; ?></td>
                      <td><?php echo $row3['cl_day']."-".$row3['cl_month']."-".$row3['cl_year']; ?></td>
                      <td><?php echo $row3['title']; ?></td>
                      <td width="50%"><?php echo $row3['descript'];  ?></td>
                      <td><?php if($row3['file']){?><a href="pdownload.php?clid=<?php echo $row3['cl_id'];?>" class="btn btn-warning btn-large">Download</a><?php } ?></td>
                  </tr>
                  <?php $count++; } ?>
              </tbody>
            </table>
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

