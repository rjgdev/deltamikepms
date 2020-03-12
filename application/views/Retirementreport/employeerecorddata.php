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
											<h4 style="text-align: center;">Retirement Report</h4>
											<br>
											<br>
											<br>
											<h3 style="text-align: left; margin-bottom: 0"><?php echo $employeename; ?></h3>
											<h5 style="text-align: left; color:#888;display: block; margin-bottom: 0"><?php echo $department; ?></h5>
											<h5 style="text-align: left; color:#888;display: block;"><?php echo $hireddate; ?></h5>
											
										</div>
									<div class="row">
									</div>
									<div align="center">
									
										
										<div class="col-sm-12">
											<div>
												<br>
												<table class="table table-bordered table-sss custom-table mb-0 table-striped ">
													<thead class="thead-light">
														<tr>	
														<th style="width: 100px ! important;"><center>Year</center></th>
														<th style="width: 100px ! important;"><center>Retirement Fund</center></th>
														<tr>
													</thead>	
													<?php 
														foreach ($data['record'] as $record):
															$totalretfund[] = $record->retfund;
													?>	
													<tr> 
														<td style ="text-align: left;"><?php echo $record->yearofhired; ?></td> 
														<td style ="text-align: right;"><?php echo number_format($record->retfund, 4, '.', ','); ?></td> 	
													<?php endforeach; ?>
												</tr>
												<tfoot>
													<tr>
 														<th style ="text-align: left;">Total</th>
 													 <th style ="text-align: right;  color:#FF0000;"> <?php echo number_format(array_sum($totalretfund), 4, '.', ','); ?></th> 
 													

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
					
