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
            Calendar
            {{-- <span class="badge badge-info right">2</span> --}}
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>
            People
            <i class="fas fa-angle-left right"></i>
            
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('people.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>View Members</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('family.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>View Families</p>
            </a>
          </li>
      
       
     
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Groups
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('groups.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>View Groups</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Group Members</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>
            Events
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
            Pledges
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('fund-activities.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Fund Activities</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('pledges.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>View Pledges</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            Payments
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('payments.create')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Add Payment</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('payments.index')}}" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>View Payments</p>
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
            <a href="" class="nav-link">
              <i class="fas fa-angle-double-right"></i>
              <p>Roles</p>
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
              <p>Salutation</p>
            </a>
          </li>
       
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