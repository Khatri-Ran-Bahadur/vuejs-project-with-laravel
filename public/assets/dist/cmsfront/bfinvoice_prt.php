<?php 
include("includes/config.php");

session_start();
$_SESSION['email']=$_SESSION['sadmin_no'];
$check=$_SESSION['sadmin_no'];

$query=mysql_query("select admin_no from parent where admin_no='$check' ");

$data=mysql_fetch_array($query);

$admin_no=$data['admin_no'];
$user=$_SESSION['pname'];
$utype="parent";
$acyear=$_SESSION['ay_id'];

$ayear=mysql_query("SELECT * FROM year WHERE ay_id='$acyear'");
$ay=mysql_fetch_array($ayear);
$acyear_name=$ay['y_name'];

$ssid=$_SESSION['ss_id'];
$pid=$_SESSION['p_id'];
$query1=mysql_query("select * from student where ss_id='$ssid' ");
$student1=mysql_fetch_array($query1);

$cid=$student1['c_id'];
$sid=$student1['s_id'];
$bid=$student1['b_id'];


if(isset($_SESSION['expiretime'])) {
    if($_SESSION['expiretime'] < time()) {
        header("Location:timeout1.php");
    }
    else {
        $_SESSION['expiretime'] = time() + 6000;
    }
}

if(!isset($admin_no))
{
header("Location:404.php");
}

function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
		/*10000               => 'Ten Thousand',
        100000              => 'One lakh',
		1000000             => 'Ten Lakhs',*/
		1000000             => 'million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

					$ffi_id=$_GET['bfiid'];						
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>School Management Solution</title>
<html
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
function hide_button(){
     document.getElementById('print').style.visibility='hidden';
     window.print();
     document.body.onmousemove = doneyet;
}
/*function download_doc(ano){
	
	var url = 'http://localhost/Erp_School/'+'admin/download_cert?id='+ano+'&type=bonafide';
	window.open(url,'_blank');
}
function doneyet()
{
  document.getElementById('butt').style.visibility='visible';
}*/
</script>
<link rel="stylesheet" href="../sms/css/style.css"> <!-- Generic style (Boilerplate) -->
  <link rel="stylesheet" href="../sms/css/960.fluid.css"> <!-- 960.gs Grid System -->
  <link rel="stylesheet" href="../sms/css/lists.css"> <!-- Lists, optional -->
  <link rel="stylesheet" href="../sms/css/forms.css"> <!-- Forms, optional -->
  <link rel="stylesheet" href="../sms/css/tables.css"> <!-- Tables, optional -->
  <!-- end CSS-->
  
  <!-- Fonts -->
  <link href="//fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../sms/Book_inventory/stylesheets/sample_pages/invoice.css" type="text/css" />
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="float:right;" id="print"> <a onclick="hide_button();" href="" title="Print this certificate">
<img src="images/printer.png"></a></div>
<div align="center" id="printablediv">  <!-- ImageReady Slices (Bonafide(1).jpg) -->
  
<style type="text/css">
  img.adjusted {
    position: absolute;
    z-index: -1;
    width: 100%;
   
  }
  .Invitation {
    position: relative;
    width: 950px;
    margin-top:-362px;
	height:200px;
	margin-left:-960px !important;
   
  }
  .block-content-invoice1{
	  width:950px;
	  margin:30px
		border-radius: 3px;
		position: relative;
		padding: 10px;
		border: 2px solid #a9a6a6;
		  }
</style>
 						<div id="invoice" class="widget widget-plain">	
						<div class="block-content-invoice1">
                        <center><h2>COPY BUS FEES RECEIPT</h2></center><span style="float:right; margin-right:10px"><strong>SI.No</strong> : 55247</span>
				<div style="margin:0 auto; float:none;"><ul class="client_details">
					<li><strong class="name">FR No : <?php echo $invoice['fr_no'];?></strong></li>
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
					<li><strong>Invoice Date :</strong> <?php echo $invoice['fi_day']."/".$invoice['fi_month']."/".$invoice['fi_year'];?></li>
                    <li>Route Name: <?php echo $row5['r_name'];?></li>									
				</ul>
				</div>			
				<table class="table table-striped" id="table-example">	
                	<thead>
						<tr>
							<th width="10"><center>S.No</center></th>
							<th colspan="4"><center>Fees Name</center></th>
							<th class="total" width="120"><center>Amount</center></th>                            
						</tr>
					</thead>						
					<tbody>
                    <tr>
							<td><center>1</center></td>			
							<td colspan="4"><center>Bus Fees</center></td>
							<td class="total"><center>Rs. <?php echo number_format($invoice['fi_total'],2);?></center></td>
                        </tr>
                    	<tr class="total_bar" style="border-bottom:dotted 1px solid;">
							<td class="grand_total" colspan="4"><center>
Rupees <?php $amount=number_format($invoice['fi_total'],2);
						if(floor($amount)==$amount){
							$amount1=floor($amount);
							 echo convert_number_to_words($amount1);
						}else{
						 echo convert_number_to_words($amount); }?> Only
</center></td>
							<td class="grand_total" width="150px">Total:</td>
							<td class="grand_total"><center>Rs. <?php echo number_format($invoice['fi_total'],2);?></center></td>
						</tr>
                         <tr class="total_bar" >
                         <td style="border:none;"></td>
                         <td style="border:none;"></td>
                         <td style="border:none;"></td>
                         <td style="border:none;"></td>
                         <td style="border:none;"></td>
                        </tr>
                        <!--<tr class="total_bar" >
                        <td colspan="6">
                        <hr>
                        </td>
                        </tr>-->
					</tbody>
                    <tfoot><tr>
                    <td colspan="6">
                    <div>
                  <span style="float:left; padding-left:15px;margin-top:10px;">Stopping Point : <strong><?php echo $row6['sp_name'];?></strong></span>
                  <span style="float:right; padding-right:40px; margin-top:20px; "><strong><?php echo $invoice['bfi_by'];?></strong></span>
                  </div>
                  </td>
                    </tr>
                    </tfoot>
                  </table>
                  
			</div>
            </div>
           <!-- <div class="Invitation">
   <img src="img/prt_logo.png" alt="" class="adjusted">
</div>-->
  <p>&nbsp;    </p>
</div>

</body></html>