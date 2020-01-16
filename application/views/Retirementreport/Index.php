
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Retirement Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Retirement Report</li>
					</ul>
				</div>
			</div>
		</div>
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">Retirement Report</h4>
	</div>
	<div class="card-body">
		<form action="#" id="seachform">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="adddetachment">Employee Name</label>
				<select class="form-control select2" id="searchemployee" name="searchemployee"  multiple="multiple" style="width: 100%;" >

				<?php
				foreach($data as $employee)
				{
				echo '<option value="'.$employee->employeeID.'">'.$employee->employeename.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">&emsp;</label>
				<br>
				<button type="submit" class="btn btn-primary"id="submit">Search</button>
				</div>
			</div>
			</div>
			</div>
		</div>
	</form>
	</div>

	</div>
	</div>
	</div>
</div>
</div>
<br>
	
<div class="ajax_loading"><p></p></div>
	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Records</h4>
				</div>
				<div class="card-body">
						<div class="row">
						<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
							<thead>	
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 250px;"><center>Employee Name</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Department</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Designation</center></th>
									<th class="text-right" style="width: 100px; font-size:11px;"><center>Employee Type</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Client</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Detachment</center></th>
									<th class="text-right" style="width: 100px; font-size:11px;"><center>Retirement Fund</center></th>
									<th style="width: 200px;">Last Payroll Cut off</th>
									<th class="text-right" style="width: 80px; font-size:11px;">Hired Date</th>
									<th class="text-right" style="width: 90px; font-size:11px;">Year</th>
									<th style="width: 200px ! important;">Number of Years of Work</th>
									
								</tr>
							</thead>
							<tbody id="show_data">
               				 </tbody>
						</table>
				</div>	
				</div>
				</div>	
				</div>
			</div>
		</div>
	</div>
	</div>	
	

<script  type="text/javascript">  
	$(document).ready(function() {

$("#seachform").submit(function(event) {


  /* stop form from submitting normally */
  event.preventDefault();

  /* get some values from elements on the page: */
  var $form = $( this );
  var url = $form.attr( "action" );
  //before send
  $("body").addClass("loading");

  /* Send the data using post */
  var posting = $.post(url , $( "#seachform" ).serialize() );

  /* Alerts the results */
  posting.done(function( data ) {
     //use data
     $("body").removeClass("loading");

  });
});



	$('#submit').click(function(){

			var arrayemployee = $("#searchemployee").val();
			//alert( searchdate +  + searchemployeetype + );
			$.ajax({
				url : "<?php echo site_url('Retirementreport/search_Retirementreport');?>",
				method : "POST",
				data : {arrayemployee: 		arrayemployee},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					  $("body").addClass("loading");
					},
				success: function(response){
				  var html = '';
                    var i;
                    for(i=0; i<response.length; i++){
                     html += '<tr>'+
                        '<td>'+response[i].employeeID+'</td>'+
                        '<td>'+response[i].employeename+'</td>'+
                        '<td>'+response[i].department+'</td>'+
                        '<td>'+response[i].designation+'</td>'+
                        '<td>'+response[i].employeetype+'</td>'+
                        '<td>'+response[i].clientname+'</td>'+
                         '<td>'+response[i].detachment+'</td>'+
                          '<td tyle ="text-align: right;">'+response[i].retfund+'</td>'+
                          '<td>'+response[i].lastcutoff+'</td>'+
                          '<td>'+response[i].hireddate+'</td>'+
                           '<td>'+response[i].yearofhired+'</td>'+
                           '<td>'+response[i].yearofwork+'</td>'+
                         '</tr>';
                              
               		
                    }
                    $('#show_data').html(html); 
                      $("body").removeClass("loading");  
		}	

		});
			return false;
		});		

});
</script>		