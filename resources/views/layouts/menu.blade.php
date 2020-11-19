 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
  
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{route('calender')}}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            {{ __('menu.calender')}}
            {{-- <span class="badge badge-info right">2</span> --}}
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>
            Washarika
            <i class="fas fa-angle-left right"></i>
            
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('people.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Orodha ya Washarika</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('family.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Orodha ya Familia</p>
            </a>
          </li>
      
       
     
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Vikundi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Ongeza Kikundi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Orodha ya Vikundi</p>
            </a>
          </li>
        
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>
            Matukio
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('event-types.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Event Types</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('events.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Church Events</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('events-attendance.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Event Attendance</p>
            </a>
          </li>
      </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            {{ __('menu.pledges')}}
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('fund-activities.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Aina za Ahadi</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('pledges.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Tazama Ahadi</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            Malipo
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('payments.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Fanya Malipo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('payments.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Tazama Malipo</p>
            </a>
          </li>
        </ul>
      </li>

   
      <li class="nav-header">ADMINISTRATION</li>
    
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users-cog"></i>
          <p>
            User Management
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>User Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Users</p>
            </a>
          </li>
       
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Master Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
         
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Person Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Person Classification</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Group Positions</p>
            </a>
          </li>
      
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Payment Methods</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-cogs"></i>
          <p>Settings</p>
        </a>
      </li>
     
    
    </ul>
  </nav>
  <!-- /.sidebar-menu -->