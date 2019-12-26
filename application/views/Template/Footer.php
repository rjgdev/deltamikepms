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
		$('.select2').select2();
		
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

	    /* 
		    48-57 - (0-9)Numbers
		    65-90 - (A-Z)
		    97-122 - (a-z)
		    8 - (backspace)
		    32 - (space)
		    45 - (-)
		    39 - ('')
		    46 - (.)
		    44 - (,)
		    47 - (/)
		    35 - (#)
		    13 - (Enter)
		*/

	    $(".numbersonly").keypress(function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 57) ) && keyCode != 8 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(".letterswithspace").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) )  && keyCode != 13 && keyCode != 8 && keyCode != 32) {
		      e.preventDefault();
		    }
		});

		$(".lettersonly").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) )  && keyCode != 13 && keyCode != 8) {
		      e.preventDefault();
		    }
		});

		$(".alphanumericwithspace").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(".alphanumeric").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(".accountnumber").keypress(function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 57) ) && keyCode != 8 && keyCode != 45 && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(".restrictspecchar").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 45 && keyCode != 39 && keyCode != 8 && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(".specchar").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) 
		    	&& keyCode != 45 && keyCode != 39
		    	&& keyCode != 46 && keyCode != 44
		    	&& keyCode != 47 && keyCode != 35 
		    	&& keyCode != 8 && keyCode != 32
		    	&& keyCode != 13) {
		      e.preventDefault();
		    }
		});

	});
	</script>

	</body>
</html>