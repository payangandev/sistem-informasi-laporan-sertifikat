   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/'); ?>">
           <div class="sidebar-brand-icon ">
               <p style="color:red;"><b>HSRCC</b></p>
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
               <span>Data ATK</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('kendaraan'); ?>">
               <i class="fas fa-fw fa-car-side"></i>
               <span>Data Kendaraan</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('asset'); ?>">
               <i class="fas fa-fw fa-hand-holding-usd"></i>
               <span>Data Asset</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('audiovisual'); ?>">
               <i class="fas fa-fw fa-broadcast-tower"></i>
               <span>Data Audio Visual</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('furniture'); ?>">
               <i class="fas fa-fw fa-couch"></i>
               <span>Data Furniture</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url('multimedia'); ?>">
               <i class="fas fa-fw fa-camera-retro"></i>
               <span>Data Multimedia</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataDocument" aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-book"></i>
               <span>Data Document</span>
           </a>
           <div id="dataDocument" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="<?php echo base_url('documentmasuk'); ?>"> <i class="fas fa-fw fa-book"></i> Data Masuk</a>
                   <a class="collapse-item" href="<?php echo base_url('documentkeluar'); ?>"> <i class="fas fa-fw fa-book"></i> Data Keluar</a>
               </div>
           </div>
       </li>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataNota" aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-receipt"></i>
               <span>Data Nota</span>
           </a>
           <div id="dataNota" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <a class="collapse-item" href="<?php echo base_url('notamasuk'); ?>"> <i class="fas fa-fw fa-receipt"></i> Data Masuk</a>
                   <a class="collapse-item" href="<?php echo base_url('notakeluar'); ?>"> <i class="fas fa-fw fa-receipt"></i> Data Keluar</a>
               </div>
           </div>
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


       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataLaporan" aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-print"></i>
               <span>Laporan Inventaris</span>
           </a>
           <div id="dataLaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header" style="color:green;">Data Laporan Inventaris</h6>
                   <a class="collapse-item" href="<?php echo base_url('atk/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data ATK</a>
                   <a class="collapse-item" href="<?php echo base_url('kendaraan/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Kendaraan</a>
                   <a class="collapse-item" href="<?php echo base_url('asset/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Asset</a>
                   <a class="collapse-item" href="<?php echo base_url('audiovisual/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Audio Visual</a>
                   <a class="collapse-item" href="<?php echo base_url('furniture/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Furniture</a>
                   <a class="collapse-item" href="<?php echo base_url('multimedia/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Multimedia</a>
                   <a class="collapse-item" href="<?php echo base_url('documentmasuk/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Document Masuk</a>
                   <a class="collapse-item" href="<?php echo base_url('documentkeluar/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Document Keluar</a>
                   <a class="collapse-item" href="<?php echo base_url('user/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Nota Masuk</a>
                    <a class="collapse-item" href="<?php echo base_url('notamasuk/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Nota Keluar</a>
                   <a class="collapse-item" href="<?php echo base_url('notakeluar/laporan'); ?>"> <i class="fas fa-fw fa-print"></i> Data Karyawan</a>
                   <a class="collapse-item" href="<?php echo base_url('users/laporan'); ?>"><i class="fas fa-fw fa-print"></i> Data User</a>



               </div>
           </div>
       </li>
       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->