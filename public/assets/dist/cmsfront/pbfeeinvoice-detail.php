<? ob_start(); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include("head_top1.php"); 
 //echo $_SESSION['uname'];
 //echo $acyear;
 ?>
 <link rel="stylesheet" href="../sms/Book_inventory/stylesheets/sample_pages/invoice.css" type="text/css" />
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
            <h1 class="page-title">School Bus Fees Invoice Details</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="parent_panel.php">Home</a> <span class="divider">/</span></li>
            <li><a href="pbfeeinvoice.php">School Bus Fees Payment Details</a> <span class="divider">/</span></li>
            <li class="active">School Fees invoice Details</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
<div class="row-fluid" style="min-height:320px">
   <div class="block span12">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">School Bus Fees Invoice Details</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <div id="invoice" class="widget widget-plain">			
				        <br>
                
               <?php $ffi_id=$_GET['bfiid'];
						
						$invoicelist1=mysql_query("SELECT * FROM bfinvoice WHERE bfi_id=$ffi_id"); 
								  $invoice=mysql_fetch_array($invoicelist1);
									
									$ssid=$invoice['ss_id'];
								  $studentlist1=mysql_query("SELECT * FROM student WHERE ss_id=$ssid"); 
								  $student1=mysql_fetch_array($studentlist1);
								  $cid1=$invoice['c_id'];
								  $qry=mysql_query("SELECT * FROM class WHERE c_id=$cid1"); 
								  $row=mysql_fetch_array($qry);
								  
								  $sid1=$invoice['s_id'];
								  $qry1=mysql_query("SELECT * FROM section WHERE s_id=$sid1"); 
								  $row1=mysql_fetch_array($qry1);
								  
								  $rid1=$invoice['r_id'];
								  $qry5=mysql_query("SELECT * FROM route WHERE r_id=$rid1"); 
								  $row5=mysql_fetch_array($qry5);
								  
								  $spid1=$invoice['sp_id'];
								  $qry6=mysql_query("SELECT * FROM stopping WHERE sp_id=$spid1"); 
								  $row6=mysql_fetch_array($qry6);
								  
								  $fesstypearray1=array("Normal Fees","Sp.Fees","Onetime Sp.Fees"); 
								  $busfeestype1=$invoice['busfeestype'];
			?>
						
				<ul class="client_details">
					<li><strong class="name">FR Number : <?php echo $invoice['fr_no'];?></strong></li>
                    <li>Class: <?php echo $row['c_name'];?></li>
					<li>Gender: <?php if($student1['gender'] == 'M')
											echo "Male";
										else	
										    echo "Female"; ?></li>
				</ul>
                <ul class="client_details">
					<li>Student Name : <strong class="name"><?php echo $student1['firstname']." ".$student1['middlename']." ".$student1['lastname'];?></strong></li>
					<li>Admission No: <?php echo $student1['admission_number'];?></li>
					<li>Section/Group: <?php echo $row1['s_name'];?></li>					
				</ul>
                <ul class="client_details">
					<li>Academic Year : <strong class="name"><?php echo $acyear_name;?></strong></li>
					<li>Route Name: <?php echo $row5['r_name'];?></li>
                    <li><strong>Stopping Point 	:</strong> <?php echo $row6['sp_name'];?></li>										
				</ul>
				<ul class="client_details">
					<li>Status: <span class="ticket ticket-info" style="background-color:#D75334">Closed</span></li>
					<li><strong>Invoice Date :</strong> <?php echo $invoice['fi_day']."/".$invoice['fi_month']."/".$invoice['fi_year'];?></li>                	<li><strong>BusFees Type 	:</strong> <?php echo $fesstypearray1[$busfeestype1];?></li>  
                    </ul>				
				<table class="table table-striped" id="table-example">	
                	<thead>
						<tr>
							<th>S.No</th>
							<th>Type of Fees Name</th>
							<th>Fees Month From</th>
							<th>Fees Month To</th>
							<th class="total">Total</th>
                            <th width="10"></th>
						</tr>
					</thead>						
					<tbody>
                    <?php 
					$count=1;
					$montharray=array("June","July","August","September","October","November","December","January","February","March","April","May"); 
					$ffrom=$invoice['ffrom'];
					$fto=$invoice['fto'];?>
						<tr>
							<td><?php echo $count;?></td>			
							<td>Bus Fees</td>
							<td><?php echo $montharray[$ffrom-1];?></td>
							<td><?php echo $montharray[$fto-1];?></td>
							<td class="total">Rs. <?php echo number_format($invoice['fi_total'],2);?></td>
                            <!--<td><a href=""><img src="Book_inventory/images/del.png" alt="delete"></a></td>-->
                        </tr>
                        <?php //$count++;} ?>
						<tr>
							<td class="sub_total" colspan="3"></td>
							<td class="sub_total">Subtotal:</td>
							<td class="sub_total">Rs. <?php echo number_format($invoice['fi_total'],2);?></td>
						</tr>
						<tr class="total_bar">
							<td class="grand_total" colspan="3"></td>
							<td class="grand_total">Total:</td>
							<td class="grand_total">Rs. <?php echo number_format($invoice['fi_total'],2);?></td>
						</tr>
                        <tr>
							<td colspan="6" align="right">Payment Type : <strong><?php echo $invoice['fi_ptype'];?></strong></td>
						</tr>
				<tr>
                <td colspan="6" style="background:none;">
                <input type="submit" class="btn btn-success" value="Print Invoice" name="Print" onClick="window.open('bfinvoice_prt.php?bfiid=<?php echo $ffi_id; ?>')"   style="width:120px">&nbsp;&nbsp;
                </td>
                </tr>
					</tbody>
                  </table>
				
				<hr>			
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

