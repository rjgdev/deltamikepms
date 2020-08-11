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

foreach ($data['record'] as  $recorddata):
 $datefrom = $recorddata->datefrom;
 $datato = $recorddata->dateto;


endforeach;	
if($datefrom==0){
	$datefromrecord = "0";
}else{
	$datefromrecord = $datefrom;
}
if($datato==0){
	$datatorecord = "0";
}else{
	$datatorecord = $datato;
}

?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
 
			<div  align="center">
	</head>   
								<div style="width: 99%"><h5 style="text-align: right; color:Tomato;"><i>*for internal use only</i><h5>
											<img style="width: 100px; height: 100px;" src="<?=base_url(); ?>pages/assets/img/logo2.png" >
											<h2 style="text-align: center; margin-bottom: 0;"><?php echo $companyname; ?></h2>
											<h6 style="text-align: center;"><?php echo $address; ?></h6>
											<h6 style="text-align: center;"><?php echo $website; ?></h6>
											<h6 style="text-align: center;"><i class="la la-phone" style="font-size: 20px;"></i><?php echo $phonenumber; ?> | <i class="la la-fax" style="font-size: 20px;"></i><?php echo $fax; ?> | <i class="la la-mobile" style="font-size: 20px;"></i><?php echo $mobilenumber; ?></h6>
											<br>
											<br>
											<h4 style="text-align: center;">13TH MONTH REPORT</h4>
											<h5 style="text-align: center;"><?php echo date("F, Y", strtotime($datefromrecord)); ?> to <?php echo date("F, Y", strtotime($datatorecord)); ?></h5>
											<br>
											 <table class="table mb-0">
													<thead>
														<tr>	
														<th class="philhealthreportheader" style="width: 100px ! important;">Employee ID</th>
														<th class="philhealthreportheader" style="width: 180px;">Employee Name</th>
														<th class="text-left; philhealthreportheader" style="width: 90px;">Department</th>
														<th class="text-left; philhealthreportheader" style="width: 90px;">Designation</th>
														<th class="text-left; philhealthreportheader" style="width: 100px;">Employee Type</th>
														<th class="text-left; philhealthreportheader" style="width: 150px;page-break-inside: avoid">Month</th>
														<th class="text-left; philhealthreportheader" style="width: 50px;">Lates</center></th>
														<th class="text-left; philhealthreportheader" style="width: 50px;">Absences</center></th>
														<th class="text-right; philhealthreportheader" style="width: 120px;">Total 13th Month</th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															
															
															foreach ($data['record'] as $data):
																$totallate[] = $data->late;
																$totalabsent[] =  $data->absent;
																$totalthrmonth[] =   $data->thrmonth;

														?>		
														<tr>
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo str_pad($data->employeeID, 6, "0", STR_PAD_LEFT); ?></td> 
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo $data->employeename; ?></td> 
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo $data->department; ?></td> 
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo $data->designation; ?></td> 
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo $data->employeetype; ?></td> 
															<td class="philhealthreportheader" style ="text-align: left;"><?php echo $data->thrthmonthdate; ?></td>
															<td class="philhealthreportheader" style ="text-align: right;"><?php echo $data->late; ?></td> 
															<td class="philhealthreportheader" style ="text-align: right;"><?php echo $data->absent; ?></td>
															<td class="philhealthreportheader" style ="text-align: right;"><?php echo $data->thrmonth; ?></td>
														</tr>
													<?php endforeach; ?>
														<tr>
															<th class="philhealthreportheader">Total</th>
															<td class="philhealthreportheader" colspan="5"></td>
															<th class="philhealthreportheader" style ="text-align: right;"><?php echo  number_format(array_sum($totallate), 4, '.', ',');?></th>
															<th class="philhealthreportheader" style ="text-align: right;"><?php echo  number_format(array_sum($totalabsent), 4, '.', ','); ?></th>
															<th class="philhealthreportheader" style ="text-align: right;"><?php echo  number_format(array_sum($totalthrmonth), 4, '.', ','); ?></th>
														</tr>
													</tbody>
											</table>	
										</div>	
										</div>
										<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									</div>
								<div>		
</body> 		


														
