<?php
foreach ($data['company'] as $company):
	$companyname = $company->company;
	$mobilenumber = $company->mobilenumber;
	$email = $company->email;
	$address = $company->address;
	$website = $company->website;
	$phonenumber = $company->phonenumber;
	$fax = $company->Fax;

endforeach;

foreach ($data['client'] as $client):

	$clientname = $client->clientname;
	$clientaddress = $client->address;

endforeach;

foreach ($data['record'] as $data):
$billingdate 	 = $data->rangedate;
$securityofficer = $data->basicsalarySO;
$security 		 = $data->basicsalarySG;
$sss 		 	 = $data->totalsss;
$phic 		 	 = $data->totalphic;
$retfund 		 = $data->totalretfund;
$pagibig 		 = $data->totalhdmf;
/*$administrative  = $data->administrativemargin;*/
$taxable 		 = $data->taxable;
$taxdue 		 = $data->taxdue;


endforeach;	
?>	
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
											<h4 style="text-align: center;">Billing Report</h4>
											<br>
											<h3 style="text-align: left; margin-bottom: 0"><?php echo $clientname; ?></h3>
											<h5 style="text-align: left; color:#888;display: block; margin-bottom: 0"><?php echo $clientaddress; ?></h5>
										</div>
									<div class="row">
										<div class="col-md-4">
										</div>	
									<div class="col-md-8">
										<br>
										<br>
									<div class="profile-box flex-fill">
										<br>
										<br>
											<h3 class="float-left">FOR THE PERIOD OF <?php echo $billingdate; ?></h3>
											<br>
											<br>
											<ul class="personal-info">
												<br>
												<li>
													<h5 class="title" style="text-align: left;">Security Office</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($securityofficer, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: left;">Security Guards</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($security, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: left;">SSS Permium</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($sss, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: left;">Philhealth Contribution</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($phic, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: left;">State Insurance Fund</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($retfund, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: left;">PAG-IBIG Fund</h5>
													<h5 class="text" class="text" style="text-align: right;"><?php echo "₱ " .number_format($pagibig, 4, '.', ','); ?></h5>
												</li>
												<!-- <li>
													<h5 class="title" style="text-align: left;">ADMINISTRATIVE and OVERHEAD MARGIN</h5>
													<h5 class="text" style="text-align: right;"><?php echo "₱ " .number_format($administrative, 4, '.', ','); ?></h5>
												</li> -->
												<br>
												<li>
													<h5 class="title" style="text-align: right;">Subtotal</h5>
													<h5 class="text"  style="text-align: right;"><?php echo "₱ " .number_format($phic, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: right;">Taxable</h5>
													<h5 class="text"  style="text-align: right;"><?php echo "₱ " .number_format($taxable, 4, '.', ','); ?></h5>
												</li>
												<li>
													<h5 class="title" style="text-align: right;">Tax rate</h5>
													<h5 class="text"  style="text-align: right;">No data</h5>
												</li>
												<li>
													<h5 class="title" style="text-align: right;">Tax due</h5>
													<h5 class="text" style="text-align:  right;"><?php echo "₱ " .number_format($taxdue, 4, '.', ','); ?></h5>
												</li>
												<!-- <li>
													<h5 class="title" style="text-align: right;">Creditable 2% WT</h5>
													<h5 class="text"  style="text-align: right;"><?php echo "₱ " .number_format($administrative, 4, '.', ','); ?></h5>
												</li> -->
											</ul>
									</div>
								</div>	
									 </div>	
									</div>
								</div>
							</div>
						</div>
						</div>	