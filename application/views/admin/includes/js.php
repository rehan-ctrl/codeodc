<script src="<?= base_url('application/views/admin/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button);

</script>
<script src="<?= base_url('application/views/admin/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/select2.full.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/raphael.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/morris.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery.sparkline.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery.knob.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/moment.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/daterangepicker.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/bootstrap-datepicker.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/fastclick.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/adminlte.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/dashboard.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/demo.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/icheck.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/jszip.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/pdfmake.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/vfs_fonts.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/buttons.html5.min.js"></script>
<script src="<?= base_url('application/views/admin/') ?>js/buttons.print.min.js"></script>
<script type="text/javascript" src='<?= base_url('application/views/admin/') ?>ckeditor/ckeditor.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>
<script>
    $('.close-message').click(function(){
    	$('.parent').fadeOut();
    })
</script>
<script>
	$(document).ready(function() {
		$('.example3').DataTable({
			'paging': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true,
			'language': {
				searchPlaceholder: "Search Records"
			},
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
				'print'
			]
		});
	});
</script>
<script>
	$(function() {
		$('.example1').DataTable()
		$('.example2').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': false
		});
	});

</script>
 

<script>
	$('#summernote').summernote({
		placeholder: 'Write Project Description...',
		tabsize: 2,
		height: 160
	});

</script>
