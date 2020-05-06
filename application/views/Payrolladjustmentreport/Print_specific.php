<?php
	$datefrom = date_format(date_create($data['datefrom']),'F, Y');
	$dateto   = date_format(date_create($data['dateto']),'F, Y');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Deltamike - Payroll Management System">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="BlackCoders Group Inc.">
        <meta name="robots" content="noindex, nofollow">
        <title>Payroll Adjustment Report | Deltamike PMS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>pages\assets\img\favicon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\all.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\line-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\select2.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\jquery.toast.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\morris\morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\style.css">

        <script src="<?php echo base_url();?>pages\assets\js\jquery-3.2.1.min.js"></script>	
        <script src="<?php echo base_url(); ?>pages\assets\js\jquery.toast.min.js"></script>
  		<script src="<?php echo base_url(); ?>pages\assets\js\toast.js"></script>	
    </head>
    <body style="background-color: #fff;" >
        <div class="main-wrapper">
			<div class="content container-fluid mt-5">
				<div class="loader"></div>
				<table style="width: 100%; margin-bottom: 2rem;">
					<tr>
						<td style="text-align: center;"><img src="<?=base_url(); ?>pages/assets/img/logo2.png" style="margin-bottom: .5rem;"></td>
					</tr>
					<tr>
						<td><h5 style="text-align: center; margin-bottom: 0rem;"><strong>DELTAMIKE SECURITY, INC.</strong></h5></td>
					</tr>
					<tr>
						<td><h5 style="text-align: center; margin-bottom: 0rem;"><strong>PAYROLL ADJUSTMENT REPORT</strong></h5></td>
					</tr>
					<tr>
						<td><h5 style="text-align: center; margin-bottom: 0rem; font-size:11px" ><strong><?php echo strtoupper($datefrom); ?> - <?php echo strtoupper($dateto); ?></strong></h5></td>
					</tr>				
				</table>
				<table class="test table-bordered" align="center" style="border:1px solid">
					<thead>
						<th class="tsHeader">Payroll Period</th>
						<th class="tsHeader">Payroll Item</th>
						<th class="tsHeader">Amount</th>
						<th class="tsHeader">Notes</th>
					</thead>
					<tbody>
						<?php foreach ($data['record'] as $item)  { ?>
							<tr>
								<?php if($item[2]=="" && $item[3]==""){ ?>
									<td class="tsData" colspan="4" style="background-color: #e7e7e7; padding:5px;"><?php echo $item[0]; ?></td>
								<?php }else{?>
									<td class="tsData"><?php echo $item[0]; ?></td>
									<td class="tsData"><?php echo $item[1]; ?></td>
								<td class="tsData" style="text-align: right;"><?php echo $item[2]; ?></td>
								<td class="tsData"><?php echo $item[3]; ?></td></tr>
								<?php } ?>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</body>

<style>
.loader{
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100vh;
	z-index: 1001;
	background: url('<?php echo base_url();?>pages/assets/img/Loading.svg') 
	          50% 50% no-repeat rgb(249,249,249);
}

.tsHeader{
	color: white;
    background-color: #df4c44;
    text-align: center;
    min-width: 200px;
    padding:5px;
}

.tsData{
	padding:5px;
}

.print{
	display: none;
}

</style>

<script>
	$(window).on("load", function() {
		
		$(".loader").fadeOut('fast', function(){ 
          /*window.print();
          setTimeout(function(){ 
		     window.close();
		  }, 1);*/
       });
	});	
</script>

<style type="text/css">
	@media print {
	    .main-wrapper{
		    -webkit-print-color-adjust: exact;		
		}
	}

	@page {
	  size: auto;
	  margin: 0;
	}
</style>