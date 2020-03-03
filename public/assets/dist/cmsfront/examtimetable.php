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
            <h1 class="page-title">Exam Timetable</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="panel.php">Home</a> <span class="divider">/</span></li>
            <li><a href="examlist1.php">Exam list</a> <span class="divider">/</span></li>
            <li class="active">Exam Timetable</li>
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
    <div class="block span12">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse"><?php echo $class['c_name']." - ".$section['s_name'];?> - <?php echo $exam['e_name'];?> Exam Timetable Details<span class="label label-warning"><?php echo $exam['e_name'];?></span></a>
        <div id="tablewidget" class="block-body collapse in">
                   
            <table class="table">
              <thead>
                <tr>
                  <th width="200px">Date (MM/DD/YYYY)</th>
                  <th>Day</th>
                  <th>Subject Name</th>
                  <th>Timing</th>
                </tr>
              </thead>
              <tbody>
                
                <?php 
					$classname=$class['c_name'];
							if(($classname == 'XI STD') || $classname == 'XII STD'){
							$qury=mysql_query("SELECT * FROM examtimetable WHERE c_id=$cid AND s_id=$sid AND e_id=$eid AND ay_id=$acyear AND b_id=$bid"); 
							}else{
								$qury=mysql_query("SELECT * FROM examtimetable WHERE c_id=$cid AND e_id=$eid AND ay_id=$acyear AND b_id=$bid"); 
							}
						$total =0;
					while($subject2=mysql_fetch_array($qury))
					{ 
					
					?>
                    <tr>
                  <td><?php echo $subject2['date'];?></td>
                  <td> <strong> <?php echo $subject2['day'];?></strong></td>
                   <td> <strong> <?php echo $subject2['subject'];?></strong></td>
                   <td> <strong> <?php echo $subject2['time'];?></strong></td>                   
                </tr>
                <?php $total++; }?>
                <tfoot>
                 <tr>
                <?php if($total==0){ echo "<td colspan='3'><br><center><p>Exam Time Tabel Coming soon!!! </p></center><br></td>";}?>
                </tr>
                </tfoot> 
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

