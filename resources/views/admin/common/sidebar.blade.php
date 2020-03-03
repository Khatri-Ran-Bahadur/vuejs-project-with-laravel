
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="#" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="color: white;">NEA</p>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="{{Request::is('postaladmin/dashboard')?'active':''}}"><router-link to="/postaladmin/dashboard" class="newtab"><i class="fa fa-home text-orange"></i> <span style="color: orange;">गृहपृष्ट </span></router-link></li>

      
      <li class="{{Request::is('postaladmin/staff')?'active':''}}">
        <router-link to="/postaladmin/staff" ><i class="fa fa-users text-green"></i>कर्मचारी विवरण</router-link>
      </li>

      <li class="{{Request::is('postaladmin/postal-rates')?'active':''}}">
        <router-link to="/postaladmin/postal-rates" ><i class="fa fa-users text-green"></i>हुलाक दर
          </router-link>
      </li>

      <li class="{{Request::is('postaladmin/newslist')?'active':''}}">
        <router-link to="/postaladmin/newslist" ><i class="fa fa-file text-green"></i>News
          </router-link>
      </li>


      <!--======== settings Details==========-->
      <li class="treeview 
      {{Request::is('postaladmin/about')?'active':''}}
      {{Request::is('postaladmin/contact-us')?'active':''}}
      {{Request::is('postaladmin/underneath-organizations')?'active':''}}
      {{Request::is('postaladmin/organization-chart')?'active':''}}
      {{Request::is('postaladmin/citizen-charter')?'active':''}}
      {{Request::is('postaladmin/policy-and-programmes')?'active':''}}
      
      ">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="">

          <li class=""><router-link to="/postaladmin/underneath-organizations" ><i class="fa fa-check-circle text-green"></i>विभाग अन्तर्गतका निकायहरू
          </router-link></li>

          <li class=""><router-link to="/postaladmin/organization-chart" ><i class="fa fa-check-circle text-green"></i>संगठन संरचना</router-link></li>

          
          <li class=""><router-link to="/postaladmin/citizen-charter" ><i class="fa fa-check-circle text-green"></i>नागरिक बडापत्र</router-link></li>
          <li class=""><router-link to="/postaladmin/policy-and-programmes" ><i class="fa fa-check-circle text-green"></i>नीति तथा कार्यक्रम</router-link></li>

          <li class=""><router-link to="/postaladmin/about"><i class="fa fa-check-circle text-green"></i>हाम्रो बारेमा</router-link></li>
          <li class=""><router-link to="/postaladmin/contact-us" ><i class="fa fa-check-circle text-green"></i>सम्पर्क</router-link></li>
        </ul>
      </li>
     

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>