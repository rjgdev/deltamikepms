<?php if($this->session->has_userdata('username')){ }else{ redirect(base_url()); } ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Deltamike - Payroll Management System">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="BlackCoders Group Inc.">
        <meta name="robots" content="noindex, nofollow">
        <title><?php echo $title; ?> | Deltamike PMS</title> -->
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>pages\assets\img\favicon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\line-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\jquery.toast.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\morris\morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\print-preview.css">

        <script src="<?php echo base_url();?>pages\assets\js\jquery-3.2.1.min.js"></script> 
        <script src="<?php echo base_url(); ?>pages\assets\js\jquery.toast.min.js"></script>
        <script src="<?php echo base_url(); ?>pages\assets\js\toast.js"></script>   
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php echo base_url();?>pages/assets/js/html5shiv.min.js"></script>
            <script src="<?php echo base_url();?>pages/assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
</html>    