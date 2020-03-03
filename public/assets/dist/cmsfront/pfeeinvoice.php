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
            <h1 class="page-title">School Fees Payment Details</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li class="active">School Fees Payment Details</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">School Fees Payment Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
        <?php 
		$qry=mysql_query("SELECT * FROM finvoice WHERE ss_id=$ssid AND bid=$bid AND ay_id=$acyear ORDER BY fi_id DESC");
		
		$num_rows = mysql_num_rows($qry);
		if($num_rows){
		?>
            <table class="table list">
            <thead>
                <tr>
                  <th>S.no</th>
                  <th>FR No</th>
                  <th>Student Name</th>
                  <th>Date</th>
                  <th>Inovice By</th>
                  <th>Amount</th>
                  <th>Inovice Detail</th>
                </tr>
              </thead>
              <tbody>
              <?php 
			  $ttotal=0;
							$count=1;
			  while($row=mysql_fetch_array($qry))
        		{  
				$ttotal +=$row['fi_total'];
					?>
                  <tr>
                  		<td><?php echo $count; ?></td>
                    <td><?php echo $row['fr_no']; ?></td>
                    <td><?php echo $row['fi_name']; ?></td>
                    <td><?php echo $row['fi_day']."/".$row['fi_month']."/".$row['fi_year']; ?></td>
                    <td><?php echo $row['fi_by']; ?></td>
                                <td>Rs. <?php echo number_format($row['fi_total'],2); ?></td>
								<td class="view"><a href="pfeeinvoice-detail.php?fiid=<?php echo $row['fi_id'];?>&bid=<?php echo $bid;?>"><button class="btn btn-warning btn-small">View</button></a></td>
                    </tr>
                  <?php $count++; } ?>
                  <tr>
                  	<td colspan="2">Total School Fees: </td>
                    <td colspan="2"></td>
                    <td colspan="3">Total Paid: <strong>Rs. <?php echo number_format($ttotal,2); ?></strong></td>
                  </tr>
              </tbody>
            </table>
            <?php }else{ echo "<br><center><p> There is no School Fees Bill found!!!<p></center> <br>" ;}?>                 
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

