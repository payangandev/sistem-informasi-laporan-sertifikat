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

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
               <i class="fas fa-fw fa-folder"></i>
               <span>Data Master</span>
           </a>
           <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Data Master Sertifikat:</h6>
                   <a class="collapse-item" href="<?php echo base_url('iso'); ?>">ISO</a>
                   <a class="collapse-item" href="<?php echo base_url('skt'); ?>">SKT</a>
                   <a class="collapse-item" href="<?php echo base_url('ska'); ?>">SKA</a>
                   <a class="collapse-item" href="<?php echo base_url('ktiga'); ?>">K3</a>
               </div>
           </div>
       </li>
       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('client'); ?>">
               <i class="fas fa-fw fa-couch"></i>
               <span>Data Client</span></a>
       </li>

       <li class="nav-item ">
           <a class="nav-link" href="<?php echo base_url('perusahaan'); ?>">
               <i class="fas fa-fw fa-couch"></i>
               <span>Data Arsip</span></a>
       </li>
       <?php if (session()->get('level') == 1) { ?>
           <li class="nav-item">
               <a class="nav-link" href="<?php echo base_url('users'); ?>">
                   <i class="fas fa-fw fa-user-check"></i>
                   <span>Data Users</span></a>
           </li>
       <?php } ?>

   </ul>
   <!-- End of Sidebar -->