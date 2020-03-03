<?php 
		//$mid=$_GET['mid'];
		$select_record4=mysql_query("SELECT * FROM attendance WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear AND ss_id=$ssid AND (result=0 OR result='off') ORDER BY day");
			  $absent1=0;
					while($monthday3=mysql_fetch_array($select_record4))
					{
						$absent1++; 
					} 
					$select_re2=mysql_query("SELECT * FROM classtest WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear");		
						$totalclass=0;				
					while($class21=mysql_fetch_array($select_re2))
					{ $totalclass++;}
					$select_rec2=mysql_query("SELECT * FROM homework WHERE c_id=$cid AND s_id=$sid AND ay_id=$acyear");		
						$totalhome=0;				
					while($classt21=mysql_fetch_array($select_rec2))
					{ $totalhome++;}
					if($utype=="parent"){
					$select_rec2=mysql_query("SELECT * FROM feedback WHERE p_id=$pid AND ay_id=$acyear AND status='1' AND send='staff'");						
								$unread=0;
					while($classtest21=mysql_fetch_array($select_rec2))
					{ $unread++;
					}
					}
					/*
					$select_cord2=mysql_query("SELECT * FROM feedback WHERE c_id=$cid AND s_id=$sid AND p_id=$pid AND ay_id=$acyear");		
						$totalcout=0;				
					while($classtt21=mysql_fetch_array($select_cord2))
					{ $totalcout++;}*/
					
					?>
        <div class="header">
            <div class="stats">
          <?php if($unread){?><p class="stat"><span class="number"><?php echo $unread;?></span>Messgae</p><?php } ?>
    <p class="stat"><span class="number"><?php echo $absent1;?></span>Total Absent</p>
    <p class="stat"><span class="number"><?php echo $totalclass;?></span>Class Tests</p>
    <p class="stat"><span class="number"><?php echo $totalhome;?></span>Home Works</p>
</div>