 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
  

      <li class="nav-item">
        <a href="{{route('member-home')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Profile
          </p>
        </a>
      </li>

 
      <li class="nav-item has-treeview">
        <a href="{{route('member.pledges')}}" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            Ahadi
          </p>
        </a>

      </li>

      <li class="nav-item has-treeview">
        <a href="{{route('member.payments')}}" class="nav-link">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            Michango
          </p>
        </a>
    
      </li>

    
    </ul>



  </nav>
  <!-- /.sidebar-menu -->