<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear;
  function array_push_assoc($array, $key, $value){
				$array[$key] = $value;
				return $array;
				}
				
 function rank ($arr) {
  $ret = array();
  $s = array();
  $i = 0;
  foreach ($arr as $x => $v) {
    if (!$s[$v]) { $s[$v] = ++$i; }
    $ret[]= array($x => $v, $s[$v]);
  }
  return $ret;
}
 ?>
 <link rel="stylesheet" href="stylesheets/tables.css"> <!-- Tables, optional -->
 <link rel="stylesheet" href="stylesheets/invoice.css" type="text/css" />
 <style type="text/css">
#invoice .client_details,
#invoice .invoice_details { margin:0 0 0em; border-bottom: none;}
#rankcard{margin-top:10px;padding:10px 0px 20px 10px; border-radius: 30px 30px 30px 30px;
-moz-border-radius: 30px 30px 30px 30px;
-webkit-border-radius: 30px 30px 30px 30px;
border: 4px dotted #ff7700; background:url(images/bgtile.png) repeat;}
.clear {
clear: both;
display: block;
overflow: hidden;
visibility: hidden;
width: 0;
height: 0;
}
 </style>
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <?php include("nav.php");
		$classlist=mysql_query("SELECT * FROM class WHERE c_id=$cid"); 
								  $class=mysql_fetch_array($classlist);
							$sectionlist=mysql_query("SELECT * FROM section WHERE s_id=$sid"); 
								  $section=mysql_fetch_array($sectionlist);	?>
    
	<?php include("sidemenu.php"); ?>   
    <div class="content">
        <?php include("includes/head.php");?>
            <h1 class="page-title">Progress Card</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Progress Card</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
           <div id="rankcard">
