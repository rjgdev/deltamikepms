<?php 
foreach ($data['record'] as $record):
	$employeename = $record->employeename;
	$department = $record->department.' | '.  $record->designation;
	$designation = $record->designation;
	$clientname = $record->clientname.' | '. $record->detachment;
	$detachment = $record->detachment;
	$hireddate = $record->hireddate;
	$thrmonth[] = $record->thrmonth;

endforeach;

foreach ($data['company'] as $company):
	$companyname = $company->company;
	$mobilenumber = $company->mobilenumber;
	$email = $company->email;
	$address = $company->address;
	$website = $company->website;
	$phonenumber = $company->phonenumber;
	$fax = $company->Fax;
	$from = $company->datefrom;
	$dateto = $company->dateto;

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
						<div class="col-sm-12" id="scroll">
									<div style="width: 99%"><h5 style="text-align: right; color:Tomato;"><i>*for internal use only</i><h5>
											<img style="width: 100px; height: 100px;" src="<?=base_url(); ?>pages/assets/img/logo2.png" >
											<h2 style="text-align: center; margin-bottom: 0;"><?php echo $companyname; ?></h2>
											<h6 style="text-align: center;"><?php echo $address; ?></h6>
											<h6 style="text-align: center;"><?php echo $website; ?></h6>
											<h6 style="text-align: center; color:Tomato;"><i class="la la-phone" style="font-size: 20px;"></i><?php echo $phonenumber; ?> | <i class="la la-fax" style="font-size: 20px;"></i><?php echo $fax; ?> | <i class="la la-mobile" style="font-size: 20px; color:Tomato;"></i><?php echo $mobilenumber; ?></h6>
											<br>
											<br>
											<br>
											<h4 style="text-align: center;">13TH MONTH REPORT</h4>
											<br>
											<br>
											<h3 style="text-align: left; margin-bottom: 0"><?php echo $employeename; ?></h3>
											<h5 style="text-align: left; color:#000000;display: block; margin-bottom: 0"><?php echo $department; ?></h5>

											<h5 style="text-align: left; color:#000000;display: block;"> <?php echo date("F, Y", strtotime($from)); ?> to <?php echo date("F, Y", strtotime($dateto)); ?></h5>
											
										</div>
									<div class="row">
									</div>
									<div align="center">
									
										
										<div class="col-sm-20">
											<div>
												<br>
												<table class="table mb-0">
													<thead >
														<tr class="thirteenmonth">	
														<th class="thirteenmonth">Month</th>
														<th class="thirteenmonth">Late</th>
														<th class="thirteenmonth">Absent</th>
														<th class="thirteenmonth">Net Pay</th>
														<tr>
													</thead>
													<tbody>
												 <?php 
														foreach ($data['record'] as $record):
															$totallate[] = $record->late;
															$totalabsent[] = $record->daysofabsent;
															$totalnetpay[] = $record->thrmonth;

													?>		
													<tr> 
														<td class="thirteenmonth"><?php echo $record->datepayrol; ?></td> 
														<td class="thirteenmonth" style ="text-align: right;"><?php echo number_format($record->late, 4, '.', ','); ?></td> 
														<td class="thirteenmonth" style ="text-align: right;"><?php echo number_format($record->daysofabsent, 4,'',''); ?></td> 
														<td class="thirteenmonth" style ="text-align: right;"><?php echo number_format($record->thrmonth, 4, '.', ','); ?></td> 
													<?php endforeach;?>
												</tr>
													<tr>
 														<th class="thirteenmonth">Total</th>
 														<th class="thirteenmonth" style ="text-align: right"> <?php echo number_format(array_sum($totallate), 4, '.', ','); ?></th>
 														<th class="thirteenmonth" style ="text-align: right"> <?php echo number_format(array_sum($totalabsent), 4, '.', ','); ?></th>
 														<th class="thirteenmonth" style ="text-align: right"> <?php echo number_format(array_sum($totalnetpay), 4, '.', ','); ?></th>
													</tr> 
												</tbody>		
											</table>
											</div>
							</div>			
						</div>
					</div>
				</div>
		<body>
					

<style type="text/css">


@media print{
	

		tr:nth-child(even) td {
		background-color:  !important;
		-webkit-print-color-adjust: exact;
		}
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  #scroll {
    width: 100%;
    padding: 10px;
  }
}
</style>			

				


   