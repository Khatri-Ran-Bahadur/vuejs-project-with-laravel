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
            <h1 class="page-title">Attendance</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Attendance</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid">
	<?php 
	$monthno=date("m");
				 			$qry1=mysql_query("SELECT * FROM month WHERE ay_id=$acyear");
							$count=1;
							$mcount=1;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$mno=$row1['m_no'];
					if($mcount==1){?>
                 <a href="attendance.php?cid=<?php echo $cid;?>&sid=<?php echo $sid;?>&mid=<?php echo $row1['m_id']; ?>&bid=<?php echo $bid;?>" class="btn btn-warning btn-large" style="margin:0px 0 0 10px;"><?php echo $row1['m_name']; ?></a>
                <?php } if($mno==$monthno){
						$mcount=0;
					} }
					?> 
                
                             
    <div class="row-fluid" style="min-height:300px;">
    <?php
							$cid=$_GET['cid'];
							$sid=$_GET['sid'];
							//$eid=$_GET['eid'];
							$mid=$_GET['mid'];
							
							
				if($cid && $sid && $mid){
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	  
							$subjectlist=mysql_query("SELECT * FROM month WHERE m_id=$mid"); 
								  $month=mysql_fetch_array($subjectlist);
							 	  //echo $class['c_name']."-".$section['s_name'];
				?>  
    <div class="block span9">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse"><?php echo $class['c_name']." - ".$section['s_name'];?> - <?php echo $user;?> Attendance Details<span class="label label-warning"><?php echo $month['m_name'];?> Month</span></a>
        <div id="tablewidget" class="block-body collapse in">
        <?php 
		$present=0;$absent=0;$absentoff=0;$workday=0;
						$select_record2=mysql_query("SELECT * FROM attendance WHERE c_id=$cid AND s_id=$sid AND m_id=$mid AND ay_id=$acyear AND ss_id=$ssid ORDER BY day");
					while($monthday=mysql_fetch_array($select_record2))
					{ 
					$result=$monthday['result'];
					if($result=='1'){
						$present++;
					}
					if($result=='0'){
						$absent++;
					}
					if($result=='off'){
						$absentoff++;
					}
					
						$workday++;
					}
					
					$op=$absentoff*.5;
					if($workday){
					$persent=round((($present+$op)/$workday)*100,2);
				}
					?>
                    
                    <?php //echo $present."<BR>".$absent."<BR>".$absentoff."<BR>".$persent;?>
            <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Total Working Days (upto Updated)</td>
                  <td>: <strong><?php echo $workday;?></strong></td>
                </tr>
                <tr>
                  <td>No of Presents</td>
                  <td>: <strong><?php echo $present;?></strong></td>
                </tr>
                <tr>
                  <td>No of Absents</td>
                  <td>: <strong><?php echo $absent+$absentoff;?></strong></td>
                </tr>
                <tr>
                  <td>Percentage</td>
                  <td>: <strong><?php echo $persent;?>%</strong></td>
                </tr>
              </tbody>
            </table>            
        </div>
    </div>  
    <div class="block span3">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Absent Date List</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <thead>
                <tr>
                  <th>Absent Dates</th>
                </tr>
              </thead>
              <tbody>
              <?php $select_record3=mysql_query("SELECT * FROM attendance WHERE c_id=$cid AND s_id=$sid AND m_id=$mid AND ay_id=$acyear AND ss_id=$ssid AND (result=0 OR result='off') ORDER BY day");
			  $cno=1;
					while($monthday1=mysql_fetch_array($select_record3))
					{ 
					$emonth=$monthday1['month'];
					$eday=$monthday1['day'];
					$eyear=$monthday1['year'];
					$oresult=$monthday1['result'];
					?>
                  <tr>
                      <td>
                          <p><?php echo $cno.".".$eday."/".$emonth."/".$eyear ; if($oresult=='off'){ echo "- <strong>Half Day Absent</strong>";}?> </p>                          
                      </td>
                  </tr>
                  <?php $cno++; } ?>
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

