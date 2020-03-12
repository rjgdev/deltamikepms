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
			<br>
			<br>
			<br>
			<br>
			<div align="center">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div style="width: 99%">
											<img style="width: 100px; height: 100px;" src="<?=base_url(); ?>pages/assets/img/logo2.png" >
											<h2 style="text-align: center; margin-bottom: 0;"><?php echo $companyname; ?></h2>
											<h6 style="text-align: center;"><?php echo $address; ?></h6>
											<h6 style="text-align: center;"><?php echo $website; ?></h6>
											<h6 style="text-align: center;"><i class="la la-phone" style="font-size: 20px;"></i><?php echo $phonenumber; ?> | <i class="la la-fax" style="font-size: 20px;"></i><?php echo $fax; ?> | <i class="la la-mobile" style="font-size: 20px;"></i><?php echo $mobilenumber; ?></h6>
											<br>
											<br>
											<br>
											<h4 style="text-align: center;">13TH MONTH REPORT</h4>
											<br>
											<br>
											<br>
											<h3 style="text-align: left; margin-bottom: 0"><?php echo $employeename; ?></h3>
											<h5 style="text-align: left; color:#888;display: block; margin-bottom: 0"><?php echo $department; ?></h5>

											<h5 style="text-align: left; color:#888;display: block;"> <?php echo date("F, Y", strtotime($from)); ?> to <?php echo date("F, Y", strtotime($dateto)); ?></h5>
											
										</div>
									<div class="row">
									</div>
									<div align="center">
									
										
										<div class="col-sm-20">
											<div>
												<br>
												<table class="table table-bordered table-sss custom-table mb-0 table-striped ">
													<thead class="thead-light">
														<tr>	
														<th>Month</th>
														<th>Late</th>
														<th>Absent</th>
														<th>Net Pay</th>
														<tr>
													</thead>	
													<?php 
														foreach ($data['record'] as $record):
															$totallate[] = $record->late;
															$totalabsent[] = $record->daysofabsent;
															$totalnetpay[] = $record->thrmonth;

													?>		
													<tr> 
														<td><?php echo $record->datepayrol; ?></td> 
														<td style ="text-align: right;"><?php echo number_format($record->late, 4, '.', ','); ?></td> 
														<td style ="text-align: right;"><?php echo number_format($record->daysofabsent, 4,'',''); ?></td> 
														<td  style ="text-align: right;"><?php echo number_format($record->thrmonth, 4, '.', ','); ?></td> 
													<?php endforeach; ?>
												</tr>
												<tfoot>
													<tr>
 														<th>Total</th>
 														<th style ="text-align: right;  color:#FF0000;"> <?php echo number_format(array_sum($totallate), 4, '.', ','); ?></th>
 														<th style ="text-align: right;  color:#FF0000;"> <?php echo number_format(array_sum($totalabsent), 4, '.', ','); ?></th>
 														<th style ="text-align: right;  color:#FF0000;"> <?php echo number_format(array_sum($totalnetpay), 4, '.', ','); ?></th>

													</tr>	
												</tfoot>
												</table>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
						</div>
						</div>
					


				


   