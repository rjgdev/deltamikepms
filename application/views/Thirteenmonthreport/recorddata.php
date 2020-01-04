
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div align="center">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-body">
									

									<h4 class="payslip-title">Thirteen month for the year of 2019</h4>
									<div class="row">
										<div class="col-sm-6 m-b-20">
											<img src="assets\img\logo2.png" class="inv-logo" alt="">
											<?php foreach ($data['company'] as $record):?>
												
											<ul class="list-unstyled mb-0">
												<li><?php echo $record->company ?></li>
												<li><?php echo $record->firstletter ?></li>
												<li><?php echo $record->firstletter1 ?></li>
												<li><?php echo $record->website ?></li>
											</ul>
										<?php endforeach; ?>
										</div>
										<div class="col-sm-6 m-b-20">
											<div class="invoice-details">
												<h4 class="text-uppercase">Thirteen Month #49029</h4>
												<ul class="list-unstyled">
													<li>Thirteen Month: <span>December, 2019</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-lg-12 m-b-20">
											<?php foreach ($data['employee'] as $record):?>
											<ul class="list-unstyled">
												<li><h5 class="mb-0"><strong><?php echo $record->employeename ?></strong></h5></li>
												<li><span><?php echo $record->designationdescription ?></span></li>
												<li>Employee ID: FT-0009</li>
												<li>Joining Date: <?php echo $record->hireddate ?></li>
											</ul>
											<?php endforeach; ?>
										</div>
									</div>
									<div align="center">
									
										
										<div class="col-sm-20">
											<div>
												<table class="table table-striped custom-table mb-0 datatable">
													<th>Month</th>
													<th>Number of Absent</th>
													<th>Gross</th>
													<tbody>
														<?php
														for($i=0;$i<=11;$i++){
														$month=date('M',strtotime("first day of -$i month"));
														
														?>
														<tr>
															<td><?php echo $month; ?></td>
															<td></td>
															<td></td>
														</tr>
													<?php } ?>
													</tbody>
													<tfoot>
														<td>Total</td>
														<td></td>
														<td></td>
													</tfoot>	
												</table>
											</div>
										</div>
										
										<!-- <div class="col-sm-6">
											<div>
												<h4 class="m-b-10"><strong>Deductions</strong></h4>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">$0</span></td>
														</tr>
														<tr>
															<td><strong>Provident Fund</strong> <span class="float-right">$0</span></td>
														</tr>
														<tr>
															<td><strong>ESI</strong> <span class="float-right">$0</span></td>
														</tr>
														<tr>
															<td><strong>Loan</strong> <span class="float-right">$300</span></td>
														</tr>
														<tr>
															<td><strong>Total Deductions</strong> <span class="float-right"><strong>$59698</strong></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div> -->
										<div class="col-sm-12">
											<p><strong>Net Salary: $59698</strong> (Fifty nine thousand six hundred and ninety eight only.)<a href=""  value="Print" onclick="window.print()"><i class="fa fa-print fa-lg"> Print</i></a></p>

										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- <button class="btn btn-white" value="Print" onclick="window.print()"><i class="fa fa-print fa-lg"></i> Print</button> -->


				


   