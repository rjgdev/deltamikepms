</div>
	<!-- /Main Wrapper -->
	<script src="<?php echo base_url();?>pages\assets\js\popper.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\select2.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\moment.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\plugins\morris\morris.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\plugins\raphael\raphael.min.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\chart.js"></script>
	<script src="<?php echo base_url();?>pages\assets\js\app.js"></script>
	<script src="<?php echo base_url(); ?>pages\assets\js\jquery.mask.min.js"></script> 
	<script src="<?php echo base_url(); ?>pages\assets\inputmask\jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url(); ?>pages\assets\js\inputmask.js"></script>
    <script src="<?php echo base_url(); ?>pages\assets\js\bootstrap-show-password.min.js"></script>

	<script  type="text/javascript">  
    $(document).ready(function() {
		var current = location.pathname;
	    $('#sidebar-menu li a').each(function(){
	        var $this = $(this);
	        if($this.attr('href').indexOf(current) !== -1){
	        	if($this.parent().prop('className')=="nav-item"){
	        		$this.parent().addClass('active');
	    		}
	    		if($this.parent().parent().prop('className')=="menu-header"){
	    			$("." + $this.parent().parent().attr('id')).click();
	    		}
	            $this.addClass('active');
	        }
	    });
	});
	</script>

	</body>
</html>