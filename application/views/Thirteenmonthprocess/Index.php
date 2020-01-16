<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">13th Month Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">13th Month Process</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
<!-- Search Filter -->
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">13th Month Process</h4>
	</div>
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-1">
				<div class="form-group">
				<label>Start Month</label>
				<select id="sddlmonth" name="sddlmonth" class="form-control select2" style="width: 100%;" required="required"/>
						<option value="01" <?php if(date("m") == "01") echo "selected"; ?> />January</option>
						<option value="02" <?php if(date("m") == "02") echo "selected"; ?> />February</option>
						<option value="03" <?php if(date("m") == "03") echo "selected"; ?> />March</option>
						<option value="04" <?php if(date("m") == "04") echo "selected"; ?> />April</option>
						<option value="05" <?php if(date("m") == "05") echo "selected"; ?> />May</option>
						<option value="06" <?php if(date("m") == "06") echo "selected"; ?> />June</option>
						<option value="07" <?php if(date("m") == "07") echo "selected"; ?> />July</option>
						<option value="08" <?php if(date("m") == "08") echo "selected"; ?> />August</option>
						<option value="09" <?php if(date("m") == "09") echo "selected"; ?> />September</option>
						<option value="10" <?php if(date("m") == "10") echo "selected"; ?> />October</option>
						<option value="11" <?php if(date("m") == "11") echo "selected"; ?> />November</option>
						<option value="12" <?php if(date("m") == "12") echo "selected"; ?> />December</option>
					</select>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="form-group">
				<label>Start Year</label>
				<select id="sddlyear" name="sddlyear" class="form-control select2" style="width: 100%;" required="required">
					<option value="">Select Year</option>
					<?php for($y = date('Y'); $y >= 2009; $y--){ ?>
					<option value="<?php echo $y; ?>" <?php if($y == date('Y')) { echo 'selected'; }else{ echo '0'; } ?>><?php echo $y; ?></option>
					<?php } ?>		
				</select>
				</div>
			</div>
				<div class="col-sm-1">
				<div class="form-group">
				<label>End Month</label>
				<select id="eddlmonth" name="eddlmonth" class="form-control select2" style="width: 100%;" required="required"/>
						<option value="01" <?php if(date("m") == "01") echo "selected"; ?> />January</option>
						<option value="02" <?php if(date("m") == "02") echo "selected"; ?> />February</option>
						<option value="03" <?php if(date("m") == "03") echo "selected"; ?> />March</option>
						<option value="04" <?php if(date("m") == "04") echo "selected"; ?> />April</option>
						<option value="05" <?php if(date("m") == "05") echo "selected"; ?> />May</option>
						<option value="06" <?php if(date("m") == "06") echo "selected"; ?> />June</option>
						<option value="07" <?php if(date("m") == "07") echo "selected"; ?> />July</option>
						<option value="08" <?php if(date("m") == "08") echo "selected"; ?> />August</option>
						<option value="09" <?php if(date("m") == "09") echo "selected"; ?> />September</option>
						<option value="10" <?php if(date("m") == "10") echo "selected"; ?> />October</option>
						<option value="11" <?php if(date("m") == "11") echo "selected"; ?> />November</option>
						<option value="12" <?php if(date("m") == "12") echo "selected"; ?> />December</option>
					</select>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="form-group">
				<label>End Year</label>
				<select id="eddlyear" name="eddlyear" class="form-control select2" style="width: 100%;" required="required">
					<option value="">Select Year</option>
					<?php for($y = date('Y'); $y >= 2009; $y--){ ?>
					<option value="<?php echo $y; ?>" <?php if($y == date('Y')) { echo 'selected'; }else{ echo '0'; } ?>><?php echo $y; ?></option>
					<?php } ?>		
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Employee Type</label>
				<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
				<option value="">All</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="adddetachment">Client </label>
				<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
				<option value="">All</option>
				<?php
				foreach($data as $client)
				{
				echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Detachment</label>
				<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" required>
				<option value="">All</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Search</label>
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
<div id="tabledata">

	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">13th Month Process</h4>
				</div>
				<div class="card-body">
					<div id='result_table'>
					<div class="table-responsive">
						<table class="table table-bordered mb-0" id="employee_table">
								<tr>
									<th colspan="17"><center>DELTAMIKE SECURITY, INC.</center></th>
								</tr>	
								<tr>
									<th rowspan="2"><center>Employee ID</center></th>
									<th rowspan="2"><center>Employee Name</center></th>
									<th rowspan="2"><center>Department</center></th>
									<th rowspan="2"><center>Designation</center></th>
									<th rowspan="2"><center>Employee Type</center></th>
									<th rowspan="2"><center>Client</center></th>
									<th rowspan="2"><center>Detachment</center></th>
									<th rowspan="2"><center>Lates</center></th>
									<th rowspan="2"><center>Absences</center></th>
									<th rowspan="2"><center>Netpay</center></th>
									
								</tr>
						
							<tbody id="show_data">
                     
               				 </tbody>
               				 <tfoot id="tfooter">
						      
						     </tfoot>
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
	
	$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
	});

		$('#searchemployeetype').change(function(){
			var employeetype =$(this).val();
			if(employeetype==1){
			$("#searchclient").prop("disabled", false);
			$("#searchdetachment").prop("disabled", false);


		}else{
			$("#searchclient").prop("disabled", true);
			$("#searchdetachment").prop("disabled", true);
			$("#searchclient").val('');
			$("#searchdetachment").val('');
		}

		});
		$('#searchclient').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthprocess/get_client');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					if($("#searchhiddendetachment").val()==data[i].detachmentID){
					html += '<option value='+data[i].detachmentID+' selected>'+data[i].postname+'</option>';
					}else{
					html += '<option value='+data[i].detachmentID+'>'+data[i].postname+'</option>';
					}
				}
				$('#searchdetachment').html(html);
				}
			});
			return false;

		});

			$('#submit').click(function(){

			var sddlmonth =   $("#sddlmonth").val();
			var sddlyear = $("#sddlyear").val();
			var eddlmonth = $("#eddlmonth").val();
			var eddlyear = $("#eddlyear").val();
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
			//alert( sddlmonth +  + sddlyear + +  eddlmonth + + eddlyear + + searchemployeetype + + searchclient +  + searchdetachment);
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthprocess/search_Thirteenmonthprocess');?>",
				method : "POST",
				data : {sddlmonth: 		 	sddlmonth, 			sddlyear: 			sddlyear,	 
						eddlmonth: 	 	 	eddlmonth, 			eddlyear: 			eddlyear,
						searchemployeetype: searchemployeetype,	searchclient: 		searchclient,
						searchdetachment: 	searchdetachment},
				async : true,
				dataType : 'json',
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
                         '<td tyle ="text-align: right;">'+response[i].late+'</td>'+
                          '<td tyle ="text-align: right;">'+response[i].absent+'</td>'+
                         '<td tyle ="text-align: right;">'+response[i].thrmonth+'</td>'+
                         '</tr>';
                        
               
                    }


                    $('#show_data').html(html); 

		}	
		});
			return false;
		});	
	});	
</script>		