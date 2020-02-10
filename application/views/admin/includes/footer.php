<?php if(!empty($this->session->flashdata('message'))){ ?>
<div class="parent">
	<div class="messages">
		<?= $this->session->flashdata('message'); ?>
		<i class="fa fa-times close-message" title="close"></i>
	</div>
</div>
<?php } ?>
<footer class="main-footer">
	<div class="row">
		<strong>
		<div class="col-md-6">
			Copyrights &copy; <?= date('Y') ?><a href="https://www.cassixcom.com" target="_blank"> Cassixcom</a>, All Rights Reserved
		</div>
		<div class="col-md-6 text-right"> Design & Developed By:<a href="https://www.cassixcom.com/" target="_blank"> Cassixcom.</a></div>
		</strong>
	</div>
</footer>