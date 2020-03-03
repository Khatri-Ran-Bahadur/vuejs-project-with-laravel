<div class="sidebar-nav">
        <a href="parent_panel.php" class="nav-header" title="Dashboard"><i class="icon-dashboard"></i>Dashboard</a>
        <!--<a href="#" class="nav-header"><i class="icon-briefcase"></i>Account</a>-->
        <a href="pattendance.php" class="nav-header" title="Attendence Details"><i class="icon-legal"></i>Attendence Details</a>
        <a href="pexamlist.php" class="nav-header" title="Exam Result" ><i class="icon-bullhorn"></i>Exam Result</a>
        <a href="prank_card.php" class="nav-header" title="Progress Card" ><i class="icon-th"></i>Progress Card</a>
        <a href="pclasstest.php" class="nav-header" title="Class Test"><i class="icon-bell"></i>Class Test</a>
        <a href="phomework.php" class="nav-header" title="Homeworks"><i class="icon-home"></i>Homeworks</a>
        <a href="pclasstimetable.php" class="nav-header" title="Peroids Time Table"><i class="icon-calendar"></i>Periods Time Table</a>
        <a href="pexamlist1.php" class="nav-header" title="Exam Time Table"><i class="icon-time"></i>Exam Time Table</a>
        <a href="pcirculardetail.php" class="nav-header" title="Circular Details"><i class="icon-plane"></i>Circular Details</a>
        <a href="peventdetail.php" class="nav-header" title="Event Details"><i class="icon-facetime-video"></i>Event Details</a>
        <a href="pnewsdetail.php" class="nav-header" title="NEWS Details"><i class="icon-globe"></i>NEWS Details</a>
        <a href="pstaffdetail.php" class="nav-header" title="Staff Details"><i class="icon-user"></i>Staff Details</a>
        <a href="#school-fees" class="nav-header collapsed" data-toggle="collapse"><i class="icon-leaf"></i>School Fees Details <i class="icon-chevron-up"></i><span class="label label-info">+2</span></a>
        <ul id="school-fees" class="nav nav-list collapse">
            <li ><a href="pfeedetail.php">School Fees Details</a></li>
            <li ><a href="pfeeinvoice.php">Fees Paid Details</a></li>
        </ul>
        <?php if($rid && $spid){?>
        <a href="pbfeeinvoice.php" class="nav-header" title="School Fees Details"><i class="icon-map-marker"></i>School Bus Fees Details</a>
        <?php } ?>
        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-comment"></i>Feedback<i class="icon-chevron-up"></i><span class="label label-info">+4</span></a>
        <ul id="error-menu" class="nav nav-list collapse">
            <li ><a href="feedback_form.php">Feedback Form</a></li>
            <li ><a href="feedback_list.php">List of Feedback</a></li>
            <li ><a href="pstaff_feedback.php">Staff wise Feedback</a></li>
            <li ><a href="feedback_admin.php">Feedback To Admin</a></li>
        </ul>
        <?php if($sibling=='1'){?>
        <a href="student_select.php" class="nav-header" title="School Fees Details"><i class="icon-user"></i>Student Select</a>
        <?php } ?>
        <a href="logout1.php" class="nav-header" title="Logout"><i class="icon-signout"></i>Logout</a>
        
    </div>