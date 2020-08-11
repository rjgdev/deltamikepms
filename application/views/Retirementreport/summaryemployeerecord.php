<?php 
foreach ($data['record'] as $record):
	$employeename = $record->employeename;
	$department = $record->department.' | '.  $record->designation;
	$designation = $record->designation;
	$hireddate = $record->hireddate;

endforeach;

foreach ($data['company'] as $company):
	$companyname = $company->company;
	$mobilenumber = $company->mobilenumber;
	$email = $company->email;
	$address = $company->address;
	$website = $company->website;
	$phonenumber = $company->phonenumber;
	$fax = $company->Fax;

endforeach;
?>	
<style>
body{
	font-family: 'CircularStd', sans-serif;
	font-size: .7375rem;
	color: #1f1f1f;
	background-color: #f7f7f7;
	min-height: 100%;
	width:100%;
	overflow: scroll;
	position: absolute;
	
}
</style>
		<body>	

			<br>
			<br>
			<br>
			<br>
			<div align="center">
						<div class="col-sm-12">
									<div style="width: 99%"><h5 style="text-align: right; color:Tomato;"><i>*for internal use only</i><h5>

											<img style="width: 100px; height: 100px;" src="<?=base_url(); ?>pages/assets/img/logo2.png" >
											<h2 style="text-align: center; margin-bottom: 0;"><?php echo $companyname; ?></h2>
											<h6 style="text-align: center;"><?php echo $address; ?></h6>
											<h6 style="text-align: center;"><?php echo $website; ?></h6>
											<h6 style="text-align: center;"><i class="la la-phone" style="font-size: 20px;"></i><?php echo $phonenumber; ?> | <i class="la la-fax" style="font-size: 20px;"></i><?php echo $fax; ?> | <i class="la la-mobile" style="font-size: 20px;"></i><?php echo $mobilenumber; ?></h6>
											<br>
											<br>
											<br>
											<h4 style="text-align: center;">Retirement Report</h4>
											<br>
											<br>
											<br>				
										</div>
									<div class="row">
									</div>
									<div align="center">	
										<div class="col-sm-12">
											<div>
												<br>
												<table class="table mb-0">
													<thead>
														<tr>
														<th class="philhealthreportheader">Employee ID</th>	
														<th class="philhealthreportheader">Employee Name</th>
														<th class="philhealthreportheader">Department</th>
														<th class="philhealthreportheader">Designation</th>
														<th class="philhealthreportheader">Employee Type</th>
														<th class="philhealthreportheader">Last pay cut off</th>
														<th class="philhealthreportheader">Hired Date</th>
														<th class="philhealthreportheader">Year</th>
														<th class="philhealthreportheader">Year of service</th>
														<th class="philhealthreportheader">Retirement Fund</th>
														<tr>
													</thead>
													<tbody>	
													<?php 
														foreach ($data['record'] as $record):
															$totalretfund[] = $record->retfund;
													?>	
													<tr> 
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo str_pad($record->employeeID, 6, "0", STR_PAD_LEFT); ?></td> 
														<td  class="philhealthreportheader" style ="text-align: left;"><?php echo $record->employeename; ?></td>
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->department; ?></td>
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->designation; ?></td>
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->employeetype; ?></td>
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->lastcutoff; ?></td> 
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->hireddate; ?></td> 
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->year1; ?></td> 
														<td class="philhealthreportheader" style ="text-align: left;"><?php echo $record->yearofwork; ?></td>  
														<td class="philhealthreportheader" style ="text-align: right;"><?php echo $record->retfund; ?></td>	 	
													<?php endforeach; ?>
												</tr>
													<tr>
 													 <th class="philhealthreportheader" style ="text-align: left ! important;" colspan="9" >Total</th>
 													 <th class="philhealthreportheader" style ="text-align: right"> <?php echo number_format(array_sum($totalretfund), 4, '.', ','); ?></th> 
													</tr>	
													</tbody>
												</table>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
		</body>					
					
<style type="text/css">
#retirementbordersummary  td, #retirementbordersummary th {
  border: 2px solid #000000;
  padding: 8px;
}

@media print{

		tr:nth-child(even) td {
		background-color: !important;
		-webkit-print-color-adjust: exact;
		}

		.total th.total{
			background-color: #0c6c9f !important;
		}

		.total td.total{
			background-color: #0c6c9f !important;
		}

</style>			
