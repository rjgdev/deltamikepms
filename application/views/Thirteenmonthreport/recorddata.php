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
	$mobilenumber = $company->mobilenumber.' | '. $company->email;
	$email = $company->email;
	$address = $company->address;
	$website = $company->website;

endforeach;
?>	
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div align="center">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									

									<div class="row">
									</div>
									<div align="center">
									
										
										<div class="col-sm-20">
											<div>
												<table class="table table-striped custom-table mb-0 ">

													<thead> 
														<tr>
															<th colspan="3">13th Month Report</th> 
															
														</tr> 
														<tr> 
															<td colspan="2"> <strong>Employee Name:</strong><br><p style="font-size:16px;"> <?php echo $employeename; ?><br><?php echo $department ; ?><br><?php echo $clientname; ?><br><strong>Hired Date: <?php echo $hireddate ; ?></p></strong> </td> 
															<td colspan="1"> <strong>Company Name:</strong><br><p style="font-size:16px;"><?php echo $companyname; ?><br> <?php echo $mobilenumber; ?><br> <?php echo $website; ?><br> <?php echo $address; ?></p> </td> 
														</tr> 
													</thead> 
													<tbody> 
														<tr> <th>Month</th>
														<th>Late</th>  
														<th>Absent</th> 
														<th style ="text-align: center;">Netpay</th> 
													</tr>
													<?php 
														foreach ($data['record'] as $record): 
													?>		
													<tr> 
														<td><?php echo $record->datepayrol; ?></td> 
														<td><?php echo number_format($record->late, 4, '.', ','); ?></td> 
														<td><?php echo number_format($record->daysofabsent, 0,'',''); ?></td> 
														<td  style ="text-align: right;"><?php echo number_format($record->thrmonth, 4, '.', ','); ?></td> 
													<?php endforeach; ?>
													</tr> 
												</tbody> 
												<tfoot> 
													<tr> 
														<td></td> 
														<td></td> 
														<th ><center>Subtotal:</center> <p style ="text-align: right;"><?php echo number_format(array_sum($thrmonth), 4, '.', ','); ?> </p></th>
														  
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
						<!-- <button class="btn btn-white" value="Print" onclick="window.print()"><i class="fa fa-print fa-lg"></i> Print</button> -->


				


   