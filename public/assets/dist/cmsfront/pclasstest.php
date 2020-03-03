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
        <?php include("includes/head.php");
		$mid=$_GET['mid'];
							if(!$mid){ 
							$dmonth=date("m");
							$monthlist1=mysql_query("SELECT * FROM month WHERE m_no=$dmonth AND ay_id=$acyear"); 
								  $month1=mysql_fetch_array($monthlist1);
								  $mid=$month1['m_id'];
							}
							$subid=$_GET['subid']; 
							if(!$subid){
								$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid LIMIT 0,1");
								$row1=mysql_fetch_array($qry1);
								$subid=$row1['sl_id'];
							}
							$subjectlist=mysql_query("SELECT * FROM month WHERE m_id=$mid"); 
								  $month=mysql_fetch_array($subjectlist);?>
            <h1 class="page-title">Class Test Details <?php echo "( ".$month['m_name']." )";?></h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Class Test Details</li>
            <span style="float:right;">
            <?php
									$qry2=mysql_query("SELECT * FROM year ORDER BY ay_id DESC LIMIT 1");
									$row2=mysql_fetch_array($qry2);				
									$monthno=date("m");
									$mcount=1;
                                            $classl1 = "SELECT m_id,m_name,m_no FROM month where ay_id=$acyear";
                                            $result11 = mysql_query($classl1) or die(mysql_error());
                                            echo '<select name="mid" id="mid" class="required" onchange="change_function()"> <option value="">Select Month</option>';
											while ($row11 = mysql_fetch_assoc($result11)):
											$mid1=$row11['m_id'];
											$mno=$row11['m_no'];
											if($mcount==1){	
												if($mid1==$mid){
                                                 echo "<option value='{$row11['m_id']}' selected>{$row11['m_name']}</option>\n";
												}else{
													echo "<option value='{$row11['m_id']}'>{$row11['m_name']}</option>\n";
												}
												}
											if($mno==$monthno && $row2['ay_id']==$acyear){
													$mcount=0;
												}
                                            endwhile;
                                            echo '</select>';
                                            ?>
                                            </span>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div class="row-fluid">
	<?php 
				 			$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid");
							$count=1;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$slid1=$row1['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist1=mysql_fetch_array($subjectlist1);?>
                 <a href="pclasstest.php?subid=<?php echo $row1['sub_id']; ?>&mid=<?php echo $mid;?>" class="btn btn-success btn-large" style="margin:0px 0 0 10px;"><?php echo $slist1['s_name']; ?></a>
                <?php } ?> 
                
                             
    <div class="row-fluid" style="min-height:300px;">
    <?php
							
				if($subid){
							$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	  
							$subjectlist=mysql_query("SELECT * FROM month WHERE m_id=$mid"); 
								  $month=mysql_fetch_array($subjectlist);
							$subjectlist1=mysql_query("SELECT * FROM subject WHERE sub_id=$subid"); 
								  $subject=mysql_fetch_array($subjectlist1);
								  $slid=$subject['sl_id'];
								   $subjectlist=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist=mysql_fetch_array($subjectlist);
							 	  //echo $class['c_name']."-".$section['s_name'];
				?>  
    <div class="block span12">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse"><?php echo $class['c_name']." - ".$section['s_name'];?> - Classtest Details (<?php echo $slist['s_name'];?>)<span class="label label-warning"><?php echo $month['m_name'];?> Month</span></a>
        <div id="tablewidget" class="block-body collapse in">
        
                    <?php  $select_record2=mysql_query("SELECT * FROM classtest WHERE c_id=$cid AND s_id=$sid AND m_id=$mid AND ay_id=$acyear AND sub_id=$subid");		
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
                  <th>Date</th>
                  <th>Details</th>
                  <!--<th width="80px;">Action</th>-->
                </tr>
              </thead>
              <tbody>
              <?php 
			  	$count1=1;
						 $select_record2=mysql_query("SELECT * FROM classtest WHERE c_id=$cid AND s_id=$sid AND m_id=$mid AND ay_id=$acyear AND sub_id=$subid ORDER BY ct_id DESC");						
					while($classtest21=mysql_fetch_array($select_record2))
					{ 
					?>
                <tr>
                  <td><?php echo $count1;?></td>
                  <td><?php echo $classtest21['title'];?></td>
                  <td><?php echo $classtest21['day']."-".$classtest21['month']."-".$classtest21['year'];?></td>
                  <td><?php echo $classtest21['detail'];?></td>
                </tr>
                <?php  $count1++; }?>
              </tbody>
            </table>   
            <?php }else{ echo "<br><center><p> There is no classtest found!!!<p></center> <br>" ;}?>         
        </div>
    </div>  
    <?php  }else{ echo "<center><h5>There is no subject assigned for this class!!!  </h5></center> "; } ?>
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
		function change_function() { 
     var mid =document.getElementById('mid').value;
	  window.location.href = 'pclasstest.php?mid='+mid+'&subid=<?php echo $subid;?>';	
	} 
    </script>
    
  </body>
</html>
<? ob_flush(); ?>

