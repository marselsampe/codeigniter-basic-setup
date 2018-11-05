<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('customer') ?>">
          <i class="fa fa-book"></i> <span>Customer</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Report 1</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Report 2</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Report 3</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Report 4</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
    </ul>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMINISTRATOR</li>
      <li>
        <a href="<?= base_url('users') ?>">
          <i class="fa fa-users"></i> <span>Users</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>