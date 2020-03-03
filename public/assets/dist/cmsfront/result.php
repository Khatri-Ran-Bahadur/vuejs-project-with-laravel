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
            <h1 class="page-title">Exam Result</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li><a href="examlist.php">Exam List</a> <span class="divider">/</span></li>
            <li class="active">Result</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid">
                             
    <div class="row-fluid" style="min-height:300px;">
    <?php
							$cid=$_GET['cid'];
							$sid=$_GET['sid'];
							$eid=$_GET['eid'];
							
							
				if($cid && $sid && $eid){
							$examlist=mysql_query("SELECT * FROM exam WHERE e_id=$eid"); 
								  $exam=mysql_fetch_array($examlist);
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	
							 	  
				?>  
    <div class="block span8">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse"><?php echo $class['c_name']." - ".$section['s_name'];?> - <?php echo $user;?> Result Details<span class="label label-warning"><?php echo $exam['e_name'];?></span></a>
        <div id="tablewidget" class="block-body collapse in">
                   
            <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Mark</th>
                  <th>Result</th>
                </tr>
              </thead>
              <tbody>
                
                <?php 
						$qury=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid"); 
						$total =0;
					while($subject2=mysql_fetch_array($qury))
					{ 
					$slid1=$subject2['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist1=mysql_fetch_array($subjectlist1);
					$subid=$subject2['sub_id'];
					 $paper=$slist1['paper'];
					$select_record6=mysql_query("SELECT * FROM result WHERE c_id=$cid AND s_id=$sid AND e_id=$eid AND sub_id=$subid AND ay_id=$acyear AND ss_id=$ssid");
					$result2=mysql_fetch_array($select_record6);
					$ml =$result2['mark'];
					if($ml){
					?>
                    <tr>
                  <td><?php echo $slist1['s_name'];?></td>
                  <td> <strong> <?php
								$mark=$result2['mark'];
								$mark1=$result2['mark1'];
								$tot=$mark+$mark1;
								 if($paper=='1'){ echo $mark." - ".$mark1." = ".$tot; } else { $tot=$ml; echo $result2['mark']; }?></strong></td>
                   <td> <strong> <?php echo $result2['result'];?></strong></td>
                   <?php $total+=$tot; }?>
                </tr>
                <?php }?>
                <tfoot>
                 <tr>
                <?php if($total!=0){ ?>               
                <td>Total</td>
                <td><strong><?php echo $total;?></strong></td>
                <td></td>
                <?php }else{ echo "<td colspan='3'><br><center><p>There is no result found!!!</p></center><br></td>";}?>
                </tr>
                </tfoot> 
              </tbody>
            </table>            
        </div>
    </div>  
    <div class="block span4">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Subject wise Staff Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <thead>
                <tr>
                  <th>Staff Details</th>
                </tr>
              </thead>
              <tbody>
              <?php $qury1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid"); 
						//$total =0;
					while($subject3=mysql_fetch_array($qury1))
					{ 
					$slid1=$subject3['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist1=mysql_fetch_array($subjectlist1);
					$stid=$subject3['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); ?>
                  <tr>
                      <td>
                          <p><?php echo $slist1['s_name']." - ".$result3['fname']." ".$result3['mname']." ".$result3['lname'];?> </p>                          
                      </td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
        </div>
    </div>  
    <?php } ?>
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

