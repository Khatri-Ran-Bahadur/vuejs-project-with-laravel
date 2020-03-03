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
		
		$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	
								  ?>
            <h1 class="page-title">School Fees Payment Details</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $class['c_name']."-".$section['s_name'];?> - Fees Details</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse"><?php echo $class['c_name']."-".$section['s_name'];?> - Fees Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table id="table-example" class="table">
							<thead>
								<tr>
									<th>S.No</th>
                                    <th><center>Group Name</center></th>
                                    <?php 							
							$qry1=mysql_query("SELECT * FROM fdiscount WHERE fdis_id=$discount");							
			  				$row1=mysql_fetch_array($qry1);
				 ?>
                                    <th><?php echo $row1['fdis_name'];?></th>
                                    
								</tr>
							</thead>
							<tbody>
                                   <?php
							$qry=mysql_query("SELECT * FROM frate WHERE ay_id='$acyear' AND b_id='$bid' AND c_id='$cid'");							
							$count=1;
						  while($row=mysql_fetch_array($qry))
							{ 
							$frid=$row['fr_id'];
							$fgid2=$row['fg_id'];
							$fgrouplist=mysql_query("SELECT * FROM fgroup WHERE fg_id=$fgid2");
											  $fgroup=mysql_fetch_array($fgrouplist);	
											  $grouptype=$fgroup['ftype'];								
				?>				<?php if($grouptype!="other"){ ?>
                                <tr class="gradeX">		
								<td class="sno center"><center><?php echo $count; ?></center></td>
                                <td><center><?php echo $fgroup['fg_name']; ?></center></td>
                                <?php 
				$qry3=mysql_query("SELECT * FROM fgroup_detail where fg_id=$discount");													
									  while($row3=mysql_fetch_array($qry3))
										{
											$fgdid=$row3['fgd_id'];
											$type=$row3['type'];
											$ftype="";												
				$frvaluelist=mysql_query("SELECT * FROM frate_value WHERE fr_id=$frid AND fdis_id=$discount AND fgd_id=$fgdid AND ay_id=$acyear AND ftype='0'"); 
								  $frvalue=mysql_fetch_array($frvaluelist);
								  if($frvalue){
								  $total +=$frvalue['dis_value'];
								  }
								  }
								  //if($grouptype!="other"){
				?>
                                    <td><?php echo $total;?></td>
                            <?php  
								 // }
							?>
                            	<?php $count++; }else{
									$qry3=mysql_query("SELECT * FROM fgroup_detail where fg_id=$fgid2");													
									  while($row3=mysql_fetch_array($qry3))
										{
											$fgdid=$row3['fgd_id'];
											$type=$row3['type'];
											$ftype="";	
											$test=mysql_query("SELECT * FROM frate_value WHERE fr_id=$frid AND fgd_id=$fgdid AND ay_id=$acyear AND ftype='0'"); 
											$frvalue21=mysql_fetch_array($test);
									if($frvalue21){
							?>
                            <tr class="gradeX">		
								<td class="sno center"><center><?php echo $count; ?></center></td>
                            <td><center><?php echo $row3['name']; ?></center></td>
                                <?php 					
				$frvaluelist=mysql_query("SELECT * FROM frate_value WHERE fr_id=$frid AND fdis_id=$discount AND fgd_id=$fgdid AND ay_id=$acyear AND ftype='0'"); 
								  $frvalue=mysql_fetch_array($frvaluelist);
								  if($frvalue){		  
				?>
                                    <td><?php echo $frvalue['dis_value'];?></td>
                            <?php 
								 }?>
                                <?php $count++;} } }?>	
                                </tr>							 							
                                 <?php 
							} ?> 
                            
 <!-- *************************** Old Student Total Start ************************** -->
                            <tr class="gradeX odd" role="row">
									<td class="sno center sorting_1"><center>-</center></td>
								<td><center><b>Total</b></center></td>
                                <?php 							
				$total1=0;
				$fdisid2=$discount;
				 $qry=mysql_query("SELECT * FROM frate WHERE ay_id=$acyear AND b_id=$bid AND c_id=$cid");
				 		  while($row=mysql_fetch_array($qry))
							{ 
							$frid=$row['fr_id'];
							$fgid2=$row['fg_id'];
				$qry3=mysql_query("SELECT * FROM fgroup_detail where fg_id=$fgid2");													
									  while($row3=mysql_fetch_array($qry3))
										{
											$fgdid=$row3['fgd_id'];
											$type=$row3['type'];
											$ftype="";												
				$frvaluelist=mysql_query("SELECT * FROM frate_value WHERE fr_id=$frid AND fdis_id=$fdisid2 AND fgd_id=$fgdid AND ay_id=$acyear AND ftype='0'"); 
								  $frvalue=mysql_fetch_array($frvaluelist);
								  if($frvalue){
								  $total1 +=$frvalue['dis_value'];								  
								  }
								  
								  } }
				?>
                                    <td><b>Rs. <?php echo number_format($total1,2);?></b></td>
                          							
                                 								</tr> 
<!-- *************************** Old Student Total End ************************** -->                                                                                 																
							</tbody>
						</table>  
        </div>
    </div> 
</div>         <footer>
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

