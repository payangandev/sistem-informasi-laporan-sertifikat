   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/'); ?>">
           <div class="sidebar-brand-icon ">
               <p style="color:red;"><b>SRR</b></p>
           </div>
           <div class="sidebar-brand-text mx-2">
               <img src="<?php echo base_url('hsrcc.png'); ?>" alt="HSRCC Logo" class="brand-image elevation-3">

           </div>
       </a>
       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="<?php echo base_url('/'); ?>">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('atk'); ?>">
               <i class="fas fa-fw fa-toolbox"></i>
               <span>Data ISO</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('kendaraan'); ?>">
               <i class="fas fa-fw fa-car-side"></i>
               <span>Data K3</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('asset'); ?>">
               <i class="fas fa-fw fa-hand-holding-usd"></i>
               <span>Data SKA</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('audiovisual'); ?>">
               <i class="fas fa-fw fa-broadcast-tower"></i>
               <span>Data SKT</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('furniture'); ?>">
               <i class="fas fa-fw fa-couch"></i>
               <span>Data Perusahaan</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url('karyawan'); ?>">
               <i class="fas fa-fw fa-user-friends"></i>
               <span>Data Karyawan</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url('users'); ?>">
               <i class="fas fa-fw fa-user-check"></i>
               <span>Data Users</span></a>
       </li>

       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->