<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <?php
        $query=$this->db->query("SELECT * from admin_user where company_id=1");
        $admin=$query->row();
        $photo='';if(empty($admin->site_logo)){$photo=base_url('application/views/admin/images/cassixcrm-logo.png');}else{$photo=base_url('documents/').$admin->site_logo;} ?>
        <span class="logo-mini"><b><img src="<?= $photo ?>" height="40"></b></span>
		<span class="logo-lg"><b><img src="<?= $photo ?>" height="40"></b></span></a>
   
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="user-menu">
                    <a href="<?= base_url('admin/my_profile') ?>"> <span class="hidden-xs">My Profile</span> </a>
                </li>
       			<li class="user-menu">
                    <a href="<?= base_url('admin/admin_logout') ?>"> <span class="hidden-xs"><b>Logout</b></span> </a>
                </li>
              
            </ul>
        </div>
    </nav>
</header>
