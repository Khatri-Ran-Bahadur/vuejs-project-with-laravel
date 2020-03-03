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
            <h1 class="page-title">Staff wise Feedback</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Staff wise Feedback</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            <?php
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	
							 	  
				?>  
            
<div class="row-fluid" style="min-height:320px">
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse"> <?php echo $class['c_name']." - ".$section['s_name'];?> Staff wise Feedback</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <thead>
                <tr>
                  <th>Subject Name</th>
                  <th>-</th>
                  <th>Staff Name</th>
                  <th width="50px">Unreads</th>
                  <th width="100px">Feedbacks</th>
                </tr>
              </thead>
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid"); 
						$totasl =0;
					while($subject3=mysql_fetch_array($qury1))
					{ 
					$slid1=$subject3['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist1=mysql_fetch_array($subjectlist1);
					$stid=$subject3['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); 
					$select_record2=mysql_query("SELECT * FROM feedback WHERE c_id=$cid AND s_id=$sid AND p_id=$pid AND ay_id=$acyear AND status='1' AND send='staff'");						
								$unread=0;
					while($classtest21=mysql_fetch_array($select_record2))
					{ $unread++;
					}
					
					if($result3){?>
                  <tr>
                      <td>
                          <?php echo $slist1['s_name'];?>                        
                      </td>
                      <td> - </td>
                      <td><?php echo $result3['fname']." ".$result3['mname']." ".$result3['lname'];?></td>
                      <td><?php echo $unread;?></td>
                      <td><a href="feedback_reply.php?stid=<?php echo $result3['st_id'];?>" class="btn btn-primary">View</a></td>
                  </tr>
                  <?php } $totasl++; }
				  if($totasl==0){ echo "<br><center><p>Ther is no Student Subject and Staff list found ! </p></center>"; }?>
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

