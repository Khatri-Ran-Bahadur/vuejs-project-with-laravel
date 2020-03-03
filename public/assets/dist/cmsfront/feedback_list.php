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
            <h1 class="page-title">Feedback list</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Feedback list</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block">
                <p class="block-heading">Feedback list</p>
                <div id="tablewidget" class="block-body collapse in">
        
                    <?php  $select_record2=mysql_query("SELECT * FROM feedback WHERE c_id=$cid AND s_id=$sid AND p_id=$pid AND b_id=$bid AND ay_id=$acyear");		
						$totalcount=0;				
					while($classtest21=mysql_fetch_array($select_record2))
					{ $totalcount++;}
					if($totalcount!=0){
					?>                    
            <table class="table">
              <thead>
                <tr>
                  <th>s.no</th>
                  <th>Title</th>
                  <th>Message</th>
                  <th width="100px">Staff Name</th>
                  <th width="135px">Date</th>
                  <!--<th width="80px;">Action</th>-->
                </tr>
              </thead>
              <tbody>
              <?php 
			  	$count1=1;
						 $select_record2=mysql_query("SELECT * FROM feedback WHERE c_id=$cid AND s_id=$sid AND p_id=$pid AND ay_id=$acyear ORDER BY f_id DESC");						
					while($classtest21=mysql_fetch_array($select_record2))
					{ 
					$stid=$classtest21['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); 
					?>
                <tr>
                  <td><?php echo $count1;?></td>
                  <td><?php echo $classtest21['title'];?></td>
                  <td><?php echo $classtest21['msg'];?></td>
                  <td><?php echo $result3['fname']." ".$result3['mname']." ".$result3['lname'];?></td>
                  <td><?php echo $classtest21['date'];?></td>
                </tr>
                <?php  $count1++; }?>
              </tbody>
            </table>   
            <?php }else{ echo "<br><center><p> There is no Feedback found!!!<p></center> <br>" ;}?>         
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

