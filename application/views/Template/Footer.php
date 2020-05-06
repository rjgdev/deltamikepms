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
    <script src="<?php echo base_url(); ?>pages\assets\js\dataTables.fixedColumns.min.js"></script>
    <script src="<?php echo base_url(); ?>pages\assets\js\accounting.js"></script>

	<script  type="text/javascript">  

	  $(window).on("load", function() {
	      $(".loader").fadeOut(700, function(){ 
	        $('body').css("position", "absolute");
	        $('body').css("overflow", "overlay");
	      });
	  });

    $(document).ready(function() {
		$('.select2').select2();

		$('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box
	        if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
	            $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
	        }
	    });
		
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

    	$('.modal').on('show.bs.modal', function(){
           $('body').css("overflow", "hidden");
        });

        $('.modal').on('hidden.bs.modal', function(){
           $('body').css("overflow", "overlay");
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
		    37 - (%)
		    13 - (Enter)
		*/
		$(document).on("keypress", ".numbersonly", function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 57) ) && keyCode != 8 && keyCode != 13) {
		      e.preventDefault();
		    }
		});
		 
		$(document).on("keypress", ".withoutspace", function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 59) || (keyCode >= 97 && keyCode <= 122 ) || (keyCode >= 64 && keyCode <= 90 || (keyCode >= 33 && keyCode <= 47 ) )) &&  keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".percentage", function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 57) ) && keyCode != 8 && keyCode != 13 && keyCode != 46) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".letterswithspace", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) )  && keyCode != 13 && keyCode != 8 && keyCode != 32) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".letterswithdotandcomma", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) )  && keyCode != 13 && keyCode != 8 && keyCode != 32 && keyCode != 46 && keyCode != 44) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".lettersonly", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) )  && keyCode != 13 && keyCode != 8) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".alphanumericwithspace", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});
		
		$(document).on("keypress", ".alphanumericwithspacecompany", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (keyCode >= 40 && keyCode <= 41) ||  (keyCode >= 44 && keyCode <= 46)) && keyCode != 32) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".alphanumeric", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".accountnumber", function(e){
		    var keyCode = e.which;
		    if ( !( (keyCode >= 48 && keyCode <= 57) ) && keyCode != 8 && keyCode != 45 && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".accntnumberformat", function(e){
		    var keyCode = e.which;
		    if ( keyCode != 48 && keyCode != 8 && keyCode != 45 && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".restrictspecchar", function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 45 && keyCode != 39 && keyCode != 8 && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});

		$(document).on("keypress", ".specchar", function(e){
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

		$(document).on("keypress", ".otherfield", function(e){
		    var keyCode = e.which;

		    if (!(keyCode >= 48 && keyCode <= 57) && keyCode != 39 && keyCode != 40 && keyCode != 41 && keyCode != 44 && keyCode != 45 && keyCode != 46 && keyCode != 8 && keyCode != 32 && keyCode != 13 && !(keyCode >= 65 && keyCode <= 90) && !(keyCode >= 97 && keyCode <= 122)) {
		      e.preventDefault();
		    }
		});

	});
	</script>
	</body>
</html>