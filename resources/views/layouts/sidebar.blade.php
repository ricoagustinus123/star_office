  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color:rgb(0, 110, 173); height:115vh; position:fixed;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="color:rgb(255, 255, 255); font-size:1. style="margin-left:20px; color:yellow"5rem">
      <h3 style="margin-left:20px; color:yellow">STAR OFFICE</h3>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <p style="color: rgb(255, 255, 255); font-size:1.5rem margin-top:10px; margin-left:10px">{{session()->get('status')}}</p>
        </div>
        <div class="pull-left info">
        
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
    
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="{{(request()->is('/dashboard')) ? 'active' : 'treeview'}}"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard fa-lg"></i> <span style="color:rgb(255, 255, 255); font-size:1.5rem">Dashboard</span></a></li><br/>
        <li class="{{(request()->is('/karyawan')) ? 'active' : 'treeview'}}"><a href="{{ url('/karyawan') }}"><i class="fa fa-user fa-lg"></i> <span style="color:rgb(255, 255, 255); font-size:1.5rem"> Add Employees </span></a></li><br/>
        <li class="{{(request()->is('#')) ? 'active' : 'treeview'}}">
          <a href="#"><i class="fa fa-gear fa-lg"></i> <span style="color:rgb(255, 255, 255); font-size:1.5rem"> General Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             {{-- <li><a href="{{ url('system-management/department') }}">Perwakilan</a></li>
            <li><a href="{{ url('system-management/division') }}">Unit Kerja</a></li>
            <li><a href="{{ url('system-management/country') }}">Kontrak Kerja</a></li> --}}

            <li class="{{(request()->is('')) ? 'active' : 'treeview'}}"><a href=""><span style="color:white; font-size:1.5rem">Wilayah</span></a></li>
            <li class="{{(request()->is('')) ? 'active' : 'treeview'}}"><a href=""><span style="color:white; font-size:1.5rem">Unit Kerja</span></a></li>
            <li class="{{(request()->is('')) ? 'active' : 'treeview'}}"><a href=""><span style="color:white; font-size:1.5rem">Absensi</span></a></li>
            <li class="{{(request()->is('')) ? 'active' : 'treeview'}}"><a href=""><span style="color:white; font-size:1.5rem">Payroll</span></a></li>
            <li class="{{(request()->is('')) ? 'active' : 'treeview'}}"><a href=""><span style="color:white; font-size:1.5rem">Kontrak Kerja</span></a></li>
            
          </ul>
        </li><br/>
       @if (!session()->get('status')==='admin')
           
       <li><a href=""><i class="fa fa-user fa-lg"></i> <span style="color:rgb(255, 255, 255); font-size:1.5rem"> Add User </span></a></li><br/>
       @else
           
       @endif
        {{-- <li><a href="{{ url('system-management/report') }}"><i class="fa fa-book fa-lg"></i> <span> Generate Reports </span></a></li> --}}
     
        <li><a href=""><i class="fa fa-book fa-lg"></i> <span style="color:rgb(255, 255, 255); font-size:1.5rem"> Generate Reports </span></a></li><br/>
        <li><a href="/logout"><i class="fa fa-sign-out fa-lg"></i><span style="color:rgb(255, 255, 255); font-size:1.5rem">Logout</span></a></li>

      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>