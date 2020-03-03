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
            <h1 class="page-title">Class Timetable Details</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Class Timetable</li>
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

            <a href="#widget2container" data-toggle="collapse"> <?php echo $class['c_name']." - ".$section['s_name'];?> Class Timetable</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
             <?php 
					$timelist1=mysql_query("SELECT * FROM timetable WHERE c_id=$cid AND s_id=$sid AND b_id=$bid AND ay_id=$acyear"); 
								   $timetable1=mysql_fetch_array($timelist1);	
								   if($timetable1){ ?>
						<table class="table1 list" align="center">
							<thead>
								<tr>
                                	<th>Day</th>
									<th>I</th>
									<th>II</th>
									<th></th>
									<th>III</th>
                                    <th>IV</th>
                                    <th></th>
                                    <th>V</th>
                                    <th>VI</th>
                                    <th></th>
                                    <th>VII</th>
                                    <th>VIII</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
								<tr class="gradeX">
									<td></td>
                                    <td></td>
									<td></td>
                                    <td class="vertical" rowspan="6"><strong>Break</strong></td>
									<td></td>
									<td></td>
                                    <td class="vertical" rowspan="6"><strong>Lunch</strong></td>
                                    <td></td>
									<td></td>
                                    <td class="vertical" rowspan="6"><strong>Break</strong></td>
                                    <td></td>
									<td></td>
                                    <td class="vertical" rowspan="6" style="z-index:1;"><strong>Dairy Sign</strong></td>
								</tr>
                                <?php 
							$qry=mysql_query("SELECT * FROM day WHERE ay_id=$acyear");
							$count=1;
			  while($row=mysql_fetch_array($qry))
        		{
					
					 $did=$row['d_id'];
					//die();
								   $timelist=mysql_query("SELECT * FROM timetable WHERE c_id=$cid AND s_id=$sid AND d_id=$did AND b_id=$bid AND ay_id=$acyear"); 
								   $timetable=mysql_fetch_array($timelist);	
								   if($timetable){
									   $tt_id=$timetable['tt_id'];
								   $p1=$timetable['p1'];
								   $p2=$timetable['p2'];
								   $p3=$timetable['p3'];
								   $p4=$timetable['p4'];
								   $p5=$timetable['p5'];
								   $p6=$timetable['p6'];
								   $p7=$timetable['p7'];
								   $p8=$timetable['p8'];
								   $peroid = array($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8);
								   //echo $peroid[3];
								  
								  
					?>
                                <tr class="gradeC">
                                	<td class="hover"><strong><?php echo $row['d_name'];?></strong></td>
                                    <?php  for($i=0;$i<8;$i++){
									  $subid=$peroid[$i];
									  $timeli=mysql_query("SELECT * FROM subject WHERE sub_id='$subid'"); 
									   $row2=mysql_fetch_array($timeli);
									   $slid1=$row2['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid1'"); 
								   $slist1=mysql_fetch_array($subjectlist1);
									  //die();
									  if($row2){ ?>
                                      <td class="hover"><?php echo $slist1['s_name'];?></td>
                                      <?php }else{
									   $qry1=mysql_query("SELECT * FROM extraperoid WHERE ep_code='$subid'");
									   $row1=mysql_fetch_array($qry1); ?>
                                    <td class="hover"><?php echo $row1['ep_name'];?></td>
                                    <?php } } ?>                                                                   
								</tr>
                                <?php } } ?>                               						
							</tbody>
						</table>
                        <div class="block span4" style="margin:5px;">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Staff Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
            <tbody>
              <?php $qury1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND b_id=$bid"); 
						//$total =0;
					while($subject3=mysql_fetch_array($qury1))
					{ 
					$slid=$subject3['sl_id'];
								   $subjectlist=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid'"); 
								   $slist=mysql_fetch_array($subjectlist);
					$stid=$subject3['st_id'];
					$select_record7=mysql_query("SELECT * FROM staff WHERE st_id=$stid");
					$result3=mysql_fetch_array($select_record7); ?>
                  <tr>
                      <td>
                          <p><?php echo $slist['s_name']." - ".$result3['fname']." ".$result3['mname']." ".$result3['lname'];?> </p>                          
                      </td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
        </div>
    </div>
    					<div class="block span4" style="margin:5px;">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Timing</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
        <table class="table list">
            <tbody>
              <tr><td><p>Break - 10 minutes</a></p></td></tr>
              <tr><td><p>Lunch - 50 minutes</a></p></td></tr> 
              <tr><td><p>Dairy Sign - 10 minutes</a></p></td></tr> 
              <tr><td><p>Period I - 9.30 AM - 10.10 AM</a></p></td></tr> 
              <tr><td><p>Period II - 10.10 AM - 10.50 AM</a></p></td></tr> 
              <tr><td><p>Period III - 11.00 AM - 11.40AM</a></p></td></tr> 
              <tr><td><p>Period IV - 11.40 AM - 12.20 PM</a></p></td></tr> 
              <tr><td><p>Period V - 1.00 PM - 1.40 PM</a></p></td></tr> 
              <tr><td><p>Period VI - 1.40 PM - 2.20 PM</a></p></td></tr> 
              <tr><td><p>Period VII - 2.30 PM - 3.10 PM</a></p></td></tr> 
              <tr><td><p>Period VIII - 3.10 PM - 3.50 PM</a></p></td></tr>                  
              </tbody>
            </table>            
        </div>
    </div>
    				<div class="block span4" style="margin:5px;">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">Timing for Friday</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
        <table class="table list">
            <tbody>
              <tr><td><p>Break - 10 minutes</a></p></td></tr>
              <tr><td><p>Lunch - 50 minutes</a></p></td></tr> 
              <tr><td><p>Dairy Sign - 20 minutes</a></p></td></tr> 
              <tr><td><p>Period I - 9.30 AM - 10.10 AM</a></p></td></tr> 
              <tr><td><p>Period II - 10.10 AM - 10.50 AM</a></p></td></tr> 
              <tr><td><p>Period III - 11.00 AM - 11.40AM</a></p></td></tr> 
              <tr><td><p>Period IV - 11.40 AM - 12.20 PM</a></p></td></tr> 
              <tr><td><p>Period V - 1.00 PM - 1.30 PM</a></p></td></tr> 
              <tr><td><p>Period VI - 1.30 PM - 2.00 PM</a></p></td></tr> 
              <tr><td><p>Period VII - 2.10 PM - 2.40 PM</a></p></td></tr> 
              <tr><td><p>Period VIII - 2.40 PM - 3.10 PM</a></p></td></tr>      
              </tbody>
            </table>            
        </div>
    </div>
                         <?php } else { echo "<center><h5>This is no Class TimeTable Found</h5></center>"; } ?>
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

