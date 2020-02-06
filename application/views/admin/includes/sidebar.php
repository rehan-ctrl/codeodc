<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="<?php if($this->uri->segment(2)=='dashboard'){echo "active";} ?>"><a href="<?= base_url('admin/dashboard') ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
			<?php if($this->session->userdata('user_type') == 'Admin'){ ?>
			<li class="<?php if($this->uri->segment(2)=='users'){echo "active";} ?>"><a href="<?= base_url('admin/users') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='referral'){echo "active";} ?>"><a href="<?= base_url('admin/referral') ?>"><i class="fa fa-users"></i> <span>Referral</span></a></li>
			<?php } ?>
			<li class="<?php if($this->uri->segment(2)=='leads'){echo "active";} ?>"><a href="<?= base_url('admin/leads') ?>"><i class="fa fa-list"></i> <span>Leads</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='cool_leads'){echo "active";} ?>"><a href="<?= base_url('admin/cool_leads') ?>"><i class="fa fa-snowflake-o"></i> <span>Cool Leads</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='warm_leads'){echo "active";} ?>"><a href="<?= base_url('admin/warm_leads') ?>"><i class="fa fa-fire"></i> <span>Warm Leads</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='hot_leads'){echo "active";} ?>"><a href="<?= base_url('admin/hot_leads') ?>"><i class="fa fa-fire"></i> <span>Hot Leads</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='close_leads'){echo "active";} ?>"><a href="<?= base_url('admin/close_leads') ?>"><i class="fa fa-window-close "></i> <span>Closed Leads</span></a></li>
			<li class="<?php if($this->uri->segment(2)=='dormat_leads'){echo "active";} ?>"><a href="<?= base_url('admin/dormat_leads') ?>"><i class="fa fa-window-close "></i> <span>Dormant Leads</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
