  	</div>

  	<script src="<?php echo base_url('assets/admin/js/plugins/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/admin/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
	<!--   Optional JS   -->
	<script src="<?php echo base_url('assets/admin/js/plugins/chart.js/dist/Chart.min.js')?>"></script>
	<script src="<?php echo base_url('assets/admin/js/plugins/chart.js/dist/Chart.extension.js')?>"></script>
	<!--   Argon JS   -->
	<script src="<?php echo base_url('assets/admin/js/argon-dashboard.min.js?v=1.1.0')?>."></script>
    <!-- WYSIWYG -->
    <script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.js')?>'></script>
    <script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/req.js')?>'></script>
    <script src='<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.min.js')?>'></script>
    <!-- DatePicker -->
	<script src="<?php echo base_url('assets/admin/date/js/bootstrap-datepicker.js')?>"></script>
    <!-- Toggle -->
	<script src="<?php echo base_url('assets/admin/bootstrap-toggle/js/bootstrap-toggle.min.js')?>"></script>
	<script src="<?php echo base_url('assets/admin/js/toggle.js')?>"></script>
	<script>
		$(function () {
			$('#input-date').datepicker({
				autoclose: true
			});
		});
		window.setTimeout(function() { 
			$(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
				$(this).remove(); 
			}); 
			$(".alert-warning").fadeTo(500, 0).slideUp(500, function(){ 
				$(this).remove(); 
			}); 
		}, 3000); 
	</script>
</body>

</html>
