<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
      <img src="<?php echo base_url('themes/dist'); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Point Of Sale</span>
    </a>
 
    <div class="sidebar">
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('themes/dist'); ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div> -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('/'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('product'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Manajement Product</p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Purchasing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('purchase'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Purchasing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier</p>
                        </a>
                    </li>
                    </ul>
                </li> -->
                
                <li class="nav-item">
                    <a href="<?php echo base_url('purchase'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Purchasing</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('supplier'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('sale'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Selling</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('report'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Report</p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>