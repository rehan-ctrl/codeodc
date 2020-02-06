<!DOCTYPE html>
<html lang="en-IN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cassix CRM</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="<?= base_url('application/views/admin/') ?>images/favicon.png" rel="shortcut icon" type="image/png">
	<link href="<?= base_url('application/views/admin/') ?>images/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="<?= base_url('application/views/admin/') ?>images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
	<link href="<?= base_url('application/views/admin/') ?>images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
	<link href="<?= base_url('application/views/admin/') ?>images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/_all-skins.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/all.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/square/blue.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/jhcustom-bootstrap-margin-padding.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/custom.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/select2.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>css/morris.css">
	<link rel="stylesheet" href="<?= base_url('application/views/admin/') ?>style.css">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	<?php $sidebar='#9C27B0';$header='#ffc107';
	$query=$this->db->query("SELECT * from admin_user where company_id=1");
	$detail=$query->row();
	if(!empty($detail->site_color)){$sidebar=$detail->site_color;}
	if(!empty($detail->site_color_2)){$header=$detail->site_color_2;}
	?>
	<style>
		.skin-blue .main-header .navbar {
	background-color:<?= $header ?>;
}
.skin-blue .main-header .logo {
	background-color: <?= $sidebar ?>; 
	color: #000;
	border-bottom: 0 solid transparent
}
	</style>
</head>