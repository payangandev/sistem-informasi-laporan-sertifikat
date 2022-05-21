   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/'); ?>">
           <div class="sidebar-brand-icon ">
               <p style="color:white;"><b>PT FORTUNA</b></p>
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
       <?php if(session()->get('level') == 1 || session()->get('level') == 3) {  ?>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('iso'); ?>">
               <i class="fas fa-fw fa-toolbox"></i>
               <span>Data ISO</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('ktiga'); ?>">
               <i class="fas fa-fw fa-car-side"></i>
               <span>Data K3</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('ska'); ?>">
               <i class="fas fa-fw fa-hand-holding-usd"></i>
               <span>Data SKA</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('skt'); ?>">
               <i class="fas fa-fw fa-broadcast-tower"></i>
               <span>Data SKT</span></a>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('perusahaan'); ?>">
               <i class="fas fa-fw fa-couch"></i>
               <span>Data Perusahaan</span></a>
       </li>
       <?php } ?>
       <?php if(session()->get('level') == 2) { ?>
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
        <?php } ?>

   </ul>
   <!-- End of Sidebar -->