 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <h4 class="brand-text font-weight-light">Mini-CRM</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('company.index') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('employee.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Employee
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