<div id="invoice" class="widget widget-plain">	
                        <div class="widget-content">
                        <img src="images/s_profile_head.png" style="width:100%;">
				<ul class="client_details">
					<li>Student Name : <strong class="name"><?php echo $student1['firstname']." ".$student1['lastname'];?></strong></li>
                    <li>Class: <?php echo $class['c_name'];?></li>
					<li>Gender: <?php if($student1['gender'] == 'M')
											echo "Male";
										else	
										    echo "Female"; ?></li>
				</ul>
                <ul class="client_details">
					
					<li>Admission No: <strong><?php echo $student1['admission_number'];?></strong></li>
					<li>Section/Group: <?php echo $section['s_name'];?></li>
                    <li>DOB: <?php echo $student1['dob'];?></li>					
				</ul>
                <ul class="client_details">
					<li>Academic Year : <strong class="name"><?php echo $acyear_name;?></strong></li>
					<li>Religion: <?php echo $student1['reg'];?></li>
                    <li> Blood group : <?php echo $student1['blood'];?></li>										
				</ul>
				<ul class="client_details">
					<li>Parent's Name: <strong class="name"><?php echo $student1['fathersname'];?></strong></li>
                    <li> Phone No : <?php echo $student1['phone_number'];?></li>	
                 </ul>
                 <div class="clear"></div>
                 <center><h2 style="color:#003e73;"> PROGRESS CARD</h2> </center>
                        <table id="table-example1" class="table">
							<thead>
								<tr>
									<th>S.No</th>
                                    <th><center>Exam Name</center></th>
                                     <?php 
							$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear");
							$count=1;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$slid=$row1['sl_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid'"); 
								   $slist=mysql_fetch_array($subjectlist1);
					?>
                 	<th><?php echo $slist['s_name']; ?></th>
                <?php } ?>
                                    <th width="10%">Total</th>
                                    <th width="10%">Result</th>
                                    <th width="8%">Rank</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							$count=1;
							$examlist1=mysql_query("SELECT * FROM exam WHERE ay_id=$acyear");
							$count1=1;
			  while($examl=mysql_fetch_array($examlist1))
        		{
					$eid=$examl['e_id'];
					$resultarray=mysql_query("SELECT * FROM result WHERE c_id=$cid AND s_id=$sid AND e_id=$eid AND ay_id=$acyear"); 
							$nofrow=mysql_num_rows($resultarray);
							$a=array();	
							$resultarray1=mysql_query("SELECT * FROM result WHERE c_id=$cid AND s_id=$sid AND e_id=$eid AND ay_id=$acyear"); 
							$nofrow1=mysql_num_rows($resultarray1);							
							$qry=mysql_query("SELECT * FROM student WHERE c_id=$cid AND s_id=$sid AND b_id=$bid AND ay_id=$acyear");
							$count=1;
			  while($student1=mysql_fetch_array($qry))
        		{
						$ssid1=$student1['ss_id'];
						if($nofrow1>1){
							$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear");
							$pass=0;
							$fail=0;
							$gtotal=0;
							$subount=0;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$slid=$row1['sl_id'];
					$subid1=$row1['sub_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid'"); 
								   $slist=mysql_fetch_array($subjectlist1);
								   
								    $studentlist=mysql_query("SELECT * FROM result WHERE ss_id=$ssid1 AND c_id=$cid AND s_id=$sid AND e_id=$eid AND sub_id=$subid1 AND ay_id=$acyear"); 
								   $row=mysql_fetch_array($studentlist);	
								$mark=$row['mark'];
								$mark1=$row['mark1'];								
								$total=$mark+$mark1;								
								$result=$row['result'];
																
								if($result=="FAIL"){
									$fail++;
								}else if($result=="PASS"){
									$pass++;
								}
								$subount++;		
								 if($paper=='1'){
                                 $gtotal +=$total; } else {  $gtotal +=$row['mark']; }
					 } 
					// echo $pass."-".$subount."<br>";
					 if($pass==$subount){
                			 if($gtotal){ 
								if($fail){ 
								 }else{
									 $a = array_merge($a, array("'$ssid1'"=>"$gtotal"));
									 //print_r($data);								 
									 } 
							}  
					 }
							$count++;
						}
						}
								arsort($a);
								$rank = rank($a);
							
							
							/*echo "<pre>";
								print_r($rank);
								echo "</pre>";*/
							
							
							
							
							
							
							$studentrank="";
						foreach($rank as $key=>$data) {
								$datas=$data;
									$nos=1;
									foreach($data as $key1=>$data1) {
										//echo $key1;
										if(str_replace("'", "", $key1)==$ssid){
										if($nos=='1'){
											//echo "Key: ".$key1." Data: ".$data1."<br />";										
											$ssid1=$key1;
											$Total=$data1;
											$studentrank=$rank[$key][0];
										}else{
											echo "Key: ".$key1." Data: ".$data1."<br />";	
											$studentrank=$data1;										
										}
										$nos++;	
										}																			
									}
									}
						if($nofrow>1){
						?> 
								<tr class="gradeX1" style="border-top:dotted 1px #000;">
								<td class="sno center"><center><?php echo $count1; ?></center></td>
								<td><center><?php echo $examl['e_name']; ?></center></td>
                                <?php 
							$qry1=mysql_query("SELECT * FROM subject WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear");
							$pass=0;
							$fail=0;
							$gtotal=0;
			  while($row1=mysql_fetch_array($qry1))
        		{
					$slid=$row1['sl_id'];
					$subid1=$row1['sub_id'];
								   $subjectlist1=mysql_query("SELECT * FROM subjectlist WHERE sl_id='$slid'"); 
								   $slist=mysql_fetch_array($subjectlist1);
								   
								    $studentlist=mysql_query("SELECT * FROM result WHERE ss_id=$ssid AND c_id=$cid AND s_id=$sid AND e_id=$eid AND sub_id=$subid1 AND ay_id=$acyear"); 
								   $row=mysql_fetch_array($studentlist);	
								$mark=$row['mark'];
								$mark1=$row['mark1'];								
								$total=$mark+$mark1;								
								$result=$row['result'];
																
								if($result=="FAIL"){
									$fail++;
								}							
								 if($paper=='1'){ ?>
                                 <td width="10%" style="border-top:dotted 1px #000;"><?php echo $mark."-".$mark1." = ".$total;?> </td><?PHP $gtotal +=$total; } else {  ?>
								 <td width="10%" <?php if($result) { if($result=="FAIL"){ echo 'style="color:#f32200;"'; }}?>><center><b><?php if($row['mark']){ echo $row['mark'];} else { echo "-";}?></b></center> </td>
								 <?php  $gtotal +=$row['mark']; }?>
                                 
                <?php  } ?>			
                				<td <?php if($gtotal && $fail){ echo 'style="color:#f32200;"';}?>><center><b><?php if($gtotal){ echo $gtotal;}else { echo "-";}?></b> </center></td>
                                <td <?php if($gtotal){ 
								if($fail){ echo 'style="color:#f32200;"'; } } ?>> <b><center><?php if($gtotal){ 
								if($fail){ echo "FAIL"; }else{ echo "PASS"; } 
								}else { echo "-";}?></center></b></td>
                				<td><center><b><?php 
								if($studentrank){
								echo $studentrank;
								}else{ echo "-";}
								?></center></b></td>	                
                                </tr> 
                                 <?php 
							$count1++;
						}} ?>                               																
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

